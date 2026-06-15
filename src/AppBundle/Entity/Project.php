<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project {

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
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var Client
     *
     * @ORM\JoinColumn(name="client", referencedColumnName="id", nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="projects")
     */
    private $client;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Task", mappedBy="project")
     */
    private $tasks;

    function __toString() {
        return !empty($this->name) ? $this->client->getName() . ' - ' . $this->name : '';
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
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return Project
     */
    public function setClient($client) {
        $this->client = $client;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTasks() {
        return $this->tasks;
    }

    /**
     * @param ArrayCollection $tasks
     * @return Project
     */
    public function setTasks($tasks) {
        $this->tasks = $tasks;

        return $this;
    }

}

