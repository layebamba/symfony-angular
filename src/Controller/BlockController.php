<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;


 /**
     * @Route("/api")
     */
class BlockController extends AbstractController
{
    private $passwordEncoder;

public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
  $this->passwordEncoder = $passwordEncoder;
}
    /**
     * @Route("/login", name="token",methods={"POST"})
     * @param Request $request
     * @param JWTEncoderInterface $JWTEncoder
     * @return JsonResponse
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    public function block(Request $request,UserRepository $repo,UserPasswordEncoderInterface $passwordEncoder,
    JWTEncoderInterface $jWTEncoder)
    {
        
       
        $values=json_decode($request->getContent());
    
        $username=$values->username;
        
        $password=$values->password;
        $user=$this->getDoctrine()->getRepository(User::class)->findOneBy(['username'=>$username]);
        
        if(!$user)
        {
            return new Response(' username incorrect');            
        }
        $isValid=$passwordEncoder->isPasswordValid($user,$password);
        if(!$isValid)
        {
            return new Response('mot de passe incorrect');
        }
        if($user->getStatus()=="inactive")
        {
            return new Response('accés refuser');
        }
        else
        {
            $token=$jWTEncoder->encode(['username'=>$password,'exp'=>time()+3600]);
           
            return new JsonResponse(['token'=>$token]);
           
        }
    }




   
}
