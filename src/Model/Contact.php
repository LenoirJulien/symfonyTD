<?php
namespace App\Model;

class Contact{
	private $nom;
	private $prenom;
	private $email;
	private $tel;
	private $mobile;
	
	public function __construct($nom='',$prenom='',$email='',$tel='',$mobile=''){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->tel=$tel;
		$this->mobile=$mobile;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getTel(){
		return $this->tel;
	}
	
	public function getMobile(){
		return $this->mobile;
	}
	
}