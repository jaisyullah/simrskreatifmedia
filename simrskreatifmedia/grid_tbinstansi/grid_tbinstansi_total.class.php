<?php

class grid_tbinstansi_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_tbinstansi']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_tbinstansi']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->address = $Busca_temp['address']; 
          $tmp_pos = strpos($this->address, "##@@");
          if ($tmp_pos !== false && !is_array($this->address))
          {
              $this->address = substr($this->address, 0, $tmp_pos);
          }
          $this->instcode = $Busca_temp['instcode']; 
          $tmp_pos = strpos($this->instcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->instcode))
          {
              $this->instcode = substr($this->instcode, 0, $tmp_pos);
          }
          $this->init = $Busca_temp['init']; 
          $tmp_pos = strpos($this->init, "##@@");
          if ($tmp_pos !== false && !is_array($this->init))
          {
              $this->init = substr($this->init, 0, $tmp_pos);
          }
          $this->name = $Busca_temp['name']; 
          $tmp_pos = strpos($this->name, "##@@");
          if ($tmp_pos !== false && !is_array($this->name))
          {
              $this->name = substr($this->name, 0, $tmp_pos);
          }
          $this->city = $Busca_temp['city']; 
          $tmp_pos = strpos($this->city, "##@@");
          if ($tmp_pos !== false && !is_array($this->city))
          {
              $this->city = substr($this->city, 0, $tmp_pos);
          }
          $this->phone = $Busca_temp['phone']; 
          $tmp_pos = strpos($this->phone, "##@@");
          if ($tmp_pos !== false && !is_array($this->phone))
          {
              $this->phone = substr($this->phone, 0, $tmp_pos);
          }
          $this->fax = $Busca_temp['fax']; 
          $tmp_pos = strpos($this->fax, "##@@");
          if ($tmp_pos !== false && !is_array($this->fax))
          {
              $this->fax = substr($this->fax, 0, $tmp_pos);
          }
          $this->cp = $Busca_temp['cp']; 
          $tmp_pos = strpos($this->cp, "##@@");
          if ($tmp_pos !== false && !is_array($this->cp))
          {
              $this->cp = substr($this->cp, 0, $tmp_pos);
          }
          $this->limit = $Busca_temp['limit']; 
          $tmp_pos = strpos($this->limit, "##@@");
          if ($tmp_pos !== false && !is_array($this->limit))
          {
              $this->limit = substr($this->limit, 0, $tmp_pos);
          }
          $this->discount = $Busca_temp['discount']; 
          $tmp_pos = strpos($this->discount, "##@@");
          if ($tmp_pos !== false && !is_array($this->discount))
          {
              $this->discount = substr($this->discount, 0, $tmp_pos);
          }
          $this->sc_field_0 = $Busca_temp['sc_field_0']; 
          $tmp_pos = strpos($this->sc_field_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_0))
          {
              $this->sc_field_0 = substr($this->sc_field_0, 0, $tmp_pos);
          }
          $this->sc_field_1 = $Busca_temp['sc_field_1']; 
          $tmp_pos = strpos($this->sc_field_1, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_1))
          {
              $this->sc_field_1 = substr($this->sc_field_1, 0, $tmp_pos);
          }
          $this->policy = $Busca_temp['policy']; 
          $tmp_pos = strpos($this->policy, "##@@");
          if ($tmp_pos !== false && !is_array($this->policy))
          {
              $this->policy = substr($this->policy, 0, $tmp_pos);
          }
          $this->itemtype = $Busca_temp['itemtype']; 
          $tmp_pos = strpos($this->itemtype, "##@@");
          if ($tmp_pos !== false && !is_array($this->itemtype))
          {
              $this->itemtype = substr($this->itemtype, 0, $tmp_pos);
          }
          $this->deleted = $Busca_temp['deleted']; 
          $tmp_pos = strpos($this->deleted, "##@@");
          if ($tmp_pos !== false && !is_array($this->deleted))
          {
              $this->deleted = substr($this->deleted, 0, $tmp_pos);
          }
          $this->tempo = $Busca_temp['tempo']; 
          $tmp_pos = strpos($this->tempo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tempo))
          {
              $this->tempo = substr($this->tempo, 0, $tmp_pos);
          }
          $this->asuransi = $Busca_temp['asuransi']; 
          $tmp_pos = strpos($this->asuransi, "##@@");
          if ($tmp_pos !== false && !is_array($this->asuransi))
          {
              $this->asuransi = substr($this->asuransi, 0, $tmp_pos);
          }
          $this->marginobat = $Busca_temp['marginobat']; 
          $tmp_pos = strpos($this->marginobat, "##@@");
          if ($tmp_pos !== false && !is_array($this->marginobat))
          {
              $this->marginobat = substr($this->marginobat, 0, $tmp_pos);
          }
          $this->markuptindakan = $Busca_temp['markuptindakan']; 
          $tmp_pos = strpos($this->markuptindakan, "##@@");
          if ($tmp_pos !== false && !is_array($this->markuptindakan))
          {
              $this->markuptindakan = substr($this->markuptindakan, 0, $tmp_pos);
          }
          $this->markupobat = $Busca_temp['markupobat']; 
          $tmp_pos = strpos($this->markupobat, "##@@");
          if ($tmp_pos !== false && !is_array($this->markupobat))
          {
              $this->markupobat = substr($this->markupobat, 0, $tmp_pos);
          }
          $this->markuplab = $Busca_temp['markuplab']; 
          $tmp_pos = strpos($this->markuplab, "##@@");
          if ($tmp_pos !== false && !is_array($this->markuplab))
          {
              $this->markuplab = substr($this->markuplab, 0, $tmp_pos);
          }
          $this->markuprad = $Busca_temp['markuprad']; 
          $tmp_pos = strpos($this->markuprad, "##@@");
          if ($tmp_pos !== false && !is_array($this->markuprad))
          {
              $this->markuprad = substr($this->markuprad, 0, $tmp_pos);
          }
          $this->admpolitype = $Busca_temp['admpolitype']; 
          $tmp_pos = strpos($this->admpolitype, "##@@");
          if ($tmp_pos !== false && !is_array($this->admpolitype))
          {
              $this->admpolitype = substr($this->admpolitype, 0, $tmp_pos);
          }
          $this->adminaptype = $Busca_temp['adminaptype']; 
          $tmp_pos = strpos($this->adminaptype, "##@@");
          if ($tmp_pos !== false && !is_array($this->adminaptype))
          {
              $this->adminaptype = substr($this->adminaptype, 0, $tmp_pos);
          }
          $this->admpolibaru = $Busca_temp['admpolibaru']; 
          $tmp_pos = strpos($this->admpolibaru, "##@@");
          if ($tmp_pos !== false && !is_array($this->admpolibaru))
          {
              $this->admpolibaru = substr($this->admpolibaru, 0, $tmp_pos);
          }
          $this->admpolilama = $Busca_temp['admpolilama']; 
          $tmp_pos = strpos($this->admpolilama, "##@@");
          if ($tmp_pos !== false && !is_array($this->admpolilama))
          {
              $this->admpolilama = substr($this->admpolilama, 0, $tmp_pos);
          }
          $this->adminap = $Busca_temp['adminap']; 
          $tmp_pos = strpos($this->adminap, "##@@");
          if ($tmp_pos !== false && !is_array($this->adminap))
          {
              $this->adminap = substr($this->adminap, 0, $tmp_pos);
          }
          $this->sc_field_2 = $Busca_temp['sc_field_2']; 
          $tmp_pos = strpos($this->sc_field_2, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_2))
          {
              $this->sc_field_2 = substr($this->sc_field_2, 0, $tmp_pos);
          }
          $this->marginpma = $Busca_temp['marginpma']; 
          $tmp_pos = strpos($this->marginpma, "##@@");
          if ($tmp_pos !== false && !is_array($this->marginpma))
          {
              $this->marginpma = substr($this->marginpma, 0, $tmp_pos);
          }
          $this->withpma = $Busca_temp['withpma']; 
          $tmp_pos = strpos($this->withpma, "##@@");
          if ($tmp_pos !== false && !is_array($this->withpma))
          {
              $this->withpma = substr($this->withpma, 0, $tmp_pos);
          }
          $this->forminternal = $Busca_temp['forminternal']; 
          $tmp_pos = strpos($this->forminternal, "##@@");
          if ($tmp_pos !== false && !is_array($this->forminternal))
          {
              $this->forminternal = substr($this->forminternal, 0, $tmp_pos);
          }
          $this->vacc = $Busca_temp['vacc']; 
          $tmp_pos = strpos($this->vacc, "##@@");
          if ($tmp_pos !== false && !is_array($this->vacc))
          {
              $this->vacc = substr($this->vacc, 0, $tmp_pos);
          }
          $this->extcode = $Busca_temp['extcode']; 
          $tmp_pos = strpos($this->extcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->extcode))
          {
              $this->extcode = substr($this->extcode, 0, $tmp_pos);
          }
          $this->umum = $Busca_temp['umum']; 
          $tmp_pos = strpos($this->umum, "##@@");
          if ($tmp_pos !== false && !is_array($this->umum))
          {
              $this->umum = substr($this->umum, 0, $tmp_pos);
          }
          $this->autoshow = $Busca_temp['autoshow']; 
          $tmp_pos = strpos($this->autoshow, "##@@");
          if ($tmp_pos !== false && !is_array($this->autoshow))
          {
              $this->autoshow = substr($this->autoshow, 0, $tmp_pos);
          }
          $this->bpjs = $Busca_temp['bpjs']; 
          $tmp_pos = strpos($this->bpjs, "##@@");
          if ($tmp_pos !== false && !is_array($this->bpjs))
          {
              $this->bpjs = substr($this->bpjs, 0, $tmp_pos);
          }
          $this->caracode = $Busca_temp['caracode']; 
          $tmp_pos = strpos($this->caracode, "##@@");
          if ($tmp_pos !== false && !is_array($this->caracode))
          {
              $this->caracode = substr($this->caracode, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['contr_total_geral'] = "OK";
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
