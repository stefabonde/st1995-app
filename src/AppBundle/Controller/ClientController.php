<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 */
class ClientController extends Controller {

    /**
     * @Route("/", name="client_index")
     */
    public function indexAction() {
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->getAll();

        return $this->render('@App/Client/index.html.twig', [
            'clients' => $clients
        ]);
    }

    /**
     * @Route("/{client}", name="client_detail")
     */
    public function detailAction(Client $client) {
        return $this->render('@App/Client/detail.html.twig', [
            'client' => $client
        ]);
    }
}
