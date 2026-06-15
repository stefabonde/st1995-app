<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project")
 */
class ProjectController extends Controller {

    /**
     * @Route("/", name="project_index")
     */
    public function indexAction() {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->getAll();

        return $this->render('@App/Project/index.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/{project}", name="project_detail")
     */
    public function detailAction(Project $project) {
        return $this->render('@App/Project/detail.html.twig', [
            'project' => $project
        ]);
    }

}
