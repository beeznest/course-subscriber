<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * License
 *
 * @ORM\Table(name="license")
 * @ORM\Entity
 */
class License
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
     * @ORM\Column(name="session_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="content_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $contentId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $extraId;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $extraKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Session")
     * @ORM\JoinColumn(name="session_id", referencedColumnName="id")
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity="Content")
     * @ORM\JoinColumn(name="content_id", referencedColumnName="id")
     */
    private $content;

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
        return (string) $this->getId();
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
     * @param string $extraId
     * @return License
     */
    public function setExtraId($extraId)
    {
        $this->extraId = $extraId;

        return $this;
    }

    /**
     * Get extraId
     *
     * @return string
     */
    public function getExtraId()
    {
        return $this->extraId;
    }

    /**
     * Set $extraKey
     *
     * @param string $extraKey
     * @return License
     */
    public function setExtraKey($extraKey)
    {
        $this->extraKey = $extraKey;

        return $this;
    }

    /**
     * Get $extraKey
     *
     * @return string
     */
    public function getExtraKey()
    {
        return $this->extraKey;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return License
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
     * Set sessionId
     *
     * @param integer $sessionId
     * @return License
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return integer
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set $contentId
     *
     * @param integer $contentId
     * @return License
     */
    public function setContentId($contentId)
    {
        $this->contentId = $contentId;

        return $this;
    }

    /**
     * Get $contentId
     *
     * @return integer
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * Set session
     *
     * @param Session $session
     * @return License
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return integer
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set content
     *
     * @param Content $content
     * @return License
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return integer
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return License
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
