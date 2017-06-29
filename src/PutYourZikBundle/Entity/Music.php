<?php

namespace PutYourZikBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * Music
 *
 * @ORM\Table(name="music")
 * @ORM\Entity(repositoryClass="PutYourZikBundle\Repository\MusicRepository")
 */
class Music
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Author", type="string", length=255)
     */
    private $author;
    /**
     * @var string
     *
     * @ORM\Column(name="Url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Duration", type="time")
     */
    private $duration;

    /**
     * @ORM\OneToMany(targetEntity="Publication", mappedBy="musics")
     */

    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="musics")
     */

    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Playlist", inversedBy="musics")
     * @JoinTable(name="music_playlist")
     */

    private $playlists;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="musics")
     * @JoinTable(name="music_tag")
     */

    private $tags;


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
     * Set name
     *
     * @param string $name
     *
     * @return Music
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Music
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Music
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set duration
     *
     * @param \DateTime $duration
     *
     * @return Music
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publication = new \Doctrine\Common\Collections\ArrayCollection();
        $this->playlists = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add publication
     *
     * @param \PutYourZikBundle\Entity\Publication $publication
     *
     * @return Music
     */
    public function addPublication(\PutYourZikBundle\Entity\Publication $publication)
    {
        $this->publication[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \PutYourZikBundle\Entity\Publication $publication
     */
    public function removePublication(\PutYourZikBundle\Entity\Publication $publication)
    {
        $this->publication->removeElement($publication);
    }

    /**
     * Get publication
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set user
     *
     * @param \PutYourZikBundle\Entity\User $user
     *
     * @return Music
     */
    public function setUser(\PutYourZikBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PutYourZikBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add playlist
     *
     * @param \PutYourZikBundle\Entity\Playlist $playlist
     *
     * @return Music
     */
    public function addPlaylist(\PutYourZikBundle\Entity\Playlist $playlist)
    {
        $this->playlists[] = $playlist;

        return $this;
    }

    /**
     * Remove playlist
     *
     * @param \PutYourZikBundle\Entity\Playlist $playlist
     */
    public function removePlaylist(\PutYourZikBundle\Entity\Playlist $playlist)
    {
        $this->playlists->removeElement($playlist);
    }

    /**
     * Get playlists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaylists()
    {
        return $this->playlists;
    }

    /**
     * Add tag
     *
     * @param \PutYourZikBundle\Entity\Tag $tag
     *
     * @return Music
     */
    public function addTag(\PutYourZikBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \PutYourZikBundle\Entity\Tag $tag
     */
    public function removeTag(\PutYourZikBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
