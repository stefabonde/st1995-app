<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task {

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
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="tasks")
     * @ORM\JoinTable(name="task_assignee")
     */
    private $assignee;

    /**
     * @var Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="tasks")
     * @ORM\JoinColumn(name="project", referencedColumnName="id", nullable=false)
     */
    private $project;

    /**
     * @var Priority
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Priority")
     * @ORM\JoinColumn(name="priority", referencedColumnName="id", nullable=false)
     */
    private $priority;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TaskNote", mappedBy="task")
     */
    private $taskNotes;

    function __toString() {
        return !empty($this->title) ? $this->title : '';
    }

    function __construct() {
        $this->assignee = new ArrayCollection();
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
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Task
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Task
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Priority
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * @param Priority $priority
     * @return Task
     */
    public function setPriority($priority) {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return Project
     */
    public function getProject() {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return Task
     */
    public function setProject($project) {
        $this->project = $project;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAssignee() {
        return $this->assignee;
    }

    /**
     * @param ArrayCollection $assignee
     * @return Task
     */
    public function setAssignee($assignee) {
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * @param $assignee
     * @return $this
     */
    public function addAssignee($assignee) {
        $this->assignee->add($assignee);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTaskNotes() {
        return $this->taskNotes;
    }

    /**
     * @param ArrayCollection $taskNotes
     * @return Task
     */
    public function setTaskNotes($taskNotes) {
        $this->taskNotes = $taskNotes;

        return $this;
    }

}

