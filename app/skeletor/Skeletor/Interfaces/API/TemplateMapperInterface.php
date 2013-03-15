<?php
namespace Skeletor\Interfaces\API;

interface TemplateMapperInterface
{
   public function findById($id);
   public function findAll();
   public function insert();
   public function update();
   public function delete($id);
   public function flush();	 

}