<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Partenaire;
use FOS\RestBundle\View\View;
use App\Repository\UserRepository;
use App\Repository\PartenaireRepository;
use App\Repository\TransactionRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use  FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Json;

class ListerController extends FOSRestController
{


 

    /**
     * @Route("/listeruser", name="lister",methods={"GET","POST"})
     */
    public function listeUser(PartenaireRepository $repository,SerializerInterface $serializer)
    {

     
        $partenaires = $repository->findAll();
        $data = $serializer->serialize($partenaires, 'json', ['groups' => ['partenaires']]);

        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }



   /**
    * @Route("/user",name="listeuse",methods={"GET"})
    */
    
  public function listeutilisateur(UserRepository $repository,SerializerInterface $serializer)
  {
      $users=$repository->findAll();
      $utile=$serializer->serialize($users,'json',['groups' => ['users']]);

      return new Response($utile, 200, [
        'Content-Type' => 'application/json'
    ]);
  }



   


}


