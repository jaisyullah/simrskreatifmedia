<?php
class grid_tbdetailrawatinap_lookup
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
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + gelar  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(gelar,' ', name,', ', gelar)  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT gelar&' '&name&', '&gelar  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||gelar  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + gelar  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||gelar  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||gelar  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
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
   function lookup_ruanginap(&$conteudo , $trancode, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select c.ruang + ' (Bed ' + c.noBed + ')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select concat(c.ruang,' (Bed ',c.noBed,')') as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select c.ruang&' (Bed '&c.noBed&')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select c.ruang||' (Bed '||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select c.ruang + ' (Bed ' + c.noBed + ')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select c.ruang||' (Bed '||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
      } 
      else 
      { 
          $nm_comando = "select c.ruang||' (Bed '||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'" ; 
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
   function lookup_selesai(&$selesai) 
   {
      $conteudo = "" ; 
      if ($selesai == "Y")
      { 
          $conteudo = "Ya";
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
//  
   function lookup_sc_field_2(&$conteudo , $trancode, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT str_replace (convert(char(10),tglMasuk,102), '.', '-') + ' ' + convert(char(8),tglMasuk,20)  FROM tbadmrawatinap  WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'  ORDER BY tglMasuk" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT convert(char(23),tglMasuk,121)  FROM tbadmrawatinap  WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "'  ORDER BY tglMasuk" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT tglMasuk 
FROM tbadmrawatinap 
WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "' 
ORDER BY tglMasuk" ; 
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
//  
   function lookup_byDokter_dokter(&$conteudo , $dokter) 
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
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($dokter), 1 , -1) . "' order by gelar, name, gelar" ; 
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
