<?php

namespace AppBundle\Controller;


use AppBundle\Entity\TimeSpent;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $week = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getWeekSpent($this->getUser());
        $month = $this->getDoctrine()->getRepository('AppBundle:TimeSpent')->getMonthSpent($this->getUser());

        $totalWeek = 0;
        /** @var TimeSpent $item */
        foreach ($week as $item) {
            $totalWeek += $item->getHours();
        }

        $totalMonth = 0;
        /** @var TimeSpent $item */
        foreach ($month as $item) {
            $totalMonth += $item->getHours();
        }

        /** @var User $user */
        $user = $this->getUser();
        $tasks = $user->getTasks();

        return $this->render('@App/Default/index.html.twig', [
            'totalWeek'  => $totalWeek,
            'totalMonth' => $totalMonth,
            'tasks'      => $tasks
        ]);
    }
}
