<?php
namespace App\Controller;

use App\Model\Contact;
use App\Service\contactSessionManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller{
	/**
	 * @Route("/users",name="users")
	 */
	public function index(contactSessionManager $contactSessionManager){
		$contactSessionManager->insert(new Contact("LENOIR","Julien"));
		$contacts = $contactSessionManager->getAll();
		return $this->render('users/index.html.twig',["contacts"=>$contacts]);
	}
	
	/**
	 * @Route("/contact/new",name="contact_new")
	 */
	public function contactNew(){
		return $this->render('users/contact.html.twig',[
				"contact"=>new Contact("LENOIR","Julien","21502771@etu.unicaen.fr","02 31 31 31 31","07 78 05 15 63"),
				"title"=>"Ajout de contact"
		]);
	}
	
	/**
	 * @Route("contact/update",name="contact_update",methods={"POST"})
	 */
	public function contactUpdate(Request $request,contactSessionManager $cManager){
		$index = $request->get("id");
		$contact=$cManager->get($index);
		if(isset($contact)){
			$cManager->update($contact, $request->all());
		}
	}
	
	
	/**
	 * @Route("/contact/edit/{index}",name="contact_edit")
	 */
	public function contactEdit($index,contactSessionManager $cManager){
		return $this->render('users/contact.html.twig',[
				"contact"=>$cManager->get($index),
				"title"=>"Modification de contact"
		]);
	}
	
}