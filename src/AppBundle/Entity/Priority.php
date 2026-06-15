<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Priority
 *
 * @ORM\Table(name="priority")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriorityRepository")
 */
class Priority {

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
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $icon;

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
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Priority
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * @param integer $weight
     * @return Priority
     */
    public function setWeight($weight) {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon) {
        $this->icon = $icon;
    }

}

