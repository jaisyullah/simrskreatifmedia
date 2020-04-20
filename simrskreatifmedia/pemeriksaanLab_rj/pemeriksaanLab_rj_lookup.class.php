<?php
class pemeriksaanLab_rj_lookup
{
//  
   function lookup_tandai(&$tandai) 
   {
      $conteudo = "" ; 
      if ($tandai == "Ya")
      { 
          $conteudo = "*";
      } 
      if (!empty($conteudo)) 
      { 
          $tandai = $conteudo; 
      } 
   }  
}
?>
