<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser {

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
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ClientUser", mappedBy="user")
     */
    private $clientUsers;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Task", mappedBy="assignee")
     */
    private $tasks;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getClientUsers() {
        return $this->clientUsers;
    }

    /**
     * @param ArrayCollection $clientUsers
     *
     * @return User
     */
    public function setClientUsers($clientUsers) {
        $this->clientUsers = $clientUsers;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTasks() {
        return $this->tasks->filter(function (Task $task) {
            return !$task->getProject()->getClient()->isDeleted() && !$task->getProject()->isDeleted() && !$task->isDeleted();
        });
    }

    /**
     * @param ArrayCollection $tasks
     *
     * @return User
     */
    public function setTasks($tasks) {
        $this->tasks = $tasks;

        return $this;
    }

}

