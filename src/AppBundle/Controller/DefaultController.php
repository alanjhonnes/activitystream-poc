<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use AppBundle\Entity\EnboxUser;
use AppBundle\Entity\Quotation;
use AppBundle\Entity\QuotationOpenActivityItem;
use AppBundle\Entity\Quote;
use AppBundle\Entity\QuoteSentActivityItem;
use AppBundle\Entity\Timeline;
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
        $timeline = new Timeline();
        $timeline->setCompany($company);

        $qo = new QuotationOpenActivityItem();
        $qs = new QuoteSentActivityItem();

        $timeline->addActivity($qo);
        $timeline->addActivity($qs);

        $qo->setActor($user);
        $qo->setObject($quotation);
        $qo->setTarget($company);

        $qs->setActor($company);
        $qs->setObject($quote);
        $qs->setTarget($quotation);

        $em->persist($user);
        $em->persist($quotation);
        $em->persist($quote);
        $em->persist($company);
        $em->persist($qo);
        $em->persist($qs);
        $em->persist($timeline);



        $em->flush();

        //dump($company);

        $qb = new QueryBuilder($em);
        $qb->from('AppBundle:Timeline', 't')
            ->select('t')
            ->leftJoin('t.activities', 'ta')
        //->andWhere('t.company = :company')
        //->setParameter('company', $company->getId());

        //->andWhere('a.actor = :actor')->setParameter('actor', 1)

        ;
        $timeline = $qb->getQuery()->execute();
        dump($timeline);


        $qb = new QueryBuilder($em);
        $qb->from('AppBundle:ActivityItem', 'a')
            ->select('a')
           // ->leftJoin('AppBundle:QuoteSentActivityItem', 'qoat', 'WITH', 'a.id = qoat.id')
           // ->andWhere('qoat.actor = :company')
           // ->setParameter('company', $company->getId());
            ;

        $activities = $qb->getQuery()->execute();

        dump($activities);
        return $this->render('default/result.html.twig',
            array( "timeline" => $timeline[0], "activities" => $activities )
        );
    }
}
