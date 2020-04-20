<?php
class grid_tbnpo_lookup
{
//  
   function lookup_selesai(&$selesai) 
   {
      $conteudo = "" ; 
      if ($selesai == "Y")
      { 
          $conteudo = "Sudah";
      } 
      if ($selesai == "N")
      { 
          $conteudo = "Belum";
      } 
      if (!empty($conteudo)) 
      { 
          $selesai = $conteudo; 
      } 
   }  
}
?>
