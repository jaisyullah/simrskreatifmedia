<?php
class grid_usulanpengadaan_gizi_lookup
{
//  
   function lookup_selesai_selesai(&$selesai) 
   {
      $conteudo = "" ; 
      if ($selesai == "")
      { 
          $conteudo = "Open";
      } 
      if ($selesai == "Y")
      { 
          $conteudo = "Sudah Selesai";
      } 
      if ($selesai == "C")
      { 
          $conteudo = "Batal";
      } 
      if (!empty($conteudo)) 
      { 
          $selesai = $conteudo; 
      } 
   }  
}
?>
