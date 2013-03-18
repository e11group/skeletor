<?php
namespace Skeletor\Interfaces\API;

interface LoginMapperInterface
{
   public function login($id);
   public function findAll();
   public function insert($body);
   public function update($id, $body);
   public function delete($id);
   public function commit();	 

}