<?php
/*
 * No need to create this Entity the Content::$courses variable
 * already does creates the table via Doctrine.
 *
 * */
namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 * ContentCourse
 *
 * @ORM\Table(name="content_course")
 * @ORM\Entity
 */
class ContentCourse
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
     * @ORM\Column(name="course_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $courseId;

    /**
     * @var integer
     *
     * @ORM\Column(name="content_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $contentId;

    /**
     *
     */
    public function __construct()
    {
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
     * Set $contentId
     *
     * @param integer $contentId
     * @return Content
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
     * Set courseId
     *
     * @param integer $courseId
     * @return Session
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;

        return $this;
    }

    /**
     * Get courseId
     *
     * @return integer
     */
    public function getCourseId()
    {
        return $this->courseId;
    }
}
