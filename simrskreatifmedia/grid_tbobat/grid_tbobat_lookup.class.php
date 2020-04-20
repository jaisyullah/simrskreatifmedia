<?php
class grid_tbobat_lookup
{
//  
   function lookup_aktif(&$aktif) 
   {
      $conteudo = "" ; 
      if ($aktif == "Y")
      { 
          $conteudo = "Akitf";
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
