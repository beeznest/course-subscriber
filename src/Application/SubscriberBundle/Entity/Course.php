<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity
 */
class Course
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="phase_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $phaseId;

    /**
     * @var string
     *
     * @ORM\Column(name="course_code", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $courseCode;

    /**
     * @var string
     *
     * @ORM\Column(name="sequence", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sequence;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Phase")
     * @ORM\JoinColumn(name="phase_id", referencedColumnName="id")
     */
    private $phase;

    /**
     *
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
    }

    public function __toString()
    {
        return $this->getCourseCode();
    }

    /**
     * @return Phase
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param Phase $phase
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
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
     * Set phaseId
     *
     * @param integer $phaseId
     * @return Course
     */
    public function setPhaseId($phaseId)
    {
        $this->phaseId = $phaseId;

        return $this;
    }

    /**
     * Get phaseId
     *
     * @return integer
     */
    public function getPhaseId()
    {
        return $this->phaseId;
    }

    /**
     * Set courseCode
     *
     * @param string $courseCode
     * @return Course
     */
    public function setCourseCode($courseCode)
    {
        $this->courseCode = $courseCode;

        return $this;
    }

    /**
     * Get courseCode
     *
     * @return string
     */
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Set sequence
     *
     * @param string $sequence
     * @return Course
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return string
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Course
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Course
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}