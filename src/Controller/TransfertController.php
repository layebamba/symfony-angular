<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Entity\Tarif;
use App\Entity\Compte;
use App\Form\RetraitType;
use App\Entity\Transaction;
use App\Form\TransactionType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionRepository;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\Existence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class TransfertController extends AbstractController
{
    /**
     * @Route("/transfert", name="transfert",methods={"POST"})
     */
    public function transfert(Request $request,EntityManagerInterface $entityManager)
    {

  
        $user= new Transaction();
        $form=$this->createForm(TransactionType::class,$user);
        
        $debut=1;
        $annee = date('Y');
        $nul=00;
        $heure = date('H');
        $seconde=date('s');
        $cni=$debut.$seconde.$annee.$nul.$heure;
        $form->handleRequest($request);
        $data=$request->request->all();
        $form->submit($data);



        while(true)
        {
            if(time()%1==00)
            {
                $alea=rand(100,10000000);
                break;
            }
            else
            {
                slep(1);
            }
        }
   
         $user->setCodenvoi($alea);
         $face=$this->getUser();
         $user->setUser($face);
         $user->setCni($cni);
         $user->setDate(new \DateTime());
       
        
       $lay=$form->get('mtntenvoi')->getData();
        
        
        $tarif=$this->getDoctrine()->getRepository(Tarif::class)->findAll();
        
        foreach ($tarif as $values) {
         $values->getBorneinferieure();
            $values->getBornesuperieure();
          $values->getValeur();
          if($lay>=$values->getBorneinferieure() && $lay<=$values->getBornesuperieure())
          {
            $laye=$values->getValeur();
            $com1=($laye*10)/100;
            $com2=($laye*20)/100;
            $com3=($laye*30)/100;
            $com4=($laye*40)/100;
          


               $user->setEnvoitarif($com1);
               $user->setRetraittarif($com2);
               $user->setEtattarif($com3);
               $user->setWaritarif($com4);
             break;
           
       
              
          }

          
        }

    ;
        $user->setMontanttotal($user->getEnvoiTarif()+$user->getMtntenvoi());
        $entityManager->persist($user);
        
        $entityManager->flush();
$compte=$this->getUser()->getCompte();

        if($compte->getMontant()>$user->getMtntenvoi()){
         
       

          $compte->setMontant($compte->getMontant()-$user->getMontanttotal());
          $entityManager=$this->getDoctrine()->getManager();
          $entityManager->persist($compte);
 
          $entityManager->flush();
 
         
        $user1='Nom:';
        $user2='Prenom:';
        $user3='Tel:';
        
        $user4='codenvoi:';
        $user5='Montanttotal:';

       return new Response('transfert reussi voici le reçu d\'envoi:'."<br>".$user1.$user->getNomexp()."<br>"
       .$user2.$user->getPrenomexp()."<br>".$user3.$user->getTelexp()."<br>".$user1.$user->getNomrecep()."<br>"
       .$user2.$user->getPrenomrecep()."<br>".$user3.$user->getTelrecep()."<br>".$user4.$user->getCodenvoi()."<br>"
       .$user5.$user->getMontanttotal()."<br>"
    );
  }
     
        else
        {
            return new Response('solde insuffisant');
        }
    }


    /**
     * @Route("/retrait",name="retraitkhaliss",)
     */
public function retrait(Request $request,EntityManagerInterface $entityManager,TransactionRepository $transac)

{
 
  $transaction= new Transaction();

  $form=$this->createForm(RetraitType::class,$transaction);
  $values=$request->request->all();

  $form->handleRequest($request);
  $form->submit($values);

  $debut=1;
  $nul=00;
  $annee = date('Y');
  $heure = date('H');
  $seconde=date('s');
  $cni=$debut.$heure.$annee.$nul.$seconde;
  
  $codes=$transaction->getCodenvoi();
  $code=$transac->findOneBy(['codenvoi'=>$codes]);
  

  if(!$code){
    return new Response('ce code est invalide');
  }
  $status=$code->getEtat();
  if($code->getCodenvoi()==$codes && $status=='retiré')
  {
return new Response('somme deja retiré');
  }


  $user=$this->getUser();
  $code->setUser($user);
  $code->setDateretrait(new \ DateTime());
  $code->setCniretrait($cni);
  
  $entityManager->persist($code);
  $entityManager->flush();

$exp='envoyeur:';

  $user1='Nom:';
  $user2='Prenom:';
  $user3='Tel:';
  $user01='CNI:';
  $user03='Montant:';
  $user4='recepteur:';
  return new Response('retrait effectué avec succee voici le reçu :'."<br>"
  .$exp."<br>".$user1.$code->getNomexp()."<br>"
  .$user2.$code->getPrenomexp()."<br>".$user3.$code->getTelexp().
  "<br>".$user4."<br>".$user1.$code->getNomrecep()."<br>"
  .$user2.$code->getPrenomrecep()."<br>".$user3.$code->getTelrecep().
  "<br>".$user01.$code->getCniretrait()."<br>".$user03.$code->getMtntenvoi()."<br>" );



}

 /**
    * @Route("/transaction",name="listeuser",methods={"GET"})
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
