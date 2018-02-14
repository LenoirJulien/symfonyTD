<?php
namespace App\Service;
use App\Service\IModelManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class contactSessionManager implements IModelManager{
	
	private $session;
	const KEY='contacts';
	
	public function __construct(SessionInterface $session){
		$this->session=$session;
	}
	
	public function updateSession($values){
		$this->session->set(self::KEY,$values);
	}
	
	public function getAll(){
		return $this->session->get(self::KEY,[]);
	}
	
	public function insert($object){
		$users=$this->getAll();
		$users[]=$object;
		$this->updateSession($users);
	}
	
	public function update($object,$values){
		foreach ($values as $keu=>$value){
			$accesseur="set".key;
			if(method_exists($object, $accesseur)){
				call_user_func([$object,$accesseur],[$value]);
			}
		}
	}
	
	public function delete($index){
		
	}
	
	public function get($index){
		return $this->getAll()[$index];
	}
	
	public function filterBy($keyAndValue){
		
	}
	
	public function count(){
		
	}
	
	public function select($index){
		
	}
}