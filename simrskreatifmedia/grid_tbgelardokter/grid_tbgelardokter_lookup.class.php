<?php
class grid_tbgelardokter_lookup
{
//  
   function lookup_letak(&$letak) 
   {
      $conteudo = "" ; 
      if ($letak == "0")
      { 
          $conteudo = "Gelar";
      } 
      if ($letak == "2")
      { 
          $conteudo = "Spesialis";
      } 
      if ($letak == "1")
      { 
          $conteudo = "Gelar Belakang";
      } 
      if (!empty($conteudo)) 
      { 
          $letak = $conteudo; 
      } 
   }  
}
?>
