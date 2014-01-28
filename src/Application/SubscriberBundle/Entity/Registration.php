<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registration
 *
 * @ORM\Table(name="registration")
 * @ORM\Entity
 */
class Registration
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
     * @ORM\Column(name="lms_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lmsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $groupId;

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
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

    /**
     * @ORM\ManyToOne(targetEntity="Lms")
     * @ORM\JoinColumn(name="lms_id", referencedColumnName="id")
     */
    private $lms;

    /**
     *
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getStatus();
    }

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @param Lms $lms
     */
    public function setLms($lms)
    {
        $this->lms = $lms;
    }

    /**
     * @return Lms
     */
    public function getLms()
    {
        return $this->lms;
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
     * Set groupId
     *
     * @param integer $groupId
     * @return Registration
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Registration
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
     * @return Registration
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
