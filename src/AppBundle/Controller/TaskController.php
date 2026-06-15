<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Task;
use AppBundle\Entity\TaskNote;
use AppBundle\Entity\User;
use AppBundle\Form\TaskNoteType;
use AppBundle\Form\TaskType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/task")
 */
class TaskController extends Controller {

    /**
     * @Route("/", name="task_index")
     */
    public function indexAction() {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('@App/Task/index.html.twig', [
            'tasks' => $user->getTasks()
        ]);
    }

    /**
     * @Route("/detail/{task}", name="task_detail")
     */
    public function detailAction(Task $task, Request $request, LoggerInterface $logger) {
        $taskNote = new TaskNote();
        $taskNote->setTask($task);
        $form = $this->createForm(TaskNoteType::class, $taskNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getDoctrine()->getManager()->persist($taskNote);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Operazione effettuata con successo');

                return $this->redirectToRoute('task_detail', ['task' => $task->getId()]);
            } catch (\Exception $e) {
                $logger->error($e);
                $this->addFlash('danger', 'Si è verificato un errore, si prega di riprovare');
            }
        }

        return $this->render('@App/Task/detail.html.twig', [
            'task' => $task,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new/{project}", name="task_new", defaults={"project": null})
     */
    public function newAction($project, Request $request, LoggerInterface $logger) {
        $task = new Task();
        if (!is_null($project)) {
            $project = $this->getDoctrine()->getRepository('AppBundle:Project')->find($project);
            $task->setProject($project);
        }
        $task->addAssignee($this->getUser());
        $form = $this->createForm(TaskType::class, $task, ['new' => !is_null($project), 'container' => $this->container]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getDoctrine()->getManager()->persist($task);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Operazione effettuata con successo');

                return $this->redirectToRoute('task_detail', ['task' => $task->getId()]);
            } catch (\Exception $e) {
                $logger->error($e);
                $this->addFlash('danger', 'Si è verificato un errore, si prega di riprovare');
            }
        }

        return $this->render('@App/Task/new.html.twig', [
            'form' => $form->createView(),
            'new'  => true
        ]);
    }

    /**
     * @Route("/{task}/edit", name="task_edit")
     */
    public function editAction(Task $task, Request $request, LoggerInterface $logger) {
        $form = $this->createForm(TaskType::class, $task, ['new' => false, 'container' => $this->container]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getDoctrine()->getManager()->persist($task);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Operazione effettuata con successo');

                return $this->redirectToRoute('task_detail', ['task' => $task->getId()]);
            } catch (\Exception $e) {
                $logger->error($e);
                $this->addFlash('danger', 'Si è verificato un errore, si prega di riprovare');
            }
        }

        return $this->render('@App/Task/new.html.twig', [
            'form' => $form->createView(),
            'new'  => false,
            'task' => $task
        ]);
    }

}
