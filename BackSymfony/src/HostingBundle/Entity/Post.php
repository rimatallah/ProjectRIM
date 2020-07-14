<?php

namespace HostingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="HostingBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     * @Type("int")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="post_description", type="string", length=1000)
     */
    private $postDescription;

    /**
     * @var string
     * @Type("string")
     * @Assert\Image()
     * @ORM\Column(name="post_image", type="string", length=255)
     */
    private $postImage;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="post_city_name", type="string", length=255)
     */
    private $postCityName;

    /**
     * @Type("UserBundle\Entity\User")
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get id
     *
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set postDescription
     *
     * @param string $postDescription
     *
     * @return Post
     */
    public function setPostDescription($postDescription)
    {
        $this->postDescription = $postDescription;

        return $this;
    }

    /**
     * Get postDescription
     *
     * @return string
     */
    public function getPostDescription()
    {
        return $this->postDescription;
    }

    /**
     * Set postImage
     *
     * @param string $postImage
     *
     * @return Post
     */
    public function setPostImage($postImage)
    {
        $this->postImage = $postImage;

        return $this;
    }

    /**
     * Get postImage
     *
     * @return string
     */
    public function getPostImage()
    {
        return $this->postImage;
    }

    /**
     * Set postCityName
     *
     * @param string $postCityName
     *
     * @return Post
     */
    public function setPostCityName($postCityName)
    {
        $this->postCityName = $postCityName;

        return $this;
    }

    /**
     * Get postCityName
     *
     * @return string
     */
    public function getPostCityName()
    {
        return $this->postCityName;
    }
}

