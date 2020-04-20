<?php
class grid_detailrawatinap_lookup
{
//  
   function lookup_dokter(&$conteudo , $dokter) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $dokter; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
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
   function lookup_ruanginap(&$conteudo , $kode, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select c.ruang + ' (Bed ' + c.noBed + ')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select concat(c.ruang,' (Bed ',c.noBed,')') as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select c.ruang&' (Bed '&c.noBed&')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select c.ruang||' (Bed '||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select c.ruang + ' (Bed ' + c.noBed + ')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select c.ruang||' (Bed '||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      else 
      { 
          $nm_comando = "select c.ruang||' (Bed '||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($kode), 1 , -1) . "'" ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "c.ruang,' (Bed ',c.noBed,')' as 'Ruang/Bed'"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "&nbsp;";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
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
//  
   function lookup_dokter_dokter(&$conteudo , $dokter) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $dokter; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, spec" ; 
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
}
?>
