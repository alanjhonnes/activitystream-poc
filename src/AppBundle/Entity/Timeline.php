<?php
/**
 * Created by PhpStorm.
 * User: alanjhonnes
 * Date: 10/8/2015
 * Time: 3:57 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Class Timeline
 * @package AppBundle\Entity
 * @Entity()
 */
class Timeline
{
    /**
     * @var
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     * @OneToOne(targetEntity="AppBundle\Entity\Company")
     */
    protected $company;

    /**
     * @var
     * @ManyToMany(targetEntity="AppBundle\Entity\ActivityItem")
     */
    protected $activities;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     * @return Timeline
     */
    public function setCompany(\AppBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \AppBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add activities
     *
     * @param \AppBundle\Entity\ActivityItem $activities
     * @return Timeline
     */
    public function addActivity(\AppBundle\Entity\ActivityItem $activities)
    {
        $this->activities[] = $activities;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \AppBundle\Entity\ActivityItem $activities
     */
    public function removeActivity(\AppBundle\Entity\ActivityItem $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivities()
    {
        return $this->activities;
    }
}
