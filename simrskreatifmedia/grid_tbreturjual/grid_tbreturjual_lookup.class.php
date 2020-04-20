<?php
class grid_tbreturjual_lookup
{
//  
   function lookup_statusretur(&$statusretur) 
   {
      $conteudo = "" ; 
      if ($statusretur == "Y")
      { 
          $conteudo = "Sudah";
      } 
      if ($statusretur == "N")
      { 
          $conteudo = "Belum";
      } 
      if ($statusretur == "C")
      { 
          $conteudo = "Batal";
      } 
      if (!empty($conteudo)) 
      { 
          $statusretur = $conteudo; 
      } 
   }  
}
?>
