<?php

namespace Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity is required for test suite of this project
 *
 * @ORM\Entity
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
class Post
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank(message="Title should not be blank!")
     * @Assert\Length(min=8, minMessage = "This value should be longer than 8 chars")
     */
    private $title;

    /**
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(name="content", type="string", length=255)
     * @Assert\NotBlank(message="Content field should not be empty!")
     * @Assert\Length(min=18, minMessage = "This value should be longer than 18 chars")
     */
    private $content;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $mail
     * @return $this
     */
    public function setEmail($mail)
    {
        $this->email = $mail;

        return $this;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
}
