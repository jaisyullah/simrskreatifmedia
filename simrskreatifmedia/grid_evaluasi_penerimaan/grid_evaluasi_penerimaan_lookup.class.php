<?php
class grid_evaluasi_penerimaan_lookup
{
   function lookup_slider_sc_field_1()
   { 
      $nm_comando = "select min(round( ( a.jmlTerima / a.jumlah ) * 100 )), max(round( ( a.jmlTerima / a.jumlah ) * 100 )) from " . $this->Ini->nm_tabela . " " ; 
      $conteudo = array();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $conteudo[0] = $rx->fields[0];
          $conteudo[1] = $rx->fields[1];
          $conteudo[0] = (int)$conteudo[0];
          $conteudo[1] = (int)$conteudo[1];
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      return $conteudo;
   } 
}
?>
