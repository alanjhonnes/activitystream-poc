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
 * Class QuotationOpenActivityItem
 * @package AppBundle\Entity
 * @Entity()
 */
class QuotationOpenActivityItem extends AbstractActivityItem
{

    /**
     * @var
     * @ManyToOne(targetEntity="AppBundle\Entity\EnboxUser", fetch="EAGER")
     */
    protected $actor;

    /**
     * @var
     * @ManyToOne(targetEntity="AppBundle\Entity\Quotation", fetch="EAGER")
     */
    protected $object;

    /**
     * @var
     * @ManyToOne(targetEntity="AppBundle\Entity\Company", fetch="EAGER")
     */
    protected $target;


    /**
     * Set published
     *
     * @param \DateTime $published
     * @return QuotationOpenActivityItem
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
     * @param \AppBundle\Entity\EnboxUser $actor
     * @return QuotationOpenActivityItem
     */
    public function setActor(\AppBundle\Entity\EnboxUser $actor = null)
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Get actor
     *
     * @return \AppBundle\Entity\EnboxUser 
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Set object
     *
     * @param \AppBundle\Entity\Quotation $object
     * @return QuotationOpenActivityItem
     */
    public function setObject(\AppBundle\Entity\Quotation $object = null)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return \AppBundle\Entity\Quotation 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set target
     *
     * @param \AppBundle\Entity\Company $target
     * @return QuotationOpenActivityItem
     */
    public function setTarget(\AppBundle\Entity\Company $target = null)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return \AppBundle\Entity\Company 
     */
    public function getTarget()
    {
        return $this->target;
    }
}
