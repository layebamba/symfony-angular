<?php

namespace App\Controller;
use App\Entity\Depot;
use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\DepotType;
use App\Form\CompteType;
use Symfony\Component\HttpFoundation\Response;

class DepotController extends AbstractController
{
    // /**
    //  * @Route("/depot", name="depot")
    //  */
    //  public function recharge(Request $request,EntityManagerInterface $entityManager)
    //  {
    //  //  $values=json_decode($request->getContent());
     
    //        $depot=new Depot();
    //        $depot->setDate(new \DateTime);
    //       // $depot->setMontants($values->montants+$values->montant);
           
    //        $form=$this->createForm(DepotType::class,$depot);
    //        $data=$request->request->all();
           
    //        $form->submit($data);
          
    //      $compte=new Compte();
    //           $compte=$this->getDoctrine()->getRepository(Compte::class)->find($compte);
    //        // $compte->setCompte($compte);
    //         $compte->setMontant($compte->getMontant());
    //         var_dump($compte);
    //         die();
    //         $form=$this->createForm(CompteType::class,$compte);
    //         $data=$request->request->all();
    //         $form->submit($data);


     
    //    $entityManager=$this->getDoctrine()->getManager();
    //    $entityManager->persist($depot);
    //    $entityManager($compte);
    //    $entityManager->flush();
    //    return new Response('depot effectué',Response::HTTP_CREATED);

    //  }
}
