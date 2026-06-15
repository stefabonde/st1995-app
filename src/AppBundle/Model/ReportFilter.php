<?php
/**
 * Created by PhpStorm.
 * User: lpezzali
 * Date: 2019-03-12
 * Time: 23:36
 */

namespace AppBundle\Model;


use AppBundle\Entity\Project;

class ReportFilter {

    /** @var \DateTime */
    private $start;

    /** @var \DateTime */
    private $end;

    /** @var Project */
    private $project;

    /**
     * @return \DateTime
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     *
     * @return ReportFilter
     */
    public function setStart($start) {
        $this->start = $start;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     *
     * @return ReportFilter
     */
    public function setEnd($end) {
        $this->end = $end;

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
     *
     * @return ReportFilter
     */
    public function setProject($project) {
        $this->project = $project;

        return $this;
    }

}