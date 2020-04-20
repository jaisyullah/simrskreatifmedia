<?php

//Carrega Array com Grupos do ScriptCase
$btn_avanc = $this->GetVar('btn_avanc');
$btn_retor = $this->GetVar('btn_retor');
$user = $this->GetVar('user');
$pass = $this->GetVar('pass');
$pass_confirm = $this->GetVar('pass_confirm');

$arr_fields = $this->GetVar('arr_fields');
?>

<script language="javascript" src="<?php echo $nm_config['url_js_third']; ?>wz_tooltip/wz_tooltip.js"></script>

<form action="<?php echo nm_url_rand($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php'); ?>" name="form_create" METHOD="post">
<center>
<table class="nmTable">
   <tr>
      <td class="nmTitle" align="center" colspan="3"><?php echo $nm_lang['page_title']; ?></td>
   </tr>
   <tr>
      <td class="nmLineV3">&nbsp;<?php echo $nm_lang['label']['user']; ?>&nbsp;</td>
      <td class="nmLineV3">
          <input type='text' name='user' value='<?php echo $user?>' class="nmInput">
      </td>
      <td class="nmLineV3" align="center" valign="middle">
          <!--img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover="this.style.cursor='hand'; mostraId('id_user');"
             onmouseout="escondeId('id_user');"-->

          <img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover='Tip("<?php echo $nm_lang['create_conn_wizard']['descricoes']['user']; ?>", TITLE, "<?php echo $nm_lang['label']['user']; ?>", WIDTH, 300, SHADOW, true, STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)'
             onmouseout='UnTip()'>
          
      </td>
   </tr>
   <tr>
      <td class="nmLineV3">&nbsp;<?php echo $nm_lang['label']['pass']; ?>&nbsp;</td>
      <td class="nmLineV3">
          <input type='password' name='pass' value='<?php echo $pass?>' class="nmInput">
      </td>
      <td class="nmLineV3" align="center" valign="middle">
          <!--img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover="this.style.cursor='hand'; mostraId('id_pass');"
             onmouseout="escondeId('id_pass');"-->
          
          <img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover='Tip("<?php echo $nm_lang['create_conn_wizard']['descricoes']['pass']; ?>", TITLE, "<?php echo $nm_lang['label']['pass']; ?>", WIDTH, 300, SHADOW, true, STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)'
             onmouseout='UnTip()'>   
               
      </td>
   </tr>
   <tr>
      <td class="nmLineV3">&nbsp;<?php echo $nm_lang['label']['pass_confirm']; ?>&nbsp;</td>
      <td class="nmLineV3">
          <input type='password' name='pass_confirm' value='<?php echo $pass_confirm?>' class="nmInput">
      </td>
      <td class="nmLineV3" align="center" valign="middle">
          <!--img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover="this.style.cursor='hand'; mostraId('id_pass_confirm');"
             onmouseout="escondeId('id_pass_confirm');"-->
          
          <img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover='Tip("<?php echo $nm_lang['create_conn_wizard']['descricoes']['pass_confirm']; ?>", TITLE, "<?php echo $nm_lang['label']['pass_confirm']; ?>", WIDTH, 300, SHADOW, true, STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)'
             onmouseout='UnTip()'>  
      </td>
   </tr>
   <?php
   /*
   ?>
   <TR>
      <td class="nmLineV3" colspan="3">
      <input type="checkbox" name="addgroup" VALUE="S" <?php if($this->GetVar('addgroup')=="S"){ echo "checked"; } ?>>
      <?php echo $nm_lang['label']['addgroup']; ?>
      </td>
   </TR>
   <?php
   */
   ?>
</table>
<br>
<input type="hidden" name="form_create" value="<?php echo $nm_config['form_valid']; ?>" />
<input type="hidden" name="addgroup" value="S" />

<BR \>
<input type='button' name='voltar' value='<?php echo $nm_lang['create_conn_wizard']['btnvoltar']; ?>' onclick="setStep('<?php echo $btn_retor; ?>');" class="nmButton">
<input type='button' name='testar' value='<?php echo $nm_lang['create_conn_wizard']['btntestar']; ?>' onclick="nm_test();" class="nmButton">
<input type='button' name='concluir' value='<?php echo $nm_lang['create_conn_wizard']['btnconcluir']; ?>' onclick="setStep('<?php echo $btn_avanc; ?>');" class="nmButton">
<input type='button' name='sair' value='<?php echo $nm_lang['create_conn_wizard']['btnsair']; ?>' onclick="setStep('cancel');" class="nmButton">

<input type='hidden' value='<?php echo $this->GetVar('step');?>' name='step'>
<input type='hidden' value='' name='nextstep'>
</center>


<BR \>
<BR \>
<DIV style="display:none" id="id_user">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['user']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
      <?php echo $nm_lang['create_conn_wizard']['descricoes']['user']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_pass">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['pass']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
      <?php echo $nm_lang['create_conn_wizard']['descricoes']['pass']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_pass_confirm">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['pass_confirm']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
      <?php echo $nm_lang['create_conn_wizard']['descricoes']['pass_confirm']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
</form>
<form name='test_conn' action="" method="POST">
  <?php
  foreach($arr_fields as $field => $value)
  {
    ?>
       <input type="hidden" name="<?php echo $field; ?>" value="<?php echo $value; ?>">
    <?php
  }
  ?>
  <input type="hidden" name="user" value="">
  <input type="hidden" name="pass" value="">
</form>
<DIV style="display:none" id="id_test_conn">
	<CENTER>
		<IFRAME name="testaconn" width="300" height="300" align="middle" marginheight="0" marginwidth="0" frameborder="0" src="">
		</IFRAME>
	</CENTER>
</DIV>