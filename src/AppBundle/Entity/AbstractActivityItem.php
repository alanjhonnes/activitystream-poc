<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/08/2015
 * Time: 22:25
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * Class AbstractActivityItem
 * @package AppBundle\Entity
 * @Entity()
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="verb", type="string")
 * @DiscriminatorMap({"QuotationOpen" = "AppBundle\Entity\QuotationOpenActivityItem", "QuoteSent" = "AppBundle\Entity\QuoteSentActivityItem"})
 *
 */
class AbstractActivityItem
{

    /**
     * @var
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    protected $published;

    protected $actor;
    protected $object;
    protected $target;

    function __construct()
    {
        $this->published = new \DateTime();
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
     * Set published
     *
     * @param \DateTime $published
     * @return AbstractActivityItem
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
}
