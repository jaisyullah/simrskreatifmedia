<?php
class grid_tblab_lookup
{
//  
   function lookup_tipehasil(&$tipehasil) 
   {
      $conteudo = "" ; 
      if ($tipehasil == "0")
      { 
          $conteudo = "Range";
      } 
      if ($tipehasil == "1")
      { 
          $conteudo = "Pilihan";
      } 
      if ($tipehasil == "2")
      { 
          $conteudo = "Uraian";
      } 
      if ($tipehasil == "3")
      { 
          $conteudo = "Sub-Nilai";
      } 
      if (!empty($conteudo)) 
      { 
          $tipehasil = $conteudo; 
      } 
   }  
}
?>
