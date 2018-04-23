<?php

namespace App\Controller;

use App\Entity\Account;
use App\Repository\AccountRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormError;

class CAController extends Controller
{    
    /**
    * @Route("/welcome", name="welcome")
    */
    public function index(AccountRepository $repository): Response
    {
        $posts = $this->getDoctrine()
                    ->getRepository(Account::class)
                    ->findAll();
        return $this->render('welcome.html.twig');
    }

    /**
    * @Route("/", name="new")
    * @Method({"GET", "POST"})
    */
    public function new(Request $request)
    {
        $post = new Account();
        $form = $this->createFormBuilder($post, array('allow_extra_fields' =>true))
                    ->add('Firma', TextType::class, array('label'=>false,
							  'attr'=>array('placeholder'=>'Firma', 'class'=>'form-control input-sm'),
							  'required' => false
							  ))
  		    ->add('UstId', TextType::class, array('label'=>false,
							  'attr'=>array('placeholder'=>'Ust-ID', 'class'=>'form-control input-sm'),
							  'required' => false,
							  'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Regex(['pattern'=>'/[0-9\/]+/','message' => 'Keine valider Ust-ID!'])
							    )))
                    ->add('Anrede', ChoiceType::class, array ('label'=>false,							     
							      'multiple'=>false,
							      'expanded'=>true,
							      'choices' => array ('Herr' => true, 'Frau' => false),
							      'data' => true,
							      'attr' => array ('class' => 'radio_inline')
							    ))
                    ->add('Vorname', TextType::class, array('label'=>false,'attr'=>array('placeholder'=>'Vorname *', 'class'=>'form-control input-sm')))
                    ->add('Nachname', TextType::class, array('label'=>false,'attr'=>array('placeholder'=>'Nachname *', 'class'=>'form-control input-sm')))
                    ->add('Strasse', TextType::class, array('label'=>false,
							    'attr'=>array('placeholder'=>'Straße, Nr. *', 'class'=>'form-control input-sm'),
							    'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Regex(['pattern'=>'/(.*?)(\d{1,4})/','message' => 'Keine valide Straße!'])
							)))
                    ->add('PLZ', TextType::class, array('label'=>false,
							'attr'=>array('placeholder'=>'PLZ *', 'class'=>'form-control input-sm'),
							'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Regex(['pattern'=>'/\d{5}/','message' => 'Keine valide Postleitzahl!'])
							)))
                    ->add('Ort', TextType::class, array('label'=>false,
							'attr'=>array('placeholder'=>'Ort *', 'class'=>'form-control input-sm'),
							'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Regex(['pattern'=>'/[a-zA-Z]+/','message' => 'Keine valider Ort!'])
							)))
                    ->add('Land', ChoiceType::class, array ('label'=>false, 
							 'multiple'=>false, 'choices' => array ("Deutschland *" =>'Deutschland', "Italien *" =>'Italien *', "Schweiz *" =>'Schweiz'), 
							 'attr'=>array('class'=>'form-control input-sm', 'customattr'=>'customdata')))
                    ->add('Telefon', TextType::class, array('label'=>false,
							    'attr'=>array('placeholder'=>'Telefon *', 'class'=>'form-control input-sm'),
							    'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Regex(['pattern'=>'/[0-9-+\/()]+/','message' => 'Keine valide Telefonnummer!'])
							    )))
                    ->add('Fax', TextType::class, array('label'=>false,
							'attr'=>array('placeholder'=>'Fax', 'class'=>'form-control input-sm'),
							'required' => false,
							'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Regex(['pattern'=>'/[0-9-+\/()]+/','message' => 'Keine valide Faxnummer!'])
							)))
                    ->add('email', TextType::class, array('label'=>false,
							  'attr'=>array('placeholder'=>'E-Mail *', 'class'=>'form-control input-sm', 'id'=>'email'),
							   'constraints' => array(
								new \Symfony\Component\Validator\Constraints\Email(['message' => 'Keine valide E-Mail Adresse!']))))
                    ->add('Passwort', RepeatedType::class, array(
				    'type' => PasswordType::class,
				    'invalid_message' => 'Die Passwortfelder müssen übereinstimmen.',
				    'options' => array('attr' => array('class' => 'form-control input-sm', 'id'=>'pwd')),
				    'required' => true,
				    'first_options'  => array('label' => false,'attr'=>array('placeholder'=>'Passwort *', 'class'=>'form-control input-sm', 'id'=>'pwd')),
				    'second_options' => array('label' => false,'attr'=>array('placeholder'=>'Passwort wiederholen *', 'class'=>'form-control input-sm', 'id'=>'pwd'))))
                    ->getForm();
        
	if ('POST' == $request->getMethod()) {
	    $form->handleRequest($request);
	    
	    if ($form->get('Firma')->getData() && !$form->get('UstId')->getData()) {			
		
		$form->get('UstId')->addError(new FormError('Ust-ID fehlt!'));
	    
	    } else if ($form->isSubmitted() && $form->isValid()) {
		
		$em = $this->getDoctrine()->getManager();		    
		$em->persist($post);
		$em->flush();
		$this->addFlash('success', 'account created');
		return $this->redirectToRoute('welcome');
	    }
	}
        return $this->render('new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
