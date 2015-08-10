<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/08/2015
 * Time: 00:41
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * Class Quotation
 * @package AppBundle\Entity
 * @Entity()
 */
class Quotation
{
    /**
     * @var
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
