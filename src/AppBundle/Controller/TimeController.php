<?php

namespace AppBundle\Controller;


use AppBundle\Entity\TimeSpent;
use AppBundle\Form\TimeSpentType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/time")
 */
class TimeController extends Controller {

    /**
     * @Route("/track-task-time", name="track_task_time")
     */
    public function trackTaskTimeAction(Request $request, LoggerInterface $logger) {
        if ($request->getMethod() != "POST") {
            return $this->redirectToRoute('homepage');
        }

        try {
            $task = $this->getDoctrine()->getRepository('AppBundle:Task')->find($request->get('task'));
            $timeTrackValue = $request->get('timeTrackValue');
            $timeTrackDate = \DateTime::createFromFormat('Y-m-d', $request->get('timeTrackDate'));

            $timeSpent = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->findOneBy(['user' => $this->getUser(), 'task' => $task, 'date' => $timeTrackDate]);
            if(is_null($timeSpent)) {
                $timeSpent = new TimeSpent();
            }
            $timeSpent->setHours($timeTrackValue);
            $timeSpent->setUser($this->getUser());
            $timeSpent->setDate($timeTrackDate);
            $timeSpent->setProject($task->getProject());
            $timeSpent->setTask($task);

            $this->getDoctrine()->getManager()->persist($timeSpent);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Ore caricate con successo');

            return $this->redirectToRoute('task_detail', ['task' => $task->getId()]);
        } catch (\Exception $e) {
            $logger->error($e);
            $this->addFlash('danger', 'Si è verificato un errore');

            return $this->redirectToRoute('task_detail', ['task' => $task->getId()]);
        }
    }

    /**
     * @Route("/list/{type}")
     */
    public function listAction($type) {
        if ($type == 'week') {
            $list = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getWeekSpent($this->getUser());
        } elseif ($type == 'month') {
            $list = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getMonthSpent($this->getUser());
        } else {
            $list = [];
        }

        return $this->render('@App/Time/list.html.twig', [
            'list' => $list
        ]);
    }

    /**
     * @Route("/new")
     */
    public function newAction(LoggerInterface $logger, Request $request) {
        $timeSpent = new TimeSpent();
        $timeSpent->setDate(new \DateTime());
        $timeSpent->setUser($this->getUser());
        $form = $this->createForm(TimeSpentType::class, $timeSpent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $searchSpent = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->findOneBy(['user' => $this->getUser(), 'task' => $timeSpent->getTask(), 'date' => $timeSpent->getDate()]);
                if (!is_null($searchSpent)) {
                    $searchSpent->setHours($timeSpent->getHours());
                    $this->getDoctrine()->getManager()->persist($searchSpent);
                } else {
                    $this->getDoctrine()->getManager()->persist($timeSpent);
                }

                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('success', 'Ore caricate correttamente');

                return $this->redirectToRoute('app_time_new');
            } catch (\Exception $e) {
                $logger->error($e);
                $this->addFlash('danger', 'Si è verificato un errore');
            }
        }

        return $this->render('@App/Time/edit.html.twig', [
            'form' => $form->createView(),
            'new'  => true
        ]);
    }

    /**
     * @Route("/edit/{timeSpent}")
     */
    public function editAction(TimeSpent $timeSpent, Request $request, LoggerInterface $logger) {
        $form = $this->createForm(TimeSpentType::class, $timeSpent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getDoctrine()->getManager()->persist($timeSpent);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirect($request->get('destination'));
            } catch (\Exception $e) {
                $logger->error($e);
                $this->addFlash('danger', 'Si è verificato un errore');
            }
        }

        return $this->render('@App/Time/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{timeSpent}")
     */
    public function deleteAction(Request $request, TimeSpent $timeSpent, LoggerInterface $logger) {
        try {
            $this->getDoctrine()->getManager()->remove($timeSpent);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Eliminato correttamente');
        } catch (\Exception $e) {
            $logger->error($e);
            $this->addFlash('danger', 'Si è verificato un errore');
        }

        return $this->redirect($request->get('destination'));
    }

}
