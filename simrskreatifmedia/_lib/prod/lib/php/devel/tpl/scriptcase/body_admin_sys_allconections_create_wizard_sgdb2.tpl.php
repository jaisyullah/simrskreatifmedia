<?php

//Carrega Array com Grupos do ScriptCase
$db_sgdb           = $this->GetVar('db_sgdb');
$btn_avanc         = $this->GetVar('btn_avanc');
$btn_retor         = $this->GetVar('btn_retor');
$sgdb              = $this->GetVar('sgdb');
$decimal           = $this->GetVar('decimal');
$date_separator    = $this->GetVar('date_separator');
$use_persistent    = $this->GetVar('use_persistent');
$use_schema        = $this->GetVar('use_schema');
$retrieve_schema   = $this->GetVar('retrieve_schema');
$edit_conn         = $this->GetVar('edit_conn') == "S";
$filter_list       = $this->GetVar('arr_filters');
$id_edit_conn      = $this->GetVar('id_edit_conn');
$force_name_conn   = $this->GetVar('force_name_conn');

$use_ssl           = $this->GetVar('use_ssl');
$mysql_ssl_key     = $this->GetVar('mysql_ssl_key');
$mysql_ssl_cert    = $this->GetVar('mysql_ssl_cert');
$mysql_ssl_capath  = $this->GetVar('mysql_ssl_capath');
$mysql_ssl_ca      = $this->GetVar('mysql_ssl_ca');
$mysql_ssl_cipher  = $this->GetVar('mysql_ssl_cipher');

if(empty($decimal))
{
	$decimal = '.';
}

$dbms = $this->GetVar('dbms');
$conn = $this->GetVar('conn');
$user = $this->GetVar('user');
$pass = $this->GetVar('pass');

if (!$edit_conn && $this->GetVar('nome_conn_sugerido') != "")
{
	$conn = $this->GetVar('nome_conn_sugerido');
}

$str_title_conn = $nm_lang['mainmenu_new_conn'];
$lbl_filter     = $nm_lang['btn_filt']; 

if ($edit_conn)
{
	$str_title_conn = $nm_lang['lbl_connection_edit'];
}

?>

<script language="javascript">

	$(document).ready(function() {
		
	   setTimeout(function () {nm_post_conn_ajax('S');}, 1);	   	   	   
	   
	});
	

<?php
/*	
	
	var num_seq_row_filter = <?php echo (count($filter_list['list']) - 1); ?>;
	
	function fc_check_add_new_filter(str_focus)
	{				
		rows_filter = $('tr', $('#tab_filter'));
		bln_add     = true;
		
		//Limpa linhas vazias
		for(nI = rows_filter.length - 1; nI > 0; nI--)
		{
			num_seq = $(rows_filter[nI]).attr('id_obj');
						
			if ($('#filter_table_' + num_seq).val() == "" && $('#filter_owner_' + num_seq).val() == "" && nI != (rows_filter.length - 1) )
			{
				document.getElementById('tab_filter').deleteRow(nI);
			}
		}
		
		//Verifica se precisa adicionar mais uma linha
		for(nI = rows_filter.length - 1; nI > 0; nI--)
		{	
			num_seq = $(rows_filter[nI]).attr('id_obj');
			if ($('#filter_table_' + num_seq).val() == "" && $('#filter_owner_' + num_seq).val() == "")
			{
				bln_add = false;
				break;
			}			
		}
		
		//Adiciona mais uma linha
		if (bln_add)
		{
			num_seq_row_filter++;
			
			new_row = document.getElementById('tab_filter').insertRow(rows_filter.length);
			$(new_row).attr('id_obj', num_seq_row_filter);	
			cell_table = new_row.insertCell(0);
			cell_owner = new_row.insertCell(1);
			cell_show  = new_row.insertCell(2);		
			
			cell_table.innerHTML = "<input id='filter_table_"+ num_seq_row_filter +"' type='text' name='filter_table["+ num_seq_row_filter +"]' value='' size='15' class='nmInput' onchange=\"fc_check_add_new_filter('filter_owner_" + num_seq_row_filter + "')\">";
			cell_owner.innerHTML = "<input id='filter_owner_"+ num_seq_row_filter +"' type='text' name='filter_owner["+ num_seq_row_filter +"]' value='' size='15' class='nmInput' onchange=\"fc_check_add_new_filter('filter_show_" + num_seq_row_filter + "')\">";
			cell_show.innerHTML  = "<select id='filter_show_"+ num_seq_row_filter +"' class='nmInput' name='filter_show["+ num_seq_row_filter +"]'>" + 
								   "	<option value='Y'><?php echo $nm_lang['option_yes']; ?></option>" +
								   "	<option value='N' selected><?php echo $nm_lang['option_no']; ?></option>" +
								   "</select>";
		}									  
				
	}	
	
*/
?>
	
</script>

<form name='frm_back_edit' style="display:none" action="<?php echo nm_url_rand($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php'); ?>" method="GET">
	<input type="hidden" name="conn_open" value="S" />
</form>


<form action="" onsubmit="return false;" name="form_create" METHOD="post">
<input type="hidden" name="dbms" id="dbms" value="<?php echo $dbms; ?>" />
<input type="hidden" name="edit_conn" value="<?php echo $this->GetVar('edit_conn'); ?>" /> 
<input type="hidden" name="id_edit_conn" value="<?php echo $id_edit_conn; ?>" />
<input type="hidden" id="carregar_db" value="S" />
<center>
<!--br-->
<div style="position:relative; width:550px">


<table id='tab_new_conn' width="550px"  cellspacing="0" cellspacing="0">
<tr id='tr_title_extra' style="display:none">
	<td>
		<table class="nmTable" width="550px"  cellspacing="0">
		   <tr>
		      <td class="nmTitle" align="center" width="95%"><?php echo $str_title_conn; ?></td>
		      <td class="nmTitle" align="right" width="5%"><?php echo $this->GetVar('block_image_help'); ?></td>
		   </tr>
		</table>
	</td>	   	
</tr>
<tr id='tr_principal'>
<td>
	<table class="nmTable" width="550px"  cellspacing="0">
	   <tr>
	      <td class="nmTitle" align="center" width="95%"><?php echo $str_title_conn; ?></td>
	      <td class="nmTitle" align="right" width="5%"><?php echo $this->GetVar('block_image_help'); ?></td>
	   </tr>
	   <tr>
	   		<td colspan="2">
		   		<table width="100%" style="border: 1px dotted #bfdaf2;" border="0"> 
		   			<tr>
		   				<td width="90px" height="70px" align="center" valign="middle">
		   					
		   					<center>	
		   						<img src="<?php echo $nm_config['url_img']; ?>db_<?php echo $dbms; ?>.png" border="0" />
		   					</center>
		   					
		   				</td>
		   				<td>
		   					<table width="330px" border="0">
								<tr>
							      <td class="nmLineV3"  width="173px">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['conn']; ?>&nbsp;</td>
							      <td class="nmLineV3"  width="157px" valign="middle">							      
							      	<?php 
							      		if ($force_name_conn != "")
							      		{
									?>							      										      
							      	<INPUT value='<?php echo $force_name_conn; ?>' type="text" disabled class="nmInput" style="display:<?php echo ($edit_conn ? "none" : ""); ?>">
							      	<INPUT type="hidden" name='conn' value='<?php echo $force_name_conn; ?>' >
							      	<?php
							      		}
							      		else 
							      		{
									?>
									<INPUT name='conn' value='<?php echo $conn; ?>' type="text" class="nmInput" style="display:<?php echo ($edit_conn ? "none" : ""); ?>">
									<?php							      			
							      		}
							      	?>
							      	
							      	
							      	<?php 
							      		if ($edit_conn)
							      		{
							      			$conn_aux = strlen($conn) > 17 ? substr($conn, 0, 16) . "..." : $conn;
							      	?>
							      		<div style="color:gray; border:1px solid #7f9db9; width:130px; height:16px" title="<?php echo $conn; ?>">
							      			<div class="nmLineV3" style="margin-top:-5px">&nbsp;<?php echo $conn_aux; ?></div>
							      		</div>
							      	<?php		
							      		}
							      	?>
							      </td>							     
							   </tr>   
							   <tr>
							      <td class="nmLineV3" width="173px">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['sgdb']; ?>&nbsp;</td>
							      <td class="nmLineV3" width="157px">
							        <select class="nmInput" name='sgdb' onchange="nm_post_conn_ajax()">
									<?php
                                        $ops = [''];
                                        $filled = false;
							    		foreach ($db_sgdb as $str_name => $str_value)
							    		{
							    			$selected = "";
							    			if($sgdb==$str_name)
							    			{
							    				$selected = ' selected ';
							    			}
							    			if ($filled || (strpos($str_value , 'PDO') === false) ) {
                                                $ops[] = "<option value='$str_name' $selected>$str_value</option>";
                                            } else {
                                                $ops[0] = "<option value='$str_name' $selected>$str_value</option>";
                                                $filled = true;
							    			}
							    		}
							    		foreach ($ops as $op) {
							    		    echo $op;
                                        }
									?>
							        </select>
							        
							      </td>
							   </tr>						   	   				
		   					</table>
		   				</td>
		   				<td width="130px" valign="middle" align="center" onclick="nm_test_conn();" style="cursor:pointer">
		   					<center>
								<span id='img_bt_test_conn'>
									<img src="<?php echo $nm_config['url_img']; ?>db_teste.png" /><br>
									<span class="nmLineV3" style="font-size:10px"><?php echo $nm_lang['create_conn_wizard']['btntestar']; ?></span>
								</span>		   				
							</center>
		   				</td>
		   			</tr>	   			
		   		</table>	   		
		   	</td>
	   </tr>
	   
	   <tr id='tr_dados_rep'>
	   		<td colspan="2" id="td_dados_rep">
	   		</td>
	   </tr> 
	   	   
	   <tr id='tr_load_ajax'>
	   		<td colspan="2" id="td_load_ajax" height="70px" valign="middle" align="center" style="display:">
	   			<center>
					<img src="<?php echo $nm_config['url_img']; ?>load_ajax_blue.gif" />	   			
	   			</center>
	   		</td>
	   </tr> 	   
	   	   
	   <tr id='tr_dados_usu'>
	   		<td colspan="2" id="td_dados_usu" style="display:none">
	   			   		
		   		<table width="100%" border="0" >
	   
					<tr style="display:<?php echo $dbms == 'sqlite' ? 'none' : ''; ?>">
				      <td class="nmLineV3" width="265px">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['user']; ?>&nbsp;</td>
				      <td class="nmLineV3" width="225px">
				          <input type='text' name='user' id='user' value='<?php echo $user?>' class="nmInput" onfocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'lista', 'cxab', 9999999, 'TUDO')" onchange="$('#carregar_db').val('S');" >
				      </td>
				      <td class="nmLineV3" width="50px" align="left" valign="middle">&nbsp;</td>
				   </tr>
				   
				   <tr style="display:<?php echo $dbms == 'sqlite' ? 'none' : ''; ?>">
				      <td class="nmLineV3" width="265px">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['pass']; ?>&nbsp;</td>
				      <td class="nmLineV3" width="225px">
				          <input type='password' name='pass' id='pass' value='<?php echo $pass?>' class="nmInput" onfocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'lista', 'cxab', 9999999, 'TUDO')"  onchange="$('#carregar_db').val('S');">
				      </td>
				      <td class="nmLineV3" width="50px" align="left" valign="middle">&nbsp;</td>
				   </tr>

			      	 <?php
			      	 	if ($dbms == 'mysql')
			      	 	{
			      	 ?>
						   <tr>
						      <td class="nmLineV3" width="265px">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['base']; ?>&nbsp;</td>
						      <td class="nmLineV3" width="225px">
					      	 		<span id='span_sel_database_name'>
					      	 			<select name='sel_base' id='sel_base' class="nmInput" style='width:122px' onfocus="fc_get_db('', '');">
					      	 				<option>&nbsp;</option>					      	 		
					      	 			</select>
					      	 		</span>						          
						      </td>
						      <td class="nmLineV3" width="50px" align="left" valign="middle">&nbsp;</td>
						   </tr>      	 
			      	 <?php
			      	 	}
			      	 ?>				   

	   			</table>
	   	   	</td>
	   </tr>
	   	  
	   <tr id="tr_more_info" style="display:none">
	   		<td colspan="2">	   				   			   		
		   		<table width="100%" border="0" style="border-top: 1px dotted #bfdaf2;">		   		
					<tr id='tr_decimal' style="display:">
				      <td width="265px" class="nmLineV3">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['decimal']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <select class="nmInput" name='decimal'>
			        		<option value='.' <?php if($decimal=='.'){ echo ' selected '; } ?>>&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;</option>
			        		<option value=',' <?php if($decimal==','){ echo ' selected '; } ?>>&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;</option>
				        </select>	      
				      </td>
				      <th rowspan="3" width="115px">
							<table cellpadding="0" cellspacing="0" border="0" width="100%" height="70px" style="display:none"> <!--style="border: 1px dotted #bfdaf2;"-->
								<tr>
									<td class="nmLineV3" align="center" valign="middle" onclick="fc_show_filter(true, false)" style="cursor:pointer">
									 	<img src="<?php echo $nm_config['url_img']; ?>funil.gif" border="0" /> <?php echo $lbl_filter; ?>
									</td>
								</tr>
							</table>		   		   						      
				      </th>
				   </tr>
				   <tr id='tr_date_separator' style="display:">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['date_separator']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="text" class="nmInput" name='date_separator' value="<?php echo str_replace('"', '&quot;', $date_separator); ?>" />
				      </td>
				   </tr> 
				   <tr id='tr_use_persistent' style="display:">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['use_persistent']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <select class="nmInput" name='use_persistent'>
						    <option value='N' <?php if($use_persistent!='Y'){ echo "selected"; } ?>><?php echo $nm_lang['values']['nao']; ?></option>
						    <option value='Y' <?php if($use_persistent=='Y'){ echo "selected"; } ?>><?php echo $nm_lang['values']['sim']; ?></option>
				        </select>
				      </td>
				   </tr> 
				   <tr id='tr_use_schema' style="display:<?php echo $dbms == 'db2' ? '' : 'none'; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['retrieve_schema']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <select class="nmInput" name='use_schema'>
						    <option value='N' <?php if($use_schema!='Y'){ echo "selected"; } ?>><?php echo $nm_lang['values']['nao']; ?></option>
						    <option value='Y' <?php if($use_schema=='Y'){ echo "selected"; } ?>><?php echo $nm_lang['values']['sim']; ?></option>
				        </select>
				      </td>
				   </tr> 
				   <tr style="display:none">
				      <td width="265px" class="nmLineV3">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['retrieve_schema']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				      	<span id='tr_retrieve_schema'></span> <!-- para n exibir -->
				        <select class="nmInput" name='retrieve_schema'>
						    <option value='N' <?php if($retrieve_schema!='Y'){ echo "selected"; } ?>><?php echo $nm_lang['values']['nao']; ?></option>
						    <option value='Y' <?php if($retrieve_schema=='Y'){ echo "selected"; } ?>><?php echo $nm_lang['values']['sim']; ?></option>
				        </select>
				      </td>
				   </tr>
				   <tr id='tr_use_ssl' style="display:<?php echo $dbms != 'mysql' ? 'none' : ''; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['use_ssl']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="checkbox" name='use_ssl' id='use_ssl' value="Y" onClick="$('#carregar_db').val('S');" <?php echo ($use_ssl=='Y')?"checked=checked":""; ?> />
				      </td>
				   </tr>
				   <tr id='tr_mysql_ssl_key' style="display:<?php echo $dbms != 'mysql' ? 'none' : ''; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['mysql_ssl_key']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="text" class="nmInput" name='mysql_ssl_key' id='mysql_ssl_key' value="<?php echo str_replace('"', '&quot;', $mysql_ssl_key); ?>" />
				      </td>
				   </tr>
				   <tr id='tr_mysql_ssl_cert' style="display:<?php echo $dbms != 'mysql' ? 'none' : ''; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['mysql_ssl_cert']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="text" class="nmInput" name='mysql_ssl_cert' id='mysql_ssl_cert' value="<?php echo str_replace('"', '&quot;', $mysql_ssl_cert); ?>" />
				      </td>
				   </tr>
				   <tr id='tr_mysql_ssl_capath' style="display:<?php echo $dbms != 'mysql' ? 'none' : ''; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['mysql_ssl_capath']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="text" class="nmInput" name='mysql_ssl_capath' id='mysql_ssl_capath' value="<?php echo str_replace('"', '&quot;', $mysql_ssl_capath); ?>" />
				      </td>
				   </tr>
				   <tr id='tr_mysql_ssl_ca' style="display:<?php echo $dbms != 'mysql' ? 'none' : ''; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['mysql_ssl_ca']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="text" class="nmInput" name='mysql_ssl_ca' id='mysql_ssl_ca' value="<?php echo str_replace('"', '&quot;', $mysql_ssl_ca); ?>" />
				      </td>
				   </tr>
				   <tr id='tr_mysql_ssl_cipher' style="display:<?php echo $dbms != 'mysql' ? 'none' : ''; ?>">
				      <td width="265px" class="nmLineV3" >&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['mysql_ssl_cipher']; ?>&nbsp;</td>
				      <td width="160px" class="nmLineV3">
				        <input type="text" class="nmInput" name='mysql_ssl_cipher' id='mysql_ssl_cipher' value="<?php echo str_replace('"', '&quot;', $mysql_ssl_cipher); ?>" />
				      </td>
				   </tr>
		   		</table>
	   		
	   		</td>
	   </tr>

	   <tr id="tr_more_dados_rep" style="display:none">
	   		<td colspan="2" id='td_more_dados_rep'>	   				   		

	   		</td>
	   </tr>	
	
	   <tr id='tr_filter' style="display:none">
	   		<td colspan="2" width="100%" height="200px">
	   			<table cellpadding="0" cellspacing="0" border="0" width="100%">
	   				<tr>
	   					<td width="2%">&nbsp;</td>
	   					<td class="nmLineV3" width="38%" valign="top" style="border-right: 1px dotted #bfdaf2;">
	   						<?php echo $nm_lang['lbl_exi']; ?>
							
	   						<table style="font-size:4px"><tr><td>&nbsp;</td></tr></table>
	   						<input type="checkbox" name="show_table" value="Y"      <?php echo ($filter_list['show_table']  == 'Y' ? 'checked' : ''); ?>><span class="nmText"><?php echo $nm_lang['lbl_show_table'];?></span><BR>
						  	<input type="checkbox" name="show_view" value="Y"       <?php echo ($filter_list['show_view']  == 'Y' ? 'checked' : ''); ?>><span class="nmText"><?php echo $nm_lang['lbl_show_view'];?></span><BR>
						  	<input type="checkbox" name="show_system" value="Y"     <?php echo ($filter_list['show_system']  == 'Y' ? 'checked' : ''); ?>><span class="nmText"><?php echo $nm_lang['lbl_show_system'];?></span><BR>
						  	<input type="checkbox" name="show_procedure" value="Y"  <?php echo ($filter_list['show_procedure']  == 'Y' ? 'checked' : ''); ?>><span class="nmText"><?php echo $nm_lang['lbl_show_proc'];?></span>	   						
	   					</td>
	   					<td width="2%">&nbsp;</td>
	   					<td width="58%" valign="top">
	   						<div class="nmLineV3">
	   							<?php echo $nm_lang['lbl_filt']; ?>				   				
				   			</div>
				   			<div id='div_tab_filter' class="nmLineV3" style="width:100%; height:150px; overflow:auto;">					   								   				
								<table width="90%" id='tab_filter'>
								    <tr>
								        <td><span class="nmText"><?php echo $nm_lang['lbl_filt_tab']; ?></span></td>
								        <td><span class="nmText"><?php echo $nm_lang['lbl_filt_owner']; ?></span></td>
								        <td><span class="nmText"><?php echo $nm_lang['lbl_exi']; ?></span></td>
								    </tr>								
								    
									<?php
	    	                        /*    								
									foreach ($filter_list['list'] as $i => $arr_fields_list)
									{
										$selected_y = $arr_fields_list['filter_show'] == 'Y' ? 'selected' : '';
										$selected_n = $arr_fields_list['filter_show'] != 'Y' ? 'selected' : '';
									?>
									    <tr class="tr_fld_filter" id_obj="<?php echo $i; ?>">
									        <td><input id='filter_table_<?php echo $i; ?>' type="text" name="filter_table[<?php echo $i; ?>]" value="<?php echo $arr_fields_list['filter_table']; ?>" size="15" class="nmInput" onchange="fc_check_add_new_filter('filter_owner_<?php echo $i; ?>')"></td>
									        <td><input id='filter_owner_<?php echo $i; ?>' type="text" name="filter_owner[<?php echo $i; ?>]" value="<?php echo $arr_fields_list['filter_owner'] ?>"  size="15" class="nmInput" onchange="fc_check_add_new_filter('filter_show_<?php echo $i; ?>')"></td>
									        <td>
									        	<select id='filter_show_<?php echo $i; ?>' class="nmInput" name="filter_show[<?php echo $i; ?>]">
									        		<option value="Y" <?php echo $selected_y; ?>><?php echo $nm_lang['option_yes']; ?></option>
									        		<option value="N" <?php echo $selected_n; ?>><?php echo $nm_lang['option_no']; ?></option>
									        	</select>
									        </td>
									    </tr>
									<?php
									}*/
									?>
								</table>				   				
				   			</div>	   					
	   					</td>
	   				</tr>
	   			</table>
				<table cellpadding="0" cellspacing="0" border="0" width="100%" height="30px"> <!--style="border: 1px dotted #bfdaf2;"-->
					<tr style="display:none">
						<td class="nmLineV3" align="center" valign="middle" onclick="fc_show_filter(false, true)" style="cursor:pointer">
						 	<img src="<?php echo $nm_config['url_img']; ?>hide_funil.png" border="0" /> <?php echo $nm_lang['lbl_hide_filter']; ?>
						</td>
					</tr>
				</table>	   			
	   		</td>
	   </tr>
	</table>
</td>
</tr>
<tr id="id_test_conn" style="display:none">
	<td align="center" valign="middle">
		<table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #bfdaf2">
	   		<tr>
	   			<td align="center" valign="middle">
					<center>
						<span id='span_load_ajax_test_conn'>	   				
							<img src="<?php echo $nm_config['url_img']; ?>load_ajax_blue.gif" />	   			
						</span>	
						
						<span id='span_iframe_test_conn' style="display:none">
							<IFRAME name="testaconn" width="510px" height="80px" align="middle" marginheight="0" marginwidth="0" src="" frameborder="0" scrolling="No" ></IFRAME>
						</span>

						<span id='span_msg_err_test_auto' style="display:none">
							<table><tr><td style="font-size:4px">&nbsp;</td></table>
							<table width="480px" border="0">
							   <tr>
							   	   <td width="30px" valign="top">
							   	   		<img src="<?php echo $nm_config['url_img']; ?>cancel.png"  />
							   	   </td>	
							       <td width="420px" class="nmErrorMsg" id='td_msg_erro'></td>
							   </tr>
							</table>
							<table><tr><td style="font-size:4px">&nbsp;</td></table>
						</span>					
					</center>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr id='tr_advanced'>
<td>
	<table id='tab_more' width="100%" cellpadding="0" cellspacing="0" style="margin-top:-7px;" >
	   <tr style="display:<?php echo $dbms == 'sqlite' ? 'none' : ''; ?>">
	   	<td width="447px">&nbsp;</td>   
	   	<td onclick="nm_show_more()" width="103px" class="nmLineV3" style="cursor:pointer; color:gray; background:url('<?php echo $nm_config['url_img']; ?>moreinfo.png') no-repeat right;" align="center">  
	   		<span class="nmLineV3" style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advanced</span>
	   		&nbsp;&nbsp; 
	   		<img id='img_seta_down' src="<?php echo $nm_config['url_img']; ?>seta_down.gif" border="0" />
	   		<img id='img_seta_up'   src="<?php echo $nm_config['url_img']; ?>seta_up.gif" border="0"  style="display:none"/>
	   	</td>
	   </tr>
	</table>
</td>
</tr>
</table>
</div>

<table id='tab_sep_bt' style="display:none; font-size:6px"><tr><td>&nbsp;</td></tr></table>

<table width="550px" border="0">
	<tr>
		<td width="25%" align="center" valign="middle">

		</td>
		<td width="50%">		
			<center> 
				<input type="hidden" name="form_create" value="<?php echo $nm_config['form_valid']; ?>" />
				<span id='bt_back_test_conn' style="display:none"><input type='button' value='<?php echo $nm_lang['create_conn_wizard']['btnvoltar']; ?>' onclick="nm_back_test_conn();" class="nmButton" />&nbsp;&nbsp;</span>
				
				<span id='bt_nav_1'>
					<?php
					if ($edit_conn)
					{
					?>
					<input type='button' name='concluir' value='<?php echo $nm_lang['create_conn_wizard']['btnconcluir']; ?>' onclick="nm_salvar_conn();" class="nmButton">&nbsp;&nbsp;
					<input type='button' name='sair' value='<?php echo $nm_lang['create_conn_wizard']['btnsair']; ?>' onclick="fc_cancel_edit();" class="nmButton">					
					<?php
					}
					else 
					{
					?>
					<span id='bt_back_sel_conn'><input type='button' name='retornar' value='<?php echo $nm_lang['create_conn_wizard']['btnvoltar']; ?>' onclick="fc_ajust_port(); setStep('<?php echo $btn_retor; ?>');" class="nmButton" />&nbsp;&nbsp;</span>
					<input type='button' name='concluir' value='<?php echo $nm_lang['create_conn_wizard']['btnconcluir']; ?>' onclick="nm_salvar_conn();" class="nmButton">&nbsp;&nbsp;
					<input type='button' name='sair' value='<?php echo $nm_lang['create_conn_wizard']['btnsair']; ?>' onclick="setStep('cancel');" class="nmButton">
					<?php
					}
					?>
				</span>

				<span id='bt_nav_2' style="display:none">
					<input type='button' name='confirmar' value='<?php echo $nm_lang['create_conn_wizard']['btnvoltar']; ?>' onclick="fc_back_save()" class="nmButton">&nbsp;&nbsp;
					<input type='button' name='voltar' value='<?php echo $nm_lang['button_confirm']; ?>' onclick="fc_ajust_port();  setStep('testar');" class="nmButton">					
				</span>
							
				<input type='hidden' value='<?php echo $this->GetVar('step');?>' name='step'>
				<input type='hidden' value='<?php echo $btn_avanc; ?>' name='nextstep'>
			</center>
		</td>
		<td width="25%">
			&nbsp;
		</td>
	</tr>
</table>

<span id='span_erro_sel_db' style="display:none;">
	<br>
	<table class="nmTable" align='center'>
	 <tr>
	  <td class="nmErrorTitle">
	   <img src="<?php echo $nm_config['url_img']; ?>notice.gif" style="border-width: 0px; vertical-align: middle" />
	   <?php echo "Error"; ?>
	  </td>
	 </tr> 
	 <tr>
	  <td class="nmErrorMsg" id='td_msg_erro'></td>
	 </tr>
	</table>
</span>

</center>


<BR \>
<BR \>
<DIV style="display:none" id="id_sgdb">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['sgdb']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['sgdb']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_date_separator">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['date_separator']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['date_separator']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_use_persistent">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['use_persistent']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['use_persistent']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_retrieve_schema">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['retrieve_schema']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['retrieve_schema']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_decimal">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['decimal']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['decimal']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
</form>

<form name='test_conn' action="" method="POST" style="display:none">
	<input type="hidden" name="hid_create_connect" value="S" />
	<div id='div_form_conn_test'></div>
</form>


<span id="span_save_conn" style="display:none"></span>