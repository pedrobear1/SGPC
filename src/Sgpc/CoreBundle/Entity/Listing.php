<?php

namespace Sgpc\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listing
 *
 * @ORM\Table(name="listing")
 * @ORM\Entity(repositoryClass="Sgpc\CoreBundle\Repository\ListingRepository")
 */
class Listing
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="listings")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;
    
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="listing",  cascade={"remove"})
     */
    protected $tasks;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    
    public function __toString()
    {
        return $this->getName();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set project
     *
     * @param string $project
     * @return Listing
     */
    public function setProject(\Sgpc\CoreBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return string 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Listing
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tasks
     *
     * @param \Sgpc\CoreBundle\Entity\Task $tasks
     * @return Listing
     */
    public function addTask(\Sgpc\CoreBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Sgpc\CoreBundle\Entity\Task $tasks
     */
    public function removeTask(\Sgpc\CoreBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
