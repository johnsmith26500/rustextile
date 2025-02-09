<?php
/*
 * (c) Suhinin Ilja <iljasuhinin@gmail.com>
 */
namespace SIP\ResourceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="sip_event")
 * @ORM\HasLifecycleCallbacks
 */
class Event implements Taggable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIP\ResourceBundle\Entity\Media\Media",cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;

    protected $showImage;

    /**
     * @Gedmo\Slug(fields={"h1"})
     * @ORM\Column(type="string", name="slug")
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", name="h1")
     */
    protected $h1;

    /**
     * @ORM\Column(type="text", name="brief", nullable=true)
     */
    protected $brief;

    /**
     * @ORM\Column(type="text", name="full")
     */
    protected $full;

    /**
     * @ORM\Column(type="string", name="address", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", name="phone", nullable=true)
     */
    protected $phone;

    /**

     * @ORM\Column(type="string", name="site", nullable=true)
     */
    protected $site;

    /**
     * @ORM\Column(type="string", name="foto_from", nullable=true)
     */
    protected $fotoFrom;

    /**
     * @ORM\Column(type="string", name="meta_title", nullable=true)
     */
    protected $metaTitle;

    /**
     * @ORM\Column(type="text", name="meta_description", nullable=true)
     */
    protected $metaDescription;

    /**
     * @ORM\Column(type="string", name="meta_keywords", nullable=true)
     */
    protected $metaKeywords;

    /**
     * @ORM\Column(type="datetime", name="date_add", nullable=true)
     */
    protected $dateAdd;

    /**
     * @ORM\Column(type="datetime", name="date_start", nullable=true)
     */
    protected $dateStart;

    /**
     * @ORM\Column(type="datetime", name="date_end", nullable=true)
     */
    protected $dateEnd;

    /**
     * @ORM\Column(type="boolean", name="publish", nullable=true)
     */
    protected $publish = true;

    /**
     * @ORM\Column(type="boolean", name="on_main", nullable=true)
     */
    protected $onMain;

    /**
     * @ORM\ManyToOne(targetEntity="SIP\ResourceBundle\Entity\EventType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $type;

    protected $tags;

    /**
     * @ORM\Column(type="string", name="flickr_galley_id", nullable=true)
     */
    protected $flickrGalleyId;

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    public function setShowImage($image) {}

    public function getShowImage()
    {
        return $this->image;
    }

    public function getTags()
    {
        $this->tags = $this->tags ?: new ArrayCollection();

        return $this->tags;
    }

    public function getTaggableType()
    {
        return get_class($this);
    }

    public function getTaggableId()
    {
        return $this->getId();
    }

    /**
     * Set h1
     *
     * @param string $h1
     * @return Event
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;

        return $this;
    }

    /**
     * Get h1
     *
     * @return string 
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * Set brief
     *
     * @param string $brief
     * @return Event
     */
    public function setBrief($brief)
    {
        $this->brief = $brief;

        return $this;
    }

    /**
     * Get brief
     *
     * @return string 
     */
    public function getBrief()
    {
        return $this->brief;
    }

    /**
     * Set full
     *
     * @param string $full
     * @return Event
     */
    public function setFull($full)
    {
        $this->full = $full;

        return $this;
    }

    /**
     * Get full
     *
     * @return string 
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Event
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Event
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
     * Set fotoFrom
     *
     * @param string $fotoFrom
     * @return Event
     */
    public function setFotoFrom($fotoFrom)
    {
        $this->fotoFrom = $fotoFrom;

        return $this;
    }

    /**
     * Get fotoFrom
     *
     * @return string 
     */
    public function getFotoFrom()
    {
        return $this->fotoFrom;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Event
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Event
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return Event
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return Event
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime 
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Event
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Event
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set image
     *
     * @param \SIP\ResourceBundle\Entity\Media\Media $image
     * @return Event
     */
    public function setImage(\SIP\ResourceBundle\Entity\Media\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \SIP\ResourceBundle\Entity\Media\Media 
     */
    public function getImage()
    {
        return $this->image;
    }

    public function __toString()
    {
        return (string)$this->getH1();
    }

    /**
     * @ORM\PrePersist
     */
    public function PrePersist()
    {
        $this->dateAdd = new \DateTime();
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Event
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set publish
     *
     * @param boolean $publish
     * @return Event
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;

        return $this;
    }

    /**
     * Get publish
     *
     * @return boolean 
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * Set ype
     *
     * @param \SIP\ResourceBundle\Entity\EventType $type
     * @return Event
     */
    public function setType(\SIP\ResourceBundle\Entity\EventType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get ype
     *
     * @return \SIP\ResourceBundle\Entity\EventType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set onMain
     *
     * @param boolean $onMain
     * @return Event
     */
    public function setOnMain($onMain)
    {
        $this->onMain = $onMain;

        return $this;
    }

    /**
     * Get onMain
     *
     * @return boolean 
     */
    public function getOnMain()
    {
        return $this->onMain;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return Event
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set flickrGalleyId
     *
     * @param string $flickrGalleyId
     * @return Event
     */
    public function setFlickrGalleyId($flickrGalleyId)
    {
        $this->flickrGalleyId = $flickrGalleyId;

        return $this;
    }

    /**
     * Get flickrGalleyId
     *
     * @return string 
     */
    public function getFlickrGalleyId()
    {
        return $this->flickrGalleyId;
    }
}
