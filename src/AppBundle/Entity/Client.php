<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client {

    use ORMBehaviors\Blameable\Blameable,
        ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\SoftDeletable\SoftDeletable;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="client")
     */
    private $projects;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ClientUser", mappedBy="client")
     */
    private $clientUsers;

    function __toString() {
        return !empty($this->name) ? $this->name : '';
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Client
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getProjects() {
        return $this->projects;
    }

    /**
     * @param ArrayCollection $projects
     * @return Client
     */
    public function setProjects($projects) {
        $this->projects = $projects;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getClientUsers() {
        return $this->clientUsers;
    }

    /**
     * @param ArrayCollection $clientUsers
     * @return Client
     */
    public function setClientUsers($clientUsers) {
        $this->clientUsers = $clientUsers;

        return $this;
    }

}

