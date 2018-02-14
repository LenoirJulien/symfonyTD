<?php
namespace App\Service;
interface IModelManager{
	public function getAll();
	public function insert($object);
	public function update($object,$values);
	public function delete($index);
	public function get($index);
	public function filterBy($keyAndValue);
	public function count();
	public function select($index);
}