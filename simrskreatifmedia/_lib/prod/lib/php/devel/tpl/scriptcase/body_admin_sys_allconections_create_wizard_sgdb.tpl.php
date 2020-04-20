<?php

//Carrega Array com Grupos do ScriptCase
$db_dbms_short 	 = $this->GetVar('db_dbms_short');
$btn_avanc 		 = $this->GetVar('btn_avanc');
$btn_retor 		 = $this->GetVar('btn_retor');
$arr_conns 		 = $this->GetVar('arr_conns');
$conn_open 		 = $this->GetVar('conn_open');
$force_name_conn = $this->GetVar('force_name_conn');

$dbms = $this->GetVar('dbms');
$conn = $this->GetVar('conn');

?>

<form style="display:none" name="form_refresh" action="<?php echo nm_url_rand($nm_config['url_iface'] . "admin_sys_allconections_create_wizard.php"); ?>" method="post">
	<input type="hidden" name="conn_open" value="S">
</form>

<form style="display:none" name="form_edit_conn" action="<?php echo nm_url_rand($nm_config['url_iface'] . "admin_sys_allconections_create_wizard.php"); ?>" method="post">
	<input type="hidden" name="form_create" value="<?php echo $nm_config['form_valid']; ?>" />
	<input type="hidden" name="flag_edit" value="S">
	<input type="hidden" name="conn" value="">
</form>

<form style="display:none" name="form_del_conn" action="<?php echo nm_url_rand($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php'); ?>" method="GET">
	<input type="hidden" name="opcao" 	 value="excluir">
	<input type="hidden" name="del_conn" value="">
</form>

<form action="<?php echo nm_url_rand($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php'); ?>" name="form_create" METHOD="post">
<input type="hidden" name="conn_open" value="<?php echo $conn_open; ?>" />
<center>

<br>
<br>

<input type="hidden" name="opt_par" value="<?php echo $force_name_conn; ?>" />
<table cellpadding="0" cellspacing="0" width="593px" class="nmTable">
	<tr>
		<td class="nmTitle" align="right"  width="30px">&nbsp;</td>
		<td class="nmTitle" align="center" width="503px"><?php echo ($conn_open == 'S' ? $nm_lang['page_title_edit'] : $nm_lang['page_title']); ?></td>
		<td class="nmTitle" align="right"  width="60px">
			<?php
			if ($conn_open == 'S')
			{
			?>
				<a href="javascript:document.form_refresh.submit();" title="Refresh"><img src="<?php echo $nm_config['url_img']; ?>refresh_white.png" border="0" /></a>
			<?php
			}
			?>
			<?php echo $this->GetVar('block_image_help'); ?>
		</td>
	</tr>
</table>

<?php
if ($conn_open == 'S' && count($arr_conns) == 0)
{
?>
	<br>
	<center><span class="nmText"><?php echo $nm_lang['msg_empty_lst_conn']; ?></span></center>
<?php
}
else
{
?>

<table><tr><td style="font-size:10px">&nbsp;</td></tr></table>
<table width="98%">
<?php
}

$arr_ord_tp_conn = array(
					'mysql' 	=> array(),
					'oracle'	=> array(),
					'mssql'		=> array(),
					'postgres'	=> array(),
					'db2'		=> array(),
					'informix'	=> array(),
					'access'	=> array(),
					'sqlite'	=> array(),
					'sybase'	=> array(),
					'ibase'		=> array(),
					'firebird'	=> array(),
					'progress'	=> array(),
					'odbc'		=> array()
				  );

if ($conn_open == 'S')
{

	$arr_ord_tp_conn = array(
						'mysql' 	=> array(),
						'oracle'	=> array(),
						'mssql'		=> array(),
						'postgres'	=> array(),
						'db2'		=> array(),
						'informix'	=> array(),
						'access'	=> array(),
						'sqlite'	=> array(),
						'sybase'	=> array(),
						'ibase'		=> array(),
						'firebird'	=> array(),
						'interbase' => array(),
						'progress'  => array(),
						'odbc'		=> array()
					  );

	if (count($arr_conns) >= 0)
	{
		$new_arr_ord = array();

		foreach ($arr_ord_tp_conn as $tp_conn => $arr_aux)
		{
			if (isset($arr_conns[$tp_conn]))
			{
				foreach ($arr_conns[$tp_conn] as $arr_name_conn)
				{
					$new_arr_ord[$arr_name_conn] = $tp_conn;
				}
			}
		}

		$cont_tp_conn = 0;
		$cont_geral   = 0;
		foreach ($new_arr_ord as $name_conn => $tp_conn)
		{
			$cont_tp_conn++;
			$cont_geral++;

			if (strlen($name_conn) > 11)
			{
				$nome_aux = mb_substr($name_conn, 0, 10, "UTF-8") . "...";
			}
			else
			{
				$nome_aux = $name_conn;
			}

			if ($cont_tp_conn == 1)
			{
			?>
				<tr>
					<td>
						<center>
							<table>
								<tr>
			<?php
			}
		?>
			<td valign="middle" width="100px" height="80px" title="<?php echo $name_conn; ?>">
				<center>
					<a href="javascript:nm_connection_edit('<?php echo $name_conn; ?>');"><img src="<?php echo $nm_config['url_img']; ?>db_<?php echo ($tp_conn == 'interbase' ? 'firebird' : $tp_conn); ?>.png" border="0" /></a>
					<br />
					<table width="95px" height="15px">
						<tr>
							<td class="nmLineV3" style="font-size:10px" align="center">
								<?php echo $nome_aux; ?>&nbsp;<a href="javascript:nm_del_conn('<?php echo $name_conn; ?>')" title="<?php echo $nm_lang['btn_excl']; ?>" ><img src="<?php echo $nm_config['url_img']; ?>del_13x10.gif" border="0" /></a>
							</td>
						</tr>
					</table>
				</center>
			</td>
		<?php
			if ($cont_geral == count($new_arr_ord))
			{
				for ($nI = $cont_tp_conn; $nI < 6; $nI++)
				{
			?>
				<td valign="middle" width="100px" height="80px">&nbsp;</td>
			<?php
				}
			}

			if ($cont_tp_conn == 6)
			{
				$cont_tp_conn = 0;
			?>
								</tr>
							</table>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							<table>
								<tr>
			<?php
			}
		}
		?>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
<?php
	}
}
else
{
	foreach ($db_dbms_short as $str_name => $str_value)
	{
		if ($str_name == "maxsql")
		{
			continue;
		}

		$arr_ord_tp_conn[$str_name] = $str_value;
	}



	$cont_tp_conn = 0;
	foreach ($arr_ord_tp_conn as $str_name => $str_value)
	{
		$cont_tp_conn++;

		if ($cont_tp_conn == 1)
		{
		?>
			<tr>
				<td>
					<center>
						<table>
							<tr>
		<?php
		}
	?>
		<td valign="middle" width="100px" height="80px">
			<center>
				<a href="javascript:nm_sel_tp_conn('<?php echo $str_name; ?>'); setStep('<?php echo $btn_avanc; ?>');"><img src="<?php echo $nm_config['url_img']; ?>db_<?php echo $str_name; ?>.png" border="0" /></a>
				<br />
				<table width="95px" height="15px">
					<tr>
						<td class="nmLineV3" style="font-size:10px" align="center">
							<?php echo $str_value[$str_name]; ?>
						</td>
					</tr>
				</table>
			</center>
		</td>
	<?php

		if ($cont_tp_conn == 6)
		{
		?>
							</tr>
						</table>
					</center>
				</td>
			</tr>
			<tr>
				<td>
					<center>
						<table>
							<tr>
		<?php
		}
	}
	?>
						</tr>
					</table>
				</center>
			</td>
		</tr>
	</table>

<?php
}
?>

<table class="nmTable"  width="300" style="display:none">
   <tr>
      <td class="nmTitle" align="center" colspan="3"><?php echo $nm_lang['page_title']; ?></td>
   </tr>
   <?php
   /*
   ?>
   <tr>
      <td class="nmLineV3">&nbsp;<?php echo $nm_lang['label']['conn']; ?>&nbsp;</td>
      <td class="nmLineV3">
      	<INPUT name='conn' id='txt_conn' value='<?php echo $conn; ?>' type="text" class="nmInput">
      </td>
      <td class="nmLineV3" align="center" valign="middle">
          <!--img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover="this.style.cursor='hand'; mostraId('id_conn');"
             onmouseout="escondeId('id_conn');"-->

          <img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover='Tip("<?php echo $nm_lang['create_conn_wizard']['descricoes']['conn']; ?>", TITLE, "<?php echo $nm_lang['label']['conn']; ?>", WIDTH, 300, SHADOW, true, STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)'
             onmouseout='UnTip()'>
      </td>
   </tr>
   <?php
	*/
   ?>
   <tr>
      <td class="nmLineV3">&nbsp;<?php echo $nm_lang['label']['dbms']; ?>&nbsp;</td>
      <td class="nmLineV3">
        <select class="nmInput" name='dbms' id='tp_dbms'>
		<?php
    		foreach ($db_dbms_short as $str_name => $str_value)
    		{
    			$selected = "";
    			if($dbms==$str_name)
    			{
    				$selected = ' selected ';
    			}
		?>
        		<option value='<?php echo $str_name; ?>'<?php echo $selected; ?>><?php echo $str_value[$str_name]; ?></option>
		<?php
    		}
		?>
        </select>
      </td>
      <td class="nmLineV3" align="center" valign="middle">
          <!--img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover="this.style.cursor='hand'; mostraId('id_dbms');"
             onmouseout="escondeId('id_dbms');"-->

          <img src="<?php echo $nm_config['url_img']; ?>help.gif"
             border='0' title=""
             onmouseover='Tip("<?php echo $nm_lang['create_conn_wizard']['descricoes']['dbms']; ?>", TITLE, "<?php echo $nm_lang['label']['dbms']; ?>", WIDTH, 300, SHADOW, true, STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)'
             onmouseout='UnTip()'>
      </td>
   </tr>
</table>

<span style="display:none">
	<br>
	<input type="hidden" name="form_create" value="<?php echo $nm_config['form_valid']; ?>" />

	<input type='button' name='avancar' value='<?php echo $nm_lang['create_conn_wizard']['btnavancar']; ?>' onclick="setStep('<?php echo $btn_avanc; ?>');" class="nmButton">&nbsp;
	<input type='button' name='sair' value='&nbsp;&nbsp;<?php echo $nm_lang['create_conn_wizard']['btnsair']; ?>&nbsp;&nbsp;' onclick="setStep('cancel');" class="nmButton">&nbsp;
	<input type='button' name='help' value='<?php echo $nm_lang['create_conn_wizard']['btnhelp']; ?>' onclick="nm_help_conn();" class="nmButton">
	<input type='hidden' value='<?php echo $this->GetVar('step');?>' name='step'>
	<input type='hidden' value='' name='nextstep'>

</span>


</center>


<BR \>
<BR \>
<DIV style="display:none" id="id_conn">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['conn']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['conn']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_dbms">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['dbms']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['dbms']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
</form>
