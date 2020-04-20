<?php
class his_grid_tbreseprawatinap_new_lookup
{
//  
   function lookup_sc_field_0(&$conteudo , $trancode, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT custCode 
FROM tbadmrawatinap 
WHERE tranCode = '" . substr($this->Db->qstr($trancode), 1 , -1) . "' 
ORDER BY custCode" ; 
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
   function lookup_bed(&$conteudo , $trancode, &$nm_array_retorno_lookup) 
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
}
?>
