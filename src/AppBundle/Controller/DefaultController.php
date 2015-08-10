<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use AppBundle\Entity\EnboxUser;
use AppBundle\Entity\Quotation;
use AppBundle\Entity\QuotationOpenActivityItem;
use AppBundle\Entity\Quote;
use AppBundle\Entity\QuoteSentActivityItem;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $user = new EnboxUser();
        $user->setName('Alan');
        $quotation = new Quotation();
        $quote = new Quote();
        $company = new Company();
        $company->setName('Enbox');

        $qo = new QuotationOpenActivityItem();
        $qs = new QuoteSentActivityItem();

        $qo->setActor($user);
        $qo->setObject($quotation);
        $qo->setTarget($company);

        $qs->setActor($company);
        $qs->setObject($quote);
        $qs->setTarget($quotation);
//
//        $em->persist($user);
//        $em->persist($quotation);
//        $em->persist($quote);
//        $em->persist($company);
//        $em->persist($qo);
//        $em->persist($qs);
//
//
//
//        $em->flush();

        //dump($company);

        $qb = new QueryBuilder($em);
        $qb->from('AppBundle:AbstractActivityItem', 'a')
            ->select('a');
        $result = $qb->getQuery()->execute();

        dump($result);
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
