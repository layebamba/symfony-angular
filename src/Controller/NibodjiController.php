<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Form\FormType;

use App\Form\DepotType;
use App\Form\CompteType;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectManager;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Json;
/**
 * ()
 */
class NibodjiController extends AbstractController
{
    /**
     * @Route("/register", name="nibodji",methods={"POST","GET"})
     */
    public function register(Request $request,ObjectManager $manager,UserPasswordEncoderInterface $PasswordEncoder)
    {
        $partenaire= new Partenaire();
        $form1=$this->createForm(PartenaireType::class,$partenaire);
        $minute=date('i');
     $ni="NIN";
   
     $seconde=date('s');
  
     $nin=$minute.$ni.$seconde;
  $na=1001;
   $jour=date('d');
   $rc="RCM";
   
 $annee=date('y');
    
  $registre=$na.$jour.$rc.$annee;

  $form1->handleRequest($request);
  $fil=$request->request->all();
  //var_dump($fil['profil']);
  //();
  $form1->submit($fil);
  $partenaire->setNinea($nin);
  $partenaire->setRegistre($registre);
       
        $manager=$this->getDoctrine()->getManager();
        $manager->persist($partenaire);
        $manager->flush();

       $user=new User();
      // $values=json_decode($request->getContent());
       
       $form=$this->createForm(FormType::class,$user);
   
       $form->handleRequest($request);
       $file=$request->files->all()['imageFile'];
       $form->submit($fil);
     
       $user->setPartenaire($partenaire);
       $user->setPassword($PasswordEncoder->encodePassword($user,$form->get('password')->getData()));
        $a=$fil['profil'];
       $user->setRoles(["ROLE_$a"]);
   
      
      
       
     
       $user->setImageFile($file);
       $manager->persist($user);
        $manager->flush();
 
  

       $compte =new Compte();
       $compte->setPartenaire($partenaire);
       $form0=$this->createForm(CompteType::class,$compte);
       $jour = date('d');
       $mois = date('m');
       $annee = date('Y');
   
       $heure = date('H');
       $minute = date('i');
       $seconde=date('s');
       $num= $jour.$mois.$annee.$heure.$minute.$seconde;  
       $compte->setNumerocompte($num);
       $compte->setMontant(0);
       


    $fil=$request->request->all();
     
       $form0->handleRequest($request);
       $form0->submit($fil);
       $manager=$this->getDoctrine()->getManager();
       $manager->persist($user);
       $manager->persist($compte);
       $manager->flush();
       return new Response("creation reussi",Response::HTTP_CREATED);
    }
    /** @Route("/api")
     * @Route("/login_check",name="logger",methods={"GET","POST"})
     */
    public function login(Request $request)
    {
        $user=$this->getUser();
        return $this->json(array(
            'username'=>$user->getUsername(),
            'roles'=>$user->getRoles(),
        ));
    }
/**
 * @Route("/depot",name="depot_argent",methods={"GET","POST"})
 */


    public function argent(Request $request,EntityManagerInterface $entityManager)
    {
      $values=json_decode($request->getContent());
    
        $depot=new Depot();
        $depot->setDate(new \DateTime());
        $form=$this->createForm(DepotType::class,$depot);
        $data=$request->request->all();
        
        $form->submit($data);
         
       
      
        
        if($values->montants>=75000)
        {
        //     $connecte=$this->getUser();
        //     $user=$this->getDoctrine()->getRepository(User::class)->find($connecte);
        //    $depot->setUser($user);
       
            $compte=$this->getDoctrine()->getRepository(Compte::class)->
            findOneBy(['numerocompte'=>$values->numerocompte]);
        $compte->setMontant($compte->getMontant()+$depot->getMontants());
        // $num=$this->getCompte();
     //   $compte=$this->getDoctrine()->getRepository(Compte::class)->find(['compte_id'=>$values->compte_id]);
        // $depot->setCompte($compte);
      
        

            }
            else
            {
                return new Response('montant insuffisant');
            }
          
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($depot);
        $entityManager->persist($compte);
        $entityManager->flush();
        return new Response('depot effectué',Response::HTTP_CREATED);
    }



    private $passwordEncoder;
     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
     $this->passwordEncoder = $passwordEncoder;
     }
     /**
     * @Route("/api/login", name="token",methods={"POST"})
     * @param Request $request
     * @param JWTEncoderInterface $JWTEncoder
     * @return JsonResponse
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    
     public function nonaccess(Request $request,EntityManagerInterface $entityManager, UserPasswordEncoderInterface $PasswordEncoder,JWTEncoderInterface $jWTEncoder)
     {
     $values=json_decode($request->getContent());
     $username=$values->username;
     $password=$values->password;
     $partenaire=$this->getDoctrine()->getRepository(User::class)->findOneBy(['username'=>$username]);
     $isValid=$PasswordEncoder->isPasswordValid($partenaire,$password);
     if(!$partenaire)
     {
     return new Response('username incorrect');
     }
     elseif(!$isValid)
     {
     return new Response('password incorrect');
     }
     if ($partenaire->getStatus()=="inactive")
     {
     $partenaire->setStatus('active');
     $entityManager->persist($partenaire);
     $entityManager->flush();
     $data=['vous etes actif'];
     return new JsonResponse($data);
     }
     }


  
}
