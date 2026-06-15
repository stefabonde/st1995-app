<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * TaskNote
 *
 * @ORM\Table(name="task_note")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskNoteRepository")
 */
class TaskNote {

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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var Task
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Task", inversedBy="taskNotes")
     * @ORM\JoinColumn(name="task", referencedColumnName="id", nullable=false)
     */
    private $task;

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
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return TaskNote
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Task
     */
    public function getTask() {
        return $this->task;
    }

    /**
     * @param Task $task
     * @return TaskNote
     */
    public function setTask($task) {
        $this->task = $task;

        return $this;
    }

}

