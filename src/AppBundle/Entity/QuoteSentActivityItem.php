<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/08/2015
 * Time: 23:20
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Class QuoteSentActivityItem
 * @package AppBundle\Entity
 * @Entity()
 */
class QuoteSentActivityItem extends AbstractActivityItem
{

    /**
     * @var
     * @ManyToOne(targetEntity="AppBundle\Entity\Company", fetch="EAGER")
     */
    protected $actor;

    /**
     * @var
     * @ManyToOne(targetEntity="AppBundle\Entity\Quote", fetch="EAGER")
     */
    protected $object;

    /**
     * @var
     * @ManyToOne(targetEntity="AppBundle\Entity\Quotation", fetch="EAGER")
     */
    protected $target;


    /**
     * Set published
     *
     * @param \DateTime $published
     * @return QuoteSentActivityItem
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return \DateTime 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set actor
     *
     * @param \AppBundle\Entity\Company $actor
     * @return QuoteSentActivityItem
     */
    public function setActor(\AppBundle\Entity\Company $actor = null)
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Get actor
     *
     * @return \AppBundle\Entity\Company 
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Set object
     *
     * @param \AppBundle\Entity\Quote $object
     * @return QuoteSentActivityItem
     */
    public function setObject(\AppBundle\Entity\Quote $object = null)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return \AppBundle\Entity\Quote 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set target
     *
     * @param \AppBundle\Entity\Quotation $target
     * @return QuoteSentActivityItem
     */
    public function setTarget(\AppBundle\Entity\Quotation $target = null)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return \AppBundle\Entity\Quotation 
     */
    public function getTarget()
    {
        return $this->target;
    }
}
