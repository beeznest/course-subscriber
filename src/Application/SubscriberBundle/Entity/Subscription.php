<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription")
 * @ORM\Entity
 */
class Subscription
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
     * @ORM\Column(name="student_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $studentId;

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
     * @var \DateTime
     *
     * @ORM\Column(name="invoiced_at", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $invoicedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="paid", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $paid;

    /**
     * @var string
     *
     * @ORM\Column(name="reason_decline", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $reasonDecline;

    /**
     * @ORM\ManyToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;

    /**
     *
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function __toString()
    {
        return $this->getStatus();
    }

    /**
     * @return Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param Student $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
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
     * Set studentId
     *
     * @param integer $studentId
     * @return Subscription
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    /**
     * Get studentId
     *
     * @return integer
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Subscription
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
     * @return Subscription
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
     * Set invoicedAt
     *
     * @param integer $invoicedAt
     * @return Subscription
     */
    public function setInvoicedAt($invoicedAt)
    {
        $this->invoicedAt = $invoicedAt;

        return $this;
    }

    /**
     * Get invoicedAt
     *
     * @return integer
     */
    public function getInvoicedAt()
    {
        return $this->invoicedAt;
    }

    /**
     * Set paid
     *
     * @param integer $paid
     * @return Subscription
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get invoicedAt
     *
     * @return integer
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set reasonDecline
     *
     * @param string $reasonDecline
     * @return Subscription
     */
    public function setReasonDecline($reasonDecline)
    {
        $this->reasonDecline = $reasonDecline;

        return $this;
    }

    /**
     * Get reasonDecline
     *
     * @return integer
     */
    public function getReasonDecline()
    {
        return $this->reasonDecline;
    }

}
