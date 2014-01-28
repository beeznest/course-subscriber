<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity
 */
class Content
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="lms_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lmsId;

    /**
     * @ORM\ManyToOne(targetEntity="Lms")
     * @ORM\JoinColumn(name="lms_id", referencedColumnName="id")
     */
    private $lms;

    /**
     * @ORM\ManyToMany(targetEntity="Course")
     * @ORM\JoinTable(name="content_course",
     *      joinColumns={@ORM\JoinColumn(name="content_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="course_id", referencedColumnName="id")}
     *      )
     */
    private $courses;

    /**
     *
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
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
     * Set name
     *
     * @param string $name
     * @return Content
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
     * Set lmsId
     *
     * @param integer $lmsId
     * @return Registration
     */
    public function setLmsId($lmsId)
    {
        $this->lmsId = $lmsId;

        return $this;
    }

    /**
     * Get lmsId
     *
     * @return integer
     */
    public function getLmsId()
    {
        return $this->lmsId;
    }

    /**
     * @return Lms
     */
    public function getLms()
    {
        return $this->lms;
    }

    /**
     * @param Lms $lms
     */
    public function setLms($lms)
    {
        $this->lms = $lms;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Content
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

    /**
     * Get name
     *
     * @return string
     */
    public function getCourses()
    {
        return $this->courses;
    }
}
