<?php

class sec_form_edit_users_erro
{
   var $Ini;

   var $script;
   var $linha;
   var $tipo;
   var $mensagem;
   var $complemento;
   var $msg_final;

   //----- 
   function __construct()
   {
      $this->script      = "";
      $this->linha       = "";
      $this->tipo        = "";
      $this->mensagem    = "";
      $this->complemento = "";
      $this->msg_final   = "";
   }

   //----- 
   function mensagem($script, $linha, $tipo, $mensagem, $complemento = "", $exibe = true)
   {
      $this->script      = $script;
      $this->linha       = $linha;
      $this->tipo        = strtolower($tipo);
      $this->mensagem    = trim($mensagem);
      $this->complemento = trim($complemento);
      if (isset($this->Ini->nm_tpbanco) && isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN' && $this->tipo == 'banco' && empty($this->complemento))
      {
          return false;
      }
      $this->monta_mensagem();
      return sec_form_edit_users_scriptcase_error_handler(E_USER_ERROR, $this->msg_final, $script, $linha, $exibe);
   }

   //----- 
   function monta_mensagem()
   {
      $mensagem = $this->mensagem;
      if ("banco" == $this->tipo)
      {
         $mensagem .= "<BR>" . $this->complemento;
      }
      $this->msg_final = $mensagem;
   }

}

?>
