<?php
class PO_gizi_lookup
{
//  
   function lookup_supplier(&$conteudo , $supplier) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $supplier; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT jenis + nama  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(jenis, nama)  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT jenis&nama  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT jenis||nama  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT jenis + nama  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT jenis||nama  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT jenis||nama  FROM supplier where suppcode = '" . substr($this->Db->qstr($supplier), 1 , -1) . "' order by jenis, nama" ; 
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_sgizi(&$conteudo , $a_nopo, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT
	@n := @n + 1 n,
	a.bahan as 'bahan',
	IFNULL(sum(c.current_stock),\"-\") as 'stock',
	sum(a.disetujui) as 'qty',
	a.satuan as 'satuan',
	a.refharga as 'harga satuan',
	a.supplier as 'supplier',
	sum(a.disetujui*a.refharga) as 'subtotal'
FROM
	detailusulanpengadaan_gizi a
	LEFT JOIN usulanpengadaan_gizi b ON b.usulancode = a.usulancode left join stock_gizi c on c.bahancode = a.bahan,
	( SELECT @n := 0 ) m
WHERE b.noPO = '" . substr($this->Db->qstr($a_nopo), 1 , -1) . "' 
GROUP BY
	bahan
ORDER BY n" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
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
   function lookup_sgizi_bahan(&$conteudo , $sgizi_bahan) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $sgizi_bahan; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select nama from bahan where bahancode = '" . substr($this->Db->qstr($sgizi_bahan), 1 , -1) . "' order by nama" ; 
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
   function lookup_sgizi_supplier(&$conteudo , $sgizi_supplier) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $sgizi_supplier; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT jenis + ' ' + nama  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(jenis,' ', nama)  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT jenis&' '&nama  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT jenis||' '||nama  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT jenis + ' ' + nama  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT jenis||' '||nama  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT jenis||' '||nama  FROM supplier_gizi where suppcode = '" . substr($this->Db->qstr($sgizi_supplier), 1 , -1) . "' order by jenis, nama" ; 
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
