<?php
class pdfreport_tbhasillab_lookup
{
//  
   function lookup_doccode(&$conteudo , $doccode) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $doccode; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '" . substr($this->Db->qstr($doccode), 1 , -1) . "' and docCode = '$conteudo' order by gelar, name, spec" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[1]))  
          { 
              $conteudo = trim($rx->fields[1]); 
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_nama(&$conteudo , $nama) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $nama; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT custcode, name + ', ' + salut  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT custcode, concat(name,', ', salut)  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT custcode, name&', '&salut  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT custcode, name + ', ' + salut  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '" . substr($this->Db->qstr($nama), 1 , -1) . "' and custcode = '$conteudo' order by name, salut" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[1]))  
          { 
              $conteudo = trim($rx->fields[1]); 
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_jk(&$conteudo , $custcode) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $custcode; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select sex from tbcustomer where custcode = '" . substr($this->Db->qstr($custcode), 1 , -1) . "' order by sex" ; 
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_sub(&$conteudo , $varLab, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT
    kategori,
    subname,
    hasil,
    rujukan,
    satuan,
    marked
FROM 
    tbhasillab
where trancode = '" . $_SESSION['varLab'] . "'
order by id ASC" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "kategori,
    subname,
    hasil,
    rujukan,
    satuan,
    marked"); 
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
                            $conteudo .= "";
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
   function lookup_sub_marked(&$sub_marked) 
   {
      $conteudo = "" ; 
      if ($sub_marked == "Ya")
      { 
          $conteudo = "*";
      } 
      if (!empty($conteudo)) 
      { 
          $sub_marked = $conteudo; 
      } 
   }  
//  
   function lookup_tl(&$conteudo , $custcode, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20)  FROM tbcustomer  WHERE custCode = '" . substr($this->Db->qstr($custcode), 1 , -1) . "'  ORDER BY birthDate" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT convert(char(23),birthDate,121)  FROM tbcustomer  WHERE custCode = '" . substr($this->Db->qstr($custcode), 1 , -1) . "'  ORDER BY birthDate" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT birthDate 
FROM tbcustomer 
WHERE custCode = '" . substr($this->Db->qstr($custcode), 1 , -1) . "' 
ORDER BY birthDate" ; 
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
