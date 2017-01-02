<?php

namespace Sgpc\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Entity(repositoryClass="Sgpc\CoreBundle\Repository\TaskRepository")
 */
class ScrumTask extends Task {

    /**
     * @ORM\ManyToOne(targetEntity="Sprint", inversedBy="tasks")
     * @ORM\JoinColumn(name="sprint_id", referencedColumnName="id")
     */
    protected $sprint;

    /**
     *
     * @var int
     * @ORM\Column(name="hours", type="integer")
     */
    protected $hours;
    
    /**
     * @ORM\OneToMany(targetEntity="Worklog", mappedBy="task", cascade={"remove"})
     */
    protected $worklog;
    
    /**
     * @ORM\ManyToOne(targetEntity="Story", inversedBy="tasks")
     * @ORM\JoinColumn(name="story_id", referencedColumnName="id", nullable=true)
     */
    private $story; 
   
     /**
     * @var int
     *
     * @ORM\Column(name="workedHours", type="integer", nullable=true)
     */
    private $workedHours;

    /**
     * @var string
     *
     * @ORM\Column(name="lastlisting", type="string", length=100, nullable=true)
     */
    protected $lastListing;

    /**
     * @var int
     *
     * @ORM\Column(name="finished", type="boolean")
     */
    protected $finished;

    public function __construct() {
        parent::__construct();

        $this->finished = false;
    }

    /**
     * Set hours
     *
     * @param integer $hours
     *
     * @return ScrumTask
     */
    public function setHours($hours) {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return integer
     */
    public function getHours() {
        return $this->hours;
    }

    /**
     * Set sprint
     *
     * @param \Sgpc\CoreBundle\Entity\Sprint $sprint
     *
     * @return ScrumTask
     */
    public function setSprint(\Sgpc\CoreBundle\Entity\Sprint $sprint = null) {
        $this->sprint = $sprint;

        return $this;
    }

    /**
     * Get sprint
     *
     * @return \Sgpc\CoreBundle\Entity\Sprint
     */
    public function getSprint() {
        return $this->sprint;
    }

    /**
     * Set lastListing
     *
     * @param string $lastListing
     *
     * @return ScrumTask
     */
    public function setLastListing($lastListing) {
        $this->lastListing = $lastListing;

        return $this;
    }

    /**
     * Get lastListing
     *
     * @return string
     */
    public function getLastListing() {
        return $this->lastListing;
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     *
     * @return ScrumTask
     */
    public function setFinished($finished) {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return boolean
     */
    public function getFinished() {
        return $this->finished;
    }


    /**
     * Add worklog
     *
     * @param \Sgpc\CoreBundle\Entity\Worklog $worklog
     *
     * @return ScrumTask
     */
    public function addWorklog(\Sgpc\CoreBundle\Entity\Worklog $worklog)
    {
        $this->worklog[] = $worklog;

        return $this;
    }

    /**
     * Remove worklog
     *
     * @param \Sgpc\CoreBundle\Entity\Worklog $worklog
     */
    public function removeWorklog(\Sgpc\CoreBundle\Entity\Worklog $worklog)
    {
        $this->worklog->removeElement($worklog);
    }

    /**
     * Get worklog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorklog()
    {
        return $this->worklog;
    }

    /**
     * Set workedHours
     *
     * @param integer $workedHours
     *
     * @return ScrumTask
     */
    public function setWorkedHours($workedHours)
    {
        $this->workedHours = $workedHours;

        return $this;
    }

    /**
     * Get workedHours
     *
     * @return integer
     */
    public function getWorkedHours()
    {
        return $this->workedHours;
    }

    /**
     * Set story
     *
     * @param \Sgpc\CoreBundle\Entity\Story $story
     *
     * @return ScrumTask
     */
    public function setStory(\Sgpc\CoreBundle\Entity\Story $story = null)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return \Sgpc\CoreBundle\Entity\Story
     */
    public function getStory()
    {
        return $this->story;
    }
}
