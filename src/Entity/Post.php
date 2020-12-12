<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Post 
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $body;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $nbLikes;

    /**
     * @var \DateTime 
     * @ORM\Column(type="date")
     */
    private $publishedAt;

    /**
     * @var \DateTime 
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @var \DateTime 
     * @ORM\Column(type="date")
     */
    private $updatedAt;




    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of body
     *
     * @return  string
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the value of nbLikes
     *
     * @return  int
     */ 
    public function getNbLikes()
    {
        return $this->nbLikes;
    }

    /**
     * Get the value of publishedAt
     *
     * @return  \DateTime
     */ 
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * Get the value of createdAt
     *
     * @return  \DateTime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of title
     *
     * @param  string  $title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the value of body
     *
     * @param  string  $body
     *
     * @return  self
     */ 
    public function setBody(string $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Set the value of nbLikes
     *
     * @param  int  $nbLikes
     *
     * @return  self
     */ 
    public function setNbLikes(int $nbLikes)
    {
        $this->nbLikes = $nbLikes;

        return $this;
    }

    /**
     * Set the value of publishedAt
     *
     * @param  \DateTime  $publishedAt
     *
     * @return  self
     */ 
    public function setPublishedAt(\DateTime $publishedAt)
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * Set the value of createdAt
     *
     * @param  \DateTime  $createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTime  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}