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
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Class AbstractActivityItem
 * @package AppBundle\Entity
 * @Entity()
 * @InheritanceType(value="SINGLE_TABLE")
 * @DiscriminatorColumn(type="string", name="dtype")
 * @DiscriminatorMap(value={
 * "QuotationOpen" = "QuotationOpenActivityItem",
 * "QuoteSent" = "QuoteSentActivityItem"
 * })
 *
 */
class ActivityItem
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

    /**
     * @var
     * @Column(type="string")
     */
    protected $verb;

    /**
     * @var
     */
    protected $actor;

    /**
     * @var
     */
    protected $object;

    /**
     * @var
     */
    protected $target;

    /**
     * @var
     * @Column(type="string")
     */
    protected $type;

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
     * @return ActivityItem
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
     * Set verb
     *
     * @param string $verb
     * @return ActivityItem
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;

        return $this;
    }

    /**
     * Get verb
     *
     * @return string 
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ActivityItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
