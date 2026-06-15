<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * TimeSpent
 *
 * @ORM\Table(name="time_spent")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimeSpentRepository")
 */
class TimeSpent {

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
     * @var float
     *
     * @ORM\Column(name="hours_spent", type="decimal", precision=3, scale=1)
     */
    private $hours;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_spent", type="date")
     */
    private $date;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumn(name="project", referencedColumnName="id", nullable=false)
     */
    private $project;

    /**
     * @var Task
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Task")
     * @ORM\JoinColumn(name="task", referencedColumnName="id", nullable=true)
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
     * Get hours
     *
     * @return float
     */
    public function getHours() {
        return $this->hours;
    }

    /**
     * Set hours
     *
     * @param float $hours
     *
     * @return TimeSpent
     */
    public function setHours($hours) {
        $this->hours = $hours;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return TimeSpent
     */
    public function setDate($date) {
        $this->date = $date;

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
     * @return TimeSpent
     */
    public function setUser($user) {
        $this->user = $user;

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
     * @return TimeSpent
     */
    public function setProject($project) {
        $this->project = $project;

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
     * @return TimeSpent
     */
    public function setTask($task) {
        $this->task = $task;

        return $this;
    }

}

