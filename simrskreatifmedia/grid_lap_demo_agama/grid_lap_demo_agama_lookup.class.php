<?php
class grid_lap_demo_agama_lookup
{
//  
   function lookup_sex(&$sex) 
   {
      $conteudo = "" ; 
      if ($sex == "L")
      { 
          $conteudo = "Laki-laki";
      } 
      if ($sex == "P")
      { 
          $conteudo = "Perempuan";
      } 
      if (!empty($conteudo)) 
      { 
          $sex = $conteudo; 
      } 
   }  
}
?>
