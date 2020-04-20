<?php

class chart_igd_hitung_resumo
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $total;
   var $tipo;
   var $nm_data;
   var $NM_res_sem_reg;
   var $NM_export;
   var $prim_linha;
   var $que_linha;
   var $css_line_back; 
   var $css_line_fonf; 
   var $comando_grafico;
   var $resumo_campos;
   var $nm_location;
   var $Print_All;
   var $NM_raiz_img; 
   var $NM_tit_val; 
   var $NM_totaliz_hrz; 
   var $link_graph_tot; 
   var $Tot_ger; 
   var $array_total_tgl;
   var $array_total_geral;
   var $array_tot_lin;
   var $array_final;
   var $array_links;
   var $array_links_tit;
   var $array_export;
   var $quant_colunas;
   var $conv_col;
   var $count_ger;
   var $sc_proc_quebra_tgl;
   var $count_tgl;

   //---- 
   function __construct($tipo = "")
   {
      $this->Graf_left_dat   = true;
      $this->Graf_left_tot   = true;
      $this->NM_export       = false;
      $this->NM_totaliz_hrz  = false;
      $this->link_graph_tot  = array();
      $this->proc_res_grid   = false;
      $this->array_final     = array();
      $this->array_links     = array();
      $this->array_links_tit = array();
      $this->array_export    = array();
      $this->resumo_campos   = array();
      $this->comando_grafico = array();
      $this->array_total_tgl = array();
      $this->array_general_total = array();
      $this->nm_data = new nm_data("id");
      if ("" != $tipo && "out" == strtolower($tipo))
      {
         $this->NM_tipo = "out";
      }
      else
      {
         $this->NM_tipo = "pag";
      }
   }

   //---- 
   function initializeButtons()
   {
      $this->nmgp_botoes['group_1'] = "on";
      $this->nmgp_botoes['group_3'] = "on";
      $this->nmgp_botoes['group_1'] = "on";
      $this->nmgp_botoes['pdf'] = "on";
      $this->nmgp_botoes['imp'] = "on";
      $this->nmgp_botoes['chart_bar'] = "on";
      $this->nmgp_botoes['chart_line'] = "on";
      $this->nmgp_botoes['chart_area'] = "on";
      $this->nmgp_botoes['chart_pizza'] = "on";
      $this->nmgp_botoes['chart_stack'] = "on";
      $this->nmgp_botoes['chart_combo'] = "on";
      $this->nmgp_botoes['chart_type'] = "on";
      $this->nmgp_botoes['pdf'] = "on";
      $this->nmgp_botoes['print'] = "on";
      $this->nmgp_botoes['html'] = "on";
      $this->nmgp_botoes['chart_bar'] = "on";
      $this->nmgp_botoes['chart_line'] = "on";
      $this->nmgp_botoes['chart_area'] = "on";
      $this->nmgp_botoes['chart_pizza'] = "on";
      $this->nmgp_botoes['chart_stack'] = "on";
      $this->nmgp_botoes['chart_combo'] = "on";
      $this->nmgp_botoes['chart_type'] = "on";
      $this->nmgp_botoes['chart_sort'] = "on";
      $this->nmgp_botoes['chart_custom'] = "on";
      $this->nmgp_botoes['chart_summary'] = "on";
      $this->nmgp_botoes['dynsearch'] = "on";
      $this->nmgp_botoes['filter'] = "on";
      $this->nmgp_botoes['chart_exit'] = isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['under_dashboard'] ? "off" : "on";

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['chart_igd_hitung'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['chart_igd_hitung'];

              $this->nmgp_botoes['chart_sort']    = $tmpDashboardButtons['chart_sort']      ? 'on' : 'off';
              $this->nmgp_botoes['chart_custom']  = $tmpDashboardButtons['chart_custom']    ? 'on' : 'off';
              $this->nmgp_botoes['chart_bar']     = $tmpDashboardButtons['chart_bar']       ? 'on' : 'off';
              $this->nmgp_botoes['chart_line']    = $tmpDashboardButtons['chart_line']      ? 'on' : 'off';
              $this->nmgp_botoes['chart_area']    = $tmpDashboardButtons['chart_area']      ? 'on' : 'off';
              $this->nmgp_botoes['chart_pizza']   = $tmpDashboardButtons['chart_pizza']     ? 'on' : 'off';
              $this->nmgp_botoes['chart_stack']   = $tmpDashboardButtons['chart_stack']     ? 'on' : 'off';
              $this->nmgp_botoes['chart_combo']   = $tmpDashboardButtons['chart_combo']     ? 'on' : 'off';
              $this->nmgp_botoes['chart_type']    = $tmpDashboardButtons['chart_type']      ? 'on' : 'off';
              $this->nmgp_botoes['chart_summary'] = $tmpDashboardButtons['chart_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['pdf']           = $tmpDashboardButtons['chart_pdf']       ? 'on' : 'off';
              $this->nmgp_botoes['print']         = $tmpDashboardButtons['chart_print']     ? 'on' : 'off';
              $this->nmgp_botoes['word']          = $tmpDashboardButtons['chart_word']      ? 'on' : 'off';
              $this->nmgp_botoes['xls']           = $tmpDashboardButtons['chart_xls']       ? 'on' : 'off';
              $this->nmgp_botoes['xml']           = $tmpDashboardButtons['chart_xml']       ? 'on' : 'off';
              $this->nmgp_botoes['json']          = $tmpDashboardButtons['chart_json']      ? 'on' : 'off';
              $this->nmgp_botoes['csv']           = $tmpDashboardButtons['chart_csv']       ? 'on' : 'off';
              $this->nmgp_botoes['rtf']           = $tmpDashboardButtons['chart_rtf']       ? 'on' : 'off';
              $this->nmgp_botoes['img']           = $tmpDashboardButtons['chart_imagem']    ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']     = $tmpDashboardButtons['chart_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['filter']        = $tmpDashboardButtons['chart_filter']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['chart_igd_hitung']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['chart_igd_hitung']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['chart_igd_hitung']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
   }

   //---- 
   function resumo_export()
   { 
      $this->NM_export = true;
      $this->monta_resumo();
   } 

	function generateChartImages() {
		require_once $this->Ini->path_aplicacao . $this->Ini->Apl_grafico;
		$this->Graf         = new chart_igd_hitung_grafico();
		$this->Graf->Db     = $this->Db;
		$this->Graf->Erro   = $this->Erro;
		$this->Graf->Ini    = $this->Ini;
		$this->Graf->Lookup = $this->Lookup;

		$chartList  = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'];
		$chartFiles = array();

		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['phantomjs_export_process'] = true;
		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_step']     = 'image';
		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_count']    = 0;
		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_total']    = 0;

		foreach ($chartList as $chartKey => $chartData) {
			if ('C|' != substr($chartKey, 0, 2)) {
				continue;
			}

			$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_total']++;
		}

		foreach ($chartList as $chartKey => $chartData) {
			if ('C|' != substr($chartKey, 0, 2)) {
				continue;
			}

			$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['phantomjs_export_file'] = '';
			$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_count']++;

			$this->writeProgressFile();

			$this->Graf->generateChartImage($chartKey);

			if ('' != $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['phantomjs_export_file']) {
				$chartFiles[] = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['phantomjs_export_file'];
			}
		}

		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['phantomjs_export_process'] = false;

		return $chartFiles;
	} // generateChartImages

	function zipChartImages($password = '') {
		$chartImages = $this->generateChartImages();

		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_step'] = 'zip';

		$this->writeProgressFile();

		$zipFile = $this->zipFileList($chartImages, $password);

		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_step'] = 'end';

		$this->writeProgressFile();

		return $zipFile;
	}

	function zipFileList($fileList, $password = '') {
		$tempDir     = $this->Ini->root . $_SESSION['scriptcase']['chart_igd_hitung']['glo_nm_path_imag_temp'] . '/';
		$zipFile     = 'sc_zip_' . md5(microtime() . rand(1, 1000) . session_id()) . '.zip';
		$zipFileFull = $this->zipProtectFileName($tempDir . $zipFile);

		if ('' != $password) {
			if (@is_file($tempDir . $zipFile)) {
				@unlink($tempDir . $zipFile);
			}

			$filename     = array_shift($fileList);
			$filenameFull = $this->zipProtectFileName($tempDir . $filename);

			if (FALSE !== strpos(strtolower(php_uname()), 'windows')) {
				chdir("{$this->Ini->path_third}/zip/windows");
				$zipCommand = "zip.exe -P -j {$password} {$zipFileFull} {$filenameFull}";
			}
			elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) {
				if (FALSE !== strpos(strtolower(php_uname()), 'i686')) {
					chdir("{$this->Ini->path_third}/zip/linux-i386/bin");
				}
				else {
					chdir("{$this->Ini->path_third}/zip/linux-amd64/bin");
				}
				$zipCommand = "./7za -p{$password} a {$zipFileFull} {$filenameFull}";
			}
			elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin')) {
				chdir("{$this->Ini->path_third}/zip/mac/bin");
				$zipCommand = "./7za -p{$password} a {$zipFileFull} {$filenameFull}";
			}

			if (!empty($zipCommand)) {
				exec($zipCommand);
			}

			while (!empty($fileList)) {
				$filename     = array_shift($fileList);
				$filenameFull = $this->zipProtectFileName($tempDir . $filename);

				if (FALSE !== strpos(strtolower(php_uname()), 'windows')) {
					chdir("{$this->Ini->path_third}/zip/windows");
					$zipCommand = "zip.exe -P -j -u {$password} {$zipFileFull} {$filenameFull}";
				}
				elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) {
					if (FALSE !== strpos(strtolower(php_uname()), 'i686')) {
						chdir("{$this->Ini->path_third}/zip/linux-i386/bin");
					}
					else {
						chdir("{$this->Ini->path_third}/zip/linux-amd64/bin");
					}
					$zipCommand = "./7za -p{$password} a {$zipFileFull} {$filenameFull}";
				}
				elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin')) {
					chdir("{$this->Ini->path_third}/zip/mac/bin");
					$zipCommand = "./7za -p{$password} a {$zipFileFull} {$filenameFull}";
				}

				if (!empty($zipCommand)) {
					exec($zipCommand);
				}
			}
		}
		else {
			require_once $this->Ini->path_third . '/zipfile/zipfile.php';

			$tempDir = $this->Ini->root . $_SESSION['scriptcase']['chart_igd_hitung']['glo_nm_path_imag_temp'] . '/';
			$zipFile = 'sc_zip_' . md5(microtime() . rand(1, 1000) . session_id()) . '.zip';

			$zipHandler = new zipfile();
			$zipHandler->set_file($tempDir . $zipFile);

			foreach ($fileList as $chartImageName) {
				$chartImageFile = $tempDir . $chartImageName;

				$zipHandler->sc_zip_all($chartImageFile);
			}

			$zipHandler->file();
		}

		return $zipFile;
	}

	function zipProtectFileName($filename) {
		return false !== strpos($filename, ' ') ? "\"{$filename}\"" : $filename;
	}

	function writeProgressFile() {
		if ('image' == $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_step']) {
			$progress = floor($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_count'] * 100 / ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_total'] + 1));
			$content  = $this->Ini->Nm_lang['lang_pdff_pcht'] . ": {$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_count']}/{$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_total']}###$progress";

			$content  = $_SESSION['scriptcase']['charset'] != 'UTF-8' ? sc_convert_encoding($content, 'UTF-8', $_SESSION['scriptcase']['charset']) : $content;
		}
		elseif ('zip' == $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_step']) {
			$progress = floor($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_count'] * 100 / ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_total'] + 1));
			$content  = $this->Ini->Nm_lang['lang_chrt_zip_img'] . "###$progress";

			$content  = $_SESSION['scriptcase']['charset'] != 'UTF-8' ? sc_convert_encoding($content, 'UTF-8', $_SESSION['scriptcase']['charset']) : $content;
		}
		elseif ('end' == $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_step']) {
			$content = "ok###100";
		}
		else {
			$content = "init###0";
		}

		$f = @fopen("{$this->Ini->root}{$_SESSION['scriptcase']['chart_igd_hitung']['glo_nm_path_imag_temp']}/{$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['export_progress_file']}", 'w');
		fwrite($f, $content);
		fclose($f);
	}

   function monta_resumo($b_export = false)
   {
       global $nm_saida;

       $this->initializeButtons();

      $this->NM_res_sem_reg = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['Proc_Link_Res'] = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search']))
      { 
         $this->res_contr = new chart_igd_hitung_apl();
         $this->res_contr->Ini->sc_page = $this->Ini->sc_page;
         $this->res_contr->Recupera_where();
         $this->res_contr->SC_where_resumo_search();
         $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_array_resumo'] = "NAO";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_pesq_filtro'];
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca']))
     { 
         $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca'];
         if ($_SESSION['scriptcase']['charset'] != "UTF-8")
         {
             $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
       $this->tgl = $Busca_temp['tgl']; 
       $tmp_pos = strpos($this->tgl, "##@@");
       if ($tmp_pos !== false && !is_array($this->tgl))
       {
           $this->tgl = substr($this->tgl, 0, $tmp_pos);
       }
     } 
         if (isset($_POST['reload_comb_chart']) && 'Y' == $_POST['reload_comb_chart'])
         {
             ob_start();
             $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_combination_type'] = $_POST['fc_chart_type'];
         }

       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp']           = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_sql']           = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_x_axys']             = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys']             = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_order'] = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['comb_field_display_type']  = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_display_values']     = array();

           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_combination_type']        = 'spline';
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_combination_order_rule']  = 'asc';
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_combination_order_field'] = 'label';
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_combination_order_rule_groupby']["tgl"]  = 'asc';
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_combination_order_field_groupby']["tgl"] = 'label';

           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys'][0] = 0;

           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp']["tgl"] = 'tgl';

           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_sql']['tgl']["regDate"] = 'asc';

           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['comb_field_display_type'][2] = '';

           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_display_values'][2] = null;


           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_order']['sc_free_group_by'][] = 2;
       }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pesq_tab_label']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pesq_tab_label'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pesq_tab_label'] .= "tgl?#?" . "Tgl" . "?@?";
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_search_add']))
      {
          $this->monta_css();
          $nmgp_tab_label = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pesq_tab_label'];
          if (!empty($nmgp_tab_label))
          {
             $nm_tab_campos = explode("?@?", $nmgp_tab_label);
             $nmgp_tab_label = array();
             foreach ($nm_tab_campos as $cada_campo)
             {
                 $parte_campo = explode("?#?", $cada_campo);
                 $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
             }
          }
          $Seq_grid      = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_search_add']['seq'];
          $Cmp_grid      = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_search_add']['cmp'];
          $Def_grid      = array('descr' => $nmgp_tab_label[$Cmp_grid], 'hint' => $nmgp_tab_label[$Cmp_grid]);
          $Lin_grid_add  = $this->grid_search_tag_ini($Cmp_grid, $Def_grid, $Seq_grid);
          $NM_func_grid_add = "grid_search_" . $Cmp_grid;
          $Lin_grid_add .= $this->$NM_func_grid_add($Seq_grid, 'S', '', array(), $nmgp_tab_label[$Cmp_grid]);
          $Lin_grid_add .= $this->grid_search_tag_end();
          $this->Arr_result = array();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $this->Arr_result['grid_add'][] = NM_charset_to_utf8($Lin_grid_add);
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_search_add']);
          exit;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      {
          $_SESSION['scriptcase']['saida_var'] = false; 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf")
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_resumo']);
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['res_hrz']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['res_hrz'] = $this->NM_totaliz_hrz;
      } 
      $this->NM_totaliz_hrz = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['res_hrz'];
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && !$this->NM_export)
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("chart_igd_hitung", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['iframe_menu'] && !$this->NM_export && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['array_graf_pdf'] = array();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_resumo'] = "";
      }
      $this->inicializa_vars();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_array_resumo'] == "OK" && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_total_geral'] == "OK")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              $Arr_tot_name = "array_total_" . $cmp_gb;
              $this->$Arr_tot_name = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['arr_total'][$cmp_gb];
          }
      }
      else
      {
          $this->array_total_tgl = array();
          $this->totaliza();
          $this->finaliza_arrays();
      }
      $Sv_tot_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['tot_geral'];
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_total_geral'] = "N";
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Ind_Groupby'];
      $tp_tot = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['Res_search_metric_use']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['Res_search_metric_use'])) ? true : false;
      $this->Total->$Gb_geral($tp_tot);
      $this->array_total_geral = array();
      $this->array_total_geral[0] = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['tot_geral'][1];
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['tot_geral'][1]) || $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['tot_geral'][1] == 0)
      {
          $this->NM_res_sem_reg = true;
      }
      if (isset($Sv_tot_ger))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['tot_geral'] = $Sv_tot_ger;
          unset($Sv_tot_ger);
      }
      $this->resumo_init();
          $this->resumo_sem_reg_chart();
      $this->completeMatrix();
      $this->buildMatrix();
      $this->buildChart();
      if ($b_export)
      {
          return;
      }
      if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          $this->Graf  = new chart_igd_hitung_grafico();
          $this->Graf->Db     = $this->Db;
          $this->Graf->Erro   = $this->Erro;
          $this->Graf->Ini    = $this->Ini;
          $this->Graf->Lookup = $this->Lookup;
          $this->Graf->monta_grafico();
          exit;
      }
      $this->resumo_final();
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_label_graf'] = array();
      if (isset($this->nmgp_label_quebras) && !empty($this->nmgp_label_quebras))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_label_graf'] = $this->nmgp_label_quebras;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['arr_total']['tgl'] = $this->array_total_tgl;
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['contr_array_resumo'] = "OK";
   }

   function completeMatrix()
   {
       $this->comp_align       = array();
       $this->comp_display     = array();
       $this->comp_field       = array();
       $this->comp_field_nm    = array();
       $this->comp_fill        = array();
       $this->comp_group       = array();
       $this->comp_index       = array();
       $this->comp_label       = array();
       $this->comp_links_fl    = array();
       $this->comp_links_gr    = array();
       $this->comp_order       = array();
       $this->comp_order_start = array();
       $this->comp_order_col   = '';
       $this->comp_order_level = '';
       $this->comp_order_sort  = '';
       $this->comp_sum         = array();
       $this->comp_sum_order   = array();
       $this->comp_sum_display = array();
       $this->comp_sum_dummy   = array();
       $this->comp_sum_fn      = array();
       $this->comp_sum_lnk     = array();
       $this->comp_sum_css     = array();
       $this->comp_sum_nm      = array();
       $this->comp_sum_fill_0  = false;
       $this->comp_tabular     = true;
       $this->comp_tab_hover   = true;
       $this->comp_tab_seq     = true ;
       $this->comp_tab_extend  = true;
       $this->comp_tab_label   = true;
       $this->comp_totals_a    = array();
       $this->comp_totals_al   = array();
       $this->comp_totals_g    = array();
       $this->comp_totals_x    = array();
       $this->comp_totals_y    = array();
       $this->comp_x_axys      = array();
       $this->comp_y_axys      = array();

       $this->build_total_row  = array();
       $this->build_col_count  = 0;

       $this->show_totals_x    = true;
       $this->show_totals_y    = true;
       //-----
       if ($this->NM_export && isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['json_use_label']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['json_use_label'])
       {
          $Lab_tgl = "Tgl";
       }
       else
       {
          $Lab_tgl = "Tgl";
          $Lab_tgl =  sprintf("" . $this->Ini->Nm_lang['lang_othr_chart_title_DD'] . " Tgl", $Lab_tgl);
       }
       $prep_field = array();
       $prep_field['tgl'] = $Lab_tgl;
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['labels']['tgl'] = $Lab_tgl; 
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          $Str_gb .= ($Str_gb == "") ? "" : ",";
          $Str_gb .= '"' . $prep_field[$cmp_gb] . '"';
       }
       eval ("\$this->comp_field = array(" . $Str_gb . ");");;

       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['labels']['tgl']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['labels']['tgl'] = "Tgl"; 
       }
       //-----
       $ix = 0;
       $this->comp_field_nm = array();
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
           $this->comp_field_nm[$cmp_gb] = $ix;
           $ix++;
       }

       //-----
       $this->comp_sum = array(
           2 => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
       );

       //-----
       $this->comp_sum_order = array(
           2,
       );

       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_order']['sc_free_group_by']))
       {
           foreach ($this->comp_sum as $i_sum => $l_sum)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_order']['sc_free_group_by'][] = $i_sum;
           }
       }
       else
       {
           $this->comp_sum_order = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_order']['sc_free_group_by'];
       }

       //-----
       $this->comp_sum_display = array(
           2 => true,
       );

           foreach ($this->comp_sum as $i_sum => $l_sum)
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'][$i_sum]))
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'][$i_sum] = array('label' => $l_sum, 'display' => $this->comp_sum_display[$i_sum]);
               }
               else
               {
                   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'][$i_sum]['label']))
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'][$i_sum]['label'] = $l_sum;
                   }
                   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'][$i_sum]['display']))
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'][$i_sum]['display'] = $this->comp_sum_display[$i_sum];
                   }
               }
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'] as $i_sum => $d_sum)
           {
               $this->comp_sum_display[$i_sum] = $d_sum['display'];
           }

       //-----
       $this->comp_sum_dummy = array(
           0,
           0,
       );

       //-----
       $this->comp_sum_fn = array(
           2 => "C",
       );

       //-----
       $this->comp_sum_lnk = array(
           2 => array('field' => "nm_count", 'show' => false),
       );

       //-----
       $this->comp_sum_css = array(
           2 => "css___nm_count_nm___cnt",
       );

       //-----
       $this->comp_sum_nm = array(
           2 => "__nm_count_nm___cnt",
       );

       //-----
      $Str_gb   = "";
      $Arr_gb   = array();
      $Arr_name = array();
      $Arr_lab  = array();
      $Control  = "";
      $Ctr_lab  = "";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
      {
          $Arr_gb[]   = $cmp_gb;
          $Arr_name[] = "array_total_" . $cmp_gb . $Control;
          $Arr_lab[]  = $Ctr_lab;
          $Control   .= "[\$campo_" . $cmp_gb . "]";
          $Ctr_lab   .= "[\$dados_" . $cmp_gb . "[3]]";
      }
      for ($ix = 0; $ix < sizeof($Arr_gb); $ix++)
      {
          $Str_gb .= "foreach (\$this->" . $Arr_name[$ix] . " as \$campo_" . $Arr_gb[$ix] . " => \$dados_" . $Arr_gb[$ix] . ")";
          $Str_gb .= "{";
          $Str_gb .= "    if (!in_array(\$campo_" . $Arr_gb[$ix] . ", \$this->comp_label[" . $ix . "]" . $Arr_lab[$ix] . ", true)) {";
          $Str_gb .= "         \$this->comp_index[" . $ix . "][\$dados_" . $Arr_gb[$ix] . "[3] ] = \$dados_" . $Arr_gb[$ix] . "[2];";
          $Str_gb .= "         \$this->comp_label[" . $ix . "]" . $Arr_lab[$ix] . "[ \$dados_" . $Arr_gb[$ix] . "[3] ] = \$dados_" . $Arr_gb[$ix] . "[2];";
          $Str_gb .= "    }";
      }
      for ($ix = 0; $ix < sizeof($Arr_gb); $ix++)
      {
          $Str_gb .= "}";
      }
      eval ($Str_gb);

       //-----
       $x = 0;
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          $Str_gb .= ($x == 0) ? $x : ", " . $x;
          $x++;
       }
       eval ("\$this->comp_y_axys = array(" . $Str_gb . ");");;
       $this->comp_x_axys = array();

       $Arr_parms = array();
       $Arr_parms['tgl']['alin'] = "''";
       $Arr_parms['tgl']['link'] = "S";
       $Arr_parms['tgl']['fill'] = "true";
       $Arr_parms['tgl']['order'] = "value";
       $Arr_parms['tgl']['order_start'] = 'asc';
       $Arr_parms['tgl']['order_invert'] = 'false';
       $Arr_parms['tgl']['order_enabled'] = 'true';
       //-----
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          $Str_gb .= ($Str_gb == "") ? "" : ", ";
          $Str_gb .= $Arr_parms[$cmp_gb]['alin'];
       }
       eval ("\$this->comp_align = array(" . $Str_gb . ");");;

       //-----
       $x = 0;
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
           if ($Arr_parms[$cmp_gb]['link'] == "S")
           {
              $Str_gb .= ($Str_gb == "") ? $x : ", " . $x;
           }
          $x++;
       }
       eval ("\$this->comp_links_gr = array(" . $Str_gb . ");");;

       //-----
       $prep_links_fl = array();
       $prep_links_fl['tgl'] = array(0 => 'tgl', 1 => '@aspass@');
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $col_sql)
       {
           if (isset($prep_links_fl[$cmp_gb]))
           {
              $Str_gb .= "array('name' => '" . $prep_links_fl[$cmp_gb][0] . "', 'prot' => '" . $prep_links_fl[$cmp_gb][1] . "'),";
           }
       }
       eval ("\$this->comp_links_fl = array(" . $Str_gb . ");");;

       //-----
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          $Str_gb .= ($Str_gb == "") ? "" : ", ";
          $Str_gb .= $Arr_parms[$cmp_gb]['fill'];
       }
       eval ("\$this->comp_fill = array(" . $Str_gb . ");");;

       //-----
       $x = 0;
       $Str_gb = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          $Str_gb .= ($Str_gb == "") ? $x : ", " . $x;
          $Str_gb .= " => 'label'";
          $x++;
       }
       eval ("\$this->comp_display = array(" . $Str_gb . ");");;

       //-----
       $Str_gb  = "";
       $Str_gbs = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          $Str_gb  .= ($Str_gb == "") ? "" : ", ";
          $Str_gb  .= $Arr_parms[$cmp_gb]['order'];
          $Str_gbs .= ($Str_gbs == "") ? "" : ", ";
          $Str_gbs .= $Arr_parms[$cmp_gb]['order_start'];
          $Str_gbi .= ($Str_gbi == "") ? "" : ", ";
          $Str_gbi .= $Arr_parms[$cmp_gb]['order_invert'];
          $Str_gbe .= ($Str_gbe == "") ? "" : ", ";
          $Str_gbe .= $Arr_parms[$cmp_gb]['order_enabled'];
       }
       eval ("\$this->comp_order = array(" . $Str_gb . ");");;
       eval ("\$this->comp_order_start = array(" . $Str_gbs . ");");;
       eval ("\$this->comp_order_invert = array(" . $Str_gbi . ");");;
       eval ("\$this->comp_order_enabled = array(" . $Str_gbe . ");");;

       //-----
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_group_by'] = $this->comp_field;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_x_axys']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_x_axys'] = $this->comp_x_axys;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys'] = $this->comp_y_axys;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_fill']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_fill'] = $this->comp_fill;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order'] = $this->comp_order;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_start']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_start'] = $this->comp_order_start;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular'] = $this->comp_tabular;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_hover']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_hover'] = $this->comp_tabular && $this->comp_tab_hover;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_seq']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_seq'] = $this->comp_tabular && $this->comp_tab_seq;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_label']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_label'] = $this->comp_tabular && $this->comp_tab_label;
       }

       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_col']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_col'] = 0;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_level']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_level'] = 0;
       }
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_sort']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_sort'] = '';
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'] && isset($_POST['parm']))
       { 
           $todo  = explode("*scout", $_POST['parm']);
           foreach ($todo as $param)
           {
               $cadapar = explode("*scin", $param);
               $_POST[$cadapar[0]] = $cadapar[1];
           }
        } 
       if (isset($_POST['change_sort']) && 'Y' == $_POST['change_sort'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_sort'] = $_POST['sort_ord'];
           if ('' == $_POST['sort_ord'])
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_col']  = 0;
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_col']  = $_POST['sort_col'];
           }
       }
       if (isset($_POST['change_sort']) && 'NEW' == $_POST['change_sort']) {
           for ($i = 0; $i < sizeof($this->comp_label); $i++) {
               if ($i == $_POST['sort_col']) {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_start'][$i] = $_POST['sort_ord'];
               }
           }
       }

       $this->comp_x_axys      = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_x_axys'];
       $this->comp_y_axys      = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_y_axys'];
       $this->comp_fill        = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_fill'];
       $this->comp_order       = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order'];
       $this->comp_order_start = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_start'];
       $this->comp_order_col   = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_col'];
       $this->comp_order_level = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_level'];
       $this->comp_order_sort  = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_sort'];
       $this->comp_tabular     = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular'];
       $this->comp_tab_hover   = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_hover'];
       $this->comp_tab_seq     = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_seq'];
       $this->comp_tab_label   = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_tabular_label'];

       //-----
       for ($i = 0; $i < sizeof($this->comp_label); $i++) {
           if ('label' == $this->comp_order[$i]) {
               if (('desc' == $this->comp_order_start[$i] && !$this->comp_order_invert[$i]) || ('asc' == $this->comp_order_start[$i] && $this->comp_order_invert[$i]))
               {
                   $sortFn = 'arsort';
                   arsort($this->comp_index[$i]);
               }
               else
               {
                   $sortFn = 'asort';
                   asort($this->comp_index[$i]);
               }
               $this->comp_label[$i] = $this->arrangeLabelList($this->comp_label[$i], $i, $sortFn);
           }
           else {
               if (('desc' == $this->comp_order_start[$i] && !$this->comp_order_invert[$i]) || ('asc' == $this->comp_order_start[$i] && $this->comp_order_invert[$i]))
               {
                   $sortFn = 'krsort';
                   krsort($this->comp_index[$i]);
               }
               else
               {
                   $sortFn = 'ksort';
                   ksort($this->comp_index[$i]);
               }
               $this->comp_label[$i] = $this->arrangeLabelList($this->comp_label[$i], $i, $sortFn);
           }
       }

       //-----
      $Str_gb   = "";
      $Arr_gb   = array();
      $Arr_name = array();
      $Arr_lab  = array();
      $Arr_grp  = array();
      $Control  = "";
      $Ctr_grp  = "";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
      {
          $Ctr_grp   .= "[\$campo_" . $cmp_gb . "]";
          $Arr_gb[]   = $cmp_gb;
          $Arr_name[] = "array_total_" . $cmp_gb;
          $Arr_lab[]  = $Control;
          $Arr_grp[]  = $Ctr_grp;
          $Control   .= "[\$campo_" . $cmp_gb . "]";
      }
      for ($ix = 0; $ix < sizeof($Arr_gb); $ix++)
      {
          $Str_gb .= "foreach (\$this->comp_label[" . $ix . "]" . $Arr_lab[$ix] . " as \$campo_" . $Arr_gb[$ix] . " => \$dados_" . $Arr_gb[$ix] . ") {";
          $Str_gb .= "    if (isset(\$this->" . $Arr_name[$ix] . $Arr_grp[$ix] . ")) {";
          $Str_gb .= "        \$this->comp_group" . $Arr_grp[$ix] . " = array();";
          $Str_gb .= "    }";
      }
      for ($ix = 0; $ix < sizeof($Arr_gb); $ix++)
      {
          $Str_gb .= "}";
      }
      eval ($Str_gb);

   }

   function arrangeLabelList($label, $level, $method) {
       $new_label = $label;

       if (0 == $level) {
           if ('reverse' == $method) {
               $new_label = array_reverse($new_label, true);
           }
           elseif ('asort' == $method) {
               asort($new_label);
           }
           else {
               ksort($new_label);
           }
       }
       else {
           foreach ($label as $i => $sub_label) {
               $new_label[$i] = $this->arrangeLabelList($sub_label, $level - 1, $method);
           }
       }

       return $new_label;
   }

   function getCompData($level, $params = array()) {
      $Str_gb   = "";
      $Arr_name = array();
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
      {
          $Arr_name[] = "array_total_" . $cmp_gb;
      }
      for ($ix = 0; $ix < sizeof($Arr_name); $ix++)
      {
          $Str_gb .= "    if (\$level == " . $ix . ") {";
          $Str_gb .= "        \$return = \$this->" . $Arr_name[$ix] . ";";
          $Str_gb .= "    }";
      }
      eval ($Str_gb);

       if (array() == $params) {
           return $return;
       }

       foreach ($params as $i_param => $param) {
           if (!isset($return[$param])) {
               return 0;
           }

           $return = $return[$param];
       }

       return $return;
   }   

   function buildMatrix()
   {
       $this->build_labels = $this->getXAxys();
       $this->build_data   = $this->getYAxys();
   }

   function getXAxys()
   {
       $a_axys = array();

       if (0 == sizeof($this->comp_x_axys))
       {
           if (0 < sizeof($this->comp_sum))
           {
               foreach ($this->comp_sum_order as $i_sum)
               {
                   if ($this->comp_sum_display[$i_sum])
                   {
                       $l_sum = $this->comp_sum[$i_sum];
                       $chart    = '0|' . ($i_sum - 1) . '|';
                       $a_axys[] = array(
                           'group'    => 1,
                           'value'    => $i_sum,
                           'label'    => $l_sum,
                           'function' => $this->comp_sum_fn[$i_sum],
                           'params'   => array($i_sum - 1),
                           'children' => array(),
                           'chart'    => $chart,
                           'css'      => isset($this->comp_sum_css[$i_sum]) ? $this->comp_sum_css[$i_sum] : '',
                       );
                   }
               }
           }
           else
           {
               $a_axys = array();
           }
           $a_labels[] = $a_axys;

           $this->build_col_count = count($a_labels[0]);
       }
       else
       {
           foreach ($this->comp_index[0] as $i_group => $l_group)
           {
               $a_params = array($i_group);
               $a_axys[] = array(
                   'group'    => 0,
                   'value'    => $i_group,
                   'label'    => $l_group,
                   'params'   => $a_params,
                   'children' => $this->addChildren(1, $this->comp_fill[1], $this->comp_group[$i_group], $a_params),
               );
           }

           $a_labels = array();
           $this->addChildrenLabel($a_axys, $a_labels);

           $this->build_col_count = 0;
           if (isset($a_labels[0])) {
               foreach ($a_labels[0] as $labelInfo) {
                   if (isset($labelInfo['colspan'])) {
                       $this->build_col_count += $labelInfo['colspan'];
                   }
               }
           }
       }

       if ($this->show_totals_x && 0 < sizeof($this->comp_x_axys))
       {
           $a_labels[0][] = array(
               'group'   => -1,
               'value'   => $this->Ini->Nm_lang['lang_othr_chrt_totl'],
               'label'   => $this->Ini->Nm_lang['lang_othr_chrt_totl'],
               'params'  => array(),
               'colspan' => sizeof($this->comp_sum),
               'rowspan' => sizeof($this->comp_x_axys),
           );
           foreach ($this->comp_sum_order as $i_sum)
           {
               if ($this->comp_sum_display[$i_sum])
               {
                   $s_label = $this->comp_sum[$i_sum];
                   $a_labels[sizeof($this->comp_x_axys)][] = array(
                       'group'    => -1,
                       'value'    => $s_label,
                       'label'    => $s_label,
                       'function' => $this->comp_sum_fn[$i_sum],
                       'params'   => array(),
                       'chart'    => 'T|' . ($i_sum - 1),
                           'css'      => isset($this->comp_sum_css[$i_sum]) ? $this->comp_sum_css[$i_sum] : '',
                   );
               }
           }
       }

       return $a_labels;
   }

   function addChildren($group, $fill, $children, $params)
   {
       if (!isset($this->comp_x_axys[$group]))
       {
           if (0 < sizeof($this->comp_sum))
           {
               $a_sum = array();
               foreach ($this->comp_sum_order as $i_sum)
               {
                   if ($this->comp_sum_display[$i_sum])
                   {
                       $l_sum = $this->comp_sum[$i_sum];
                       $chart    = $group . '|' . ($i_sum - 1) . '|' . implode('|', $params);
                       $params_n = array_merge($params, array($i_sum - 1));
                       $a_sum[] = array(
                           'group'    => $group,
                           'value'    => $i_sum,
                           'label'    => $l_sum,
                           'function' => $this->comp_sum_fn[$i_sum],
                           'params'   => $params_n,
                           'children' => array(),
                           'chart'    => $chart,
                           'css'      => isset($this->comp_sum_css[$i_sum]) ? $this->comp_sum_css[$i_sum] : '',
                       );
                   }
               }
               return $a_sum;
           }
           else
           {
               return array();
           }
       }

       $a_axys = array();

       if ($fill)
       {
           foreach ($this->comp_index[$group] as $i_group => $l_group)
           {
               $params_n = array_merge($params, array($i_group));
               $a_axys[] = array(
                   'group'    => $group,
                   'value'    => $i_group,
                   'label'    => $l_group,
                   'params'   => $params_n,
                   'children' => $this->addChildren($group + 1, $this->comp_fill[$group + 1], $children[$i_group], $params_n),
               );
           }
       }
       else
       {
           foreach ($children as $i_group => $a_group)
           {
               $params_n = array_merge($params, array($i_group));
               $a_axys[] = array(
                   'group'    => $group,
                   'value'    => $i_group,
                   'label'    => $this->comp_index[$group][$i_group],
                   'params'   => $params_n,
                   'children' => $this->addChildren($group + 1, $this->comp_fill[$group + 1], $children[$i_group], $params_n),
               );
           }
       }

       return $a_axys;
   }

   function countChildren($children)
   {
       if (empty($children))
       {
           return 1;
       }

       $i = 0;
       foreach ($children as $data)
       {
           $i += $this->countChildren($data['children']);
       }
       return $i;
   }

   function addChildrenLabel($children, &$a_labels)
   {
       foreach ($children as $a_cols)
       {
           $a_labels[$a_cols['group']][] = array(
               'group'    => $a_cols['group'],
               'value'    => $a_cols['value'],
               'label'    => $a_cols['label'],
               'function' => isset($a_cols['function']) ? $a_cols['function'] : '',
               'params'   => $a_cols['params'],
               'colspan'  => $this->countChildren($a_cols['children']),
               'chart'    => isset($a_cols['chart']) ? $a_cols['chart'] : '',
               'css'      => isset($a_cols['css'])   ? $a_cols['css']   : '',
           );
           if (!empty($a_cols['children']))
           {
               $this->addChildrenLabel($a_cols['children'], $a_labels);
           }
       }
   }

   function getYAxys()
   {
       $a_axys = array();

       $this->addYChildren(0, $this->comp_group, $a_axys, array());
       $this->fixOrder($a_axys);
       $this->orderBy($a_axys, $this->comp_order_sort, $this->comp_order_col - 1, 0, array());
       $this->comp_chart_axys = $a_axys;

       $a_data              = array();
       $i_row               = 0;
       $this->subtotal_data = array();
       $this->addYChildrenData($a_axys, $a_data, $i_row, 0, array(), array());

       if (!empty($this->subtotal_data))
       {
           end($this->subtotal_data);
           $i_max = key($this->subtotal_data);
           for ($i = $i_max; $i >= 0; $i--)
           {
               $this->build_total_row[] = true;
               $a_data[] = $this->subtotal_data[$i];
           }
       }

       $this->makeTabular($a_data);

       $this->buildTotalsY($a_data);

       return $a_data;
   }

   function addYChildren($group, $tree, &$axys, $param)
   {
       $comp_label = $this->comp_label[$group];
       $tmp_param  = $param;
       while (!empty($tmp_param))
       {
           $tmp_index  = array_shift($tmp_param);
           $comp_label = $comp_label[$tmp_index];
       }
       foreach ($comp_label as $i_group => $l_group)
       {
           if (isset($tree[$i_group]))
           {
               $new_param = array_merge($param, array($i_group));
               if (in_array($group, $this->comp_y_axys))
               {
                   if (!isset($axys[$i_group]))
                   {
                       $axys[$i_group] = array(
                           'group'    => $group,
                           'value'    => $i_group,
                           'label'    => $l_group,
                           'children' => array(),
                       );
                   }
                   $this->addYChildren($group + 1, $tree[$i_group], $axys[$i_group]['children'], $new_param);
               }
               else
               {
                   $this->addYChildren($group + 1, $tree[$i_group], $axys, $new_param);
               }
           }
       }
   }

   function fixOrder(&$axys)
   {
       $n_axys = array();
       $key    = key($axys);
       $group  = $axys[$key]['group'];

       foreach ($this->comp_index[$group] as $i_group => $l_group)
       {
           if (isset($axys[$i_group]))
           {
               $n_axys[$i_group] = $axys[$i_group];
           }
           if (!empty($n_axys[$i_group]['children']))
           {
               $this->fixOrder($n_axys[$i_group]['children']);
           }
       }

       $axys = $n_axys;
   }

   function orderBy(&$axys, $ord, $col, $level, $keys)
   {
       if (-1 == $col || '' == $ord)
       {
           return;
       }

       if ($this->comp_order_level <= $level)
       {
           $n_axys = array();
           $o_axys = array();

           foreach ($axys as $i_group => $d_group)
           {
               $o_axys[$i_group] = 0;
           }

           $a_order = $this->getOrderArray($this->getCompData($level), $ord, $col, $keys, $o_axys);

           foreach ($a_order as $i_group => $v_group)
           {
               $n_axys[$i_group] = $axys[$i_group];
           }

           $axys = $n_axys;
       }

       foreach ($axys as $i_group => $d_group)
       {
           if (!empty($d_group['children']))
           {
               $n_keys = array_merge($keys, array($i_group));
               $this->orderBy($axys[$i_group]['children'], $ord, $col, $level + 1, $n_keys);
           }
       }
   }

   function getOrderArray($data, $ord, $col, $keys, $elem)
   {
       while (!empty($keys))
       {
           $key = key($keys);

           if (isset($data[ $keys[$key] ]))
           {
               $data = $data[ $keys[$key] ];
           }

           unset($keys[$key]);
       }

       foreach ($elem as $i_group => $v_group)
       {
           if (isset($data[$i_group]) && isset($data[$i_group][$col]))
           {
               $elem[$i_group] = $data[$i_group][$col];
           }
       }

       if ('a' == $ord)
       {
           asort($elem);
       }
       else
       {
           arsort($elem);
       }

       return $elem;
   }

   function addYChildrenData($axys, &$data, &$row, $level, $params, $tab_col)
   {
       foreach ($axys as $i_data)
       {
           $params_n = array_merge($params, array($i_data['value']));
           if (sizeof($this->comp_y_axys) > $level + 1)
           {
               $tab_col[$level]['label'] = $i_data['label'];
               $tab_col[$level]['group'] = $i_data['group'];
           }
           $b_subtotal = !(!$this->comp_tabular || ($this->comp_tabular && sizeof($this->comp_y_axys) == $level + 1));
           if (1)
           {
               $new_data = array();
               if ($this->comp_tabular)
               {
                   foreach ($tab_col as $i_tab_col => $a_col_data)
                   {
                       $new_data[] = array(
                           'level'  => $level,
                           'label'  => $a_col_data['label'],
                           'link'   => '',
                       );
                   }
               }
               if (!$b_subtotal)
               {
                   $new_data[] = array(
                       'level'  => $level,
                       'group'  => $i_data['group'],
                       'value'  => $i_data['value'],
                       'label'  => $i_data['label'],
                       'params' => $params_n,
                       'link'   => '',
                   );
               }
               elseif ($this->comp_tab_extend && $this->comp_tab_hover)
               {
                   $last_item                           = count($new_data) - 1;
                   $new_data[$last_item]['colspan']    = sizeof($this->comp_y_axys) - sizeof($params_n) + 1;
                   $new_data[$last_item]['display_as'] = 'subtotal';
                   if (!$this->comp_tab_label)
                   {
                       $new_data[$last_item]['label'] = $this->Ini->Nm_lang['lang_othr_chrt_totl'];
                   }
                   $new_data[$last_item]['link'] = '';
               }
               else
               {
                   $last_item = count($new_data) - 1;
                   $new_data[] = array(
                       'level'      => $level,
                       'group'      => $i_data['group'],
                       'value'      => $this->Ini->Nm_lang['lang_othr_chrt_totl'],
                       'label'      => $this->comp_tab_label ? $new_data[$last_item]['label'] : $this->Ini->Nm_lang['lang_othr_chrt_totl'],
                       'params'     => $params_n,
                       'link'       => '',
                       'colspan'    => sizeof($this->comp_y_axys) - sizeof($params_n),
                       'display_as' => 'subtotal'
                   );
               }
               $a_columns = 1 == sizeof($this->build_labels)
                          ? current($this->build_labels)
                          : $this->build_labels[sizeof($this->build_labels) - 1];
               if (0 < sizeof($this->comp_x_axys))
               {
                   $this->initTotalsX();
               }
               $i = 0;
               foreach ($a_columns as $a_col_data)
               {
                   if (-1 < $a_col_data['group'])
                   {
                       $val = $this->getCellValue($a_col_data['params'], $params_n);
                       $fmt = isset($a_col_data['params']) ? $a_col_data['params'][sizeof($a_col_data['params']) - 1] : 0;
                       $key = '';
                       $lnk = $this->getDataLinkParams($params_n, $a_col_data['params']);
                       if (1 == sizeof($this->comp_x_axys))
                       {
                           $key = $this->addTotalsG($i_data, $a_col_data, $params, $val);
                       }
                       unset($a_col_data['chart']);
                       if (sizeof($this->comp_y_axys) - 1 > $level)
                       {
                           $a_chart_params = $a_col_data['params'];
                           unset($a_chart_params[sizeof($a_col_data['params']) - 1]);
                           if (0 < sizeof($params_n))
                           {
                               for ($j = 0; $j < sizeof($params_n); $j++)
                               {
                                   $a_chart_params[] = $params_n[$j];
                               }
                           }
                           $a_col_data['chart'] = ($i_data['group'] + 1). '|' . $fmt . '|' . implode('|', $a_chart_params);
                       }
                       $new_data[] = array(
                           'level'     => -1,
                           'value'     => $val,
                           'format'    => $fmt,
                           'link_fld'  => $fmt + 1,
                           'link_data' => $lnk,
                           'chart'     => isset($a_col_data['chart']) ? $a_col_data['chart'] : '',
                           'css'       => isset($a_col_data['css'])   ? $a_col_data['css']   : '',
                           'subtotal'  => $b_subtotal,
                       );
                       $aCellColP = $a_col_data['params'];
                       if (0 < sizeof($this->comp_x_axys))
                       {
                           $i_col_x = array_pop($a_col_data['params']);
                           $this->addTotalsX($i_col_x, $val, $key);
                           if (0 == $level && 0 < sizeof($this->comp_x_axys))
                           {
                               $this->addTotalsA ('anal', $i_col_x, $val, $a_col_data['params'][0]);
                               $this->addTotalsAL('anal', $i_col_x, $val, $i_data['value']);
                           }
                       }
                       if (($this->comp_tabular || 0 == $level) && !$b_subtotal)
                       {
                           $iTotalP   = array_pop($aCellColP);
                           $aCellParams = array(
                               'col' => $aCellColP,
                               'row' => array(),
                               'fnc' => $iTotalP
                           );
                           $this->addTotalsY($i, $val, $a_col_data['function'], $fmt, $aCellParams);
                       }
                       $i++;
                   }
               }
               if (0 < sizeof($this->comp_x_axys))
               {
                   $this->buildTotalsX($new_data, $i, $level, $i_data['label'], $b_subtotal);
               }
               if (!$b_subtotal)
               {
                   $this->build_total_row[$row] = false;
                   $data[$row] = $new_data;
                   $row++;
               }
               elseif ($this->show_totals_y && !empty($this->comp_sum))
               {
                   if (!isset($this->subtotal_data[$level]))
                   {
                       $this->subtotal_data[$level] = $new_data;
                   }
                   else
                   {
                       end($this->subtotal_data);
                       $i_max = key($this->subtotal_data);
                       for ($i = $i_max; $i >= $level; $i--)
                       {
                           $this->build_total_row[$row] = true;
                           $data[$row] = $this->subtotal_data[$i];
                           $row++;
                           if ($i != $level)
                           {
                               unset($this->subtotal_data[$i]);
                           }
                       }
                       $this->subtotal_data[$level] = $new_data;
                   }
               }
           }
           $this->addYChildrenData($i_data['children'], $data, $row, $level + 1, $params_n, $tab_col);
       }
   }

   function getDataLinkParams($param, $col)
   {
       $a_par = array();

       if (1 < sizeof($col))
       {
           for ($i = 0; $i < sizeof($col) - 1; $i++)
           {
               $a_par[] = $col[$i];
           }
       }

       return implode('|', array_merge($a_par, $param));
   }

   function getDataLink($field, $data, $value)
   {
       if (!isset($this->comp_sum_lnk[$field]) || !$this->comp_sum_lnk[$field]['show'])
       {
           return $value;
       }

       $s_link_field = $this->comp_sum_lnk[$field]['field'];

       $a_link = array(
       );

       if (!isset($a_link[$s_link_field]))
       {
           return $value;
       }

       $a_data = explode('|', $data);
       $a_par  = array();
       $b_ok   = true;

       foreach ($a_link[$s_link_field]['param'] as $s_param => $a_param)
       {
           if ('C' == $a_param['type'])
           {
               if (!isset($a_data[ $this->comp_field_nm[ $a_param['value'] ] ]))
               {
                   $b_ok = false;
               }
               else
               {
                   $a_par[$s_param] = $a_data[ $this->comp_field_nm[ $a_param['value'] ] ];
               }
           }
           else
           {
               $a_par[$s_param] = $a_param['value'];
           }
       }

       if (!$b_ok)
       {
           return $value;
       }

       $b_modal = false;
       if (false !== strpos($a_link[$s_link_field]['html'], '__NM_FLD_PAR_M__'))
       {
           $b_modal                       = true;
           $a_link[$s_link_field]['html'] = str_replace('__NM_FLD_PAR_M__', '__NM_FLD_PAR__', $a_link[$s_link_field]['html']);
       }

       $return = str_replace('__NM_FLD_PAR__', $this->getDataLinkValue($a_par), $a_link[$s_link_field]['html']) . $value . '</a>';

       return $b_modal ? $this->getModalLink($return) :  $return;
   }

   function getDataLinkValue($param)
   {
       $a_links = array();

       foreach ($param as $i => $v)
       {
           $a_links[] = $i . '?#?' . $v;
       }

       return implode('?@?', $a_links);
   }

   function getModalLink($param)
   {
       return str_replace(array('?#?', '?@?'), array('*scin', '*scout'), $param);
   }

   function getLabelLink($param, $i_tmp = -1, $bProtect = true)
   {
       $a_links = array();

       if (-1 == $i_tmp)
       {
           foreach ($param as $i => $v)
           {
               $i_fld     = $i + sizeof($this->comp_x_axys);
               $a_links[] = $this->comp_links_fl[$i_fld]['name'] . '?#?' . $this->comp_links_fl[$i_fld]['prot'] . addslashes($this->getChartText($v, $bProtect)) . $this->comp_links_fl[$i_fld]['prot'];
           }
       }
       else
       {
           for ($i = 0; $i <= $i_tmp; $i++)
           {
               $v         = $param[$i];
               $i_fld     = $i + sizeof($this->comp_x_axys);
               $a_links[] = $this->comp_links_fl[$i_fld]['name'] . '?#?' . $this->comp_links_fl[$i_fld]['prot'] . addslashes($this->getChartText($v, $bProtect)) . $this->comp_links_fl[$i_fld]['prot'];
           }
       }

       $Parms_Res  = implode('?@?', $a_links);
       $Md5_Res    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@chart_igd_hitung@SC_par@" . md5($Parms_Res);
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['LigR_Md5'][md5($Parms_Res)] = $Parms_Res;
       return $Md5_Res;
   }

   function getChartLink($param, $bProtect = true)
   {
       $a_links = array();

       foreach ($param as $i => $v)
       {
           $a_links[] = $this->comp_links_fl[$i]['name'] . '?#?' . $this->comp_links_fl[$i]['prot'] . $this->getChartText($v, $bProtect) . $this->comp_links_fl[$i]['prot'];
       }

       return implode('?@?', $a_links);
   }

   function getCellValue($aColPar, $aRowPar)
   {
       $i_tot = array_pop($aColPar);
       $a_val = (0 == sizeof($this->comp_x_axys))
              ? array_merge($aRowPar, array($i_tot))
              : array_merge($aColPar, $aRowPar, array($i_tot));
       return $this->getCompDataCell($a_val, $this->getCompData(sizeof($aColPar) + sizeof($aRowPar) - 1));
   }

   function getCompDataCell($par, $data)
   {
       $key = key($par);
       $cur = $par[$key];
       if (is_array($data[$cur]))
       {
           unset($par[$key]);
           return $this->getCompDataCell($par, $data[$cur]);
       }
       elseif (isset($data[$cur]))
       {
           return $data[$cur];
       }
       elseif (!$this->comp_sum_fill_0)
       {
           return '';
       }
       else
       {
           return 0;
       }
   }

   function makeTabular(&$a_data)
   {
       if ($this->comp_tabular)
       {
           $a_labels = array();
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf_vert'])
   {
     $this->comp_tab_hover = true;
   }
           if ($this->comp_tab_hover)
           {
               foreach ($a_data as $row => $columns)
               {
                   for ($i = 0; $i < sizeof($this->comp_y_axys) - 1; $i++)
                   {
                      if (!isset($a_labels[$i]))
                      {
                          $a_labels[$i] = '';
                      }
                      if (isset($a_data[$row][$i]) && !isset($a_data[$row][$i]['display_as']))
                      {
                          if ($a_labels[$i] == $columns[$i]['label'])
                          {
                              $a_data[$row][$i]['display_as'] = 'none';
                          }
                          else
                          {
                              $a_data[$row][$i]['display_as'] = 'auto';
                          }
                      }
                      $a_labels[$i] = $columns[$i]['label'];
                   }
               }
           }
           else
           {
               foreach ($a_data as $row => $columns)
               {
                   for ($i = 0; $i < sizeof($this->comp_y_axys) - 1; $i++)
                   {
                       if (!isset($a_labels[$i]))
                       {
                           $a_labels[$i] = array(
                               'old'  => $columns[$i]['label'],
                               'row'  => $row,
                               'span' => 1,
                           );
                       }
                       elseif ($a_labels[$i]['old'] == $columns[$i]['label'])
                       {
                           unset($a_data[$row][$i]);
                           $a_labels[$i]['span']++;
                       }
                       else
                       {
                           $a_data[ $a_labels[$i]['row'] ][$i]['rowspan'] = $a_labels[$i]['span'];
                           $a_labels[$i]['old']  = $columns[$i]['label'];
                           $a_labels[$i]['row']  = $row;
                           $a_labels[$i]['span'] = 1;
                       }
                   }
               }
               foreach ($a_labels as $i_col => $a_col_data)
               {
                   $a_data[ $a_col_data['row'] ][$i_col]['rowspan'] = $a_col_data['span'];
               }
           }
       }
   }

   function initTotalsX()
   {
       $this->comp_totals_x = array();

       if (!$this->show_totals_x)
       {
           return;
       }

       foreach ($this->comp_sum_order as $i_sum)
       {
           if ($this->comp_sum_display[$i_sum])
           {
               $l_sum = $this->comp_sum[$i_sum];
               $this->comp_totals_x[$i_sum - 1] = array('values' => array(), 'chart' => '');
           }
       }
   }

   function addTotalsX($col, $val, $chart)
   {
       if (!$this->show_totals_x)
       {
           return;
       }

       $this->comp_totals_x[$col]['chart']    = $chart;
       $this->comp_totals_x[$col]['values'][] = $val;
   }

   function buildTotalsX(&$row, $col, $level, $label, $sub)
   {
       if (!$this->show_totals_x)
       {
           return;
       }

       foreach ($this->comp_sum_order as $i_sum)
       {
           if ($this->comp_sum_display[$i_sum])
           {
               $l_sum = $this->comp_sum[$i_sum];
               $i_temp[$i_sum - 1] = '';
           }
       }

       $key = key($this->comp_totals_x);

       for ($i = 0; $i < sizeof($this->comp_totals_x[$key]['values']); $i++)
       {
           foreach ($this->comp_sum_order as $i_sum)
           {
               if ($this->comp_sum_display[$i_sum])
               {
                   $l_sum = $this->comp_sum[$i_sum];
                   if ('' == $i_temp[$i_sum - 1])
                   {
                       $i_temp[$i_sum - 1] = $this->comp_totals_x[$i_sum - 1]['values'][$i];
                   }
                   elseif ('M' == $this->comp_sum_fn[$i_sum] && '' !== $this->comp_totals_x[$i_sum - 1]['values'][$i])
                   {
                       $i_temp[$i_sum - 1] = min($i_temp[$i_sum - 1], $this->comp_totals_x[$i_sum - 1]['values'][$i]);
                   }
                   elseif ('X' == $this->comp_sum_fn[$i_sum])
                   {
                       $i_temp[$i_sum - 1] = max($i_temp[$i_sum - 1], $this->comp_totals_x[$i_sum - 1]['values'][$i]);
                   }
                   else
                   {
                       $i_temp[$i_sum - 1] += $this->comp_totals_x[$i_sum - 1]['values'][$i];
                   }
               }
           }
       }
       foreach ($this->comp_sum as $i_sum => $l_sum)
       {
           if ('A' == $this->comp_sum_fn[$i_sum])
           {
               $i_temp[$i_sum - 1] /= sizeof($this->comp_totals_x[$i_sum - 1]['values']);
           }
           if ('%' == $this->comp_sum_fn[$i_sum])
           {
               $i_temp[$i_sum - 1] = 100.00;
           }
       }
       foreach ($this->comp_sum_order as $i_sum)
       {
           if ($this->comp_sum_display[$i_sum])
           {
               $l_sum = $this->comp_sum[$i_sum];
               $row[] = array(
                   'total'  => true,
                   'level'  => -1,
                   'value'  => $i_temp[$i_sum - 1],
                   'format' => $i_sum - 1,
                   'chart'  => $this->comp_totals_x[$i_sum - 1]['chart'],
               );
               if (0 == $level && 0 < sizeof($this->comp_x_axys))
               {
                   $this->addTotalsA('sint', $i_sum - 1, $i_temp[$i_sum - 1], $label);
               }
               if (($this->comp_tabular || 0 == $level) && !$sub)
               {
                   $aCellParams = array(
                       'col' => false,
                       'row' => array(),
                       'fnc' => $i_sum - 1
                   );
                   $this->addTotalsY($col + ($i_sum - 1), $i_temp[$i_sum - 1], $this->comp_sum_fn[$i_sum], $i_sum - 1, $aCellParams);
               }
           }
       }
   }

   function addTotalsA($mode, $col, $val, $label)
   {
       if (!isset($this->comp_totals_a[$col]))
       {
           $this->comp_totals_a[$col] = array(
               'labels' => array(),
               'values' => array(
                   'anal' => array(),
                   'sint' => array(),
               ),
           );
       }
       if ('sint' == $mode)
       {
           $this->comp_totals_a[$col]['labels'][]         = $label;
           $this->comp_totals_a[$col]['values']['sint'][] = $val;
       }
       elseif ('anal' == $mode)
       {
           if (isset($this->comp_index[ $this->comp_x_axys[0] ][$label]))
           {
               $label = $this->comp_index[ $this->comp_x_axys[0] ][$label];
           }
           $this->comp_totals_a[$col]['values']['anal'][$label][] = $val;
       }
   }

   function addTotalsAL($mode, $col, $val, $label)
   {
       if (!isset($this->comp_totals_al[$col]))
       {
           $this->comp_totals_al[$col] = array(
               'labels' => array(),
               'values' => array(
                   'anal' => array(),
                   'sint' => array(),
               ),
           );
       }
       if ('sint' == $mode)
       {
           $this->comp_totals_al[$col]['labels'][]         = $label;
           $this->comp_totals_al[$col]['values']['sint'][] = $val;
       }
       elseif ('anal' == $mode)
       {
           if (isset($this->comp_index[ $this->comp_y_axys[0] ][$label]))
           {
               $label = $this->comp_index[ $this->comp_y_axys[0] ][$label];
           }
           $this->comp_totals_al[$col]['values']['anal'][$label][] = $val;
       }
   }

   function addTotalsY($col, $val, $fun, $fmt, $par = array())
   {
       if (!$this->show_totals_y)
       {
           return;
       }

       if (!isset($this->comp_totals_y[$col]))
       {
           $this->comp_totals_y[$col] = array(
               'format'   => $fmt,
               'function' => $fun,
               'param_c'  => empty($par) ? false : $par['col'],
               'param_r'  => empty($par) ? false : $par['row'],
               'param_f'  => empty($par) ? ''    : $par['fnc'],
               'values'   => array(),
           );
       }
       $this->comp_totals_y[$col]['values'][] = $val;
   }

   function buildTotalsY(&$matrix)
   {
       if (!$this->show_totals_y)
       {
           return;
       }

       $row = sizeof($matrix);

       $this->build_total_row[$row] = true;

       $matrix[$row][] = array(
           'group'      => -1,
           'value'      => $this->Ini->Nm_lang['lang_msgs_totl'],
           'label'      => $this->Ini->Nm_lang['lang_msgs_totl'],
           'params'     => array(),
           'colspan'    => $this->comp_tabular ? sizeof($this->comp_y_axys) : 1,
           'display_as' => $this->comp_tab_hover ? 'total' : 'total'
       );

       $aTotals = array();
       foreach ($this->comp_totals_y as $cols)
       {
           $iSum           = empty($cols['param_c']) ? $this->getColumnTotal(false, $cols['param_f']) : $this->getColumnTotal($cols['param_c'], $cols['param_f']);
           if ($cols['function'] == "%") {
               $iSum = 100.00;
           }
           $aTotals[]      = $iSum;
           $matrix[$row][] = array(
               'total'  => true,
               'level'  => -1,
               'value'  => $iSum,
               'format' => $cols['format'],
           );
           $this->array_general_total[] = $iSum;
       }

       if (1 == sizeof($this->comp_x_axys))
       {
           $i_count = 0;
           $aLabels = array();
           foreach ($this->comp_index[0] as $group_label)
           {
               $aLabels[] = $group_label;
               foreach ($this->comp_sum as $i_sum => $l_sum)
               {
                   $this->comp_totals_al[$i_sum - 1]['values']['sint'][] = $aTotals[$i_count];
                   $i_count++;
               }
           }
           foreach ($this->comp_sum as $i_sum => $l_sum)
           {
               $this->comp_totals_al[$i_sum - 1]['labels'] = $aLabels;
           }
       }
   }

   function addTotalsG($line, $column, $param, $value)
   {
       $s_item  = $column['params'][0];
       $i_total = $column['params'][1];
       $param[] = $line['value'];
       $s_key   = 'G|' . $i_total . '|' . implode('|', $param);

       if (!isset($this->comp_totals_g[$s_key]))
       {
           $this->comp_totals_g[$s_key] = array(
               'title'    => $this->getChartText($this->comp_sum[$i_total + 1]),
               'show_sub' => true,
               'subtitle' => $this->getChartText($this->getChartSubtitle($param, 1)),
               'field_x'  => $this->getCompFieldName(0),
               'field_y'  => $this->comp_sum_nm[$i_total + 1],
               'label_x'  => $this->getChartText($this->comp_field[0]),
               'label_y'  => $this->getChartText($this->comp_sum[$i_total + 1]),
               'labels'   => array(),
               'values'   => array(
               'sint'     => array(0 => array()),
               ),
           );
       }

       $this->comp_totals_g[$s_key]['labels'][]            = isset($this->comp_index[0][$s_item]) ? $this->comp_index[0][$s_item] : $s_item;
       $this->comp_totals_g[$s_key]['values']['sint'][0][] = $value;

       return $s_key;
   }

   function getCompFieldName($index)
   {
       foreach ($this->comp_field_nm as $fieldName => $fieldIndex) {
           if ($index == $fieldIndex) {
               return $fieldName;
           }
       }
       return '';
   }

   function getColumnTotal($param_c, $param_f)
   {
       if (false == $param_c)
       {
           $final_data = $this->array_total_geral;
           $param_f   -= 1;
       }
       else
       {
          $Str_gb   = "";
          $Arr_name = array();
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              $Arr_name[] = "array_total_" . $cmp_gb;
          }
          for ($ix = 0; $ix < sizeof($Arr_name); $ix++)
          {
              $Str_gb .= "    if (count(\$this->comp_x_axys) == " . ($ix + 1) . ") {";
              $Str_gb .= "        \$return = \$this->" . $Arr_name[$ix] . ";";
              $Str_gb .= "    }";
          }
          eval ($Str_gb);
           $final_data = $this->getColumnTotalData($param_c, $return);
       }
       return $final_data[$param_f];
   }

   function getColumnTotalData($param_c, $data)
   {
       $elem = array_shift($param_c);

       if (empty($param_c))
       {
            return $data[$elem];
       }
       else
       {
           return $this->getColumnTotalData($param_c, $data[$elem]);
       }
   }

   function buildColumnTotal($fun, $rows)
   {
       $total = '';

       foreach ($rows as $val)
       {
           if ('' == $total)
           {
               $total = $val;
           }
           elseif ('M' == $fun && '' !== $val)
           {
               $total = min($total, $val);
           }
           elseif ('X' == $fun)
           {
               $total = max($total, $val);
           }
           else
           {
               $total += $val;
           }
       }

       if ('A' == $fun)
       {
           $total /= sizeof($rows);
       }
       if ('%' == $fun)
       {
           $total = 100.00;
       }
       if ('W' == $fun || 'V' == $fun || 'P' == $fun)
       {
           $total = "";
       }

       return $total;
   }

   function buildChart()
   {
       $this->comp_chart_data   = array();

       $Lab_tgl = "Tgl";
       $Lab_tgl =  sprintf("" . $this->Ini->Nm_lang['lang_othr_chart_title_DD'] . " Tgl", $Lab_tgl);
       $prep_chart_config = array(
           'tgl' => array(
           '1' => array(
               'title'    => $this->getChartText(strip_tags("" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "")),
               'show_sub' => true,
               'subtitle' => "",
               'field_x'  => 'tgl',
               'field_y'  => $this->comp_sum_nm[2],
               'label_x'  => $this->getChartText(strip_tags($Lab_tgl)),
               'label_y'  => $this->getChartText(strip_tags("" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "")),
               'format'   => $this->formatChartValue(1),
           ),
           ),
       );
       $prepG_chart_config = array(
       );
       $this->comp_chart_config = array(
           'T|1' => array(
               'title'    => $this->getChartText(""),
               'show_sub' => true,
               'subtitle' => "",
               'label_x'  => $this->getChartText(""),
               'label_y'  => $this->getChartText(""),
               'format'   => $this->formatChartValue(1),
           ),
       );

       $this->sc_comb_list = array();
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_order']['sc_free_group_by'] as $i_summ_order)
       {
           $this->sc_comb_list[0][] = $i_summ_order - 1;
       }
       $this->sc_comb_quick_index  = array();
       $this->sc_comb_quick_string = array();
       foreach ($this->sc_comb_list as $i_comb => $a_comb)
       {
           foreach ($a_comb as $i_summ)
           {
               if (!isset($this->sc_comb_quick_index[$i_summ]))
               {
                   $this->sc_comb_quick_index[$i_summ] = array();
               }
               $this->sc_comb_quick_index[$i_summ][] = $i_comb;
           }
           $this->sc_comb_quick_string[$i_comb] = implode('-', $a_comb);
       }
       $x = 0;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          foreach ($prep_chart_config[$cmp_gb] as $i_tot => $conf_tot)
          {
              $this->comp_chart_config[$x . "|" . $i_tot] = $conf_tot;
          }
          $x++;
       }
       $x = 0;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
       {
          foreach ($prepG_chart_config[$cmp_gb] as $i_tot => $conf_tot)
          {
              $this->comp_chart_config["G|" . $x . "|" . $i_tot] = $conf_tot;
          }
          $x++;
       }

       $aTotalGeneral = false ? $this->comp_totals_al : $this->comp_totals_a;
       if (!empty($aTotalGeneral))
       {
           foreach ($aTotalGeneral as $i_total => $a_total)
           {
               if (isset($this->comp_chart_config['T|' . $i_total]))
               {
                   if (false)
                   {
                       $sTitleAxysX  = $this->comp_field[0];
                       $sTitleLegend = '' != $this->comp_chart_config[$key]['label_x']  ? $this->comp_chart_config[$key]['label_x']  : $this->getChartText($this->comp_field[sizeof($this->comp_x_axys)]);
                   }
                   else
                   {
                       $sTitleAxysX  = '' != $this->comp_chart_config[$key]['label_x']  ? $this->comp_chart_config[$key]['label_x']  : $this->getChartText($this->comp_field[sizeof($this->comp_x_axys)]);
                       $sTitleLegend = $this->comp_field[0];
                   }
                   $key = 'T|' . $i_total;
                   $this->comp_chart_data[$key] = array(
                       'title'    => '' != $this->comp_chart_config[$key]['title']    ? $this->comp_chart_config[$key]['title']    : $this->getChartText($this->Ini->Nm_lang['lang_othr_chrt_totl']),
                       'show_sub' => $this->comp_chart_config[$key]['show_sub'],
                       'subtitle' => '' != $this->comp_chart_config[$key]['subtitle'] ? $this->comp_chart_config[$key]['subtitle'] : $this->getChartText($this->comp_sum[$i_total + 1]),
                       'legend'   => $sTitleLegend,
                       'label_x'  => $sTitleAxysX,
                       'label_y'  => '' != $this->comp_chart_config[$key]['label_y']  ? $this->comp_chart_config[$key]['label_y']  : $this->getChartText($this->comp_sum[$i_total + 1]),
                       'format'   => $this->comp_chart_config[$key]['format'],
                       'labels'   => $a_total['labels'],
                       'values'   => array(
                           'anal' => $a_total['values']['anal'],
                           'sint' => array($a_total['values']['sint']),
                       ),
                   );
               }
           }
       }

       foreach ($this->comp_y_axys as $i_group)
       {
           $this->addGroupCharts($this->comp_chart_data, $this->getCompData($i_group), $i_group, $i_group, array());
       }

       if (!empty($this->comp_totals_g))
       {
           foreach ($this->comp_totals_g as $chart => $data)
           {
               $info = explode('|', $chart);
               $key  = 'G|' . (sizeof($info) - 2) . '|' . $info[1];
               if (isset($this->comp_chart_config[$key]))
               {
                   $this->comp_chart_data[$chart]             = $data;
                   $this->comp_chart_data[$chart]['show_sub'] = $this->comp_chart_config[$key]['show_sub'];
                   if ('' != $this->comp_chart_config[$key]['title'])
                   {
                       $this->comp_chart_data[$chart]['title'] = $this->comp_chart_config[$key]['title'];
                   }
                   if ('' != $this->comp_chart_config[$key]['subtitle'])
                   {
                       $this->comp_chart_data[$chart]['subtitle'] = $this->comp_chart_config[$key]['subtitle'];
                   }
                   if ('' != $this->comp_chart_config[$key]['label_x'])
                   {
                       $this->comp_chart_data[$chart]['label_x'] = $this->comp_chart_config[$key]['label_x'];
                   }
                   if ('' != $this->comp_chart_config[$key]['label_y'])
                   {
                       $this->comp_chart_data[$chart]['label_y'] = $this->comp_chart_config[$key]['label_y'];
                   }
               }
           }
       }

       $a_chart_combinations = array();
       foreach ($this->comp_chart_data as $s_chart_index => $a_chart_data)
       {
           $a_index_parts = explode('|', $s_chart_index);
           $i_index_group = array_shift($a_index_parts);
           $i_index_summ  = array_shift($a_index_parts);
           $s_index_param = str_replace('|', '-', implode('|', $a_index_parts));
           $s_index_comb  = str_replace('|', '_', implode('|', $a_index_parts));
           if ('T' != $i_index_group && 'G' != $i_index_group)
           {
               if (isset($this->sc_comb_quick_index[$i_index_summ]))
               {
                   foreach ($this->sc_comb_quick_index[$i_index_summ] as $i_index_comb_groupby)
                   {
                       $s_comb_index = 'C|' . $i_index_group . '|' . $this->sc_comb_quick_string[$i_index_comb_groupby] . '|' . $s_index_param;
                       if (!isset($a_chart_combinations[$s_comb_index]))
                       {
                           $a_chart_combinations[$s_comb_index] = array(
                               'combination' => 1,
                               'charts'      => array(),
                               'title'       => '',
                               'label_x'     => '',
                               'label_y'     => '',
                               'xml_pholder' => sizeof($this->comp_y_axys) > $i_index_group + 1 ? 'sc_chart_igd_hitung_' . session_id() . '_!!!C_' . ($i_index_group + 1) . '_' . $s_index_comb . ('' == $s_index_comb ? '' : '_') . '__SC_PLACEHOLDER__!!!.json' : '',
                               'xml'         => 'sc_chart_igd_hitung_' . session_id() . '_!!!C_' . $i_index_group . '_' . $s_index_comb . '!!!.json',
                           );
                       }
                       $a_chart_combinations[$s_comb_index]['charts'][] = $s_chart_index;
                   }
               }
           }
       }
       $this->comp_chart_data = array_merge($this->comp_chart_data, $a_chart_combinations);
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts']    = $this->comp_chart_data;
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_orig']      = $this->comp_chart_data;
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['comb_table_data'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['comb_table_def']  = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['anlt_table_data'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['anlt_table_def']  = array();

       $this->filterChartsByGroupbyLevel();

       $this->filterChartsBySummarization();

       $this->filterChartsByMultiseries();


       require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
       $this->Graf  = new chart_igd_hitung_grafico();
       $this->Graf->Db     = $this->Db;
       $this->Graf->Erro   = $this->Erro;
       $this->Graf->Ini    = $this->Ini;
       $this->Graf->Lookup = $this->Lookup;
   }

	function filterChartsByGroupbyLevel() {
		global $nmgp_opcao;

		$applyFilter = false;

		if (isset($nmgp_opcao) && ('pdf' == $nmgp_opcao || 'pdf_res' == $nmgp_opcao) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level']) && '' !== $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level']) {
			$applyFilter = true;
		}
		elseif (isset($nmgp_opcao) && 'image_res' == $nmgp_opcao && isset($_POST['chart_level']) && '' !== $_POST['chart_level']) {
			$applyFilter = true;
			$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level'] = $_POST['chart_level'];
		}
		elseif (isset($nmgp_opcao) && 'print_res' == $nmgp_opcao && isset($_POST['chart_level']) && '' !== $_POST['chart_level']) {
			$applyFilter = true;
			$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level'] = $_POST['chart_level'];
		}
		elseif ($this->Ini->sc_export_ajax && isset($_POST['chart_level']) && '' !== $_POST['chart_level']) {
			$applyFilter = true;
			$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level'] = $_POST['chart_level'];
		}

		$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'] = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_orig'];

		if ($applyFilter) {
			foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'] as $chartIndex => $chartData) {
				$indexParts = explode('|', $chartIndex);

				if (in_array($indexParts[0], array('C', 'G', 'T'))) {
					$groupbyLevel = $indexParts[1];
				}
				else {
					$groupbyLevel = $indexParts[0];
				}

				if ($groupbyLevel > $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level']) {
					unset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'][$chartIndex]);
				}
			}
		}

		$this->comp_chart_data = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'];
	}

	function filterChartsBySummarization() {
		global $nmgp_opcao;

		if (isset($nmgp_opcao) && ('pdf' == $nmgp_opcao || 'pdf_res' == $nmgp_opcao)) {
			$displayedSummarizations = array();

			foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_fields_display']['sc_free_group_by'] as $fieldIndex => $fieldData) {
				if ($fieldData['display']) {
					$displayedSummarizations[] = $fieldIndex;
				}
			}

			foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'] as $chartIndex => $chartData) {
				$indexParts = explode('|', $chartIndex);

				if (in_array($indexParts[0], array('C', 'G', 'T'))) {
					$summarizingLevel = $indexParts[2];
				}
				else {
					$summarizingLevel = $indexParts[1];
				}

				if (!in_array($summarizingLevel + 1, $displayedSummarizations)) {
					unset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'][$chartIndex]);
				}
			}

			$this->comp_chart_data = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'];
		}
	}

	function filterChartsByMultiseries() {
		global $nmgp_opcao;

		$applyFilter = false;

		if (isset($nmgp_opcao) && ('pdf' == $nmgp_opcao || 'pdf_res' == $nmgp_opcao) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level']) && '' !== $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_level']) {
			$applyFilter = true;
		}
		elseif (isset($nmgp_opcao) && 'image_res' == $nmgp_opcao && isset($_POST['chart_level']) && '' !== $_POST['chart_level']) {
			$applyFilter = true;
		}
		elseif (isset($nmgp_opcao) && 'print_res' == $nmgp_opcao && isset($_POST['chart_level']) && '' !== $_POST['chart_level']) {
			$applyFilter = true;
		}
		elseif ($this->Ini->sc_export_ajax && isset($_POST['chart_level']) && '' !== $_POST['chart_level']) {
			$applyFilter = true;
		}

		if ($applyFilter && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_drill_down']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['summarizing_drill_down'])) {
			foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'] as $chartIndex => $chartData) {
				$indexParts = explode('|', $chartIndex);

				if (in_array($indexParts[0], array('C', 'G', 'T'))) {
					$groupbyLevel = $indexParts[1];
				}
				else {
					$groupbyLevel = $indexParts[0];
				}

				if ($groupbyLevel > 0) {
					unset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'][$chartIndex]);
				}
			}

			$this->comp_chart_data = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'];
		}
	}

   function formatChartValue($total)
   {
       $arr_param = array();

       if ($total == 1)
       {
           $arr_param = array(
               'decimals'          => "0",
               'decimalSeparator'  => "",
               'thousandSeparator' => "",
               'trailingZeros'     => "0",
               'monetarySymbol'    => "",
               'monetaryPosition'  => "",
               'monetarySpace'     => "",
               'monetaryDecimal'   => "",
               'monetaryThousands' => "",
               'formatNumberScale' => "0",
           );
       }

       $sMonetIni = '';
       $sMonetEnd = '';

       if ('' != $arr_param['monetarySymbol'])
       {
           if ('' == $arr_param['monetaryPosition'] || 'left' == $arr_param['monetaryPosition'])
           {
               $sMonetIni = $arr_param['monetarySymbol'] . $arr_param['monetarySpace'];
               $sMonetEnd = '';
           }
           else
           {
               $sMonetIni = '';
               $sMonetEnd = $arr_param['monetarySpace'] . $arr_param['monetarySymbol'];
           }
           $arr_param['decimalSeparator']  = $arr_param['monetaryDecimal'];
           $arr_param['thousandSeparator'] = $arr_param['monetaryThousands'];
       }
       if ('' == $arr_param['decimals'])
       {
           $arr_param['decimals'] = 0;
           unset($arr_param['trailingZeros']);
       }
       else
       {
           $arr_param['forceDecimals'] = 1;
       }
       if ('' == $arr_param['trailingZeros'])
       {
           unset($arr_param['trailingZeros']);
       }
       if ('' != $sMonetIni)
       {
           $arr_param['numberPrefix'] = $sMonetIni;
       }
       if ('' != $sMonetEnd)
       {
           $arr_param['numberSuffix'] = $sMonetEnd;
       }
       unset($arr_param['monetarySymbol']);
       unset($arr_param['monetaryPosition']);
       unset($arr_param['monetarySpace']);
       unset($arr_param['monetaryDecimal']);
       unset($arr_param['monetaryThousands']);

       if (',' == $arr_param['decimalSeparator'])
       {
           unset($arr_param['decimalSeparator']);
           $arr_param['decimalSeparator'] = ',';
       }
       if (',' == $arr_param['thousandSeparator'])
       {
           unset($arr_param['thousandSeparator']);
           $arr_param['thousandSeparator'] = ',';
       }

       if (isset($arr_param['formatNumberScale']) && '1' == $arr_param['formatNumberScale'])
       {
           unset($arr_param['trailingZeros']);
           $arr_param['decimals'] = 0;
       }

       foreach ($arr_param as $i => $v)
       {
           if ('' === $v)
           {
               unset($arr_param[$i]);
           }
       }

       return $arr_param;
   }

   function addGroupCharts(&$charts, $data, $group, $level, $param)
   {
       if (0 == $level)
       {
           $a_keys   = array();
           $a_totals = array();
           $this->getKeysTotals($a_keys, $a_totals, $data, $param);
           foreach ($a_totals as $i_total => $values)
           {
               $key_data  = $key_config = $group . '|' . $i_total;
               $key_data .= '|' . implode('|', $param);
               if (isset($this->comp_chart_config[$key_config]))
               {
                   $this->comp_chart_data[$key_data]                      = $this->comp_chart_config[$key_config];
                   $this->comp_chart_data[$key_data]['param']             = $param;
                   $this->comp_chart_data[$key_data]['summ_idx']          = $i_total;
                   $this->comp_chart_data[$key_data]['summ_fn']           = $this->comp_sum_fn[$i_total + 1];
                   $this->comp_chart_data[$key_data]['labels']            = $this->getGroupLabels($group, $a_keys);
                   $this->comp_chart_data[$key_data]['db_values']         = $a_keys;
                   $this->comp_chart_data[$key_data]['label_order']       = $this->comp_order[$group];
                   $this->comp_chart_data[$key_data]['values']['sint'][0] = $values;
                   $grid_links = array();
                   $xml_links  = array();
                   foreach ($a_keys as $tmp_key)
                   {
                       $link_index   = array_merge($param, array($tmp_key));
                       $grid_links[] = $this->getChartLink($link_index, -1);
                       $xml_links[]  = $this->getFusionLink('sc_chart_igd_hitung_' . session_id() . '_!!!' . implode('_', array_merge(array($group + 1, $i_total), $link_index)) . '!!!.json');
                   }
                   $this->comp_chart_data[$key_data]['grid_links'] = $grid_links;
                   $this->comp_chart_data[$key_data]['xml_links']  = (sizeof($this->comp_y_axys) > $group + 1) ? $xml_links : array();
                   $this->comp_chart_data[$key_data]['xml']        = $this->getFusionLink('sc_chart_igd_hitung_' . session_id() . '_!!!' . implode('_', array_merge(array($group, $i_total), $param)) . '!!!.json');
                   if (0 < $group && !empty($param))
                   {
                       $this->comp_chart_data[$key_data]['subtitle'] = $this->getChartText($this->getChartSubtitle($param));
                   }
                   if (0 == sizeof($this->comp_x_axys) && empty($param))
                   {
                       $this->getAnaliticCharts($i_total, $this->comp_chart_data[$key_data]);
                   }
               }
           }
       }
       else
       {
           foreach ($data as $key => $list)
           {
               $this->addGroupCharts($charts, $list, $group, $level - 1, array_merge($param, array($key)));
           }
       }
   }

   function getFusionLink($originalLink)
   {
       $linkParts = explode('!!!', $originalLink);

       if (1 == count($linkParts)) {
           return $originalLink;
       }

       $linkParts[1] = md5($linkParts[1]);

       return implode('', $linkParts);
   }

   function getKeysTotals(&$a_keys, &$a_totals, $data, $param)
   {
       for ($i = 0; $i < sizeof($this->comp_x_axys); $i++)
       {
           $key_param = key($param);
           unset($param[$key_param]);
       }
       $list_data = $this->comp_chart_axys;
       foreach ($param as $now_param)
       {
           $list_data = $list_data[$now_param]['children'];
       }
       $list_data = array_keys($list_data);
       $size = sizeof($this->comp_sum_dummy);
       foreach ($list_data as $k_group)
       {
           if (isset($data[$k_group])) {
               $totals = $data[$k_group];
           }
           else {
               $totals = $this->comp_sum_dummy;
           }
           $a_keys[] = $k_group;
           $count    = 0;
           foreach ($totals as $i_total => $v_total)
           {
               if ($count == $size)
               {
                   break;
               }
               $a_totals[$i_total][] = $v_total;
               $count++;
           }
       }
       if (!empty($param))
       {
           $a_indexes = $this->getRealIndexes($this->comp_chart_axys, $param);
           foreach ($a_keys as $i => $v)
           {
               if (!in_array($v, $a_indexes))
               {
                   unset($a_keys[$i]);
                   foreach ($a_totals as $t => $l)
                   {
                       unset($a_totals[$t][$i]);
                   }
               }
           }
           $a_keys = array_values($a_keys);
           foreach ($a_totals as $t => $l)
           {
               $a_totals[$t] = array_values($a_totals[$t]);
           }
       }
   }

   function getRealIndexes($data, $param)
   {
       if (empty($param))
       {
           $a_indexes = array();
           foreach ($data as $i => $v)
           {
               $a_indexes[] = $i;
           }
           return $a_indexes;
       }
       else
       {
           $key = key($param);
           $val = $param[$key];
           unset($param[$key]);
           return $this->getRealIndexes($data[$val]['children'], $param);
       }
   }

   function getGroupLabels($group, $keys)
   {
       $a_labels = array();
       foreach ($keys as $key)
       {
           $a_labels[] = isset($this->comp_index[$group][$key]) ? $this->comp_index[$group][$key] : $key;
       }
       return $a_labels;
   }

   function getChartSubtitle($param, $s = 0)
   {
       $a_links = array();

       foreach ($param as $i => $v)
       {
           $a_links[] = $this->comp_field[$i + $s] . ' = ' . $this->comp_index[$i + $s][$v];
       }

       return implode(' :: ', $a_links);
   }

   function getAnaliticCharts($total, &$chart_data)
   {
       $chart_data['labels_anal']           = array();
       $chart_data['legend']                = $this->comp_field[1];
       $chart_data['values']['anal']        = array();
       $chart_data['values']['anal_values'] = array();
       $chart_data['values']['anal_links']  = array();

       foreach ($this->comp_index[0] as $i_0 => $v_0)
       {
           $chart_data['labels_anal'][] = $v_0;
       }
       foreach ($this->comp_index[1] as $i_1 => $v_1)
       {
           $chart_data['values']['anal'][$v_1] = array();
           foreach ($this->comp_index[0] as $i_0 => $v_0)
           {
               $vCompData                                  = $this->getCompData(1, array($i_0, $i_1, $total));
               $chart_data['values']['anal'][$v_1][]       = isset($vCompData) ? $vCompData : 0;
               $chart_data['values']['anal_values'][$v_1]  = $i_1;
               $chart_data['values']['anal_links'][$i_1][] = $this->getChartLink(array($i_0, $i_1), -1);
           }
       }
   }

   function getChartText($s, $bProtect = true)
   {
       if (!$bProtect)
       {
           return $s;
       }
       if ('UTF-8' != $_SESSION['scriptcase']['charset'])
       {
           $s = sc_convert_encoding($s, 'UTF-8', $_SESSION['scriptcase']['charset']);
       }
       return function_exists('html_entity_decode') ? html_entity_decode($s, ENT_COMPAT | ENT_HTML401, 'UTF-8') : $s;
   }

   function drawMatrix()
   {
       global $nm_saida;

       if ($this->NM_export)
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['arr_export']['label'] = $this->build_labels;
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['arr_export']['data']  = $this->build_data;
           return;
       }

       $nm_saida->saida("<tr id=\"summary_body\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           $_SESSION['scriptcase']['saida_html'] = "";
       } 
      $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] == "pdf") ? " style=\"padding: 0px !important;\"" : "";
       $nm_saida->saida("<td class=\"" . $this->css_scGridTabelaTd . "\"" . $TD_padding . ">\r\n");
       $nm_saida->saida("<table class=\"scGridTabela\" id=\"sc-ui-summary-body\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top; width: 100%;\">\r\n");

       $this->drawMatrixLabels();
      if ($this->comp_tab_hover)
      {
          $nm_saida->saida("    <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("        $(function() {\r\n");
          $nm_saida->saida("            $(\".scGridSummaryLine\").click(function() {\r\n");
          $nm_saida->saida("              var bHasClicked = $(this).find(\".scGridSummaryLineOdd\").hasClass(\"scGridSummaryClickedLine\") || $(this).find(\".scGridSummaryLineEven\").hasClass(\"scGridSummaryClickedLine\") || $(this).find(\".scGridSummarySubtotal\").hasClass(\"scGridSummaryClickedSubtotal\") || $(this).find(\".scGridSummaryTotal\").hasClass(\"scGridSummaryClickedTotal\");\r\n");
          $nm_saida->saida("              $(\".scGridSummaryLineOdd\").removeClass(\"scGridSummaryClickedLine\");\r\n");
          $nm_saida->saida("              $(\".scGridSummaryLineEven\").removeClass(\"scGridSummaryClickedLine\");\r\n");
          $nm_saida->saida("              $(\".scGridSummaryGroupbyVisible\").removeClass(\"scGridSummaryClickedGroupbyVisible\");\r\n");
          $nm_saida->saida("              $(\".scGridSummaryGroupbyInvisible\").removeClass(\"scGridSummaryClickedGroupbyInvisible\");\r\n");
          $nm_saida->saida("              $(\".scGridSummaryGroupbyInvisibleDisplay\").removeClass(\"scGridSummaryClickedGroupbyInvisibleDisplay\");\r\n");
          $nm_saida->saida("              $(\".scGridSummarySubtotal\").removeClass(\"scGridSummaryClickedSubtotal\");\r\n");
          $nm_saida->saida("              $(\".scGridSummaryTotal\").removeClass(\"scGridSummaryClickedTotal\");\r\n");
          $nm_saida->saida("              if (!bHasClicked) {\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummaryLineOdd\").addClass(\"scGridSummaryClickedLine\");\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummaryLineEven\").addClass(\"scGridSummaryClickedLine\");\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummaryGroupbyVisible\").addClass(\"scGridSummaryClickedGroupbyVisible\");\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummaryGroupbyInvisible\").addClass(\"scGridSummaryClickedGroupbyInvisible\");\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummaryGroupbyInvisibleDisplay\").addClass(\"scGridSummaryClickedGroupbyInvisibleDisplay\");\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummarySubtotal\").addClass(\"scGridSummaryClickedSubtotal\");\r\n");
          $nm_saida->saida("                $(this).find(\".scGridSummaryTotal\").addClass(\"scGridSummaryClickedTotal\");\r\n");
          $nm_saida->saida("              }\r\n");
          $nm_saida->saida("            });\r\n");
          $nm_saida->saida("        });\r\n");
          $nm_saida->saida("    </script>\r\n");
      }

       $s_class   = 'scGridSummaryLineOdd';
       $s_class_v = 'scGridSummaryGroupbyVisible';
        $iSeqCount = 0;
       foreach ($this->build_data as $row_i => $lines)
       {
           $this->prim_linha = false;
           $sTrClass         = $this->comp_tab_hover ? ' class="scGridSummaryLine"' : '';
           $nm_saida->saida(" <tr $sTrClass>\r\n");
           if ($this->comp_tab_seq)
           {
               if ($this->build_total_row[$row_i])
               {
                   $sSeqDisplay = '&nbsp;';
               }
               else
               {
                   $iSeqCount++;
                   $sSeqDisplay = $iSeqCount;
               }
               $nm_saida->saida(" <td class=\"scGridSummaryGroupbyVisible scGridSummaryGroupbySeq\">$sSeqDisplay</td>\r\n");
           }
           foreach ($lines as $col_i => $columns)
           {
               $this->NM_graf_left = $this->Graf_left_dat;
               if (0 <= $columns['level'])
               {
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
                   {
                       $columns['label'] = ($columns['label'] == "") ? "&nbsp;" : $columns['label'];
                       $s_label   = '' != $columns['link'] ? "<a href=\"javascript: nm_link_cons('" . $columns['link'] . "')\" class=\"" . (isset($columns['display_as']) && 'none' == $columns['display_as'] ? 'scGridSummaryGroupbyInvisibleLink' : 'scGridSummaryGroupbyVisibleLink') . "\">" . $columns['label'] . '</a>' : $columns['label'];
                   }
                   else
                   {
                       $s_label   = $columns['label'];
                   }
                   $s_style   = '';
                   $s_text    = $this->comp_tabular ? $s_label : str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $columns['level']) . $s_label;
                   $s_class_v = 'scGridSummaryGroupbyVisible';
                   if (isset($columns['display_as']) && 'none' == $columns['display_as'])
                   {
                       $s_text    = '<span class="scGridSummaryGroupbyInvisibleDisplay">' . $s_text . '</span>';
                       $s_class_v = 'scGridSummaryGroupbyInvisible';
                   }
                   elseif (isset($columns['display_as']) && 'subtotal' == $columns['display_as'])
                   {
                       $s_class_v = 'scGridSummarySubtotal';
                   }
                   elseif (isset($columns['display_as']) && 'total' == $columns['display_as'])
                   {
                       $s_class_v = 'scGridSummaryTotal';
                   }
               }
               else
               {
                   $s_style = '';
                   if (isset($columns['total']) && $columns['total'])
                   {
                       $s_style   = ' style="text-align: right"';
                       $s_text    = $this->formatValue($columns['format'], $columns['value']);
                       $s_class_v = 'scGridSummaryTotal';
                       $this->NM_graf_left = $this->Graf_left_tot;
                   }
                   elseif (isset($columns['subtotal']) && $columns['subtotal'])
                   {
                       $s_text    = $this->formatValue($columns['format'], $columns['value']);
                       $s_class_v = 'scGridSummarySubtotal';
                   }
                   else
                   {
                       $s_text    = $this->getDataLink($columns['link_fld'], $columns['link_data'], $this->formatValue($columns['format'], $columns['value']));
                       $s_class_v = $s_class;
                   }
               }
               $css     = ('' != $columns['css']) ? ' ' . $columns['css'] . '_field' : '';
               $colspan = (isset($columns['colspan']) && 1 < $columns['colspan']) ? ' colspan="' . $columns['colspan'] . '"' : '';
               $rowspan = (isset($columns['rowspan']) && 1 < $columns['rowspan']) ? ' rowspan="' . $columns['rowspan'] . '"' : '';
               $chart   = '';
               if ($this->NM_graf_left)
               {
                   $nm_saida->saida("  <td" . $s_style . " class=\"" . $s_class_v . $css . "\"" . $colspan . "" . $rowspan . ">" . $chart . "" . $s_text . "</td>\r\n");
               }
               else
               {
                   $nm_saida->saida("  <td" . $s_style . " class=\"" . $s_class_v . $css . "\"" . $colspan . "" . $rowspan . ">" . $s_text . "" . $chart . "</td>\r\n");
               }
           }
           $nm_saida->saida(" </tr>\r\n");
           if ('scGridSummaryLineOdd' == $s_class)
           {
               $s_class                   = 'scGridSummaryLineEven';
               $this->Ini->cor_link_dados = 'scGridFieldEvenLink';
           }
           else
           {
               $s_class                   = 'scGridSummaryLineOdd';
               $this->Ini->cor_link_dados = 'scGridFieldOddLink';
           }
       }

       $nm_saida->saida("</table>\r\n");
       $nm_saida->saida("</td>\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           if ($this->proc_res_grid)
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_res_grid', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
           } 
           else 
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'summary_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
           } 
           $_SESSION['scriptcase']['saida_html'] = "";
       } 
       $nm_saida->saida("</tr>\r\n");
   }

   function drawMatrixLabels()
   {
       global $nm_saida;

       $this->prim_linha = true;

       $nm_saida->saida("    <script type=\"text/javascript\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
       { 
           $nm_saida->saida("        function sc_session_redir(url_redir)\r\n");
           $nm_saida->saida("        {\r\n");
           $nm_saida->saida("            if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n");
           $nm_saida->saida("            {\r\n");
           $nm_saida->saida("                window.parent.sc_session_redir(url_redir);\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("            else\r\n");
           $nm_saida->saida("            {\r\n");
           $nm_saida->saida("                if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n");
           $nm_saida->saida("                {\r\n");
           $nm_saida->saida("                    window.close();\r\n");
           $nm_saida->saida("                    window.opener.sc_session_redir(url_redir);\r\n");
           $nm_saida->saida("                }\r\n");
           $nm_saida->saida("                else\r\n");
           $nm_saida->saida("                {\r\n");
           $nm_saida->saida("                    window.location = url_redir;\r\n");
           $nm_saida->saida("                }\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("        }\r\n");
       }
       $nm_saida->saida("        $(function() {\r\n");
       $nm_saida->saida("            $(\".sc-ui-sort\").mouseover(function() {\r\n");
       $nm_saida->saida("                $(this).css(\"cursor\", \"pointer\");\r\n");
       $nm_saida->saida("            }).click(function() {\r\n");
       $nm_saida->saida("                var newOrder, colOrder;\r\n");
       $nm_saida->saida("                if ($(this).hasClass(\"sc-ui-sort-desc\")) {\r\n");
       $nm_saida->saida("                    $(this).removeClass(\"sc-ui-sort-desc\").addClass(\"sc-ui-sort-asc\");\r\n");
       $nm_saida->saida("                    newOrder = \"asc\";\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("                else {\r\n");
       $nm_saida->saida("                    $(this).removeClass(\"sc-ui-sort-asc\").addClass(\"sc-ui-sort-desc\");\r\n");
       $nm_saida->saida("                    newOrder = \"desc\";\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("                colOrder = $(this).attr(\"id\").substr(11);\r\n");
       $nm_saida->saida("                changeSort(colOrder, newOrder, false);\r\n");
       $nm_saida->saida("            });\r\n");
       $nm_saida->saida("        });\r\n");
       $nm_saida->saida("    </script>\r\n");

       $apl_cab_resumo = $this->Ini->Nm_lang['lang_othr_smry_msge'];

       $b_display     = false;
       $b_display_seq = false;
       foreach ($this->build_labels as $lines)
       {
           $nm_saida->saida(" <tr class=\"sc-ui-summary-header-row\">\r\n");
           if ($this->comp_tab_seq && !$b_display_seq) {
               $nm_saida->saida("  <td class=\"scGridSummaryLabel\" rowspan=\"" . sizeof($this->build_labels) . "\">&nbsp;</td>\r\n");
               $b_display_seq = true;
           }

           if (!$b_display)
           {
               if ($this->comp_tabular)
               {
                   foreach ($this->comp_y_axys as $iYAxysIndex)
                   {
                       $hasOrder = !isset($this->comp_order_enabled[$iYAxysIndex]) || $this->comp_order_enabled[$iYAxysIndex];
                       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_start'][$iYAxysIndex]))
                       {
                           $sInitialOrder   = '';
                           $sInitialDisplay = '; display: none';
                           $sInitialSrc     = '';
                       }
                       elseif ('asc' == $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_order_start'][$iYAxysIndex])
                       {
                           $sInitialOrder   = ' sc-ui-sort-asc';
                           $sInitialDisplay = '';
                           $sInitialSrc     = $this->Ini->Label_summary_sort_asc;
                       }
                       else
                       {
                           $sInitialOrder   = ' sc-ui-sort-desc';
                           $sInitialDisplay = '';
                           $sInitialSrc     = $this->Ini->Label_summary_sort_desc;
                       }
                       $nm_saida->saida("  <td class=\"scGridSummaryLabel\" rowspan=\"" . sizeof($this->build_labels) . "\">\r\n");
                       if ($hasOrder) {
                           $nm_saida->saida("    <span class=\"sc-ui-sort" . $sInitialOrder . "\" id=\"sc-id-sort-" . $iYAxysIndex . "\">\r\n");
                       }
                       $nm_saida->saida("   " . $this->comp_field[$iYAxysIndex] . "\r\n");
                       if ($hasOrder) {
                           if (!$this->Ini->Export_html_zip) {
                               $nm_saida->saida("     <img style=\"vertical-align: middle" . $sInitialDisplay . "\" src=\"" . $this->Ini->path_img_global . "/" . $sInitialSrc . "\" border=\"0\"/>\r\n");
                           }
                           else {
                               $nm_saida->saida("     <img style=\"vertical-align: middle" . $sInitialDisplay . "\" src=\"" . $sInitialSrc . "\" border=\"0\"/>\r\n");
                           }
                           $nm_saida->saida("    </span>\r\n");
                       }
                       $nm_saida->saida("  </td>\r\n");
                   }
               }
               else
               {
                   $nm_saida->saida("  <td class=\"scGridSummaryLabel\" rowspan=\"" . sizeof($this->build_labels) . "\"" . sizeof($this->comp_y_axys) . ">\r\n");
                       if (0 < $this->comp_order_col)
                       {
                       $nm_saida->saida("    <a href=\"javascript: changeSort('0', '0', true)\" class=\"scGridLabelLink \">\r\n");
                       }
                   $nm_saida->saida("   " . $apl_cab_resumo . "\r\n");
                       if (0 < $this->comp_order_col)
                       {
                           if (!$this->Ini->Export_html_zip) {
                           $nm_saida->saida("    <IMG style=\"vertical-align: middle\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_summary_sort_asc . "\" BORDER=\"0\"/>\r\n");
                       }
                       else {
                           $nm_saida->saida("    <IMG style=\"vertical-align: middle\" SRC=\"" . $this->Ini->Label_summary_sort_asc . "\" BORDER=\"0\"/>\r\n");
                       }
                       $nm_saida->saida("    </a>\r\n");
                       }
               $nm_saida->saida("  </td>\r\n");
               }
               $b_display = true;
           }
           foreach ($lines as $columns)
           {
               $this->NM_graf_left = $this->Graf_left_dat;
               if (isset($columns['group']) && $columns['group'] == -1)
               {
                   $this->NM_graf_left = $this->Graf_left_tot;
               }
               if ('' == $columns['function'] && '' != $this->comp_align[ $columns['group'] ])
               {
                   $style = ' style="text-align: ' . $this->comp_align[ $columns['group'] ] . '"';
               }
               else
               {
                   $style = '';
               }
               $css       = ('' != $columns['css']) ? ' ' . $columns['css'] . '_label' : '';
               $colspan   = (isset($columns['colspan']) && 1 < $columns['colspan']) ? ' colspan="' . $columns['colspan'] . '"' : '';
               $rowspan   = (isset($columns['rowspan']) && 1 < $columns['rowspan']) ? ' rowspan="' . $columns['rowspan'] . '"' : '';
               $col_label = $this->getColumnLabel($columns['label'], $columns['params'][0], $css);
               $col_float = $columns['label'] != $col_label ? 'float: left' : '';
               $chart   = '';
               if ($this->NM_graf_left)
               {
                   $nm_saida->saida("  <td" . $style . " class=\"scGridSummaryLabel" . $css . "\"" . $colspan . "" . $rowspan . ">" . $chart . "" . $col_label . "</td>\r\n");
               }
               else
               {
                   $nm_saida->saida("  <td" . $style . " class=\"scGridSummaryLabel" . $css . "\"" . $colspan . "" . $rowspan . ">" . $col_label . "" . $chart . "</td>\r\n");
               }
           }
           $nm_saida->saida(" </tr>\r\n");
       }
if($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf_vert']){ 
           $nm_saida->saida("   </thead>\r\n");
 }
   }

   function getColumnLabel($label, $col, $css="")
   {
       if (0 != sizeof($this->comp_x_axys))
       {
           return $label;
       }

       if (1 == $col)
       {
           $nome_img = $this->Ini->Label_summary_sort;
           $sort     = 'a';
           if (isset($this->comp_order_col) && $this->comp_order_col == $col + 1)
           {
               if ($this->comp_order_sort == 'd')
               {
                   $nome_img = $this->Ini->Label_summary_sort_desc;
                   $sort     = '';
               }
               else
               {
                   $nome_img = $this->Ini->Label_summary_sort_asc;
                   $sort     = 'd';
               }
           }
           if (empty($this->Ini->Label_summary_sort_pos) || $this->Ini->Label_summary_sort_pos == "right")
           {
               $this->Ini->Label_summary_sort_pos = "right_field";
           }
           if (empty($nome_img))
           {
               $link_img = nl2br($label);
           }
           elseif ($this->Ini->Label_summary_sort_pos == "right_field")
           {
               if (!$this->Ini->Export_html_zip) {
                   $link_img = nl2br($label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
               }
               else {
                   $link_img = nl2br($label) . "<IMG SRC=\"" . $nome_img . "\" BORDER=\"0\"/>";
               }
           }
           elseif ($this->Ini->Label_summary_sort_pos == "left_field")
           {
               if (!$this->Ini->Export_html_zip) {
                   $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($label);
               }
               else {
                   $link_img = "<IMG SRC=\"" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($label);
               }
           }
           elseif ($this->Ini->Label_summary_sort_pos == "right_cell")
           {
               if (!$this->Ini->Export_html_zip) {
                   $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($label);
               }
               else {
                   $link_img = "<IMG style=\"float: right\" SRC=\"" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($label);
               }
           }
           elseif ($this->Ini->Label_summary_sort_pos == "left_cell")
           {
               if (!$this->Ini->Export_html_zip) {
                   $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($label);
               }
               else {
                   $link_img = "<IMG style=\"float: left\" SRC=\"" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($label);
               }
           }
           return "<a href=\"javascript: changeSort(" . ($col + 1) . ", '" . $sort . "', true)\" class=\"scGridLabelLink" . $css . "\">" . $link_img . '</a>';
       }

       return $label;
   }

   function formatValue($total, $valor_campo, $res_chart=false)
   {
       if (!$res_chart && $this->NM_export && isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['json_use_format']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['json_use_format'])
       {
           return $valor_campo;
       }
       $isNegative = 0 > $valor_campo;
       if ($total == 1)
       {
           nmgp_Form_Num_Val($valor_campo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "");
       }
       return $valor_campo;
   }

   //---- 
   function resumo_init()
   {
      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__export.png",
          'fontawesomeicon'  => "fas fa-cog",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_3']= array(
          'value'            => "",
          'hint'             => "",
          'type'             => "button",
          'display'          => "only_text",
          'display_position' => "text_right",
          'image'            => "",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__export.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->monta_css();
      if ($this->NM_export)
      {
          return;
      }
      $this->monta_html_ini();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
      {
          $this->monta_barra_top();
          $this->monta_embbed_placeholder_mobile_top();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      {
          $this->monta_resumo_search();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      { 
         if ($this->Ini->grid_search_change_fil)
         { 
             $seq_search = 1;
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq'] as $cmp => $def)
             {
                $Seq_grid      = $seq_search;
                $Cmp_grid      = $cmp;
                $Def_grid      = array('descr' => $def['descr'], 'hint' => $def['hint']);
                $Lin_grid_add  = $this->grid_search_tag_ini($Cmp_grid, $Def_grid, $Seq_grid);
                $NM_func_grid_add = "grid_search_" . $Cmp_grid;
                $Lin_grid_add .= $this->$NM_func_grid_add($Seq_grid, 'S', $def['opc'], $def['val'], $nmgp_tab_label[$Cmp_grid]);
                $Lin_grid_add .= $this->grid_search_tag_end();
                $this->Ini->Arr_result['grid_search_add'][] = array ('field' => $cmp, 'tag' => NM_charset_to_utf8($Lin_grid_add));
                $seq_search++;
             } 
         } 
         else 
         { 
             $this->html_grid_search();
         } 
      } 
   }

   function monta_css()
   {
      global $nm_saida, $nmgp_tipo_pdf, $nmgp_cor_print;
       $compl_css = "";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
       {
           include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
       {
          if (($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
           { 
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['chart_igd_hitung']))
               {
                   $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['chart_igd_hitung']) . "_";
               } 
           } 
           else 
           { 
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['chart_igd_hitung']))
               {
                   $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['chart_igd_hitung']) . "_";
               } 
           }
       }
       $temp_css  = explode("/", $compl_css);
       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
       $this->css_scGridPage          = $compl_css . "scGridPage";
       $this->css_scGridToolbar       = $compl_css . "scGridToolbar";
       $this->css_scGridToolbarPadd   = $compl_css . "scGridToolbarPadding";
       $this->css_css_toolbar_obj     = $compl_css . "css_toolbar_obj";
       $this->css_scGridHeader        = $compl_css . "scGridHeader";
       $this->css_scGridHeaderFont    = $compl_css . "scGridHeaderFont";
       $this->css_scGridFooter        = $compl_css . "scGridFooter";
       $this->css_scGridFooterFont    = $compl_css . "scGridFooterFont";
       $this->css_scGridTotal         = $compl_css . "scGridTotal";
       $this->css_scGridTotalFont     = $compl_css . "scGridTotalFont";
       $this->css_scGridFieldEven     = $compl_css . "scGridFieldEven";
       $this->css_scGridFieldEvenFont = $compl_css . "scGridFieldEvenFont";
       $this->css_scGridFieldEvenVert = $compl_css . "scGridFieldEvenVert";
       $this->css_scGridFieldEvenLink = $compl_css . "scGridFieldEvenLink";
       $this->css_scGridFieldOdd      = $compl_css . "scGridFieldOdd";
       $this->css_scGridFieldOddFont  = $compl_css . "scGridFieldOddFont";
       $this->css_scGridFieldOddVert  = $compl_css . "scGridFieldOddVert";
       $this->css_scGridFieldOddLink  = $compl_css . "scGridFieldOddLink";
       $this->css_scGridLabel         = $compl_css . "scGridLabel";
       $this->css_scGridLabelFont     = $compl_css . "scGridLabelFont";
       $this->css_scGridLabelLink     = $compl_css . "scGridLabelLink";
       $this->css_scGridTabela        = $compl_css . "scGridTabela";
       $this->css_scGridTabelaTd      = $compl_css . "scGridTabelaTd";
       $this->css_scAppDivMoldura     = $compl_css . "scAppDivMoldura";
       $this->css_scAppDivHeader      = $compl_css . "scAppDivHeader";
       $this->css_scAppDivHeaderText  = $compl_css . "scAppDivHeaderText";
       $this->css_scAppDivContent     = $compl_css . "scAppDivContent";
       $this->css_scAppDivContentText = $compl_css . "scAppDivContentText";
       $this->css_scAppDivToolbar     = $compl_css . "scAppDivToolbar";
       $this->css_scAppDivToolbarInput= $compl_css . "scAppDivToolbarInput";
   }

   function resumo_sem_reg()
   {
      global $nm_saida;
      $res_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
      $nm_saida->saida("  <TR id=\"summary_body\">\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("   <TD class=\"scGridFieldOdd scGridFieldOddFont\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\">\r\n");
      $nm_saida->saida("     " . $res_sem_reg . "\r\n");
      $nm_saida->saida("   </TD>\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'summary_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("  </TR>\r\n");
   }

   function resumo_sem_reg_chart()
   {
      global $nm_saida;
      $res_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
      $displayMessage = $this->NM_res_sem_reg ? '' : ' style="display: none"';
      $nm_saida->saida("  <TR id=\"rec_not_found_chart\"" . $displayMessage . ">\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("   <TD class=\"scGridFieldOdd scGridFieldOddFont\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\">\r\n");
      $nm_saida->saida("     " . $res_sem_reg . "\r\n");
      $nm_saida->saida("   </TD>\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      { 
         if ($this->NM_res_sem_reg)
         {
              $this->Ini->Arr_result['setDisplay'][] = array('field' => 'rec_not_found_chart', 'value' => '');
              $this->Ini->Arr_result['setVisibility'][] = array('field' => 'res_chart_table', 'value' => 'hidden');
         }
         else
         {
              $this->Ini->Arr_result['setDisplay'][] = array('field' => 'rec_not_found_chart', 'value' => 'none');
              $this->Ini->Arr_result['setDisplay'][] = array('field' => 'res_chart_table', 'value' => '');
              $this->Ini->Arr_result['setVisibility'][] = array('field' => 'res_chart_table', 'value' => 'visible');
         }
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("  </TR>\r\n");
   }

   //---- 
   function resumo_final()
   {
       global $nm_saida;
      if ($this->NM_export)
      {
          return;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      {
          $_SESSION['scriptcase']['saida_var']  = true; 
          $_SESSION['scriptcase']['saida_html'] = ""; 
      }
      $this->grafico_bot();
      if (!$_SESSION['scriptcase']['proc_mobile'])
      {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf")
      {
          $this->monta_embbed_placeholder_bot();
          $this->monta_barra_bot();
      }
      }
      $this->monta_html_fim();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
      {
          $_SESSION['scriptcase']['saida_var']  = false; 
          $_SESSION['scriptcase']['saida_html'] = ""; 
      }
   }

   //---- 
   function inicializa_vars()
   {
      $this->Tot_ger = false;
      require_once($this->Ini->path_aplicacao . "chart_igd_hitung_total.class.php"); 
      $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['print_all'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'] || $this->Ini->sc_export_ajax_img)
      { 
          $this->NM_raiz_img = $this->Ini->root; 
      } 
      else 
      { 
          $this->NM_raiz_img = ""; 
      } 
      if ($this->Print_All)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] = "print";
          $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_res_prt; 
      }
      else
      {
          $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_res; 
      }
      $this->Total   = new chart_igd_hitung_total($this->Ini->sc_page);
      $this->prep_modulos("Total");
      if ($this->NM_export)
      {
          return;
      }
      $this->que_linha = "impar";
      $this->css_line_back = $this->css_scGridFieldOdd;
      $this->css_line_fonf = $this->css_scGridFieldOddFont;
      $this->Ini->cor_link_dados = $this->css_scGridFieldOddLink;
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['LigR_Md5'] = array();
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //---- 
   function totaliza()
   {
      $this->Total->Calc_resumo_sc_free_group_by("res");
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['arr_total'] as $cmp_gb => $resto)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $this->$Arr_tot_name = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['arr_total'][$cmp_gb];
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          ksort($this->$Arr_tot_name);
      }
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Ind_Groupby'];
      $this->Total->$Gb_geral();
   }

   //----- 
   function monta_html_ini($first_table = true)
   {
      global $nm_saida, $nmgp_tipo_pdf, $nmgp_cor_print;

      if ($first_table)
      {

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      { 
          $nm_saida->saida("<TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px; width: 100%;\">\r\n");
          return;
      } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
{
       $nm_saida->saida("<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:word\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
}
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['responsive_chart']['active']) {
$nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
$nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
}
$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_refresh_after_chart'] = 'resumo';
      $nm_saida->saida("<HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
      $nm_saida->saida("<HEAD>\r\n");
      $nm_saida->saida(" <TITLE>" . $this->Ini->Nm_lang['lang_othr_chart_title'] . " Statistik IGD</TITLE>\r\n");
      $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
{
      $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
      $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
      $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
      $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
      $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
}
      $nm_saida->saida(" <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
       $css_body = "";
      $nm_saida->saida(" <style type=\"text/css\">\r\n");
      $nm_saida->saida("  BODY { " . $css_body . " }\r\n");
      $nm_saida->saida(" </style>\r\n");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
      { 
           $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var applicationKeys = '';\r\n");
           $nm_saida->saida("     var hotkeyList = '';\r\n");
           $nm_saida->saida("     function execHotKey(e, h) {\r\n");
           $nm_saida->saida("         var hotkey_fired = false\r\n");
           $nm_saida->saida("         switch (true) {\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("         if (hotkey_fired) {\r\n");
           $nm_saida->saida("             e.preventDefault();\r\n");
           $nm_saida->saida("             return false;\r\n");
           $nm_saida->saida("         } else {\r\n");
           $nm_saida->saida("             return true;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys.inc.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys_setup.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/scInput.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput2.js\"></script>\r\n");
           $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"chart_igd_hitung_ajax.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("   var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("   var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("   var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("   var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida(" </script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"chart_igd_hitung_jquery.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"chart_igd_hitung_message.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/scInput.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput2.js\"></script>\r\n");
      include_once($this->Ini->Apl_grafico);
      $this->Graf  = new chart_igd_hitung_grafico();
      $this->prep_modulos("Graf");
      $sFusionChartModule = $this->Graf->getChartModule();
      if ('' == $sFusionChartModule)
      {
          $sFusionChartModule = $this->Graf->getChartModule('Bar');
      }
      if (!$_SESSION['scriptcase']['fusioncharts_new'])
      {
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts/" . $sFusionChartModule . "/jquery.min.js\"></script>\r\n");
      }
           $nm_saida->saida("        <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("          var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("          var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("          var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("        </script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\"  type=\"text/css\"/> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"  type=\"text/css\"/> \r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\"  type=\"text/css\"/> \r\n");
   } 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/sumoselect-master/sumoselect.min.css\" rel=\"stylesheet\"> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/sumoselect-master/jquery.sumoselect.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css'] = rand(0, 1000);
      }
      $NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_chart_igd_hitung_sum_' . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css'] . '.css', 'w');
      if (($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
      {
          $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
          $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      }
      else
      {
          $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
          $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      }
      if (is_file($this->Ini->path_css . $NM_css_file))
      {
          $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
          foreach ($NM_css_attr as $NM_line_css)
          {
              $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
              @fwrite($NM_css, "    " .  $NM_line_css . "\r\n");
          }
      }
      if (is_file($this->Ini->path_css . $NM_css_dir))
      {
          $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
          foreach ($NM_css_attr as $NM_line_css)
          {
              $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
              @fwrite($NM_css, "    " .  $NM_line_css . "\r\n");
          }
      }
      @fclose($NM_css);
     $this->Ini->summary_css = $this->Ini->path_imag_temp . '/sc_css_chart_igd_hitung_sum_' . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css'] . '.css';
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] == "print")
     {
         $nm_saida->saida("  <style type=\"text/css\">\r\n");
         $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_chart_igd_hitung_sum_' . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css'] . '.css');
         foreach ($NM_css as $cada_css)
         {
              $nm_saida->saida("  " . str_replace("rn", "", $cada_css) . "\r\n");
         }
         $nm_saida->saida("  </style>\r\n");
     }
     else
     {
         $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->summary_css . "\" type=\"text/css\" media=\"screen\" />\r\n");
     }
      $nm_saida->saida(" <style type=\"text/css\">\r\n");
     if (!$this->Ini->Export_html_zip)     {
           $nm_saida->saida(" .scGridSummaryLabel a img[src$='" . $this->Ini->Label_sort_desc . "'], \r\n");
           $nm_saida->saida(" .scGridSummaryLabel a img[src$='" . $this->Ini->Label_sort_asc . "'], \r\n");
           $nm_saida->saida(" .scGridSummaryLabel a img[src$='" . $this->arr_buttons['bgraf']['image'] . "']{opacity:1!important;} \r\n");
           $nm_saida->saida(" .scGridSummaryLabel a img{opacity:0;transition:all .2s;} \r\n");
           $nm_saida->saida(" .scGridSummaryLabel:HOVER a img{opacity:1;transition:all .2s;} \r\n");
           $nm_saida->saida(" .scGridSummaryLabel span > img[src$='" . $this->Ini->Label_sort_desc . "'], \r\n");
           $nm_saida->saida(" .scGridSummaryLabel span > img[src$='" . $this->Ini->Label_sort_asc . "']{opacity:1!important;} \r\n");
           $nm_saida->saida(" .scGridSummaryLabel span > img{opacity:0;transition:all .2s;} \r\n");
           $nm_saida->saida(" .scGridSummaryLabel:HOVER span > img{opacity:1;transition:all .2s;} \r\n");
     }
      $nm_saida->saida(" .scGridTabela TD { white-space: nowrap }\r\n");
      $nm_saida->saida(" </style>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   $(function(){ \r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").mouseup(function(event){\r\n");
           $nm_saida->saida("          event.preventDefault();\r\n");
           $nm_saida->saida("          if(event.target !== event.currentTarget) return;\r\n");
           $nm_saida->saida("          if($(this).find(\"a\").prop('href') != '')\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              $(this).find(\"a\").click();\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("          else\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              eval($(this).find(\"a\").prop('onclick'));\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).addClass('selected');\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = '';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     }).mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup, bForce) {\r\n");
           $nm_saida->saida("     if (bForce || 'over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("       $('#sc_btgp_btn_' + sGroup).removeClass('selected');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_filter.css\" /> \r\n");
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\" />\r\n");
 } 
$nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_res_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("       $.ajax({\r\n");
           $nm_saida->saida("         type: \"GET\",\r\n");
           $nm_saida->saida("         dataType: \"html\",\r\n");
           $nm_saida->saida("         url: sUrl\r\n");
           $nm_saida->saida("       }).done(function(data) {\r\n");
           $nm_saida->saida("         $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("         $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("         $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("       });\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnSaveGridShow(origem, embbed, pos) {\r\n");
           $nm_saida->saida("       $.ajax({\r\n");
           $nm_saida->saida("         type: \"POST\",\r\n");
           $nm_saida->saida("         dataType: \"html\",\r\n");
           $nm_saida->saida("         url: \"chart_igd_hitung_save_grid.php\",\r\n");
           $nm_saida->saida("         data: \"path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&script_origem=\" + origem + \"&embbed_groupby=\" + embbed + \"&toolbar_pos=\" + pos\r\n");
           $nm_saida->saida("       }).done(function(data) {\r\n");
           $nm_saida->saida("         $(\"#sc_id_save_grid_placeholder_\" + pos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("         $(\"#sc_id_save_grid_placeholder_\" + pos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("         $(\"#sc_id_save_grid_placeholder_\" + pos).show();\r\n");
           $nm_saida->saida("       });\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnSaveGridHide(sPos) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("       $.ajax({\r\n");
           $nm_saida->saida("         type: \"GET\",\r\n");
           $nm_saida->saida("         dataType: \"html\",\r\n");
           $nm_saida->saida("         url: sUrl\r\n");
           $nm_saida->saida("       }).done(function(data) {\r\n");
           $nm_saida->saida("         $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("         $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("         $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("       });\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("       $.ajax({\r\n");
           $nm_saida->saida("         type: \"GET\",\r\n");
           $nm_saida->saida("         dataType: \"html\",\r\n");
           $nm_saida->saida("         url: sUrl\r\n");
           $nm_saida->saida("       }).done(function(data) {\r\n");
           $nm_saida->saida("         $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("         $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("         $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("       });\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </script>\r\n");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'] && !$this->Ini->sc_export_ajax && !$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
      {
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           $nm_saida->saida("   var Dyn_Ini   = true;\r\n");
           $nm_saida->saida("   var nmdg_Form = \"Fdyn_search\";\r\n");
           if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
           {
               $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
               foreach ($Tb_err_js as $Lines)
               {
                   if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
                   {
                       $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
                   }
                   echo "   " . $Lines;
               }
           }
           if ($_SESSION['scriptcase']['charset'] != "UTF-8")
           {
               $Msg_Inval = sc_convert_encoding("Inv�lido", $_SESSION['scriptcase']['charset'], "UTF-8");
           }
           echo "   var SC_crit_inv = \"" . $Msg_Inval . "\";\r\n";
           $nm_saida->saida("  function SC_init_jquery(){ \r\n");
           $nm_saida->saida("     $(function(){ \r\n");
           $nm_saida->saida("     if (Dyn_Ini)\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("         Dyn_Ini = false;\r\n");
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']))
          { 
           $nm_saida->saida("         SC_carga_evt_jquery_grid('all');\r\n");
          } 
           $nm_saida->saida("         scLoadScInput('input:text.sc-js-input');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery();\r\n");
           $nm_saida->saida("   </script>\r\n");
      }

if ($_SESSION['scriptcase']['proc_mobile'])
{
       $nm_saida->saida("   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
}

      $nm_saida->saida("</HEAD>\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['responsive_chart']['active']) {
          $summary_width = "width=\"100%\"";
          $chart_height = " style=\"height: 100%\"";
      }
      else {
          $chart_height = '';
          if ($_SESSION['scriptcase']['proc_mobile'])
          {
              $summary_width = "width=\"100%\"";
          }
          else
          {
              $summary_width = "width=\"\"";
          }
      }
      if (!$this->Ini->Export_html_zip && $this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word']) 
      {
          $nm_saida->saida(" <BODY class=\"" . $this->css_scGridPage . "\" style=\"-webkit-print-color-adjust: exact;\">\r\n");
          $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" " . $summary_width . ">\r\n");
          $nm_saida->saida("     <TR>\r\n");
          $nm_saida->saida("       <TD align=\"center\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("       </TD>\r\n");
          $nm_saida->saida("     </TR>\r\n");
          $nm_saida->saida("   </TABLE>\r\n");
          $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("     function prit_web_page()\r\n");
          $nm_saida->saida("     {\r\n");
          $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
          $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
          $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
          $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
          $nm_saida->saida("        window.print();\r\n");
          $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
          $nm_saida->saida("     }\r\n");
          $nm_saida->saida("  </script>\r\n");
      }
      else
      {
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['dashboard_info']['remove_margin'] ? ' style="margin: 0"' : '';
          $nm_saida->saida(" <BODY class=\"" . $this->css_scGridPage . "\"" . $remove_margin . ">\r\n");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none; position: absolute; left: 50px; top: 50px\"><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
      }
      $nm_saida->saida("<script type=\"text/javascript\">\r\n");
      $nm_saida->saida("function scChartImageExportShow(exportType) {\r\n");
      $nm_saida->saida("  $.ajax({\r\n");
      $nm_saida->saida("    type: \"POST\",\r\n");
      $nm_saida->saida("    url: \"index.php\",\r\n");
      $nm_saida->saida("    data: {\r\n");
      $nm_saida->saida("      script_case_init: \"" . NM_encode_input($this->Ini->sc_page) . "\",\r\n");
      $nm_saida->saida("      script_case_session: \"" . NM_encode_input(session_id()) . "\",\r\n");
      $nm_saida->saida("      nmgp_opcao: \"config_image\",\r\n");
      $nm_saida->saida("      exportType: exportType,\r\n");
      $nm_saida->saida("    }\r\n");
      $nm_saida->saida("  }).done(function(data) {\r\n");
          $nm_saida->saida("    scBlockUI();\r\n");
      $nm_saida->saida("    $(\"#sc-id-image-export-type\").val(exportType);\r\n");
          $nm_saida->saida("    $(\"#sc-id-image-export-config\").html(data).css({\r\n");
          $nm_saida->saida("      \"margin-left\": -$(\"#sc-id-image-export-config\").outerWidth()/2,\r\n");
          $nm_saida->saida("      \"margin-top\": -$(\"#sc-id-image-export-config\").outerHeight()/2\r\n");
          $nm_saida->saida("    }).show();\r\n");
      $nm_saida->saida("  });\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("function scChartImageExportHide() {\r\n");
      $nm_saida->saida("  $(\"#sc-id-image-export-config\").hide();\r\n");
          $nm_saida->saida("  scUnblockUI();\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("function scChartImageExportProcess() {\r\n");
      $nm_saida->saida("  var imageLevel;\r\n");
      $nm_saida->saida("  if ($(\"#sc-id-chart-level\").length) {\r\n");
      $nm_saida->saida("    imageLevel = $(\"#sc-id-chart-level\").val();\r\n");
      $nm_saida->saida("  }\r\n");
      $nm_saida->saida("  else {\r\n");
      $nm_saida->saida("    imageLevel = $(\".sc-id-chart-image-level\").filter(\":checked\").val();\r\n");
      $nm_saida->saida("  }\r\n");
      $nm_saida->saida("  scChartImageExportHide();\r\n");
      $nm_saida->saida("  scShowCombinationImage(imageLevel, $(\"#sc-id-image-export-type\").val(), $(\"#sc-id-image-export-pwd\").val());\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("</script>\r\n");
      $nm_saida->saida("<div id=\"sc-id-image-export-config\" class=\"scGridBorder\" style=\"box-shadow: rgb(136, 136, 136) 5px 5px 5px 0px; position: absolute; left: 50%; top: 50%; z-index: 1000; width: 350px; display: none\">\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("<div id=\"sc-id-image-export-process\" class=\"scGridBorder\" style=\"box-shadow: rgb(136, 136, 136) 5px 5px 5px 0px; position: absolute; left: 50%; top: 50%; z-index: 1000; width: 350px; display: none\">\r\n");
      $nm_saida->saida("  <table class=\"scGridTabela\" cellspacing=\"0\" cellpadding=\"0\">\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridLabelVert\">" . $this->Ini->Nm_lang['lang_chrt_export'] . "</td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridFieldOdd scGridFieldOddFont\">\r\n");
      $nm_saida->saida("       <span id=\"sc-id-image-export-message\"></span>\r\n");
      $nm_saida->saida("       <br />\r\n");
      $nm_saida->saida("       <div id=\"sc-id-image-export-progressbar\"></div>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("  </table>\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("<script type=\"text/javascript\">\r\n");
      $nm_saida->saida("function scChartWordExportShow(exportType) {\r\n");
          $nm_saida->saida("  scShowCombinationWord(exportType, \"color\", \"\");\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("function scChartWordExportHide() {\r\n");
      $nm_saida->saida("  $(\"#sc-id-word-export-config\").hide();\r\n");
          $nm_saida->saida("  scUnblockUI();\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("function scChartWordExportProcess() {\r\n");
      $nm_saida->saida("  scChartWordExportHide();\r\n");
      $nm_saida->saida("  scShowCombinationWord($(\"#sc-id-word-export-type\").val(), $(\"#sc-id-chart-word-color\").val(), $(\"#sc-id-chart-word-pwd\").val());\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("</script>\r\n");
      $nm_saida->saida("<div id=\"sc-id-word-export-config\" class=\"scGridBorder\" style=\"box-shadow: rgb(136, 136, 136) 5px 5px 5px 0px; position: absolute; left: 50%; top: 50%; z-index: 1000; width: 350px; display: none\">\r\n");
      $nm_saida->saida("  <input type=\"hidden\" id=\"sc-id-word-export-type\" />\r\n");
      $nm_saida->saida("  <table class=\"scGridTabela\" cellspacing=\"0\" cellpadding=\"0\">\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridLabelVert\">" . $this->Ini->Nm_lang['lang_chrt_img_cfg'] . "</td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridFieldOdd scGridFieldOddFont\">\r\n");
      $nm_saida->saida("        <table style=\"border-collapse: collapse; border-width: 0px\">\r\n");
      $nm_saida->saida("          <tr>\r\n");
      $nm_saida->saida("            <td class=\"scGridFieldOddFont\">" . wordwrap($this->Ini->Nm_lang['lang_pdff_type'], 25, '<br />', true) . "</td>\r\n");
      $nm_saida->saida("            <td class=\"scGridFieldOddFont\">\r\n");
      $nm_saida->saida("              <select id=\"sc-id-chart-word-color\" class=\"scFormObjectOdd\">\r\n");
      $nm_saida->saida("                <option value=\"color\">" . $this->Ini->Nm_lang['lang_pdff_colr'] . "</option>\r\n");
      $nm_saida->saida("                <option value=\"bw\">" . $this->Ini->Nm_lang['lang_pdff_bndw'] . "</option>\r\n");
      $nm_saida->saida("              </select>\r\n");
      $nm_saida->saida("            </td>\r\n");
      $nm_saida->saida("          </tr>\r\n");
      $nm_saida->saida("          <input type=\"hidden\" id=\"sc-id-chart-word-pwd\" value=\"color\" />\r\n");
      $nm_saida->saida("        </table>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridToolbar\" style=\"text-align: center\">\r\n");
      $okButton    = nmButtonOutput($this->arr_buttons, "bok", "scChartWordExportProcess()", "scChartWordExportProcess()", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
;
      $closeButton = nmButtonOutput($this->arr_buttons, "bsair", "scChartWordExportHide()", "scChartWordExportHide()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
;
      $nm_saida->saida("        " . $okButton . "\r\n");
      $nm_saida->saida("        " . $closeButton . "\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("  </table>\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("<script type=\"text/javascript\">\r\n");
      $nm_saida->saida("function scChartPrintExportShow(exportType) {\r\n");
      $nm_saida->saida("  $.ajax({\r\n");
      $nm_saida->saida("    type: \"POST\",\r\n");
      $nm_saida->saida("    url: \"index.php\",\r\n");
      $nm_saida->saida("    data: {\r\n");
      $nm_saida->saida("      script_case_init: \"" . NM_encode_input($this->Ini->sc_page) . "\",\r\n");
      $nm_saida->saida("      script_case_session: \"" . NM_encode_input(session_id()) . "\",\r\n");
      $nm_saida->saida("      nmgp_opcao: \"config_print\",\r\n");
      $nm_saida->saida("      exportType: exportType,\r\n");
      $nm_saida->saida("    }\r\n");
      $nm_saida->saida("  }).done(function(data) {\r\n");
      $nm_saida->saida("    scBlockUI();\r\n");
      $nm_saida->saida("    $(\"#sc-id-print-export-type\").val(exportType);\r\n");
      $nm_saida->saida("    $(\"#sc-id-print-export-config\").html(data).css({\r\n");
      $nm_saida->saida("      \"margin-left\": -$(\"#sc-id-print-export-config\").outerWidth()/2,\r\n");
      $nm_saida->saida("      \"margin-top\": -$(\"#sc-id-print-export-config\").outerHeight()/2\r\n");
      $nm_saida->saida("    }).show();\r\n");
      $nm_saida->saida("  });\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("function scChartPrintExportHide() {\r\n");
      $nm_saida->saida("  $(\"#sc-id-print-export-config\").hide();\r\n");
      $nm_saida->saida("  scUnblockUI();\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("function scChartPrintExportProcess() {\r\n");
      $nm_saida->saida("  scChartPrintExportHide();\r\n");
      $nm_saida->saida("  scShowCombinationPrint($(\".sc-id-chart-print-level\").filter(\":checked\").val(), $(\"#sc-id-print-export-type\").val(), $(\"#sc-id-chart-print-color\").val());\r\n");
      $nm_saida->saida("}\r\n");
      $nm_saida->saida("</script>\r\n");
      $nm_saida->saida("<div id=\"sc-id-print-export-config\" class=\"scGridBorder\" style=\"box-shadow: rgb(136, 136, 136) 5px 5px 5px 0px; position: absolute; left: 50%; top: 50%; z-index: 1000; width: 350px; display: none\">\r\n");
      $nm_saida->saida("  <input type=\"hidden\" id=\"sc-id-print-export-type\" />\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("<div id=\"sc-id-print-export-process\" class=\"scGridBorder\" style=\"box-shadow: rgb(136, 136, 136) 5px 5px 5px 0px; position: absolute; left: 50%; top: 50%; z-index: 1000; width: 350px; display: none\">\r\n");
      $nm_saida->saida("  <table class=\"scGridTabela\" cellspacing=\"0\" cellpadding=\"0\">\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridLabelVert\">" . $this->Ini->Nm_lang['lang_chrt_export'] . "</td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("    <tr>\r\n");
      $nm_saida->saida("      <td class=\"scGridFieldOdd scGridFieldOddFont\">\r\n");
      $nm_saida->saida("       <span id=\"sc-id-print-export-message\"></span>\r\n");
      $nm_saida->saida("       <br />\r\n");
      $nm_saida->saida("       <div id=\"sc-id-print-export-progressbar\"></div>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("    </tr>\r\n");
      $nm_saida->saida("  </table>\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] == "pdf")
      { 
              $nm_saida->saida("  <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
      { 
          $nm_saida->saida("      <STYLE>\r\n");
          $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
          $nm_saida->saida("      </STYLE>\r\n");
          $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
      } 

      }

      $nm_saida->saida("<TABLE id=\"main_table_res\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" " . $summary_width . $chart_height . ">\r\n");
      $nm_saida->saida(" <TR>\r\n");
      $nm_saida->saida("  <TD" . $chart_height . ">\r\n");
      $nm_saida->saida("  <div class=\"scGridBorder\"" . $chart_height . ">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"scGridLabel\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
      $nm_saida->saida("  <table width='100%' cellspacing=0 cellpadding=0" . $chart_height . ">\r\n");
      $nm_saida->saida("<TR>\r\n");
      $nm_saida->saida("<TD style=\"padding: 0px; vertical-align: initial\">\r\n");
      $nm_saida->saida("<TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px; border-collapse: collapse;  vertical-align: top; width: 100%;\">\r\n");
   }

   //-----  top
   function monta_barra_top_mobile()
   {
      global $nm_url_saida, $nm_apl_dependente, $nm_saida;
      $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
      $Save_res_sem_reg = $this->NM_res_sem_reg;
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'] && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_resumo_search']))
      {
          $this->NM_res_sem_reg = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      {
         $nm_saida->saida(" <TR align=\"center\" id=\"obj_barra_top\">\r\n");
         $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\">\r\n");
         $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top; width: 100%;\">\r\n");
         $nm_saida->saida("    <TR>\r\n");
         $nm_saida->saida("     <TD class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\">\r\n");
         $NM_btn  = false;
         $NM_Gbtn = false;
         if ($this->nmgp_botoes['chart_sort'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsort", "scShowSort('#chart_sort_on_top');", "scShowSort('#chart_sort_on_top');", "chart_sort_on_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         if ($this->nmgp_botoes['chart_custom'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcpersonalite", "scToggleCustomization();", "scToggleCustomization();", "chart_custom_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         if ($NM_btn && is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid) && !$this->NM_res_sem_reg)
         {
            $nm_saida->saida("          <img id=\"NM_sep_\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
            $NM_btn = false;
         }
      if (!$this->grid_emb_form && $this->nmgp_botoes['group_3'] == "on")
      {
          $Cod_Btn = nmButtonGroupOutput($this->arr_buttons, "group_group_3", 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
         $nm_saida->saida("     <script type=\"text/javascript\">\r\n");
         $nm_saida->saida("      function scEnableBarChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_bar_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_bar_top').parent().removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_bar_top').removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       if (tp_graf_atual == 'bar') {\r\n");
         $nm_saida->saida("        if ($('#chart_bar_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("         $('#chart_bar_top').parent().addClass(\"selected\");\r\n");
         $nm_saida->saida("        }\r\n");
         $nm_saida->saida("        $('#chart_bar_top').addClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("      function scDisableBarChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_bar_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_bar_top').parent().addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_bar_top').addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("     </script>\r\n");
         if ($this->nmgp_botoes['chart_bar'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bchart_bar", "scChangeChartTypeButton('column2d');", "scChangeChartTypeButton('column2d');", "chart_bar_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "sc-chart-type-button", "", "", "only_text", "text_right", "", "", "", "", "", "", " first=first");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         $nm_saida->saida("     <script type=\"text/javascript\">\r\n");
         $nm_saida->saida("      function scEnableLineChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_line_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_line_top').parent().removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_line_top').removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       if (tp_graf_atual == 'line') {\r\n");
         $nm_saida->saida("        if ($('#chart_line_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("         $('#chart_line_top').parent().addClass(\"selected\");\r\n");
         $nm_saida->saida("        }\r\n");
         $nm_saida->saida("        $('#chart_line_top').addClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("      function scDisableLineChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_line_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_line_top').parent().addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_line_top').addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("     </script>\r\n");
         if ($this->nmgp_botoes['chart_line'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bchart_line", "scChangeChartTypeButton('line');", "scChangeChartTypeButton('line');", "chart_line_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "sc-chart-type-button", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         $nm_saida->saida("     <script type=\"text/javascript\">\r\n");
         $nm_saida->saida("      function scEnableAreaChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_area_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_area_top').parent().removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_area_top').removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       if (tp_graf_atual == 'area') {\r\n");
         $nm_saida->saida("        if ($('#chart_area_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("         $('#chart_area_top').parent().addClass(\"selected\");\r\n");
         $nm_saida->saida("        }\r\n");
         $nm_saida->saida("        $('#chart_area_top').addClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("      function scDisableAreaChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_area_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_area_top').parent().addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_area_top').addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("     </script>\r\n");
         if ($this->nmgp_botoes['chart_area'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bchart_area", "scChangeChartTypeButton('area');", "scChangeChartTypeButton('area');", "chart_area_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "sc-chart-type-button", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         $nm_saida->saida("     <script type=\"text/javascript\">\r\n");
         $nm_saida->saida("      function scEnablePieChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_pizza_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_pizza_top').parent().removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_pizza_top').removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       if (tp_graf_atual == 'pie') {\r\n");
         $nm_saida->saida("        if ($('#chart_pizza_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("         $('#chart_pizza_top').parent().addClass(\"selected\");\r\n");
         $nm_saida->saida("        }\r\n");
         $nm_saida->saida("        $('#chart_pizza_top').addClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("      function scDisablePieChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_pizza_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_pizza_top').parent().addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_pizza_top').addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("     </script>\r\n");
         if ($this->nmgp_botoes['chart_pizza'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bchart_pizza", "scChangeChartTypeButton('pie2d');", "scChangeChartTypeButton('pie2d');", "chart_pizza_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "sc-chart-type-button", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         $nm_saida->saida("     <script type=\"text/javascript\">\r\n");
         $nm_saida->saida("      function scEnableStackedColumnChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_stack_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_stack_top').parent().removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_stack_top').removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       if (tp_graf_atual == 'stack') {\r\n");
         $nm_saida->saida("        if ($('#chart_stack_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("         $('#chart_stack_top').parent().addClass(\"selected\");\r\n");
         $nm_saida->saida("        }\r\n");
         $nm_saida->saida("        $('#chart_stack_top').addClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("      function scDisableStackedColumnChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_stack_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_stack_top').parent().addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_stack_top').addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("     </script>\r\n");
         if ($this->nmgp_botoes['chart_stack'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bchart_stack", "scChangeChartTypeButton('stackedcolumn2d');", "scChangeChartTypeButton('stackedcolumn2d');", "chart_stack_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "sc-chart-type-button", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         $nm_saida->saida("     <script type=\"text/javascript\">\r\n");
         $nm_saida->saida("      function scEnableCombinationChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_combo_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_combo_top').parent().removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_combo_top').removeClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       if (tp_graf_atual == 'combo') {\r\n");
         $nm_saida->saida("        if ($('#chart_combo_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("         $('#chart_combo_top').parent().addClass(\"selected\");\r\n");
         $nm_saida->saida("        }\r\n");
         $nm_saida->saida("        $('#chart_combo_top').addClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("      function scDisableCombinationChartButton_top() {\r\n");
         $nm_saida->saida("       if ($('#chart_combo_top').hasClass(\"scBtnGrpLink\")) {\r\n");
         $nm_saida->saida("        $('#chart_combo_top').parent().addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("       }\r\n");
         $nm_saida->saida("       $('#chart_combo_top').addClass(\"disabled\").removeClass(\"selected\");\r\n");
         $nm_saida->saida("      }\r\n");
         $nm_saida->saida("     </script>\r\n");
         if ($this->nmgp_botoes['chart_combo'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bchart_combo", "scChangeChartTypeButton('combination2d');", "scChangeChartTypeButton('combination2d');", "chart_combo_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "sc-chart-type-button", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         if ($this->nmgp_botoes['chart_type'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bctype", "scShowChartSelection('#chart_type_top');", "scShowChartSelection('#chart_type_top');", "chart_type_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", " last=last");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
          $Cod_Btn = nmButtonGroupOutput($this->arr_buttons, "group_group_3", 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
      }
         if ($this->nmgp_botoes['chart_summary'] == 'on') {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcresumo", "scShowCombinationTable();", "scShowCombinationTable();", "chart_table_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", " last=last");
            $nm_saida->saida("     $Cod_Btn\r\n");
            $NM_btn = true;
         }
         $nm_saida->saida("     </TD> \r\n");
         $nm_saida->saida("     <TD class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\">\r\n");
         $NM_btn = false;
         $NM_Gbtn = false;
         $nm_saida->saida("     </TD> \r\n");
         $nm_saida->saida("     <TD class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\">\r\n");
         $NM_btn = false;
         $NM_Gbtn = false;
      if (!$this->grid_emb_form && $this->nmgp_botoes['group_1'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if (!$this->grid_emb_form && $this->nmgp_botoes['pdf'] == "on" && !$this->NM_res_sem_reg)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Rpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=8&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=s&nm_res_cons=s&nm_ini_pdf_res=chart&nm_all_modules=chart&password=n&summary_export_columns=N&pdf_zip=N&origem=chart&language=id&conf_socor=N&is_chart_app=Y&nm_label_group=N&nm_all_cab=S&nm_all_label=S&nm_orient_grid=2&script_case_init=" . $this->Ini->sc_page . "&app_name=chart_igd_hitung&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if (!$this->grid_emb_form && $this->nmgp_botoes['print'] == "on" && !$this->NM_res_sem_reg)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Rprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=resumo&nm_cor=CO&nm_res_cons=s&nm_ini_prt_res=chart&nm_all_modules=chart&password=n&origem=chart&language=id&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['filter'] == 'on' && !$this->Ini->SC_Link_View && !$this->grid_emb_form)
      {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'res');", "nm_gp_move('busca', '0', 'res');", "Rpesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
      }
         if (is_file("chart_igd_hitung_help.txt") && !$this->grid_emb_form && !$this->NM_res_sem_reg)
         {
            $Arq_WebHelp = file("chart_igd_hitung_help.txt"); 
            if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
            {
                $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                $Tmp = explode(";", $Arq_WebHelp[0]); 
                foreach ($Tmp as $Cada_help)
                {
                    $Tmp1 = explode(":", $Cada_help); 
                    if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "chart" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                    {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "Rhelp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                    }
                }
            }
         }
      if ($this->nmgp_botoes['chart_exit'] == 'on' && !$this->grid_emb_form)
      {
         if ($nm_apl_dependente == 1) 
         { 
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.FRES.action='$nm_url_saida'; document.FRES.submit();", "document.FRES.action='$nm_url_saida'; document.FRES.submit();", "Rsai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe) 
         { 
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.FRES.action='$nm_url_saida'; document.FRES.submit();", "document.FRES.action='$nm_url_saida'; document.FRES.submit();", "Rsai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         } 
      }
         $nm_saida->saida("     </TD>\r\n");
         $nm_saida->saida("    </TR>\r\n");
         $nm_saida->saida("   </TABLE>\r\n");
         $nm_saida->saida("  </TD>\r\n");
         $nm_saida->saida(" </TR>\r\n");
      }
      $this->NM_res_sem_reg = $Save_res_sem_reg;
   }

   //-----  bot
   function monta_barra_bot_normal()
   {
      global $nm_url_saida, $nm_apl_dependente, $nm_saida;
      $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
      $Save_res_sem_reg = $this->NM_res_sem_reg;
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'] && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_resumo_search']))
      {
          $this->NM_res_sem_reg = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      {
         $nm_saida->saida(" <TR align=\"center\" id=\"obj_barra_bot\">\r\n");
         $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\">\r\n");
         $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top; width: 100%;\">\r\n");
         $nm_saida->saida("    <TR>\r\n");
         $nm_saida->saida("     <TD class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\">\r\n");
         $NM_btn  = false;
         $NM_Gbtn = false;
         $nm_saida->saida("     </TD> \r\n");
         $nm_saida->saida("     <TD class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\">\r\n");
         $NM_btn = false;
         $NM_Gbtn = false;
      if (!$this->grid_emb_form && $this->nmgp_botoes['group_1'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_bot = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_bot')", "scBtnGrpShow('group_1_bot')", "sc_btgp_btn_group_1_bot", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'bot', 'app', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if (!$this->grid_emb_form && $this->nmgp_botoes['pdf'] == "on" && !$this->NM_res_sem_reg)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Rpdf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=8&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=s&nm_res_cons=s&nm_ini_pdf_res=chart&nm_all_modules=chart&password=n&summary_export_columns=N&pdf_zip=N&origem=chart&language=id&conf_socor=N&is_chart_app=Y&nm_label_group=N&nm_all_cab=S&nm_all_label=S&nm_orient_grid=2&script_case_init=" . $this->Ini->sc_page . "&app_name=chart_igd_hitung&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if (!$this->grid_emb_form && $this->nmgp_botoes['print'] == "on" && !$this->NM_res_sem_reg)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Rprint_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=resumo&nm_cor=CO&nm_res_cons=s&nm_ini_prt_res=chart&nm_all_modules=chart&password=n&origem=chart&language=id&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'bot', 'app', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_bot) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_bot').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
         $nm_saida->saida("     </TD> \r\n");
         $nm_saida->saida("     <TD class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\">\r\n");
         $NM_btn = false;
         $NM_Gbtn = false;
         if (is_file("chart_igd_hitung_help.txt") && !$this->grid_emb_form && !$this->NM_res_sem_reg)
         {
            $Arq_WebHelp = file("chart_igd_hitung_help.txt"); 
            if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
            {
                $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                $Tmp = explode(";", $Arq_WebHelp[0]); 
                foreach ($Tmp as $Cada_help)
                {
                    $Tmp1 = explode(":", $Cada_help); 
                    if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "chart" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                    {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "Rhelp_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                    }
                }
            }
         }
         $nm_saida->saida("     </TD>\r\n");
         $nm_saida->saida("    </TR>\r\n");
         $nm_saida->saida("   </TABLE>\r\n");
         $nm_saida->saida("  </TD>\r\n");
         $nm_saida->saida(" </TR>\r\n");
      }
      $this->NM_res_sem_reg = $Save_res_sem_reg;
   }

   function monta_barra_top()
   {
       if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->monta_barra_top_mobile();
       }
       else
       {
           $this->monta_barra_top_normal();
       }
   }
   function monta_barra_bot()
   {
       if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->monta_barra_bot_mobile();
       }
       else
       {
           $this->monta_barra_bot_normal();
       }
   }
   function monta_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function monta_embbed_placeholder_mobile_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   //----- 
   function monta_html_fim()
   {
      global $nm_saida;
      $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
      $nm_saida->saida("</TABLE>\r\n");
      $nm_saida->saida("<link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_sweetalert.css\" />\r\n");
      $nm_saida->saida("<script type=\"text/javascript\" src=\"" . $_SESSION['scriptcase']['chart_igd_hitung']['glo_nm_path_prod'] . "/third/sweetalert/sweetalert2.all.min.js\"></script>\r\n");
      $nm_saida->saida("<script type=\"text/javascript\" src=\"" . $_SESSION['scriptcase']['chart_igd_hitung']['glo_nm_path_prod'] . "/third/sweetalert/polyfill.min.js\"></script>\r\n");
      $nm_saida->saida("<script type=\"text/javascript\" src=\"../_lib/lib/js/frameControl.js\"></script>\r\n");
      $confirmButtonClass = '';
      $cancelButtonClass  = '';
      $confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
      $cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
      $confirmButtonFA    = '';
      $cancelButtonFA     = '';
      $confirmButtonFAPos = '';
      $cancelButtonFAPos  = '';
      if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
          $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
      }
      if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
          $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
      }
      if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
          $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
      }
      if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
          $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
      }
      if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
          $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
      }
      if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
          $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
      }
      if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
          $confirmButtonFAPos = 'text_right';
      }
      if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
          $cancelButtonFAPos = 'text_right';
      }
      $nm_saida->saida("<script type=\"text/javascript\">\r\n");
      $nm_saida->saida("  var scSweetAlertConfirmButton = \"" . $confirmButtonClass . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertCancelButton = \"" . $cancelButtonClass . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertConfirmButtonText = \"" . $confirmButtonText . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertCancelButtonText = \"" . $cancelButtonText . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertConfirmButtonFA = \"" . $confirmButtonFA . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertCancelButtonFA = \"" . $cancelButtonFA . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertConfirmButtonFAPos = \"" . $confirmButtonFAPos . "\";\r\n");
      $nm_saida->saida("  var scSweetAlertCancelButtonFAPos = \"" . $cancelButtonFAPos . "\";\r\n");
      $nm_saida->saida("</script>\r\n");
      $nm_saida->saida("<script type=\"text/javascript\">\r\n");
      $nm_saida->saida("$(function() {\r\n");
      if (count($this->nm_mens_alert) || count($this->Ini->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
           { 
               $this->Ini->Arr_result['AlertJS'][] = NM_charset_to_utf8($mensagem);
               $this->Ini->Arr_result['AlertJSParam'][] = $alertParams;
           } 
           else 
           { 
$nm_saida->saida("       scJs_alert('" . $mensagem . "', $jsonParams);\r\n");
           } 
       }
   }
      }
      $nm_saida->saida("});\r\n");
      $nm_saida->saida("</script>\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['embutida'])
      { 
          return;
      } 
      $_SESSION['scriptcase']['saida_var'] = false; 
      if (!isset($_GET['flash_graf']))
      {
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
      { 
      $nm_saida->saida("</BODY>\r\n");
      $nm_saida->saida("</HTML>\r\n");
          return;
      } 
      if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'])
      {
          $this->grafico_pdf_flash();
      }
      elseif ($this->Ini->Export_html_zip || ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['graf_pdf'] == "S"))
      {
          $this->grafico_pdf();
      }
      else
      {
      echo $_SESSION['scriptcase']['saida_html']; 
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['doc_word'])
{ 
      $nm_saida->saida("</TD>\r\n");
      $nm_saida->saida("</TR>\r\n");
      $nm_saida->saida("</TABLE>\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("</TD>\r\n");
      $nm_saida->saida("</TR>\r\n");
      $nm_saida->saida("</TABLE>\r\n");
       $nm_saida->saida("<script type=\"text/javascript\">\r\n");
       $nm_saida->saida("function summaryConfig() {\r\n");
       $nm_saida->saida("  tb_show('', 'chart_igd_hitung_config_pivot.php?nome_apl=chart_igd_hitung&sc_page=" . NM_encode_input($this->Ini->sc_page) . "&language=id&TB_iframe=true&modal=true&height=300&width=500', '');\r\n");
       $nm_saida->saida("}\r\n");
       $nm_saida->saida("function changeSort(col, ord, oldSort) {\r\n");
       $nm_saida->saida("  Parm_change  = 'change_sort*scin';\r\n");
       $nm_saida->saida("  Parm_change += oldSort ? 'Y' : 'NEW';\r\n");
       $nm_saida->saida("  Parm_change += '*scoutsort_col*scin';\r\n");
       $nm_saida->saida("  Parm_change +=  col;\r\n");
       $nm_saida->saida("  Parm_change += '*scoutsort_ord*scin';\r\n");
       $nm_saida->saida("  Parm_change +=  ord;\r\n");
       $nm_saida->saida("  nm_gp_submit_ajax('resumo', Parm_change);\r\n");
       $nm_saida->saida("}\r\n");
       $nm_saida->saida("</script>\r\n");
       $nm_saida->saida("<form name=\"refresh_config\" method=\"post\" action=\"./\" style=\"display: none\">\r\n");
       $nm_saida->saida("<input type=\"hidden\" name=\"nmgp_opcao\" value=\"resumo\" />\r\n");
       $nm_saida->saida("<input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\" />\r\n");
       $nm_saida->saida("<input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\" />\r\n");
       $nm_saida->saida("<input type=\"hidden\" name=\"change_sort\" value=\"N\" />\r\n");
       $nm_saida->saida("<input type=\"hidden\" name=\"sort_col\" />\r\n");
       $nm_saida->saida("<input type=\"hidden\" name=\"sort_ord\" />\r\n");
       $nm_saida->saida("</form>\r\n");
}
          $nm_saida->saida("<FORM name=\"F3\" method=\"post\" action=\"./\"\r\n");
          $nm_saida->saida("                                  target = \"_self\" style=\"display: none\"> \r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_chave\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_opcao\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_ordem\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_chave_det\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_url_saida\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_parms\" value=\"\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\" />\r\n");
          $nm_saida->saida("</FORM>\r\n");
          $nm_saida->saida("<form name=\"FRES\" method=\"post\" \r\n");
          $nm_saida->saida("                    action=\"\" \r\n");
          $nm_saida->saida("                    target=\"_self\" style=\"display: none\"> \r\n");
          $nm_saida->saida("<input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
          $nm_saida->saida("<input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\" />\r\n");
          $nm_saida->saida("</form> \r\n");
          $nm_saida->saida("<form name=\"FRES_chart_export_view\" method=\"get\" target=\"_blank\" style=\"display: none\"></form>\r\n");
          $nm_saida->saida("<form name=\"FCONS\" method=\"post\" \r\n");
          $nm_saida->saida("                    action=\"./\" \r\n");
          $nm_saida->saida("                    target=\"_self\" style=\"display: none\"> \r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_opcao\" value=\"link_res\" />\r\n");
          $nm_saida->saida("<INPUT type=\"hidden\" name=\"nmgp_parms_where\" value=\"\" />\r\n");
          $nm_saida->saida("<input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
          $nm_saida->saida("<input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\" />\r\n");
          $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\" />\r\n");
   $nm_saida->saida("   </form> \r\n");
          $nm_saida->saida("<form name=\"Fgraf\" method=\"post\" \r\n");
          $nm_saida->saida("                   action=\"./\" \r\n");
          $nm_saida->saida("                   target=\"_self\" style=\"display: none\"> \r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"nmgp_opcao\" value=\"grafico\"/>\r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"campo\" value=\"\"/>\r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"nivel_quebra\" value=\"\"/>\r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"campo_val\" value=\"\"/>\r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"nmgp_parms\" value=\"\" />\r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\" />\r\n");
          $nm_saida->saida("  <input type=\"hidden\" name=\"summary_css\" value=\"" . NM_encode_input($this->Ini->summary_css) . "\"/> \r\n");
          $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("<form name=\"Fprint\" id=\"sc-id-form-print\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"chart_igd_hitung_iframe_prt.php\" \r\n");
   $nm_saida->saida("                  target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"opcao\" value=\"res_print\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"tp_print\" value=\"RC\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"nmgp_opcao\" value=\"res_print\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"nmgp_tipo_print\" value=\"RC\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("  <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("   <form name=\"Fexport\" id=\"sc-id-form-export\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tp_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tot_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_line\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_col\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_dados\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_label_csv\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_tag\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_format\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
          $nm_saida->saida("<SCRIPT language=\"Javascript\">\r\n");
          $nm_saida->saida(" function nm_link_cons(x) \r\n");
          $nm_saida->saida(" {\r\n");
          $nm_saida->saida("     document.FCONS.nmgp_parms_where.value = x;\r\n");
          $nm_saida->saida("     document.FCONS.submit();\r\n");
          $nm_saida->saida(" }\r\n");
          $nm_saida->saida("   function nm_gp_print_conf(tp, cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (\"R\" == ajax)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           $('#TB_window').remove();\r\n");
          $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
          $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           document.Fprint.tp_print.value = tp;\r\n");
          $nm_saida->saida("           document.Fprint.cor_print.value = cor;\r\n");
          $nm_saida->saida("           document.Fprint.nmgp_tipo_print.value = tp;\r\n");
          $nm_saida->saida("           document.Fprint.nmgp_cor_print.value = cor;\r\n");
          $nm_saida->saida("           document.Fprint.SC_module_export.value = SC_module_export;\r\n");
          $nm_saida->saida("           document.Fprint.nmgp_password.value = password;\r\n");
          $nm_saida->saida("           if (password != \"\")\r\n");
          $nm_saida->saida("           {\r\n");
          $nm_saida->saida("               document.Fprint.target = '_self';\r\n");
          $nm_saida->saida("               document.Fprint.action = \"chart_igd_hitung_export_ctrl.php\";\r\n");
          $nm_saida->saida("           }\r\n");
          $nm_saida->saida("           else\r\n");
          $nm_saida->saida("           {\r\n");
          $nm_saida->saida("               window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
          $nm_saida->saida("           }\r\n");
          $nm_saida->saida("           document.Fprint.submit() ;\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("   function nm_gp_xls_conf(tp_xls, SC_module_export, password, tot_xls, ajax, str_type, bol_param)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (\"R\" == ajax)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           $('#TB_window').remove();\r\n");
          $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
          $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_opcao.value = 'xls_res';\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
          $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
          $nm_saida->saida("           $.ajax({\r\n");
          $nm_saida->saida("               type: \"POST\",\r\n");
          $nm_saida->saida("               url: $(\"#sc-id-form-export\").attr(\"action\"),\r\n");
          $nm_saida->saida("               data: $(\"#sc-id-form-export\").serialize(),\r\n");
          $nm_saida->saida("           }).done(function(data) {\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").html(data);\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").css({\"height\": \"200px\"});\r\n");
          $nm_saida->saida("               $(\"#sc-id-hide-comb-table\").hide();\r\n");
          $nm_saida->saida("               setTimeout(function() { tb_show('', \"?#TB_inline&height=200&width=500&inlineId=sc-id-combination-table&modal=true\"); }, 100);\r\n");
          $nm_saida->saida("           });\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (\"R\" == ajax)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           $('#TB_window').remove();\r\n");
          $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
          $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"csv_res\";\r\n");
          $nm_saida->saida("           document.Fexport.nm_delim_line.value = delim_line;\r\n");
          $nm_saida->saida("           document.Fexport.nm_delim_col.value = delim_col;\r\n");
          $nm_saida->saida("           document.Fexport.nm_delim_dados.value = delim_dados;\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
          $nm_saida->saida("           document.Fexport.nm_label_csv.value = label_csv;\r\n");
          $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
          $nm_saida->saida("           $.ajax({\r\n");
          $nm_saida->saida("               type: \"POST\",\r\n");
          $nm_saida->saida("               url: $(\"#sc-id-form-export\").attr(\"action\"),\r\n");
          $nm_saida->saida("               data: $(\"#sc-id-form-export\").serialize(),\r\n");
          $nm_saida->saida("           }).done(function(data) {\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").html(data);\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").css({\"height\": \"200px\"});\r\n");
          $nm_saida->saida("               $(\"#sc-id-hide-comb-table\").hide();\r\n");
          $nm_saida->saida("               setTimeout(function() { tb_show('', \"?#TB_inline&height=200&width=500&inlineId=sc-id-combination-table&modal=true\"); }, 100);\r\n");
          $nm_saida->saida("           });\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (\"R\" == ajax)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           $('#TB_window').remove();\r\n");
          $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
          $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xml_res\";\r\n");
          $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
          $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
          $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
          $nm_saida->saida("           $.ajax({\r\n");
          $nm_saida->saida("               type: \"POST\",\r\n");
          $nm_saida->saida("               url: $(\"#sc-id-form-export\").attr(\"action\"),\r\n");
          $nm_saida->saida("               data: $(\"#sc-id-form-export\").serialize(),\r\n");
          $nm_saida->saida("           }).done(function(data) {\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").html(data);\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").css({\"height\": \"200px\"});\r\n");
          $nm_saida->saida("               $(\"#sc-id-hide-comb-table\").hide();\r\n");
          $nm_saida->saida("               setTimeout(function() { tb_show('', \"?#TB_inline&height=200&width=500&inlineId=sc-id-combination-table&modal=true\"); }, 100);\r\n");
          $nm_saida->saida("           });\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (\"R\" == ajax)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           $('#TB_window').remove();\r\n");
          $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
          $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_opcao.value    = \"json_res\";\r\n");
          $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
          $nm_saida->saida("           document.Fexport.nm_json_label.value = json_label;\r\n");
          $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
          $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
          $nm_saida->saida("           $.ajax({\r\n");
          $nm_saida->saida("               type: \"POST\",\r\n");
          $nm_saida->saida("               url: $(\"#sc-id-form-export\").attr(\"action\"),\r\n");
          $nm_saida->saida("               data: $(\"#sc-id-form-export\").serialize(),\r\n");
          $nm_saida->saida("           }).done(function(data) {\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").html(data);\r\n");
          $nm_saida->saida("               $(\"#sc-id-combination-content\").css({\"height\": \"200px\"});\r\n");
          $nm_saida->saida("               $(\"#sc-id-hide-comb-table\").hide();\r\n");
          $nm_saida->saida("               setTimeout(function() { tb_show('', \"?#TB_inline&height=200&width=500&inlineId=sc-id-combination-table&modal=true\"); }, 100);\r\n");
          $nm_saida->saida("           });\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       document.Fexport.nmgp_opcao.value = \"rtf_res\";\r\n");
          $nm_saida->saida("       document.Fexport.action = \"chart_igd_hitung_export_ctrl.php\";\r\n");
          $nm_saida->saida("       document.Fexport.submit() ;\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida(" function nm_gp_submit_ajax(opc, parm) \r\n");
          $nm_saida->saida(" { \r\n");
          $nm_saida->saida("    return ajax_navigate_res(opc, parm); \r\n");
          $nm_saida->saida(" } \r\n");
          $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
          $nm_saida->saida("   { \r\n");
          $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
          $nm_saida->saida("      { \r\n");
          $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
          $nm_saida->saida("      } \r\n");
          $nm_saida->saida("      else\r\n");
          $nm_saida->saida("      { \r\n");
          $nm_saida->saida("         tb_show('', parms, '');\r\n");
          $nm_saida->saida("      } \r\n");
          $nm_saida->saida("   } \r\n");
          $nm_saida->saida("   function nm_move() \r\n");
          $nm_saida->saida("   { \r\n");
          $nm_saida->saida("      document.F3.target = \"_self\"; \r\n");
          $nm_saida->saida("      document.F3.submit();\r\n");
          $nm_saida->saida("   } \r\n");
          $nm_saida->saida(" function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
          $nm_saida->saida(" {\r\n");
          $nm_saida->saida("  document.F3.nmgp_opcao.value = x;\r\n");
          $nm_saida->saida("  document.F3.target = \"_self\"; \r\n");
          $nm_saida->saida("  if (y == 1) \r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("      document.F3.target = \"_blank\"; \r\n");
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida("  if (\"busca\" == x)\r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("      document.F3.nmgp_orig_pesq.value = z; \r\n");
          $nm_saida->saida("      z = '';\r\n");
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida("  if (z != null && z != '') \r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("     document.F3.nmgp_tipo_pdf.value = z;\r\n");
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida("  document.F3.script_case_init.value = \"" . NM_encode_input($this->Ini->sc_page) . "\" ;\r\n");
          $nm_saida->saida("  if (\"xls_res\" == x)\r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("       document.F3.SC_module_export.value = z;\r\n");
          $nm_saida->saida("       str_type = (z == \"s\") ? \"xls\" : \"xls_res\"\r\n");
          $nm_saida->saida("       document.F3.nmgp_opcao.value = str_type;\r\n");
      if (!extension_loaded("zip"))
      {
          $nm_saida->saida("      alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\");\r\n");
          $nm_saida->saida("      return false;\r\n");
      } 
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida("  if (\"xml_res\" == x)\r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("       document.F3.SC_module_export.value = z;\r\n");
          $nm_saida->saida("  }\r\n");
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_igd_hitung_iframe_params'] = array(
          'str_tmp'          => $this->Ini->path_imag_temp,
          'str_prod'         => $this->Ini->path_prod,
          'str_btn'          => $this->Ini->Str_btn_css,
          'str_lang'         => $this->Ini->str_lang,
          'str_schema'       => $this->Ini->str_schema_all,
          'str_google_fonts' => $this->Ini->str_google_fonts,
      );
      $prep_parm_pdf = "nmgp_opcao?#?pdf_res?@?scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?script_case_session?#?" . session_id() . "?@?pbfile?#?" . $str_pbfile . "?@?jspath?#?" . $this->Ini->path_js . "?@?sc_apbgcol?#?" . $this->Ini->path_css . "?#?";
      $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@chart_igd_hitung@SC_par@" . md5($prep_parm_pdf);
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
          $nm_saida->saida("  if (\"pdf\" == x)\r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("      if (\"R\" == ajax)\r\n");
          $nm_saida->saida("      {\r\n");
          $nm_saida->saida("          ajax_export('pdf_res','&sc_tp_pdf=' + z + '&sc_parms_pdf=' + p + '&sc_create_charts=' + crt + '&sc_graf_pdf=' + g + '&chart_level=' + chart_level + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + \"&pdf_zip=\" +  pdf_zip, false);\r\n");
          $nm_saida->saida("      }\r\n");
          $nm_saida->saida("      else\r\n");
          $nm_saida->saida("      {\r\n");
          $nm_saida->saida("          window.location = \"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + '&chart_level=' + chart_level + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + \"&SC_module_export=\" + SC_module_export + \"&use_pass_pdf=\" + use_pass_pdf + \"&pdf_all_cab=\" + pdf_all_cab + \"&pdf_all_label=\" +  pdf_all_label + \"&pdf_label_group=\" +  pdf_label_group + \"&pdf_zip=\" +  pdf_zip;\r\n");
          $nm_saida->saida("      }\r\n");
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida("  else if (\"pdf_res\" == x)\r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("      if (\"R\" == ajax)\r\n");
          $nm_saida->saida("      {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_res&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
          $nm_saida->saida("      }\r\n");
          $nm_saida->saida("      else\r\n");
          $nm_saida->saida("      {\r\n");
          $nm_saida->saida("          window.location = \"" . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + '&chart_level=' + chart_level + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + \"&SC_module_export=\" + SC_module_export + \"&use_pass_pdf=\" + use_pass_pdf + \"&pdf_all_cab=\" + pdf_all_cab + \"&pdf_all_label=\" +  pdf_all_label + \"&pdf_label_group=\" +  pdf_label_group + \"&pdf_zip=\" +  pdf_zip;\r\n");
          $nm_saida->saida("      }\r\n");
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida("  else\r\n");
          $nm_saida->saida("  {\r\n");
          $nm_saida->saida("      document.F3.submit();\r\n");
          $nm_saida->saida("  }\r\n");
          $nm_saida->saida(" }\r\n");
          $nm_saida->saida(" function nm_gp_submit5(apl_lig, apl_saida, parms, target, opc, modal_h, modal_w) \r\n");
          $nm_saida->saida(" { \r\n");
          $nm_saida->saida("    if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
          $nm_saida->saida("    {\r\n");
          $nm_saida->saida("        if (target == '_blank') \r\n");
          $nm_saida->saida("        {\r\n");
          $nm_saida->saida("            window.open (apl_lig);\r\n");
          $nm_saida->saida("        }\r\n");
          $nm_saida->saida("        else\r\n");
          $nm_saida->saida("        {\r\n");
          $nm_saida->saida("            window.location = apl_lig;\r\n");
          $nm_saida->saida("        }\r\n");
          $nm_saida->saida("        return;\r\n");
          $nm_saida->saida("    }\r\n");
          $nm_saida->saida("    if (target == 'modal') \r\n");
          $nm_saida->saida("    {\r\n");
          $nm_saida->saida("        par_modal = '?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal';\r\n");
          $nm_saida->saida("        if (opc != null && opc != '') \r\n");
          $nm_saida->saida("        {\r\n");
          $nm_saida->saida("            par_modal += '&nmgp_opcao=grid';\r\n");
          $nm_saida->saida("        }\r\n");
          $nm_saida->saida("        if (parms != null && parms != '') \r\n");
          $nm_saida->saida("        {\r\n");
          $nm_saida->saida("            par_modal += '&nmgp_parms=' + parms;\r\n");
          $nm_saida->saida("        }\r\n");
          $nm_saida->saida("        tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
          $nm_saida->saida("        return;\r\n");
          $nm_saida->saida("    }\r\n");
          $nm_saida->saida("    document.F3.target               = target; \r\n");
          $nm_saida->saida("    if (target == '_blank') \r\n");
          $nm_saida->saida("    {\r\n");
          $nm_saida->saida("        document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
          $nm_saida->saida("    }\r\n");
          $nm_saida->saida("    document.F3.action               = apl_lig  ;\r\n");
          $nm_saida->saida("    if (opc != null && opc != '') \r\n");
          $nm_saida->saida("    {\r\n");
          $nm_saida->saida("        document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
          $nm_saida->saida("    }\r\n");
          $nm_saida->saida("    else\r\n");
          $nm_saida->saida("    {\r\n");
          $nm_saida->saida("        document.F3.nmgp_opcao.value = \"\" ;\r\n");
          $nm_saida->saida("    }\r\n");
          $nm_saida->saida("    document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
          $nm_saida->saida("    document.F3.nmgp_parms.value = parms ;\r\n");
          $nm_saida->saida("    document.F3.submit() ;\r\n");
          $nm_saida->saida("    document.F3.nmgp_outra_jan.value = \"\";\r\n");
          $nm_saida->saida("    document.F3.nmgp_parms.value = \"\";\r\n");
          $nm_saida->saida("    document.F3.action = \"./\";\r\n");
          $nm_saida->saida(" } \r\n");
          $nm_saida->saida("   var tem_hint;\r\n");
          $nm_saida->saida("   function nm_mostra_hint(nm_obj, nm_evt, nm_mens)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (nm_mens == \"\")\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           return;\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       tem_hint = true;\r\n");
          $nm_saida->saida("       if (document.layers)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           theString=\"<DIV CLASS='ttip'>\" + nm_mens + \"</DIV>\";\r\n");
          $nm_saida->saida("           document.tooltip.document.write(theString);\r\n");
          $nm_saida->saida("           document.tooltip.document.close();\r\n");
          $nm_saida->saida("           document.tooltip.left = nm_evt.pageX + 14;\r\n");
          $nm_saida->saida("           document.tooltip.top = nm_evt.pageY + 2;\r\n");
          $nm_saida->saida("           document.tooltip.visibility = \"show\";\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           if(document.getElementById)\r\n");
          $nm_saida->saida("           {\r\n");
          $nm_saida->saida("              nmdg_nav = navigator.appName;\r\n");
          $nm_saida->saida("              elm = document.getElementById(\"tooltip\");\r\n");
          $nm_saida->saida("              elml = nm_obj;\r\n");
          $nm_saida->saida("              elm.innerHTML = nm_mens;\r\n");
          $nm_saida->saida("              if (nmdg_nav == \"Netscape\")\r\n");
          $nm_saida->saida("              {\r\n");
          $nm_saida->saida("                  elm.style.height = elml.style.height;\r\n");
          $nm_saida->saida("                  elm.style.top = nm_evt.pageY + 2;\r\n");
          $nm_saida->saida("                  elm.style.left = nm_evt.pageX + 14;\r\n");
          $nm_saida->saida("              }\r\n");
          $nm_saida->saida("              else\r\n");
          $nm_saida->saida("              {\r\n");
          $nm_saida->saida("                  elm.style.top = nm_evt.y + document.body.scrollTop + 10;\r\n");
          $nm_saida->saida("                  elm.style.left = nm_evt.x + document.body.scrollLeft + 10;\r\n");
          $nm_saida->saida("              }\r\n");
          $nm_saida->saida("              elm.style.visibility = \"visible\";\r\n");
          $nm_saida->saida("           }\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("   function nm_apaga_hint()\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("       if (!tem_hint)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           return;\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       tem_hint = false;\r\n");
          $nm_saida->saida("       if (document.layers)\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           document.tooltip.visibility = \"hidden\";\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("       else\r\n");
          $nm_saida->saida("       {\r\n");
          $nm_saida->saida("           if(document.getElementById)\r\n");
          $nm_saida->saida("           {\r\n");
          $nm_saida->saida("              elm.style.visibility = \"hidden\";\r\n");
          $nm_saida->saida("           }\r\n");
          $nm_saida->saida("       }\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida(" function nm_graf_submit(campo, nivel, campo_val, parms, target) \r\n");
          $nm_saida->saida(" { \r\n");
          $nm_saida->saida("    document.Fgraf.campo.value = campo ;\r\n");
          $nm_saida->saida("    document.Fgraf.nivel_quebra.value = nivel ;\r\n");
          $nm_saida->saida("    document.Fgraf.campo_val.value = campo_val ;\r\n");
          $nm_saida->saida("    document.Fgraf.nmgp_parms.value   = parms ;\r\n");
          $nm_saida->saida("    if (target != null) \r\n");
          $nm_saida->saida("    {\r\n");
          $nm_saida->saida("        document.Fgraf.target = target; \r\n");
          $nm_saida->saida("    }\r\n");
          $nm_saida->saida("    document.Fgraf.submit() ;\r\n");
          $nm_saida->saida(" } \r\n");
          $nm_saida->saida(" function nm_graf_submit_2(chart)\r\n");
          $nm_saida->saida(" {\r\n");
          $nm_saida->saida("    document.Fgraf.nmgp_parms.value = chart;\r\n");
          $nm_saida->saida("    document.Fgraf.submit();\r\n");
          $nm_saida->saida(" } \r\n");
          $nm_saida->saida(" function nm_open_popup(parms)\r\n");
          $nm_saida->saida(" {\r\n");
          $nm_saida->saida("     NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
          $nm_saida->saida(" }\r\n");
          $nm_saida->saida("   function process_hotkeys(hotkey)\r\n");
          $nm_saida->saida("   {\r\n");
          $nm_saida->saida("   return false;\r\n");
          $nm_saida->saida("   }\r\n");
          $nm_saida->saida("</SCRIPT>\r\n");
          $nm_saida->saida("<div style=\"border-color: #888888; border-style: solid; border-width: 1px; box-shadow: 5px 5px 5px 0 #888888; position: absolute; padding: 10px 0 0 0; display: none; z-index: 1000\" id=\"sc-id-combination-table\">\r\n");
          $nm_saida->saida(" <div style=\"text-align: center; height: 30px\" id=\"sc-id-hide-comb-table\">\r\n");
      $closeButton = nmButtonOutput($this->arr_buttons, "bsair_appdiv", "scHideCombinationTableDiv()", "scHideCombinationTableDiv()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
;
      $nm_saida->saida("        " . $closeButton . "\r\n");
          $nm_saida->saida("</div>\r\n");
          $nm_saida->saida(" <div id=\"sc-id-combination-content\" style=\"padding: 0 20px; height: 450px; overflow: auto\"></div>\r\n");
          $nm_saida->saida("</div>\r\n");
          $nm_saida->saida("</BODY>\r\n");
          $nm_saida->saida("</HTML>\r\n");
      }
   }

   function monta_html_ini_pdf()
   {
      global $nm_saida;
       $tp_quebra = "";
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css']))
       {
           $NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_chart_igd_hitung_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['num_css'] . '.css', 'a');
           $NM_css_file = $this->Ini->root . $this->Ini->path_link . "chart_igd_hitung/chart_igd_hitung_res_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']). ".css";
           if (is_file($NM_css_file))
           {
               $NM_css_attr = file($NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   @fwrite($NM_css, "    " . $NM_line_css . "\r\n");
               }
           }
           @fclose($NM_css);
       }
       $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['print_all'];
       $tp_quebra = "<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>";
       if ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['print_all'])
       {
       $tp_quebra = "<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>";
       }
       $nm_saida->saida("" . $tp_quebra . "\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['responsive_chart']['active']) {
           $summary_width = "width=\"100%\"";
       }
       else {
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
               $summary_width = "width=\"100%\"";
           }
           else
           {
               $summary_width = "width=\"100%\"";
           }
       }
       $nm_saida->saida("<TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" align=\"center\" valign=\"top\" " . $summary_width . ">\r\n");
       $nm_saida->saida("<TR>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px\">\r\n");
       $nm_saida->saida("<TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px; width: 100%;\">\r\n");
   }
   function monta_html_fim_pdf()
   {
      global $nm_saida;
      $nm_saida->saida("</TABLE>\r\n");
      $nm_saida->saida("</TD>\r\n");
      $nm_saida->saida("</TR>\r\n");
      $nm_saida->saida("</TABLE>\r\n");
   }
//--- 
//--- 
 function grafico_pdf()
 {
   global $nm_saida, $nm_lang;
   require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
   $this->Graf  = new chart_igd_hitung_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = 1;
       $sChartLang  = isset($this->Ini->Nm_lang['lang_pdff_pcht']) ? $this->Ini->Nm_lang['lang_pdff_pcht'] : 'Generating chart';
       if (!NM_is_utf8($sChartLang))
       {
           $sChartLang = sc_convert_encoding($sChartLang, "UTF-8", $_SESSION['scriptcase']['charset']);
       }
       $bChartFP = false;
      if (!isset($this->progress_fp) || !$this->progress_fp)
      {
           $bChartFP           = true;
           $str_pbfile         = isset($_GET['pbfile']) ? urldecode($_GET['pbfile']) : $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
           $this->progress_fp  = fopen($str_pbfile, 'a');
           $this->progress_now = 90;
           $this->progress_res = 0;
      }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'] as $chart_index => $chart_data)
       {
           if ('C|' != substr($chart_index, 0, 2))
           {
                continue;
           }
           if (!$prim_graf)
           {
               $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['proc_pdf_vert'])
 { 
           $nm_saida->saida("<table style=\"width: 100%; page-break-inside: avoid !important;\" ><tr><td>\r\n");
 } else {
           $nm_saida->saida("<table><tr><td>\r\n");
 } 
           $tit_graf = $chart_data['title'];
           if ('' != $chart_data['subtitle'])
           {
               $tit_graf .= ' - ' . $chart_data['subtitle'];
           }
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $random_id = 'sc-id-h2-' . md5(session_id() . microtime() . rand(1, 1000));
           $nm_saida->saida("<b><h2 id=\"$random_id\">$tit_book_marks</h2></b>\r\n");
           if ($this->progress_fp)
           {
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['this_chart_label'] = '';
           $this->Graf->monta_grafico($chart_index, 'pdf');
           if ('' != $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['this_chart_label']) {
               $nm_saida->saida("<script type=\"text/javascript\">$(\"#$random_id\").html(\"{$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['this_chart_label']}\")</script>\r\n");
           }
           $nm_saida->saida("</td></tr></table>\r\n");
       }
       if ($bChartFP)
       {
           $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
           if (!NM_is_utf8($lang_protect))
           {
               $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['charts_html']}\r\n");
            $nm_saida->saida("</script>\r\n");
       }
   }
       $nm_saida->saida("</body>\r\n");
       $nm_saida->saida("</HTML>\r\n");
 }
//--- 
//--- 
 function grafico_pdf_flash()
 {
   global $nm_saida, $nm_lang;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_list']))
   {
       $prim_graf = true;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['chart_list'] as $arr_chart)
       {
           if (!$prim_graf)
           {
               $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
       $nm_saida->saida("<b><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></b>\r\n");
           $nm_saida->saida("<table><tr><td>\r\n");
           $tit_graf       = $arr_chart[1];
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $nm_saida->saida("<b><h2>$tit_book_marks</h2></b>\r\n");
           $nm_saida->saida("<img src=\"" . $arr_chart[0] . ".png\"/>\r\n");
           $_SESSION['scriptcase']['sc_num_img']++;
           $nm_saida->saida("</td></tr></table>\r\n");
       }
   }
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</HTML>\r\n");
 }
//--- 
//--- 
 function grafico_bot()
 {
   global $nm_saida;
   $bPDF = isset($_GET['nmgp_opcao']) && 'pdf' == $_GET['nmgp_opcao'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['graf_bot'] = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['graf_first'] = true;
       require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
       $this->Graf  = new chart_igd_hitung_grafico();
       $this->Graf->Db     = $this->Db;
       $this->Graf->Erro   = $this->Erro;
       $this->Graf->Ini    = $this->Ini;
       $this->Graf->Lookup = $this->Lookup;
       $qtd_col = 0;
       $lim_col = 1;
       if ($bPDF)
       {
           $this->Graf->monta_grafico('', 'pdf_lib');
       }
       $nm_saida->saida("<TR>\r\n");
       $nm_saida->saida("<TD>\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
           $summary_width = "width=\"100%\"";
       }
       else
       {
           $summary_width = "width=\"100%\"";
       }
       $nm_saida->saida("<TABLE id=\"res_chart_table\" border=\"0px\" cellpadding=\"0px\" cellspacing=\"20px\" align=\"center\" valign=\"top\" " . $summary_width . ">\r\n");
       $nm_saida->saida("<TR>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts']);
       $sChartLang  = isset($this->Ini->Nm_lang['lang_pdff_pcht']) ? $this->Ini->Nm_lang['lang_pdff_pcht'] : 'Generating chart';
       if (!NM_is_utf8($sChartLang))
       {
           $sChartLang = sc_convert_encoding($sChartLang, "UTF-8", $_SESSION['scriptcase']['charset']);
       }
       $bChartFP = false;
      if ($bPDF && (!isset($this->progress_fp) || !$this->progress_fp))
      {
           $bChartFP           = true;
           $str_pbfile         = isset($_GET['pbfile']) ? urldecode($_GET['pbfile']) : $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
           $this->progress_fp  = fopen($str_pbfile, 'w');
           fwrite($this->progress_fp, "PDF\n");
           fwrite($this->progress_fp, "\n");
           fwrite($this->progress_fp, "\n");
           fwrite($this->progress_fp, "100\n");
           $this->progress_now = 90;
           $this->progress_res = 0;
      }
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pivot_charts'] as $chart_index => $chart_data)
       {
                   if ('C|0' != substr($chart_index, 0, 3))
                   {
                           $this->Graf->monta_grafico($chart_index, 'xml');
                           continue;
                   }
           $qtd_col++;
           if ($qtd_col > $lim_col)
           {
               $qtd_col = 1;
               $nm_saida->saida("</TR><TR>\r\n");
           }
           $nm_saida->saida("<TD align=\"left\" valign=\"top\" width=\"100%\">\r\n");
           if ($bPDF)
           {
               $this->Graf->monta_grafico($chart_index, 'pdf');
               if ($this->progress_fp)
               {
                   fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "/" . $iChartTotal . "...\n");
                   $iChartCount++;
                   if (0 < $this->progress_res)
                   {
                       $this->progress_now++;
                   }
               }
           }
           elseif (!isset($_GET['nmgp_opcao']) || 'pdf_res' != $_GET['nmgp_opcao'])
           {
               if (isset($_GET['nmgp_opcao']) && 'pdf' == $_GET['nmgp_opcao'])
               {
                   $this->Graf->monta_grafico($chart_index, 'pdf');
               }
               else
               {
                   $this->Graf->monta_grafico($chart_index);
               }
           }
           $nm_saida->saida("</TD>\r\n");
       }
       if (isset($_POST['reload_comb_chart']) && 'Y' == $_POST['reload_comb_chart'])
       {
           exit;
       }

       if ($bChartFP)
       {
           $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
           if (!NM_is_utf8($lang_protect))
           {
               $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if ($qtd_col < $lim_col)
       {
           $qtd_span = $lim_col - $qtd_col;
           $nm_saida->saida("<TD colspan=" . $qtd_span . ">&nbsp;</TD>\r\n");
       }
       $nm_saida->saida("</TR>\r\n");
       $nm_saida->saida("</TABLE>\r\n");
       $nm_saida->saida("</TD>\r\n");
       $nm_saida->saida("</TR>\r\n");
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['graf_bot'] = false;
       if ($bPDF && isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['charts_html'])
       {
           $nm_saida->saida("<script type=\"text/javascript\">\r\n");
           $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['charts_html']}\r\n");
           $nm_saida->saida("</script>\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           $this->Ini->Arr_result['exec_script'][] = "scReloadChart('')";
           $_SESSION['scriptcase']['saida_html'] = "";
       } 
   }
   elseif (!isset($_GET['nmgp_opcao']) || 'pdf' != $_GET['nmgp_opcao'])
   {
       $nm_saida->saida("<TR>\r\n");
       $nm_saida->saida("<TD>\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
           $summary_width = "width=\"100%\"";
       }
       else
       {
           $summary_width = "width=\"100%\"";
       }
       $nm_saida->saida("<TABLE id=\"res_chart_table\" border=\"0px\" cellpadding=\"0px\" cellspacing=\"20px\" align=\"center\" valign=\"top\" " . $summary_width . " style=\"display: none\">\r\n");
       $nm_saida->saida("<TR>\r\n");
       $nm_saida->saida("<TD align=\"left\" valign=\"top\" width=\"100%\">\r\n");
       $this->Graf->monta_grafico('__no_record_found__');
       $nm_saida->saida("</TD>\r\n");
       $nm_saida->saida("</TR>\r\n");
       $nm_saida->saida("</TABLE>\r\n");
       $nm_saida->saida("</TD>\r\n");
       $nm_saida->saida("</TR>\r\n");
   }
 }
//--- 
   function monta_resumo_search()
   {
      global $nm_saida;
      $nm_saida->saida(" <TR><TD id=\"id_resumo_search\" valign=\"top\" style=\"display:'';\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           $_SESSION['scriptcase']['saida_html'] = "";
       } 
      $this->html_resumo_search();
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           $this->Ini->Arr_result['setDisplay'][] = array('field' => 'id_resumo_search', 'value' => '');
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_resumo_search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
           $_SESSION['scriptcase']['saida_html'] = "";
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']))
           { 
               $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_obj_res_combo', 'value' => '');
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look'] as $cada_combo => $opcs_combo)
               { 
                   $this->Ini->Arr_result['setVar'][]     = array("var" => "Tab_obj_res_combo['" . $cada_combo . "']", "value" => "true");
                   $this->Ini->Arr_result['setDisplay'][] = array("field" => "btn_clear_" . $cada_combo, "value" => "");
               } 
               if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']))
               { 
                   $this->Ini->Arr_result['setDisplay'][] = array("field" => "res_search_clear", "value" => "");
               } 
           } 
       } 
      $nm_saida->saida(" </TD></TR>\r\n");
   }
   function html_resumo_search()
   {
       global $nm_saida;
       $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['res_search_label'] = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search']         = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']    = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['Res_search_metric_use'] = array();
           $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_res_lookup']      = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_pesq'];
       }
       $nm_saida->saida("    <form id= \"id_Resumo_search\" name=\"FResumo_search\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
       $nm_saida->saida("     <input type=hidden name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"nmgp_opcao\" value=\"resumo_search\"/> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"parm\" value=\"\"/> \r\n");
       $nm_saida->saida(" <div id=\"TB_Resumo_Search\" class='scGridSummarySearchMoldura' style='width: 100%;'>\r\n");
       $lin_obj  = $this->resumo_search_Tgl_SC_1();
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $nm_saida->saida("    <div class='scGridSummarySearchCleanBtn' style='float:left;'>\r\n");
       $Cod_Btn  = nmButtonOutput($this->arr_buttons, "blimparsummaryall", "nm_proc_res_search('', '', '', '', 'clear_res_search', '');", "nm_proc_res_search('', '', '', '', 'clear_res_search', '');", "res_search_clear", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("" . $Cod_Btn . "\r\n");
       $nm_saida->saida("    </div>\r\n");
       $nm_saida->saida("    <div style='clear:both'></div>\r\n");
       $nm_saida->saida("    </form>\r\n");
       $nm_saida->saida("    </div>\r\n");
       $this->JS_resumo_search();
       $nm_saida->saida(" <SCRIPT LANGUAGE=\"Javascript\" SRC=\"" . $this->Ini->path_js . "/nm_format_num.js\"></SCRIPT>\r\n");
   }
   function resumo_search_Tgl_SC_1()
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search']['Tgl_SC_1']))
       {
           $lin_obj .= "   <div class='scGridSummarySearchCampo active' style='float:left;'>";
       }
       else
       {
           $lin_obj .= "   <div class='scGridSummarySearchCampo' style='float:left;'>";
       }
       $lin_obj .= "       <div class='scGridSummarySearchLabel'>";
       $lin_obj .= "Tgl Daftar";
       $Cod_Btn  = nmButtonOutput($this->arr_buttons, "blimparsummaryfield", "nm_proc_res_search('Tgl_SC_1', '', '', '', 'clear_search_obj', '', '');", "nm_proc_res_search('Tgl_SC_1', '', '', '', 'clear_search_obj', '', '');", "Tgl_SC_1_clear", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $lin_obj .= "<span id=\"btn_clear_Tgl_SC_1\" style='float:right; display: none;' class='scGridSummarySearchLabelclean'>". $Cod_Btn ."</span>"; 
       $lin_obj .= "     </div>";
       $lin_obj  .= "   <div class='scGridSummarySearchObjeto' id=\"id_tab_Tgl_SC_1\" style=\" \">";
       $lin_obj  .= "   <select class=\"css_toolbar_obj\" style=\"vertical-align: middle;\" id=\"Tgl_SC_1\" name=\"Tgl_SC_1\" onChange=\"nm_proc_res_search('Tgl_SC_1', 'regDate', 'select', 'dth', 'eql', 'seasonal', '');\">";
       $disabled  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? "" : " disabled";
       $lin_obj  .= "   <option value='__NM__' selected='selected'" . $disabled . ">" . $this->Ini->Nm_lang['lang_search_select_summary'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_jan', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_jan\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_janu'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_feb', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_feb\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_febr'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_mar', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_mar\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_marc'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_apr', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_apr\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_apri'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_may', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_may\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_mayy'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_jun', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_jun\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_june'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_jul', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_jul\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_july'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_aug', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_aug\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_augu'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_sep', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_sep\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_sept'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_oct', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_oct\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_octo'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_nov', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_nov\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_nove'] . "</option>";
       $selected  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1']) && in_array('month_dec', $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']['Tgl_SC_1'])) ? " selected" : "";
       $lin_obj  .= "   <option value=\"month_dec\"" . $selected . ">" . $this->Ini->Nm_lang['lang_mnth_dece'] . "</option>";
       $lin_obj  .= "   </select>";
       $lin_obj  .= "   </div>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function JS_resumo_search()
   {
       global $nm_saida;
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     $(document).ready(function() {\r\n");
       $nm_saida->saida("         $('#Tgl_SC_1').SumoSelect({ csvDispCount: 3, selectAll:true, placeholder: '" . $this->Ini->Nm_lang['lang_search_select_summary'] . "', captionFormat:'{0} " . $this->Ini->Nm_lang['lang_btns_selected_summary'] . "', captionFormatAllSelected: '" . $this->Ini->Nm_lang['lang_btns_all_of_them_summary'] . "', locale : ['" . $this->Ini->Nm_lang['lang_btns_ok_summary'] . "', '" . $this->Ini->Nm_lang['lang_btns_cancel_summary'] . "', '" . $this->Ini->Nm_lang['lang_btns_all_selected_summary'] . "'] });\r\n");
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look']))
       { 
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['resumo_search_look'] as $cada_combo => $opcs_combo)
           { 
               $nm_saida->saida("         $('#btn_clear_" . $cada_combo . "').show();\r\n");
           } 
           $nm_saida->saida("         $('#res_search_clear').show();\r\n");
       } 
       $nm_saida->saida("     })\r\n");
       $nm_saida->saida("     Tab_obj_res_combo = new Array();\r\n");
       $nm_saida->saida("     function ajax_res_fill_combo(field)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (Tab_obj_res_combo[field]) {\r\n");
       $nm_saida->saida("             return false;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         Tab_obj_res_combo[field] = true;\r\n");
       $nm_saida->saida("         nmAjaxProcOn();\r\n");
       $nm_saida->saida("         $.ajax({\r\n");
       $nm_saida->saida("           type: \"POST\",\r\n");
       $nm_saida->saida("           url: \"index.php\",\r\n");
       $nm_saida->saida("           data: \"nmgp_opcao=ajax_res_fill_combo&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . NM_encode_input(session_id()) . "\" + \"&NM_parms=\" + field\r\n");
       $nm_saida->saida("          })\r\n");
       $nm_saida->saida("          .done(function(res_fill_combo) {\r\n");
       $nm_saida->saida("             var i, oResp;\r\n");
       $nm_saida->saida("             Tst_integrid = res_fill_combo.trim();\r\n");
       $nm_saida->saida("             if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
       $nm_saida->saida("                 nmAjaxProcOff();\r\n");
       $nm_saida->saida("                 alert (res_fill_combo);\r\n");
       $nm_saida->saida("                 return;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             eval(\"oResp = \" + res_fill_combo);\r\n");
$nm_saida->saida("             if (oResp[\"ss_time_out\"]) {\r\n");
$nm_saida->saida("                 nmAjaxProcOff();\r\n");
$nm_saida->saida("                 nm_move();\r\n");
$nm_saida->saida("             }\r\n");
       $nm_saida->saida("             var field_sel = field;\r\n");
       $nm_saida->saida("             $('#' + field_sel).empty();\r\n");
       $nm_saida->saida("             if (oResp[\"set_option\"]) {\r\n");
       $nm_saida->saida("                 for (i = 0; i < oResp[\"set_option\"].length; i++) {\r\n");
       $nm_saida->saida("                     if (oResp[\"set_option\"][i][\"field\"] != field_sel) {\r\n");
       $nm_saida->saida("                         if (field_sel != \"\") {\r\n");
       $nm_saida->saida("                             $('#' + field_sel)[0].sumo.reload();\r\n");
       $nm_saida->saida("                             $('#' + field_sel).parent().find(\".CaptionCont\").click();\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         field_sel = oResp[\"set_option\"][i][\"field\"];\r\n");
       $nm_saida->saida("                         $('#' + field_sel).empty();\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                     if (oResp[\"set_option\"][i][\"opt\"] == '__NM__') {\r\n");
       $nm_saida->saida("                         $('#' + field_sel).append($('<option>', { value: oResp[\"set_option\"][i][\"opt\"],text: oResp[\"set_option\"][i][\"value\"], selected: true, disabled: true}));\r\n");
       $nm_saida->saida("                     } else {\r\n");
       $nm_saida->saida("                         $('#' + field_sel).append($('<option>', { value: oResp[\"set_option\"][i][\"opt\"],text: oResp[\"set_option\"][i][\"value\"]}));\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             $('#' + field_sel)[0].sumo.reload();\r\n");
       $nm_saida->saida("             $('#' + field_sel).parent().find(\".CaptionCont\").click();\r\n");
       $nm_saida->saida("             if (oResp[\"htmOutput\"]) {\r\n");
       $nm_saida->saida("                 nmAjaxShowDebug(oResp);\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             nmAjaxProcOff();\r\n");
       $nm_saida->saida("         });\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_res_search(obj_id, nam_db, tp_obj, tp_dado, tp_pesq, tp_data, format_dt)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (tp_pesq == 'clear_res_search') {\r\n");
       $nm_saida->saida("             ajax_navigate_res('resumo_search', 'clear_res_search');\r\n");
       $nm_saida->saida("             return;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         var result = '';\r\n");
       $nm_saida->saida("         if (tp_obj == 'slider') {\r\n");
       $nm_saida->saida("             result = $('#id_slider_' + obj_id).slider('values')[0] + \"_VLS_\" + $('#id_slider_' + obj_id).slider('values')[1];\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#' + obj_id).addClass('active');\r\n");
       $nm_saida->saida("         if (tp_obj == 'select') {\r\n");
       $nm_saida->saida("             result  = res_search_get_select(obj_id);\r\n");
       $nm_saida->saida("             if (result == \"__NM__\") {\r\n");
       $nm_saida->saida("                 nam_db = \"\";\r\n");
       $nm_saida->saida("                 tp_obj = \"\";\r\n");
       $nm_saida->saida("                 tp_dado = \"\";\r\n");
       $nm_saida->saida("                 tp_pesq = \"clear_search_obj_all\";\r\n");
       $nm_saida->saida("                 tp_data = \"\";\r\n");
       $nm_saida->saida("                 format_dt = \"\";\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_obj == 'checkbox') {\r\n");
       $nm_saida->saida("             result  = res_search_get_checkbox(obj_id);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_obj == 'input' && tp_data == 'range') {\r\n");
       $nm_saida->saida("             result = $('#' + obj_id + '_1').val() + \"_VLS_\" + $('#' + obj_id + '_2').val();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_data == 'realtive') {\r\n");
       $nm_saida->saida("             format_dt = result;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         out_int  = obj_id + '__DL__' + nam_db + '__DL__' + tp_dado + '__DL__' + tp_pesq + '__DL__' + tp_data + '__DL__' + format_dt + '__DL__' + result;\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[+]/g, \"__NM_PLUS__\");\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[&]/g, \"__NM_AMP__\");\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[%]/g, \"__NM_PRC__\");\r\n");
       $nm_saida->saida("         ajax_navigate_res('resumo_search', out_int);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function res_search_get_select(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        if (!obj.length)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val = obj.options[obj.selectedIndex].value;\r\n");
       $nm_saida->saida("            return val;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            for (iCheck = 0; iCheck < obj.length; iCheck++)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                if (obj.options[iCheck].selected)\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                    val += obj.options[iCheck].value;\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function res_search_get_checkbox(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var Nobj = document.getElementById(obj_id).name;\r\n");
       $nm_saida->saida("        var obj  = document.getElementsByName(Nobj);\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        if (!obj.length)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if (obj.checked)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val = obj.value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            return val;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            for (iCheck = 0; iCheck < obj.length; iCheck++)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                if (obj[iCheck].checked)\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                    val += obj[iCheck].value;\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("</script>\r\n");
   }

   //---- 
   function inicializa_arrays()
   {
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $this->$Arr_tot_name = array();
      }
   }

   //---- 
   function adiciona_registro($quebra_tgl, $quebra_tgl_orig)
   {
      $contr_arr = "";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
      {
          $Name_orig  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
          $Cmp_temp   = "quebra_" . $Name_orig . "_orig";
          $Cmp_format = "quebra_" . $Name_orig;
          $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
          $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $cmp_gb);
           $TP_Time    = (in_array($Cmp_temp, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_arg    = $this->Ini->Get_arg_groupby($TP_Time . $$Cmp_temp, $Format_tst);
          $TP_Time    = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_formt  = $this->Ini->GB_date_format($TP_Time . $$Cmp_format, $Format_tst, $Prefix_dat);
          $contr_arr .= "['" . $Cmp_arg . "']";
          $arr_name   = "array_total_" . $cmp_gb . $contr_arr;
          $cmp_look   = "Cmp_formt";
          $cmp_orig   = "Cmp_arg";
          eval ('
          if (!isset($this->' . $arr_name . '))
          {
              $this->' . $arr_name . '[0] = 1;
              $this->' . $arr_name . '[1] = 1;
              $this->' . $arr_name . '[2] = "' . addslashes($$cmp_look) . '";
              $this->' . $arr_name . '[3] = "' . $$cmp_orig . '";
          }
          else
          {
              $this->' . $arr_name . '[0]++;
              $this->' . $arr_name . '[1]++;
          }
          ');
      }
   }

   //---- 
   function finaliza_arrays()
   {
   }

   function prepara_resumo()
   {
      $this->inicializa_vars();
      $this->resumo_init();
      $this->inicializa_arrays();
   }

   function finaliza_resumo()
   {
      $this->finaliza_arrays();
   }

//
   function nm_acumula_resumo($nm_tipo="resumo")
   {
     global $nm_lang;
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca']))
     { 
         $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca'];
         if ($_SESSION['scriptcase']['charset'] != "UTF-8")
         {
             $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
       $this->tgl = $Busca_temp['tgl']; 
       $tmp_pos = strpos($this->tgl, "##@@");
       if ($tmp_pos !== false && !is_array($this->tgl))
       {
           $this->tgl = substr($this->tgl, 0, $tmp_pos);
       }
     } 
     $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_orig'];
     $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_pesq'];
     $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_pesq_filtro'];
     $this->nm_field_dinamico = array();
     $this->nm_order_dinamico = array();
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ""; 
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
     { 
         $nmgp_select = "SELECT str_replace (convert(char(10),regDate,102), '.', '-') + ' ' + convert(char(8),regDate,20) as tgl from " . $this->Ini->nm_tabela; 
     } 
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
     { 
         $nmgp_select = "SELECT regDate as tgl from " . $this->Ini->nm_tabela; 
     } 
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     { 
         $nmgp_select = "SELECT convert(char(23),regDate,121) as tgl from " . $this->Ini->nm_tabela; 
     } 
     else 
     { 
         $nmgp_select = "SELECT regDate as tgl from " . $this->Ini->nm_tabela; 
     } 
     $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['where_pesq']; 
     $campos_order = "";
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['SC_Gb_Free_sql'] as $cmp_var => $resto)
     {
         foreach ($resto as $SC_Sql_col => $SC_Sql_order)
         {
             $format       = $this->Ini->Get_Gb_date_format('', $cmp_var);
             $campos_order = $this->Ini->Get_date_order_groupby($SC_Sql_col, $SC_Sql_order, $format, $campos_order);
         }
     }
     $nmgp_order_by = " order by " . $campos_order;
     $nmgp_select .= $nmgp_order_by; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
     $rs_res = $this->Db->Execute($nmgp_select) ; 
     if ($rs_res === false && !$rs_graf->EOF) 
     { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
// 
     if ($nm_tipo != "resumo") 
     {  
          $this->nm_acum_res_unit($rs_res, $nm_tipo);
     }  
     else  
     {  
         while (!$rs_res->EOF) 
         {  
                $this->nm_acum_res_unit($rs_res, "resumo");
                $rs_res->MoveNext();
         }  
     }  
     $rs_res->Close();
   }
// 
   function nm_acum_res_unit($rs_res, $nm_tipo="resumo")
   {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca']))
            { 
                $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['campos_busca'];
                if ($_SESSION['scriptcase']['charset'] != "UTF-8")
                {
                    $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
                }
            } 
            $this->tgl = $rs_res->fields[0] ;  
            $this->tgl_orig = $this->tgl;
            if ($nm_tipo == "resumo")
            {
                $this->adiciona_registro($this->tgl, $this->tgl_orig);
            }
   }
//
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
   function html_grid_search()
   {
       global $nm_saida;
       $this->grid_search_seq = 0;
       $this->grid_search_str = "";
       $this->grid_search_dat = array();
       $this->grid_search_str = "";
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
        { 
           $_SESSION['scriptcase']['saida_html'] = "";
        } 
       $this->NM_case_insensitive = false;
       $tmp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['cond_pesq'];
       $pos = strrpos($tmp, "##*@@");
       if ($pos !== false)
       {
           $and_or = (substr($tmp, ($pos + 5)) == "and") ? $this->Ini->Nm_lang['lang_srch_and_cond'] : $this->Ini->Nm_lang['lang_srch_orr_cond'];
           $tmp    = substr($tmp, 0, $pos);
           $this->grid_search_str = str_replace("##*@@", ", " . $and_or . " ", $tmp);
       }
       $str_display = empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq'])?'none':'';
       if(!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       {
          $nm_saida->saida("   <tr id=\"NM_Grid_Search\" ajax='' style='display:" . $str_display . "'>\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'] && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']))
       { 
           $_SESSION['scriptcase']['saida_html'] = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq'] as $cmp => $def)
           {
               $this->Ini->Arr_result['setValue'][] = array('field' => 'grid_search_label_' . $cmp, 'value' => NM_charset_to_utf8(trim($def['descr'])));
               $this->Ini->Arr_result['setTitle'][] = array('field' => 'grid_search_label_' . $cmp, 'value' => NM_charset_to_utf8(trim($def['hint'])));
           }
           $lin_obj = $this->grid_search_add_tag();
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_grid_search_add_tag', 'value' => NM_charset_to_utf8($lin_obj));
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_grid_search_cmd_str', 'value' => NM_charset_to_utf8($this->grid_search_str));
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['save_grid']))
           {
               return;
           }
           else
           {
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'NM_Grid_Search', 'value' => '');
           }
       } 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['save_grid']))
           {
               $str_display = empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']) ? 'none' : '';
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'NM_Grid_Search', 'value' => $str_display);
           }
       $nm_saida->saida("   <td  valign=\"top\"> \r\n");
       $nm_saida->saida("   <div id='id_grid_search_cmd_string' class=\"" . $this->css_scAppDivMoldura . "\" style='cursor:pointer; display:none;' onclick=\"$('#id_grid_search_cmd_string').hide();$('#div_grid_search').show();\"> \r\n");
             if (is_file($this->Ini->root . $this->Ini->path_img_global . '/' . $this->Ini->App_div_tree_img_exp))
             {
       $nm_saida->saida("                             <img id='id_app_div_tree_img_exp' src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->App_div_tree_img_exp . "\" border=0 align='absmiddle' class='scGridFilterTagIconExp'>\r\n");
             }
       $nm_saida->saida("     <span class=\"" . $this->css_scAppDivHeaderText . "\">\r\n");
       $nm_saida->saida("             " . $this->Ini->Nm_lang['lang_othr_dynamicsearch_title_outside'] . "\r\n");
       $nm_saida->saida("     </span>\r\n");
       $nm_saida->saida("     <span id='id_grid_search_cmd_str' class=\"" . $this->css_scAppDivContentText . "\">" . NM_encode_input(trim($this->grid_search_str)) . "</span>\r\n");
       $nm_saida->saida("   </div> \r\n");
       $nm_saida->saida("   <div id=\"div_grid_search\" class=\"" . $this->css_scAppDivMoldura . " scGridFilterTag\" style='display:;'> \r\n");
             if (is_file($this->Ini->root . $this->Ini->path_img_global . '/' . $this->Ini->App_div_tree_img_col))
             {
       $nm_saida->saida("                             <a href=\"#\" onclick=\"$('#id_grid_search_cmd_string').show();$('#div_grid_search').hide();\" class='scGridFilterTagIconCol'><img id='id_app_div_tree_img_col' src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->App_div_tree_img_col . "\" border=0 align='absmiddle' style='vertical-align: middle; margin-right:4px;'></a>\r\n");
             }
       $nm_saida->saida("    <div id='icon_grid_search' class='scGridFilterTagIcon'><svg height='1792' viewBox='0 0 1792 1792' width='1792' xmlns='http://www.w3.org/2000/svg'><path d='M1595 295q17 41-14 70l-493 493v742q0 42-39 59-13 5-25 5-27 0-45-19l-256-256q-19-19-19-45v-486l-493-493q-31-29-14-70 17-39 59-39h1280q42 0 59 39z'/></svg></div> \r\n");
       $nm_saida->saida("    <div id=\"tags_grid_search\" class='scGridFilterTagList'> \r\n");
       $nm_saida->saida("        <form id= \"id_Fgrid_search\" name=\"Fgrid_search\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
       $nm_saida->saida("            <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
       $nm_saida->saida("            <input type=hidden name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
       $nm_saida->saida("            <input type=\"hidden\" name=\"nmgp_opcao\" value=\"grid_search_res\"/> \r\n");
       $nm_saida->saida("            <input type=\"hidden\" name=\"parm\" value=\"\"/> \r\n");
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']))
            {
                foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq'] as $cmp => $def)
                {
                    if (isset($def['label'])) {
                        $this->grid_search_seq++;
                        $lin_obj = $this->grid_search_tag_ini($cmp, $def, $this->grid_search_seq);
                        $nm_saida->saida("" . $lin_obj . "\r\n");
                        if ($cmp == "tgl")
                        {
                           $this->grid_search_dat[$this->grid_search_seq] = "tgl";
                           $lin_obj = $this->grid_search_tgl($this->grid_search_seq, 'N', $def['opc'], $def['val'], $def['label']);
                           $nm_saida->saida("" . $lin_obj . "\r\n");
                        }
                        $lin_obj = $this->grid_search_tag_end();
                        $nm_saida->saida("" . $lin_obj . "\r\n");
                    }
                }
            }
       $nm_saida->saida("            <div id='add_grid_search' class='scGridFilterTagAdd SC_SubMenuApp' onclick=\"nm_show_advancedsearch_fields();\">\r\n");
       $nm_saida->saida("                " . $this->Ini->Nm_lang['lang_srch_addfields'] . "\r\n");
       $nm_saida->saida("                <div id='id_grid_search_add_tag' style='position: absolute; border-collapse: collapse; z-index: 1000; display:none;'>\r\n");
       $lin_obj = $this->grid_search_add_tag();
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $nm_saida->saida("                </div>\r\n");
       $nm_saida->saida("            </div>\r\n");
       $nm_saida->saida("        </form>\r\n");
       $nm_saida->saida("    </div>\r\n");
       $this->NM_fil_ant = $this->gera_array_filtros();
       $strDisplayFilter = (empty($this->NM_fil_ant))?'none':'';
       $nm_saida->saida("   <div id='save_grid_search' class='scGridFilterTagSave'>\r\n");
       $nm_saida->saida("    <form name='Fgrid_search_save'>\r\n");
       $nm_saida->saida("     <span id=\"id_NM_filters_save\" style=\"display: " . $strDisplayFilter . "\">\r\n");
       $nm_saida->saida("       <SELECT class=\"scFilterToolbar_obj\" id=\"id_sel_recup_filters\" name=\"sel_recup_filters\" onChange=\"nm_change_grid_search(this)\" size=\"1\">\r\n");
       $nm_saida->saida("           <option value=\"\"></option>\r\n");
       $Nome_filter = "";
       foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
       {
           $Select = "";
           if (isset($this->NM_curr_fil) && $Cada_filter == $this->NM_curr_fil)
           {
               $Select = "selected";
           }
           if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
           }
           elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           if ($Tipo_filter[1] != $Nome_filter)
           {
               $Nome_filter = $Tipo_filter[1];
                   $nm_saida->saida("       <option value=''>" . NM_encode_input($Nome_filter) . "</option>\r\n");
           }
              $nm_saida->saida("        <option value='" . NM_encode_input($Tipo_filter[0]) . "' " . $Select . ">.." . $Cada_filter . "</option>\r\n");
       }
       $nm_saida->saida("       </SELECT>\r\n");
       $nm_saida->saida("     </span>\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bedit_filter_appdiv", "document.getElementById('Salvar_filters').style.display = ''; document.Fgrid_search_save.nmgp_save_name.focus()", "document.getElementById('Salvar_filters').style.display = ''; document.Fgrid_search_save.nmgp_save_name.focus()", "Ativa_save", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("    <DIV id=\"Salvar_filters\" style=\"display:none;z-index:9999;position: absolute;\">\r\n");
       $nm_saida->saida("     <TABLE align=\"center\" class=\"scFilterTable\">\r\n");
       $nm_saida->saida("      <TR>\r\n");
       $nm_saida->saida("       <TD class=\"scFilterBlock\">\r\n");
       $nm_saida->saida("        <table style=\"border-width: 0px; border-collapse: collapse\" width=\"100%\">\r\n");
       $nm_saida->saida("         <tr>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" valign=\"top\" class=\"scFilterBlockFont\">" . $this->Ini->Nm_lang['lang_othr_srch_head'] . "</td>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" align=\"right\" valign=\"top\">\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters').style.display = 'none'", "document.getElementById('Salvar_filters').style.display = 'none'", "Cancel_frm", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("         </tr>\r\n");
       $nm_saida->saida("        </table>\r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("      </TR>\r\n");
       $nm_saida->saida("      <TR>\r\n");
       $nm_saida->saida("       <TD class=\"scFilterFieldOdd\">\r\n");
       $nm_saida->saida("        <table style=\"border-width: 0px; border-collapse: collapse\" width=\"100%\">\r\n");
       $nm_saida->saida("         <tr>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" valign=\"top\">\r\n");
       $nm_saida->saida("           <input class=\"scFilterObjectOdd\" type=\"text\" id=\"SC_nmgp_save_name\" name=\"nmgp_save_name\" value=\"\">\r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" align=\"right\" valign=\"top\">\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_grid_search()", "nm_save_grid_search()", "Save_frm", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("         </tr>\r\n");
       $nm_saida->saida("        </table>\r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("      </TR>\r\n");
       $style_del_filter = (!empty($this->NM_fil_ant)) ? '' : 'none';
       $nm_saida->saida("      <TR>\r\n");
       $nm_saida->saida("       <TD class=\"scFilterFieldEven\">\r\n");
       $nm_saida->saida("       <DIV id=\"Apaga_filters\" style=\"display: " . $style_del_filter . "\">\r\n");
       $nm_saida->saida("        <table style=\"border-width: 0px; border-collapse: collapse\" width=\"100%\">\r\n");
       $nm_saida->saida("         <tr>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" valign=\"top\">\r\n");
       $nm_saida->saida("          <div id=\"id_sel_filters_del\">\r\n");
       $nm_saida->saida("           <SELECT class=\"scFilterObjectOdd\" id=\"sel_filters_del\" name=\"NM_filters_del\" size=\"1\">\r\n");
       $nm_saida->saida("            <option value=\"\"></option>\r\n");
       $Nome_filter = "";
       foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
       {
           $Select = "";
           if ($Cada_filter == $this->NM_curr_fil)
           {
               $Select = "selected";
           }
           if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
           }
           elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           if ($Tipo_filter[1] != $Nome_filter)
           {
               $Nome_filter = $Tipo_filter[1];
               $nm_saida->saida("           <option value=''>" . NM_encode_input($Nome_filter) . "</option>\r\n");
           }
          $nm_saida->saida("           <option value='" . NM_encode_input($Tipo_filter[0]) . "' " . $Select . ">.." . $Cada_filter . "</option>\r\n");
       }
       $nm_saida->saida("           </SELECT>\r\n");
       $nm_saida->saida("          </div>\r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" align=\"right\" valign=\"top\">\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcluir", "nm_del_grid_search()", "nm_del_grid_search()", "Exc_filtro", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("         </tr>\r\n");
       $nm_saida->saida("        </table>\r\n");
       $nm_saida->saida("       </DIV>\r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("      </TR>\r\n");
       $nm_saida->saida("     </TABLE>\r\n");
       $nm_saida->saida("    </DIV> \r\n");
       $nm_saida->saida("   </form>\r\n");
       $nm_saida->saida("  </div> \r\n");
       $nm_saida->saida("    <div id='close_grid_search' class='scGridFilterTagClose' onclick=\"checkLastTag(true);setTimeout(function() {nm_proc_grid_search(0, 'del_grid_search_all', 'grid_search_res')}, 200);\"></div>\r\n");
       $nm_saida->saida("   </div>\r\n");
       $nm_saida->saida("   </td>\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           $this->Ini->Arr_result['setValue'][] = array('field' => 'NM_Grid_Search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
           $_SESSION['scriptcase']['saida_html'] = "";
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['save_grid']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']))
           { 
               $this->Ini->Arr_result['exec_JS'][] = array('function' => 'SC_carga_evt_jquery_grid', 'parm' => 'all');
           } 
       } 
       if(!$_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       {
           $nm_saida->saida("   </tr>\r\n");
       }
       $this->JS_grid_search();
   }
   function grid_search_tag_ini($cmp, $def, $seq)
   {
       global $nm_saida;
       $lin_obj  = "";
       $lin_obj .= "<div class='scGridFilterTagListItem' id='grid_search_" . $cmp . "'>";
       $lin_obj .= "<span class='scGridFilterTagListItemLabel' id='grid_search_label_" . $cmp . "' title='" . NM_encode_input($def['hint']) . "' style='cursor:pointer;' onclick=\"closeAllTags();$('#grid_search_" . $cmp . " .scGridFilterTagListFilter').toggle();\">" . NM_encode_input($def['descr']) . "</span>";
       $lin_obj .= "<span class='scGridFilterTagListItemClose' onclick=\"$(this).parent().remove();checkLastTag(false);setTimeout(function() {nm_proc_grid_search('" . $seq . "', 'del_grid_search', 'grid_search_res'); return false;}, 200); return false;
    \"></span>";
       return $lin_obj;
   }
   function grid_search_tag_end()
   {
       global $nm_saida;
       $lin_obj  = "</div>";
       return $lin_obj;
   }
   function grid_search_add_tag()
   {
       $lin_obj  = "";
       $All_cmp_search = array('tgl');
       $nmgp_tab_label = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['pesq_tab_label'];
       if (!empty($nmgp_tab_label))
       {
          $nm_tab_campos = explode("?@?", $nmgp_tab_label);
          $nmgp_tab_label = array();
          foreach ($nm_tab_campos as $cada_campo)
          {
              $parte_campo = explode("?#?", $cada_campo);
              $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
          }
       }
       if (count($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq']) < 1)
       {
           $lin_obj .= "<table id='id_grid_search_all_cmp' cellpadding=0 cellspacing=0>";
           foreach ($All_cmp_search as $cada_cmp)
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['grid_pesq'][$cada_cmp]))
               {
                   $lin_obj .= "  <tr>";
                   $lin_obj .= "    <td class='scBtnGrpBackground'>";
                   $lin_obj .= "        <div class='scBtnGrpText' style='cursor:pointer; right:80px;' onClick=\"ajax_add_grid_search(this, 'resumo', '" . $cada_cmp . "'); return false;\">";
                   $lin_obj .= "            " . $nmgp_tab_label[$cada_cmp] . "";
                   $lin_obj .= "        </div>";
                   $lin_obj .= "    </td>";
                   $lin_obj .= "  </tr>";
               }
           }
           $lin_obj .= "</table>";
       }
       return $lin_obj;
   }
   function grid_search_tgl($ind, $ajax, $opc="", $val=array(), $label='')
   {
       $lin_obj  = "";
       $lin_obj .= "     <div class='scGridFilterTagListFilter' id='grid_search_tgl_" . $ind . "' style='display:none'>";
       $lin_obj .= "         <div class='scGridFilterTagListFilterLabel'>". NM_encode_input($label) ." <span class='scGridFilterTagListFilterLabelClose' onclick='closeAllTags(this);'></span></div>";
       $lin_obj .= "         <div class='scGridFilterTagListFilterInputs'>";
       if (empty($opc))
       {
           $opc = "eq";
       }
       $lin_obj .= "       <select id='grid_search_tgl_cond_" . $ind . "' name='cond_grid_search_tgl_" . $ind . "' class='" . $this->css_scAppDivToolbarInput . "' style='vertical-align: middle; display: none'>";
       $selected = ($opc == "eq") ? " selected" : "";
       $lin_obj .= "        <option value='eq'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
       $lin_obj .= "       </select>";
       if ($opc == "nu" || $opc == "nn" || $opc == "ep" || $opc == "ne")
       {
           $display_in_1 = "none";
       }
       else
       {
           $display_in_1 = "''";
       }
       $lin_obj .= "       <span id=\"grid_tgl_" . $ind . "\" style=\"display:" . $display_in_1 . "\">";
       $Form_base          = "ddmmyyyyhhiiss";
       $date_format_show   = "";
       $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
       $Lim   = strlen($Str_date);
       $Str   = "";
       $Ult   = "";
       $Arr_D = array();
       for ($I = 0; $I < $Lim; $I++)
       {
           $Char = substr($Str_date, $I, 1);
           if ($Char != $Ult && "" != $Str)
           {
               $Arr_D[] = $Str;
               $Str     = $Char;
           }
           else
           {
              $Str    .= $Char;
           }
           $Ult = $Char;
       }
       $Arr_D[] = $Str;
       $Prim = true;
       foreach ($Arr_D as $Cada_d)
       {
           if (strpos($Form_base, $Cada_d) !== false)
           {
               $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
               $date_format_show .= $Cada_d;
               $Prim = false;
           }
       }
       $date_format_show .= " ";
       $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
       $Lim   = strlen($Str_time);
       $Str   = "";
       $Ult   = "";
       $Arr_T = array();
       for ($I = 0; $I < $Lim; $I++)
       {
            $Char = substr($Str_time, $I, 1);
            if ($Char != $Ult && "" != $Str)
            {
                $Arr_T[] = $Str;
                $Str     = $Char;
            }
            else
            {
                $Str    .= $Char;
            }
            $Ult = $Char;
       }
       $Arr_T[] = $Str;
       $Prim = true;
       foreach ($Arr_T as $Cada_t)
       {
           if (strpos($Form_base, $Cada_t) !== false)
           {
               $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
               $date_format_show .= $Cada_t;
               $Prim = false;
           }
       }
       $Tmp_date = array_merge($Arr_D, $Arr_T);
       $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
       $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
       $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
       $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
       $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
       $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
       $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
       $val_r = $this->Ini->dyn_convert_date($val[0]);
       foreach ($Tmp_date as $Ind => $Part_date)
       {
            $AutoTab = (($Ind + 1) < count($Tmp_date)) ? "autoTab: true" : "autoTab: false";
           if (substr($Part_date, 0,1) == "y")
           {
               $val_cmp = (isset($val_r['ano'])) ? $val_r['ano'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_tgl_ano_val_" . $ind . "' name='val_grid_search_tgl_ano_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=4 alt=\"{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "m")
           {
               $val_cmp = (isset($val_r['mes'])) ? $val_r['mes'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_tgl_mes_val_" . $ind . "' name='val_grid_search_tgl_mes_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "d")
           {
               $val_cmp = (isset($val_r['dia'])) ? $val_r['dia'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_tgl_dia_val_" . $ind . "' name='val_grid_search_tgl_dia_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "h")
           {
               $val_cmp = (isset($val_r['hor'])) ? $val_r['hor'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_tgl_hor_val_" . $ind . "' name='val_grid_search_tgl_hor_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "i")
           {
               $val_cmp = (isset($val_r['min'])) ? $val_r['min'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_tgl_min_val_" . $ind . "' name='val_grid_search_tgl_min_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "s")
           {
               $val_cmp = (isset($val_r['seg'])) ? $val_r['seg'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_tgl_seg_val_" . $ind . "' name='val_grid_search_tgl_seg_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
       }
       $lin_obj .= "&nbsp;";
       $lin_obj .= "" . $date_format_show . "";
       $lin_obj .= "       </span>";
       $lin_obj .= "          </div>";
       $lin_obj .= "          <div class='scGridFilterTagListFilterBar'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bapply_appdiv", "closeAllTags();setTimeout(function() {nm_proc_grid_search($ind, 'proc_grid_search', 'grid_search_res')}, 200);", "closeAllTags();setTimeout(function() {nm_proc_grid_search($ind, 'proc_grid_search', 'grid_search_res')}, 200);", "grid_search_apply_" . $ind . "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $lin_obj .= "          </div>";
       $lin_obj .= "      </div>";
       return $lin_obj;
   }
   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $pos_path = strrpos($this->Ini->path_prod, "/");
       $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
       $NM_patch   = "simrskreatifmedia/chart_igd_hitung";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_" || substr($NMcmp_filter[0], 0, 6) == "SC_V8_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public']  . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public']  . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   function JS_grid_search()
   {
       global $nm_saida;
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     function Refresh_Chart()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         document.FRES.action = \"./\";\r\n");
       $nm_saida->saida("         document.FRES.submit();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var Tot_obj_grid_search = " . $this->grid_search_seq . ";\r\n");
       $nm_saida->saida("     Tab_obj_grid_search = new Array();\r\n");
       $nm_saida->saida("     Tab_evt_grid_search = new Array();\r\n");
       foreach ($this->grid_search_dat as $seq => $cmp)
       {
           $nm_saida->saida("     Tab_obj_grid_search[" . $seq . "] = '" . $cmp . "';\r\n");
       }
       $nm_saida->saida(" function sc_chart_igd_hitung_valida_mes(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 1 || obj.value > 12))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivdt'] +  \" \" + Nm_erro['lang_jscr_mnth'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" function sc_chart_igd_hitung_valida_dia(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 1 || obj.value > 31))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivdt'] +  \" \" + Nm_erro['lang_jscr_iday'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" function sc_chart_igd_hitung_valida_hora(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 0 || obj.value > 23))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivtm'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" function sc_chart_igd_hitung_valida_min(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 0 || obj.value > 59))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivdt'] +  \" \" + Nm_erro['lang_jscr_mint'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" function sc_chart_igd_hitung_valida_seg(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 0 || obj.value > 59))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivdt'] +  \" \" + Nm_erro['lang_jscr_secd'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['tgl_mes'] =  'sc_chart_igd_hitung_valida_mes(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['tgl_dia'] =  'sc_chart_igd_hitung_valida_dia(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['tgl_hor'] =  'sc_chart_igd_hitung_valida_hora(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['tgl_min'] =  'sc_chart_igd_hitung_valida_min(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['tgl_seg'] =  'sc_chart_igd_hitung_valida_seg(this)';\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_igd_hitung']['ajax_nav'])
       { 
           $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_obj_grid_search', 'value' => '');
           $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_evt_grid_search', 'value' => '');
           $this->Ini->Arr_result['setVar'][] = array('var' => 'Tot_obj_grid_search', 'value' => $this->grid_search_seq);
           foreach ($this->grid_search_dat as $seq => $cmp)
           {
               $this->Ini->Arr_result['setVar'][] = array('var' => 'Tab_obj_grid_search[' . $seq . ']', 'value' => $cmp);
           }
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['tgl_mes']", 'value' => 'sc_chart_igd_hitung_valida_mes(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['tgl_dia']", 'value' => 'sc_chart_igd_hitung_valida_dia(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['tgl_hor']", 'value' => 'sc_chart_igd_hitung_valida_hora(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['tgl_min']", 'value' => 'sc_chart_igd_hitung_valida_min(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['tgl_seg']", 'value' => 'sc_chart_igd_hitung_valida_seg(this)');
       } 
       $nm_saida->saida("     function SC_carga_evt_jquery_grid(tp_carga)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null' && (tp_carga == 'all' || tp_carga == i))\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 x   = 0;\r\n");
       $nm_saida->saida("                 tmp = Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                 cps = new Array();\r\n");
       $nm_saida->saida("                 cps[x] = tmp;\r\n");
       $nm_saida->saida("                 if (tmp == 'tgl')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     cps[x] = 'tgl_dia';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'tgl_mes';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'tgl_hor';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'tgl_min';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'tgl_seg';\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 for (x = 0; x < cps.length ; x++)\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     cmp = cps[x];\r\n");
       $nm_saida->saida("                     if (Tab_evt_grid_search[cmp])\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         eval (\"$('#grid_search_\" + cmp + \"_val_\" + i + \"').bind('change', function() {\" + Tab_evt_grid_search[cmp] + \"})\");\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_hide_input(field, ind)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var index = document.getElementById('grid_search_' + field + '_cond_' + ind).selectedIndex;\r\n");
       $nm_saida->saida("        var parm  = document.getElementById('grid_search_' + field + '_cond_' + ind).options[index].value;\r\n");
       $nm_saida->saida("        if (parm == \"nu\" || parm == \"nn\" || parm == \"ep\" || parm == \"ne\")\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_' + ind).css('display','none');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_' + ind).css('display','');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var addfilter_status = 'out';\r\n");
       $nm_saida->saida("     function nm_show_advancedsearch_fields()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("       var btn_id = 'add_grid_search';\r\n");
       $nm_saida->saida("       var obj_id = 'id_grid_search_add_tag';\r\n");
       $nm_saida->saida("       if($('#' + btn_id).offset().left + $('#' + obj_id).width() > $(document).width())\r\n");
       $nm_saida->saida("       {\r\n");
       $nm_saida->saida("            $('#' + obj_id).css('margin-left', ( $(document).width() - $('#' + btn_id).offset().left - $('#' + obj_id).width() - 10 ));\r\n");
       $nm_saida->saida("       }\r\n");
       $nm_saida->saida("       addfilter_status = 'open';\r\n");
       $nm_saida->saida("       $('#' + btn_id).mouseout(function() {\r\n");
       $nm_saida->saida("         setTimeout(function() {\r\n");
       $nm_saida->saida("           nm_hide_advancedsearch_fields(obj_id);\r\n");
       $nm_saida->saida("         }, 1000);\r\n");
       $nm_saida->saida("       });\r\n");
       $nm_saida->saida("       $('#' + obj_id + ' div').click(function() {\r\n");
       $nm_saida->saida("         addfilter_status = 'out';\r\n");
       $nm_saida->saida("         nm_hide_advancedsearch_fields(obj_id);\r\n");
       $nm_saida->saida("       });\r\n");
       $nm_saida->saida("       $('#' + obj_id).css({\r\n");
       $nm_saida->saida("         'left': $('#' + btn_id).left\r\n");
       $nm_saida->saida("       })\r\n");
       $nm_saida->saida("       .mouseover(function() {\r\n");
       $nm_saida->saida("         addfilter_status = 'over';\r\n");
       $nm_saida->saida("       })\r\n");
       $nm_saida->saida("       .mouseleave(function() {\r\n");
       $nm_saida->saida("         addfilter_status = 'out';\r\n");
       $nm_saida->saida("         setTimeout(function() {\r\n");
       $nm_saida->saida("           nm_hide_advancedsearch_fields(obj_id);\r\n");
       $nm_saida->saida("         }, 1000);\r\n");
       $nm_saida->saida("       })\r\n");
       $nm_saida->saida("       .show('fast');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_hide_advancedsearch_fields(obj_id) {\r\n");
       $nm_saida->saida("      if ('over' != addfilter_status) {\r\n");
       $nm_saida->saida("        $('#' + obj_id).hide('fast');\r\n");
       $nm_saida->saida("      }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function closeAllTags(obj)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (obj !== undefined)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if($(obj).parent().parent().parent().attr('new') == 'new')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 $(obj).parent().parent().parent().find('.scGridFilterTagListItemClose').click();\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('.scGridFilterTagListFilter').hide();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function checkLastTag(bol_force)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if(bol_force || $('.scGridFilterTagListItem').length == 0)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#NM_Grid_Search').remove();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var nm_empty_data_cond = ['ep','ne','nu','nn'];\r\n");
       $nm_saida->saida("     function nm_proc_grid_search(Seq, Tp_Proc, Origem)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         var out_dyn = \"\";\r\n");
       $nm_saida->saida("         var i       = Seq;\r\n");
       $nm_saida->saida("         if (Tp_Proc == 'del_grid_search' || Tp_Proc == 'del_grid_search_all')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#add_grid_search').removeClass('scGridFilterTagAddDisabled');\r\n");
       $nm_saida->saida("             out_dyn += Tab_obj_grid_search[i] + \"_DYN_\" + Tp_Proc;\r\n");
       $nm_saida->saida("             if (Tp_Proc == 'del_grid_search_all')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 Tab_obj_grid_search = new Array();\r\n");
       $nm_saida->saida("                 checkLastTag(true);\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 Tab_obj_grid_search[i] = 'NMSC_Grid_Null';\r\n");
       $nm_saida->saida("                 eval('Dropdownchecklist_'+ Tab_obj_grid_search[i] +'=false;');\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         else\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#grid_search_' + Tab_obj_grid_search[i]).attr('new', '');\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 out_dyn += Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_cond_' + i;\r\n");
       $nm_saida->saida("                 out_cond = grid_search_get_sel_cond(obj_dyn);\r\n");
       $nm_saida->saida("                 out_dyn += \"_DYN_\" + out_cond;\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_val_';\r\n");
       $nm_saida->saida("                 if (Tab_obj_grid_search[i] == 'tgl')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     obj_dyn = 'grid_search_' + Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                     result  = grid_search_get_dt_h(obj_dyn, i, 'DH');\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 if((result == '' || result == '_VLS2_' || result == 'Y:_VLS_M:_VLS_D:_VLS2_Y:_VLS_M:_VLS_D:' || result == 'Y:_VLS_M:_VLS_D:_VLS_H:_VLS_I:_VLS_S:_VLS2_Y:_VLS_M:_VLS_D:_VLS_H:_VLS_I:_VLS_S:') && nm_empty_data_cond.indexOf(out_cond) == -1 && out_cond.substring(0, 3) != 'bi_')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
       $nm_saida->saida("                     return false;\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 out_dyn += \"_DYN_\" + result;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         ajax_navigate_res(Origem, out_dyn);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_save_grid_search()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (document.Fgrid_search_save.nmgp_save_name.value == '')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
       $nm_saida->saida("             document.Fgrid_search_save.nmgp_save_name.focus();\r\n");
       $nm_saida->saida("             return false;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         save_name = document.Fgrid_search_save.nmgp_save_name.value;\r\n");
       $nm_saida->saida("         save_opt  = \"\"\r\n");
       $nm_saida->saida("         str_out = \"\";\r\n");
       $nm_saida->saida("         for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_cond_' + i;\r\n");
       $nm_saida->saida("                 out_cond = grid_search_get_sel_cond(obj_dyn);\r\n");
       $nm_saida->saida("                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_cond#NMF#\" + out_cond + \"@NMF@\";\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_val_';\r\n");
       $nm_saida->saida("                 obj_dyn2 = 'grid_search_' + Tab_obj_grid_search[i] + '_v2__val_';\r\n");
       $nm_saida->saida("                 if (Tab_obj_grid_search[i] == 'tgl')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     obj_dyn = 'grid_search_' + Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                     result  = grid_search_get_dt_h(obj_dyn, i, 'DH');\r\n");
       $nm_saida->saida("                     tvals  = result.split(\"_VLS2_\");\r\n");
       $nm_saida->saida("                     vals  = tvals[0].split(\"_VLS_\");\r\n");
       $nm_saida->saida("                     for (x = 0; x < vals.length; x++)\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"Y:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_ano#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"M:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_mes#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"D:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_dia#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"H:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_hor#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"I:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_min#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"S:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_seg#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                     if (tvals[1])\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         vals  = tvals[1].split(\"_VLS_\");\r\n");
       $nm_saida->saida("                         for (x = 0; x < vals.length; x++)\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"Y:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_ano#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"M:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_mes#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"D:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_dia#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"H:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_hor#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"I:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_min#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"S:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_seg#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         nmAjaxProcOn();\r\n");
       $nm_saida->saida("         $.ajax({\r\n");
       $nm_saida->saida("           type: \"POST\",\r\n");
       $nm_saida->saida("           url: \"index.php\",\r\n");
       $nm_saida->saida("           data: \"nmgp_opcao=ajax_filter_save&script_case_init=\" + document.Fgrid_search.script_case_init.value + \"&script_case_session=\" + document.Fgrid_search.script_case_session.value + \"&nmgp_save_name=\" + save_name + \"&nmgp_save_option=\" + save_opt + \"&NM_filters_save=\" + str_out + \"&nmgp_save_origem=grid\"\r\n");
       $nm_saida->saida("          })\r\n");
       $nm_saida->saida("          .done(function(json_save_fil) {\r\n");
       $nm_saida->saida("             var i, oResp;\r\n");
       $nm_saida->saida("             Tst_integrid = json_save_fil.trim();\r\n");
       $nm_saida->saida("             if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
       $nm_saida->saida("                 nmAjaxProcOff();\r\n");
       $nm_saida->saida("                 alert (json_save_fil);\r\n");
       $nm_saida->saida("                 return;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             eval(\"oResp = \" + json_save_fil);\r\n");
$nm_saida->saida("             if (oResp[\"ss_time_out\"]) {\r\n");
$nm_saida->saida("                 nmAjaxProcOff();\r\n");
$nm_saida->saida("                 nm_move();\r\n");
$nm_saida->saida("             }\r\n");
       $nm_saida->saida("             if (oResp[\"setValue\"]) {\r\n");
       $nm_saida->saida("               for (i = 0; i < oResp[\"setValue\"].length; i++) {\r\n");
       $nm_saida->saida("                    $(\"#\" + oResp[\"setValue\"][i][\"field\"]).html(oResp[\"setValue\"][i][\"value\"]);\r\n");
       $nm_saida->saida("               }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             if (oResp[\"htmOutput\"]) {\r\n");
       $nm_saida->saida("                 nmAjaxShowDebug(oResp);\r\n");
       $nm_saida->saida("              }\r\n");
       $nm_saida->saida("             document.getElementById('SC_nmgp_save_name').value = '';\r\n");
       $nm_saida->saida("             document.getElementById('Apaga_filters').style.display = '';\r\n");
       $nm_saida->saida("             document.getElementById('id_sel_recup_filters').style.display = '';\r\n");
       $nm_saida->saida("             document.getElementById('Salvar_filters').style.display = 'none';\r\n");
       $nm_saida->saida("             document.getElementById('id_sel_recup_filters').selectedIndex = -1;\r\n");
       $nm_saida->saida("             document.getElementById('sel_filters_del').selectedIndex = -1;\r\n");
       $nm_saida->saida("             nmAjaxProcOff();\r\n");
       $nm_saida->saida("         });\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_del_grid_search()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        obj_sel = document.Fgrid_search_save.elements['NM_filters_del'];\r\n");
       $nm_saida->saida("        index   = obj_sel.selectedIndex;\r\n");
       $nm_saida->saida("        if (index == -1 || obj_sel.options[index].value == \"\") \r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            return false;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        parm = obj_sel.options[index].value;\r\n");
       $nm_saida->saida("        nmAjaxProcOn();\r\n");
       $nm_saida->saida("        $.ajax({\r\n");
       $nm_saida->saida("          type: \"POST\",\r\n");
       $nm_saida->saida("          url: \"index.php\",\r\n");
       $nm_saida->saida("          data: \"nmgp_opcao=ajax_filter_delete&script_case_init=\" + document.Fgrid_search.script_case_init.value + \"&script_case_session=\" + document.Fgrid_search.script_case_session.value + \"&NM_filters_del=\" + parm + \"&nmgp_save_origem=grid\"\r\n");
       $nm_saida->saida("         })\r\n");
       $nm_saida->saida("         .done(function(json_del_fil) {\r\n");
       $nm_saida->saida("            var i, oResp;\r\n");
       $nm_saida->saida("            Tst_integrid = json_del_fil.trim();\r\n");
       $nm_saida->saida("            if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
       $nm_saida->saida("                nmAjaxProcOff();\r\n");
       $nm_saida->saida("                alert (json_del_fil);\r\n");
       $nm_saida->saida("                return;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            eval(\"oResp = \" + json_del_fil);\r\n");
$nm_saida->saida("             if (oResp[\"ss_time_out\"]) {\r\n");
$nm_saida->saida("                 nmAjaxProcOff();\r\n");
$nm_saida->saida("                 nm_move();\r\n");
$nm_saida->saida("             }\r\n");
       $nm_saida->saida("            if (oResp[\"setValue\"]) {\r\n");
       $nm_saida->saida("              for (i = 0; i < oResp[\"setValue\"].length; i++) {\r\n");
       $nm_saida->saida("                   $(\"#\" + oResp[\"setValue\"][i][\"field\"]).html(oResp[\"setValue\"][i][\"value\"]);\r\n");
       $nm_saida->saida("              }\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            if (oResp[\"htmOutput\"]) {\r\n");
       $nm_saida->saida("                nmAjaxShowDebug(oResp);\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            nmAjaxProcOff();\r\n");
       $nm_saida->saida("        });\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_change_grid_search(obj_sel)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        index = obj_sel.selectedIndex;\r\n");
       $nm_saida->saida("        if (index == -1 || obj_sel.options[index].value == \"\") \r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            return false;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_search_' + Tab_obj_grid_search[i]).remove();\r\n");
       $nm_saida->saida("             eval('Dropdownchecklist_'+ Tab_obj_grid_search[i] +'=false;');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        Tot_obj_grid_search = 0;\r\n");
       $nm_saida->saida("        Tab_obj_grid_search = new Array();\r\n");
       $nm_saida->saida("        ajax_navigate_res('grid_search_change_fil_res', obj_sel.options[index].value);;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_sel_cond(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var index = document.getElementById(obj_id).selectedIndex;\r\n");
       $nm_saida->saida("        return document.getElementById(obj_id).options[index].value;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_select(obj_id, str_type)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        if(str_type == '')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            var obj = $('#' + obj_id).multipleSelect('getSelects');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        var val = \"\";\r\n");
       $nm_saida->saida("        for (iSelect = 0; iSelect < obj.length; iSelect++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if ((str_type == '' && obj[iSelect].selected) || (str_type=='RADIO' || str_type=='CHECKBOX'))\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                if(str_type == '' && obj[iSelect].selected)\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    new_val = obj[iSelect].value;\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("                else\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    new_val = obj[iSelect];\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("                val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                val += new_val;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_Dselelect(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        var val = \"\";\r\n");
       $nm_saida->saida("        for (iSelect = 0; iSelect < obj.length; iSelect++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("            val += obj[iSelect].value;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_radio(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var Nobj = document.getElementById(obj_id).name;\r\n");
       $nm_saida->saida("        var obj  = document.getElementsByName(Nobj);\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        for (iRadio = 0; iRadio < obj.length; iRadio++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if (obj[iRadio].checked)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                val += obj[iRadio].value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_checkbox(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var Nobj = document.getElementById(obj_id).name;\r\n");
       $nm_saida->saida("        var obj  = document.getElementsByName(Nobj);\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        if (!obj.length)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if (obj.checked)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val = obj.value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            return val;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            for (iCheck = 0; iCheck < obj.length; iCheck++)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                if (obj[iCheck].checked)\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                    val += obj[iCheck].value;\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_text(obj_id, obj_ac)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        var val = \"\";\r\n");
       $nm_saida->saida("        if (obj)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val = obj.value;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        if (obj_ac != '' && val == '')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            obj = document.getElementById(obj_ac);\r\n");
       $nm_saida->saida("            if (obj)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val = obj.value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_dt_h(obj_id, ind, TP)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var val = new Array();\r\n");
       $nm_saida->saida("        if (TP == 'DT' || TP == 'DH')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            obj_part  = document.getElementById(obj_id + '_ano_val_' + ind);\r\n");
       $nm_saida->saida("            val      += \"Y:\";\r\n");
       $nm_saida->saida("            if (obj_part && obj_part.type.substr(0, 6) == 'select')\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                Tval = grid_search_get_sel_cond(obj_id + '_ano_val_' + ind);\r\n");
       $nm_saida->saida("                val += (Tval != -1) ? Tval : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            obj_part  = document.getElementById(obj_id + '_mes_val_' + ind);\r\n");
       $nm_saida->saida("            val      += \"_VLS_M:\";\r\n");
       $nm_saida->saida("            if (obj_part && obj_part.type.substr(0, 6) == 'select')\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                Tval = grid_search_get_sel_cond(obj_id + '_mes_val_' + ind);\r\n");
       $nm_saida->saida("                val += (Tval != -1) ? Tval : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            obj_part  = document.getElementById(obj_id + '_dia_val_' + ind);\r\n");
       $nm_saida->saida("            val      += \"_VLS_D:\";\r\n");
       $nm_saida->saida("            if (obj_part && obj_part.type.substr(0, 6) == 'select')\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                Tval = grid_search_get_sel_cond(obj_id + '_dia_val_' + ind);\r\n");
       $nm_saida->saida("                val += (Tval != -1) ? Tval : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        if (TP == 'HH' || TP == 'DH')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val            += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("            obj_part        = document.getElementById(obj_id + '_hor_val_' + ind);\r\n");
       $nm_saida->saida("            val            += \"H:\";\r\n");
       $nm_saida->saida("            val            += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            obj_part        = document.getElementById(obj_id + '_min_val_' + ind);\r\n");
       $nm_saida->saida("            val            += \"_VLS_I:\";\r\n");
       $nm_saida->saida("            val            += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            obj_part        = document.getElementById(obj_id + '_seg_val_' + ind);\r\n");
       $nm_saida->saida("            val            += \"_VLS_S:\";\r\n");
       $nm_saida->saida("            val            += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
}
?>
