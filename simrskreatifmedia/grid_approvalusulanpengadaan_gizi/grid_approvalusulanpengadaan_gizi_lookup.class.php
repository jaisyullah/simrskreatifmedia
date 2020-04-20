<?php
class grid_approvalusulanpengadaan_gizi_lookup
{
//  
   function lookup_Status_selesai(&$selesai) 
   {
      $conteudo = "" ; 
      if ($selesai == "")
      { 
          $conteudo = "Open";
      } 
      if ($selesai == "C")
      { 
          $conteudo = "Batal";
      } 
      if ($selesai == "Y")
      { 
          $conteudo = "Selesai";
      } 
      if (!empty($conteudo)) 
      { 
          $selesai = $conteudo; 
      } 
   }  
}
?>
