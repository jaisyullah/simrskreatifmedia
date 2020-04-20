<?php
class av_los_lookup
{
   function lookup_res_a_tglKeluar_SC_1()
   {
       $result = array();
       $Str_arg_sum = $this->Ini->Get_date_arg_sum("tst", "YYYY", "a.tglKeluar", false, true);
       $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby("a.tglKeluar", "YYYY");
       $prep_sel = array();
       $temp = explode(" and ", $Str_arg_sum);
       foreach ($temp as $cada_parte)
       {
           $temp1      = explode("*sc#", $cada_parte);
           $prep_sel[] = $Str_arg_sql . trim($temp1[0]);
       }
       $campos_select = implode(",", $prep_sel);
       $ind_count     = count($prep_sel);
       $nm_comando = "select " . $campos_select . ", COUNT(*) from " . $this->Ini->nm_tabela;
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['av_los']['where_res_lookup']))
       {
           $nm_comando .= " " .  $_SESSION['sc_session'][$this->Ini->sc_page]['av_los']['where_res_lookup'];
       }
       $nm_comando .= " GROUP BY " .$campos_select . "";
       $nm_comando .= " order by " . $campos_select . "";
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['av_los']['ajax_nav'])
           {
               $result['set_option'][] = array('field' => 'a_tglKeluar_SC_1', 'opt' => '__NM__', 'value' => $this->Ini->Nm_lang['lang_search_select_summary'], "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           else
           {
               $result['set_option'][] = array('field' => 'a_tglKeluar_SC_1', 'opt' => '__NM__', 'value' => sc_convert_encoding($this->Ini->Nm_lang['lang_search_select_summary'], "UTF-8", $_SESSION['scriptcase']['charset']));
           }
           while (!$RSI->EOF) 
           {
               $val_orig = "";
               for ($i = 0; $i < $ind_count; $i++)
               {
                   $tmp = $RSI->fields[$i];
                   if (strlen($tmp) == 1)
                   {
                       $tmp = "0" . $tmp;
                   }
                   $val_orig .= $tmp;
               }
               $val_format = str_replace(array("-", ":", " "), array("", "", ""), $val_orig);
               if (!empty($val_orig))
               {
                   $val_format = $this->Ini->GB_date_format($val_orig, "YYYY", "");
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['av_los']['ajax_nav'])
               {
                   $val_orig   = $val_orig;
                   $val_format = $val_format;
               }
               else
               {
                   $val_orig   = sc_convert_encoding($val_orig, "UTF-8", $_SESSION['scriptcase']['charset']);
                   $val_format = sc_convert_encoding($val_format, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               $result['set_option'][] = array('field' => 'a_tglKeluar_SC_1', 'opt' => $val_orig, 'value' => $val_format);
               $RSI->MoveNext() ;
           }
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       return $result;
   }
}
?>
