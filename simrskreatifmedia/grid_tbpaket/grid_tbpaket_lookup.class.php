<?php
class grid_tbpaket_lookup
{
//  
   function lookup_aktif(&$aktif) 
   {
      $conteudo = "" ; 
      if ($aktif == "Y")
      { 
          $conteudo = "Aktif";
      } 
      if ($aktif == "N")
      { 
          $conteudo = "Nonaktif";
      } 
      if (!empty($conteudo)) 
      { 
          $aktif = $conteudo; 
      } 
   }  
}
?>
