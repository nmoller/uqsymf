<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project", indexes={@ORM\Index(name="fk_project_idx", columns={"workcpace_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProjectRepository")
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="due_date", type=""datetime"", nullable=true)
     */
    private $dueDate;

    /**
     * @var \AppBundle\Entity\Workcpace
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Workcpace")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workcpace_id", referencedColumnName="id")
     * })
     */
    private $workcpace;



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
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dueDate
     *
     * @param string $dueDate
     *
     * @return Project
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return string
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set workcpace
     *
     * @param \AppBundle\Entity\Workcpace $workcpace
     *
     * @return Project
     */
    public function setWorkcpace(\AppBundle\Entity\Workcpace $workcpace = null)
    {
        $this->workcpace = $workcpace;

        return $this;
    }

    /**
     * Get workcpace
     *
     * @return \AppBundle\Entity\Workcpace
     */
    public function getWorkcpace()
    {
        return $this->workcpace;
    }
}
