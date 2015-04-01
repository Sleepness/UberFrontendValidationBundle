<?php

namespace Sleepness\UberFrontendValidationBundle\Tests\Fixtures\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * This model is required for test suite of this project
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
class Post
{
    /**
     * @Assert\NotBlank(message="Title should not be blank!")
     * @Assert\Length(min=8, minMessage = "This value should be longer than 8 chars")
     */
    private $title;

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
}
