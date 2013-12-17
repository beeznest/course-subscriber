<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity
 */
class Score
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
     * @ORM\Column(name="subscription_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $subscriptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="concept_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $conceptId;

    /**
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $score;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subscriptionId
     *
     * @param integer $subscriptionId
     * @return Score
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;

        return $this;
    }

    /**
     * Get subscriptionId
     *
     * @return integer
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * Set conceptId
     *
     * @param integer $conceptId
     * @return Score
     */
    public function setConceptId($conceptId)
    {
        $this->conceptId = $conceptId;

        return $this;
    }

    /**
     * Get conceptId
     *
     * @return integer
     */
    public function getConceptId()
    {
        return $this->conceptId;
    }

    /**
     * Set score
     *
     * @param string $score
     * @return Score
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Score
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
     * @return Score
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
