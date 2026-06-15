<?php

namespace AppBundle\Controller;


use AppBundle\Entity\TimeSpent;
use AppBundle\Entity\User;
use AppBundle\Form\ReportFilterType;
use AppBundle\Model\ReportFilter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/report")
 */
class ReportController extends Controller {

    /**
     * @Route("/", name="report")
     */
    public function reportAction(Request $request) {
        $start = \DateTime::createFromFormat('Ymd', date('Ym01'));
        $end = new \DateTime();
        $end->setTimestamp(strtotime('last day of this month'));

        $reportFilter = new ReportFilter();
        $reportFilter->setStart($start);
        $reportFilter->setEnd($end);
        $form = $this->createForm(ReportFilterType::class, $reportFilter, ['attr' => ['class' => 'form-inline']]);
        $form->handleRequest($request);

        if(!is_null($reportFilter->getProject())) {
            $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->getByProject($reportFilter->getProject());
        } else {
            $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->getAll();
        }
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->getAll();
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->getAll();

        $clientReport = [];
        foreach($clients as $client) {
            $spents = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getClientSpent($reportFilter->getStart(), $reportFilter->getEnd(), $client);
            $hours = 0;
            /** @var TimeSpent $spent */
            foreach($spents as $spent) {
                $hours += $spent->getHours();
            }
            $clientReport[] = [
                'client' => $client,
                'hours' => $hours
            ];
        }

        if(is_null($reportFilter->getProject())) {
            $projectReport = [];
            foreach ($projects as $project) {
                $spents = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getProjectSpent($reportFilter->getStart(), $reportFilter->getEnd(), $project);
                $hours = 0;
                /** @var TimeSpent $spent */
                foreach ($spents as $spent) {
                    $hours += $spent->getHours();
                }
                $projectReport[] = [
                    'project' => $project,
                    'hours'   => $hours
                ];
            }
        } else {
            $projectReport = [];
            $spents = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getProjectSpent($reportFilter->getStart(), $reportFilter->getEnd(), $reportFilter->getProject());
            $hours = 0;
            /** @var TimeSpent $spent */
            foreach ($spents as $spent) {
                $hours += $spent->getHours();
            }
            $projectReport[] = [
                'project' => $reportFilter->getProject(),
                'hours'   => $hours
            ];
        }

        $userReport = [];
        foreach($users as $user) {
            $spents = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getUserSpent($reportFilter->getStart(), $reportFilter->getEnd(), $user, $reportFilter->getProject());
            $hours = 0;
            /** @var TimeSpent $spent */
            foreach($spents as $spent) {
                $hours += $spent->getHours();
            }
            $userReport[] = [
                'user' => $user,
                'hours' => $hours
            ];
        }

        return $this->render('@App/Report/report.html.twig', [
            'clientReport' => $clientReport,
            'projectReport' => $projectReport,
            'userReport' => $userReport,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user", name="reportUser")
     */
    public function reportUserAction(Request $request) {
        /** @var User $user */
        $user = $this->getUser();
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->getAll();
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->getAll();

        $start = \DateTime::createFromFormat('Ymd', date('Ym01'));
        $end = new \DateTime();
        $end->setTimestamp(strtotime('last day of this month'));

        $reportFilter = new ReportFilter();
        $reportFilter->setStart($start);
        $reportFilter->setEnd($end);
        $form = $this->createForm(ReportFilterType::class, $reportFilter, ['attr' => ['class' => 'form-inline']]);
        $form->handleRequest($request);

        $clientReport = [];
        foreach($clients as $client) {
            $spents = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getClientSpent($reportFilter->getStart(), $reportFilter->getEnd(), $client, $user);
            $hours = 0;
            /** @var TimeSpent $spent */
            foreach($spents as $spent) {
                $hours += $spent->getHours();
            }
            $clientReport[] = [
                'client' => $client,
                'hours' => $hours
            ];
        }

        $projectReport = [];
        foreach($projects as $project) {
            $spents = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getProjectSpent($reportFilter->getStart(), $reportFilter->getEnd(), $project, $user);
            $hours = 0;
            /** @var TimeSpent $spent */
            foreach($spents as $spent) {
                $hours += $spent->getHours();
            }
            $projectReport[] = [
                'project' => $project,
                'hours' => $hours
            ];
        }

        return $this->render('@App/Report/reportUser.html.twig', [
            'clientReport' => $clientReport,
            'projectReport' => $projectReport,
            'form' => $form->createView()
        ]);
    }
}
