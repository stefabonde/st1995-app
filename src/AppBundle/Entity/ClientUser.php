<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * ClientUser
 *
 * @ORM\Table(name="client_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientUserRepository")
 */
class ClientUser {

    use ORMBehaviors\Blameable\Blameable,
        ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Client
     *
     * @ORM\JoinColumn(name="client", referencedColumnName="id", nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="clientUsers")
     */
    private $client;

    /**
     * @var User
     *
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="clientUsers")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return Client
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return ClientUser
     */
    public function setClient($client) {
        $this->client = $client;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @param User $user
     * @return ClientUser
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

}

