<?php
class grid_tbadmrawatinap_lookup
{
//  
   function lookup_doctor(&$conteudo , $doctor) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $doctor; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doctor), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_bed(&$conteudo , $bed) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $bed; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT kelas + ' - ' + ruang + ' (' + noBed + ')'  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(kelas,' - ', ruang,' (', noBed,')')  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT kelas&' - '&ruang&' ('&noBed&')'  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT kelas||' - '||ruang||' ('||noBed||')'  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT kelas + ' - ' + ruang + ' (' + noBed + ')'  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT kelas||' - '||ruang||' ('||noBed||')'  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT kelas||' - '||ruang||' ('||noBed||')'  FROM tbbed where idBed = '" . substr($this->Db->qstr($bed), 1 , -1) . "' order by kelas, ruang, noBed" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_sc_field_1(&$conteudo , $trancode, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT str_replace (convert(char(10),tglKeluar,102), '.', '-') + ' ' + convert(char(8),tglKeluar,20)  FROM tbdetailrawatinap  WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'  ORDER BY tglKeluar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT convert(char(23),tglKeluar,121)  FROM tbdetailrawatinap  WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'  ORDER BY tglKeluar" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT tglKeluar 
FROM tbdetailrawatinap 
WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "' 
ORDER BY tglKeluar" ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          while (!$rx->EOF) 
          { 
                 if (isset($rx->fields[0]))
                 { 
                     $nm_array_retorno_lookup[$a][0] = trim($rx->fields[0]);
                     $a++; 
                     if ($y == 1)
                     { 
                          $conteudo .= "<br>";
                          $y = 0; 
                     } 
                     if ($y != 0)
                     { 
                          $conteudo .= "";
                     } 
                     $y++; 
                     $nm_tmp_form = trim($rx->fields[0]); 
                     $conteudo .= $nm_tmp_form;
                 } 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
}
?>
