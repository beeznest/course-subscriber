<?php

namespace Application\SubscriberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity
 */
class Student implements UserInterface
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
     *use Sonata\UserBundle\Entity\BaseUser as BaseUser;
     * @ORM\Column(name="firstname", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="middlename", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $middlename;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, precision=0, scale=0, nullable=true, unique=false)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="id_num", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $idNum;

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $occupation;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cellphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdAt;

    /**
     * @var string use Sonata\UserBundle\Entity\BaseUser as BaseUser;
     *
     * @ORM\Column(name="status", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $groupId;

    /**
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

    /**
     * @var string
     *
     * @ORM\Column(name="terms", type="boolean", unique=false)
     */
    private $terms;

    /**
     * @var string
     *
     * @ORM\Column(name="adult", type="boolean", unique=false)
     */
    private $adult;

    /**
     * @var string
     *
     * @ORM\Column(name="salt",  type="string", length=255, precision=0, scale=0, unique=false)
     */
    private $salt;

    /**
     *
     */
    public function __construct()
    {
        //parent::__construct();
        $this->createdAt = new \DateTime("now");
    }

    /**
     * @return array|\Symfony\Component\Security\Core\Role\Role[]
     */
    public function getRoles()
    {
        return array('ROLE_STUDENT');
    }

    /**
     * @return bool
     */
    public function eraseCredentials()
    {
        return false;
    }

    /**
     * @return null|string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param $salt
     * @return mixed
     */
    public function setSalt($salt)
    {
        return $this->salt = $salt;
    }
    
    /**
     * @param UserInterface $account
     * @return bool
     */
    public function equals(UserInterface $account)
    {
        if ($account->getUsername() != $this->getUsername) {
            return false;
        }
        if ($account->getEmail() != $this->getEmail) {
            return false;
        }
        return true;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->salt,
            $this->password,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->salt,
            $this->password,
            ) = unserialize($serialized);
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function loadUserByUsername($username)
    {
        return $this->findOneBy(array('username' => $username));
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     */
    public function loadUser(UserInterface $user)
    {
        return $user;
    }

    /**
     * @param AccountInterface $account
     * @return mixed
     */
    /*public function loadUserByAccount(AccountInterface $account)
    {
        return $this->loadUserByUsername($account->getUsername());
    }*/

    public function supportsClass($class)
    {
        return true;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFirstname().' '.$this->getLastname();
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Terms
     *
     * @return integer
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set terms
     *
     * @param string $terms
     * @return Student
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get Adult
     *
     * @return integer
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set Adult
     *
     * @param string $adult
     * @return Student
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Student
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set middlename
     *
     * @param string $middlename
     * @return Student
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * Get middlename
     *
     * @return string
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Student
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Student
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return Student
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return Student
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set idNum
     *
     * @param string $idNum
     * @return Student
     */
    public function setIdNum($idNum)
    {
        $this->idNum = $idNum;

        return $this;
    }

    /**
     * Get idNum
     *
     * @return string
     */
    public function getIdNum()
    {
        return $this->idNum;
    }

    /**
     * Set occupation
     *
     * @param string $occupation
     * @return Student
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Student
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Student
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set locality
     *
     * @param string $locality
     * @return Student
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Student
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     * @return Student
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Student
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
     * Set status
     *
     * @param string $status
     * @return Student
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
     * Set username
     *
     * @param string $username
     * @return Student
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Student
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     * @return Student
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
}
