<?php
class grid_hrm_indikator_lookup
{
//  
   function lookup_aktif(&$aktif) 
   {
      $conteudo = "" ; 
      if ($aktif == "Y")
      { 
          $conteudo = "Ya";
      } 
      if ($aktif == "N")
      { 
          $conteudo = "Tidak";
      } 
      if (!empty($conteudo)) 
      { 
          $aktif = $conteudo; 
      } 
   }  
}
?>
