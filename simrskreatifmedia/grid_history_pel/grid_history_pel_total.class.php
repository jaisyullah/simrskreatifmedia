<?php

class grid_history_pel_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("id");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_history_pel']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_history_pel']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->dokter = $Busca_temp['dokter']; 
          $tmp_pos = strpos($this->dokter, "##@@");
          if ($tmp_pos !== false && !is_array($this->dokter))
          {
              $this->dokter = substr($this->dokter, 0, $tmp_pos);
          }
          $this->tglmasuk = $Busca_temp['tglmasuk']; 
          $tmp_pos = strpos($this->tglmasuk, "##@@");
          if ($tmp_pos !== false && !is_array($this->tglmasuk))
          {
              $this->tglmasuk = substr($this->tglmasuk, 0, $tmp_pos);
          }
          $tglmasuk_2 = $Busca_temp['tglmasuk_input_2']; 
          $this->tglmasuk_2 = $Busca_temp['tglmasuk_input_2']; 
          $this->trancode = $Busca_temp['trancode']; 
          $tmp_pos = strpos($this->trancode, "##@@");
          if ($tmp_pos !== false && !is_array($this->trancode))
          {
              $this->trancode = substr($this->trancode, 0, $tmp_pos);
          }
          $this->poli = $Busca_temp['poli']; 
          $tmp_pos = strpos($this->poli, "##@@");
          if ($tmp_pos !== false && !is_array($this->poli))
          {
              $this->poli = substr($this->poli, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (SELECT 	c.tglMasuk, 	c.tranCode, 	c.poli, 	c.dokter, 	c.caraKeluar, 	c.RM, 	c.diag, 	c.icd10, 	c.Kategori  FROM 	( 	SELECT 		b.regDate AS tglMasuk, 		a.tranCode AS tranCode, 		b.poly AS poli, 		a.dokter AS dokter, 		a.caraKeluar AS caraKeluar, 		a.custCode AS RM, 		a.diagnosa1 AS Diag, 		a.icd1 AS icd10, 		'Pelayanan Poli' AS Kategori  	FROM 		tbdetailrawatjalan a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk UNION ALL 	SELECT 		b.regDate AS tglMasuk, 		a.tranCode AS tranCode, 		b.poly AS poli, 		a.dokter AS dokter, 		a.caraKeluar AS caraKeluar, 		a.custCode AS RM, 		a.diagnosa1 AS Diag, 		a.icd1 AS icd10, 		'Pelayanan IGD' AS Kategori  	FROM 		tbdetailigd a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk UNION ALL 	SELECT 		b.tglMasuk AS tglMasuk, 		a.tranCode AS tranCode, 		c.poli AS poli, 		a.dokter AS dokter, 		a.caraKeluar AS caraKeluar, 		a.custCode AS RM, 		a.diagnosa1 AS Diag, 		a.icd1 AS icd10, 		'Rawat Inap' AS Kategori  	FROM 		tbdetailrawatinap a 		LEFT JOIN tbadmrawatinap b ON b.struckNo = a.noStruk 		LEFT JOIN tbdoctor c ON c.docCode = a.dokter  	) c  WHERE 	c.RM = '" . $_SESSION['var_rm_his'] . "') nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (SELECT 	c.tglMasuk, 	c.tranCode, 	c.poli, 	c.dokter, 	c.caraKeluar, 	c.RM, 	c.diag, 	c.icd10, 	c.Kategori  FROM 	( 	SELECT 		b.regDate AS tglMasuk, 		a.tranCode AS tranCode, 		b.poly AS poli, 		a.dokter AS dokter, 		a.caraKeluar AS caraKeluar, 		a.custCode AS RM, 		a.diagnosa1 AS Diag, 		a.icd1 AS icd10, 		'Pelayanan Poli' AS Kategori  	FROM 		tbdetailrawatjalan a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk UNION ALL 	SELECT 		b.regDate AS tglMasuk, 		a.tranCode AS tranCode, 		b.poly AS poli, 		a.dokter AS dokter, 		a.caraKeluar AS caraKeluar, 		a.custCode AS RM, 		a.diagnosa1 AS Diag, 		a.icd1 AS icd10, 		'Pelayanan IGD' AS Kategori  	FROM 		tbdetailigd a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk UNION ALL 	SELECT 		b.tglMasuk AS tglMasuk, 		a.tranCode AS tranCode, 		c.poli AS poli, 		a.dokter AS dokter, 		a.caraKeluar AS caraKeluar, 		a.custCode AS RM, 		a.diagnosa1 AS Diag, 		a.icd1 AS icd10, 		'Rawat Inap' AS Kategori  	FROM 		tbdetailrawatinap a 		LEFT JOIN tbadmrawatinap b ON b.struckNo = a.noStruk 		LEFT JOIN tbdoctor c ON c.docCode = a.dokter  	) c  WHERE 	c.RM = '" . $_SESSION['var_rm_his'] . "') nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_history_pel']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
