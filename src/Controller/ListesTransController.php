<?php

namespace App\Controller;

use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListesTransController extends FOSRestController
{
     /**
    * @Route("/transac",name="liste",methods={"GET"})
    */
    
    public function listetrans(TransactionRepository $repository,SerializerInterface $serializer)
    {
        $transac=$repository->findAll();
        $util=$serializer->serialize($transac,'json',['groups' => ['transactions']]);
  
        return new Response($util, 200, [
          'Content-Type' => 'application/json'
      ]);
    }
}
