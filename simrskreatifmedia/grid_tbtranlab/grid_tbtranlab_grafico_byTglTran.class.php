<?php

class grid_tbtranlab_grafico
{
   var $Db;
   var $Ini;
   var $Erro;
   var $Lookup;

   var $nm_data;
   var $total;
   var $array_datay_geral;
   var $array_label_geral;
   var $array_datay;
   var $array_label;
   var $campo;
   var $campo_val;
   var $comando;
   var $label;
   var $list_titulo;
   var $max_size_datay;
   var $max_size_label;
   var $total_datay;
   var $nivel;
   var $titulo;
   var $Decimais;
   var $sc_proc_grid; 
   var $sc_graf_sint = false;
   var $graf_cor_fundo;
   var $graf_cor_margens;
   var $graf_cor_label;
   var $graf_cor_valores;
   var $graf_tipo_marcas;
   var $NM_tit_val;
   var $NM_ind_val;

   var $reload_as_analytic = false;
   var $array_nama = array();
   var $array_sc_field_0 = array();

   //---- 
   function __construct()
   {
      $this->nm_data = new nm_data("id");
   }

	function generateChartImage($chartKey) {
		$this->monta_grafico($chartKey, 'pdf');
	} // generateChartImage

   //---- 
   function monta_grafico($chart_key = '', $operation = 'chart', $graf_col = false)
   {
       $graf_field = false;
       $this->graf_col = $graf_col;
       if (is_array($chart_key) && isset($chart_key['field']))
       {
           $field = $chart_key['field'];
           $graf_field = true;
       }
       if ('pdf_lib' == $operation)
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf'];
           $this->grafico_flash_js();
           return;
       }
       if ($graf_field)
       {
           $this->sc_graf_sint = true;
       }
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_opc_atual'] == 1)
       {
           $this->sc_graf_sint = true;
       }

       $b_export = false;
       if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
       {
           $b_export = true;
           $chart_key = key($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts']);
       }
       elseif ('' == $chart_key)
       {
           $chart_key = isset($_POST['nmgp_parms']) ? $_POST['nmgp_parms'] : '';
       }

       if ($graf_field)
       {
           $chart_data = array();
           $chart_data['title']    = $chart_key['title'];
           $chart_data['label_x']  = $chart_key['label_x'];
           $chart_data['label_y']  = $chart_key['label_y'];
           $chart_data['labels']   = $chart_key['labels'];
           $chart_data['show_sub'] = true;
           $chart_data['subtitle'] = "";
           $chart_data['format']   = $chart_key['format'];
           $chart_data['legend']   = "";
           $chart_data['values']['sint'] = $chart_key['vals'];
           $arr_param = array(
               'type'        => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_tipo'],
               'width'       => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_larg'],
               'height'      => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_alt'],
               'barra_orien' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_orien'],
               'barra_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_forma'],
               'barra_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_dimen'],
               'barra_sobre' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_sobre'],
               'barra_empil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_empil'],
               'barra_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_inver'],
               'barra_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_agrup'],
               'barra_funil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_barra_funil'],
               'pizza_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pizza_forma'],
               'pizza_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pizza_dimen'],
               'pizza_orden' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pizza_orden'],
               'pizza_explo' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pizza_explo'],
               'pizza_valor' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pizza_valor'],
               'linha_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_linha_forma'],
               'linha_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_linha_inver'],
               'linha_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_linha_agrup'],
               'area_forma'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_area_forma'],
               'area_empil'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_area_empil'],
               'area_inver'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_area_inver'],
               'area_agrup'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_area_agrup'],
               'marca_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_marca_inver'],
               'marca_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_marca_agrup'],
               'gauge_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_gauge_forma'],
               'radar_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_radar_forma'],
               'radar_empil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_radar_empil'],
               'polar_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_polar_forma'],
               'funil_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_funil_dimen'],
               'funil_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_funil_inver'],
               'pyram_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pyram_dimen'],
               'pyram_valor' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pyram_valor'],
               'pyram_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field]['graf_pyram_forma'],
               'tit_datay'   => $chart_data['label_y'],
               'tit_label'   => $chart_data['label_x'],
               'tit_chart'   => $chart_data['title'],
               'export'      => 'N',
               'pdf'         => 'N',
               'xml'         => '',
           );
           $mode = 'full';
           $this->arr_param = $arr_param;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']               = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab'][$field];
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_order'];
           $this->grafico_flash($arr_param, $this->grafico_dados($chart_data, $arr_param['export'], ''), $mode);
       }
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$chart_key]))
       {
           $chart_data = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$chart_key];

           $arr_param = array(
               'type'        => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_tipo'],
               'width'       => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_larg'],
               'height'      => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_alt'],
               'barra_orien' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_orien'],
               'barra_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_forma'],
               'barra_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_dimen'],
               'barra_sobre' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_sobre'],
               'barra_empil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_empil'],
               'barra_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_inver'],
               'barra_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_agrup'],
               'barra_funil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_funil'],
               'pizza_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_forma'],
               'pizza_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_dimen'],
               'pizza_orden' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_orden'],
               'pizza_explo' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_explo'],
               'pizza_valor' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_valor'],
               'linha_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_linha_forma'],
               'linha_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_linha_inver'],
               'linha_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_linha_agrup'],
               'area_forma'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_forma'],
               'area_empil'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_empil'],
               'area_inver'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_inver'],
               'area_agrup'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_agrup'],
               'marca_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_marca_inver'],
               'marca_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_marca_agrup'],
               'gauge_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_gauge_forma'],
               'radar_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_radar_forma'],
               'radar_empil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_radar_empil'],
               'polar_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_polar_forma'],
               'funil_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_funil_dimen'],
               'funil_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_funil_inver'],
               'pyram_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pyram_dimen'],
               'pyram_valor' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pyram_valor'],
               'pyram_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pyram_forma'],
               'tit_datay'   => $chart_data['label_y'],
               'tit_label'   => $chart_data['label_x'],
               'tit_chart'   => $chart_data['title'],
               'export'      => $b_export ? 'Y' : ('xml' == $operation ? 'xml' : 'N'),
               'pdf'         => 'pdf' == $operation ? 'Y' : 'N',
               'xml'         => 'xml' == $operation ? $chart_data['xml'] : '',
           );
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']               = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_order'];
           if ('pdf' == $operation)
           {
               $mode = 'chart';
           }
           elseif ('xml' == $operation)
           {
               $mode = 'xml_only';
           }
           elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_full'])
           {
               $mode = 'full';
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_full']);
           }
           elseif (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_bot'])
           {
               $mode = 'full';
           }
           elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_first'])
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_first'] = false;
               $mode = array('js', 'chart');
           }
           else
           {
               $mode = 'chart';
           }
           $this->arr_param = $arr_param;
           $this->grafico_flash($arr_param, $this->grafico_dados($chart_data, $arr_param['export'], $chart_key), $mode);
           if ('pdf' == $operation || 'xml' == $operation)
           {
               return;
           }
           elseif ((!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']) && (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_bot']))
           {
               exit;
           }
       }
       elseif (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
       {
?>
<html>
<body>
<?php
           $this->grafico_flash_form();
?>
<script type="text/javascript" language="javascript">
  document.flashRedir.submit();
 </script>
</body>
</html>
<?php
       }
       elseif ('__no_record_found__' == $chart_key)
       {
           $arr_param = array(
               'type'        => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_tipo'],
               'width'       => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_larg'],
               'height'      => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_alt'],
               'barra_orien' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_orien'],
               'barra_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_forma'],
               'barra_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_dimen'],
               'barra_sobre' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_sobre'],
               'barra_empil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_empil'],
               'barra_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_inver'],
               'barra_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_agrup'],
               'barra_funil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_barra_funil'],
               'pizza_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_forma'],
               'pizza_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_dimen'],
               'pizza_orden' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_orden'],
               'pizza_explo' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_explo'],
               'pizza_valor' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pizza_valor'],
               'linha_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_linha_forma'],
               'linha_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_linha_inver'],
               'linha_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_linha_agrup'],
               'area_forma'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_forma'],
               'area_empil'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_empil'],
               'area_inver'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_inver'],
               'area_agrup'  => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_area_agrup'],
               'marca_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_marca_inver'],
               'marca_agrup' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_marca_agrup'],
               'gauge_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_gauge_forma'],
               'radar_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_radar_forma'],
               'radar_empil' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_radar_empil'],
               'polar_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_polar_forma'],
               'funil_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_funil_dimen'],
               'funil_inver' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_funil_inver'],
               'pyram_dimen' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pyram_dimen'],
               'pyram_valor' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pyram_valor'],
               'pyram_forma' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_pyram_forma'],
               'tit_datay'   => '',
               'tit_label'   => '',
               'tit_chart'   => '',
               'export'      => 'N',
               'pdf'         => 'N',
               'xml'         => '',
           );
           $this->grafico_flash($arr_param, null, '__no_record_found__');
       }
   }

   //---- 
   function inicializa_vars()
   {
      global 
             $nivel_quebra, $nm_lang, $campo, $campo_val;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_opc_atual'] == 1)
      {
         $this->sc_graf_sint = true;
      }
      //---- 
      $this->array_decimais = array();
      $this->campo     = (isset($campo))        ? $campo        : 0;
      $this->nivel     = (isset($nivel_quebra)) ? $nivel_quebra : 0;
      $this->campo_val = (isset($campo_val))    ? $campo_val    : 1;
      //---- 
      $this->array_total_trandate = array();
      //---- 
      $ind_tit = $this->campo_val;
      if ($this->campo > 0)
      {
          foreach ($this->NM_ind_val as $i => $seq)
          {
              if ($ind_tit == $seq)
              {
                  $ind_tit = $i;
                  break;
              }
          }
      }
      $this->list_titulo = (isset($this->NM_tit_val[$ind_tit]))  ? $this->NM_tit_val[$ind_tit]  : "";
      $this->Decimais    = (isset($this->array_decimais[$ind_tit])) ? $this->array_decimais[$ind_tit] : 2;
      $this->titulo      = $this->list_titulo;
      //---- Label
      $this->label    = array();
      $this->label[0] = "" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['contr_label_graf']['trandate']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['contr_label_graf']['trandate']))
      {
         $this->label[0] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['contr_label_graf']['trandate'];
      }
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
   function monta_arrays()
   {
      $this->array_label = array();
      $this->array_datay = array();
      if ($this->campo > 0)
      {
          $this->sc_graf_sint = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_total']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_total'] as $label => $valor)
          {
              $this->array_label[] = $valor[2];
              if ($this->campo == 0 && $this->nivel == 0)
              {
                  if ($this->sc_graf_sint)
                  {
                      $this->array_datay[" "][] = $valor[$this->campo_val];
                  }
              }
          }
          if (!$this->sc_graf_sint)
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_linhas'] as $cada_elemento)
              {
                  if (substr($cada_elemento[0], 0, 1) == 1)
                  {
                      $ind_val = $this->NM_ind_val[$this->campo_val];
                      $legenda = substr($cada_elemento[0], 1);
                      foreach ($this->array_label as $ind => $lixo)
                      {
                          if (isset($cada_elemento[$ind + 1]))
                          {
                              $this->array_datay[$legenda][] = $cada_elemento[$ind + 1][$ind_val];
                          }
                          else
                          {
                              $this->array_datay[$legenda][] = 0;
                          }
                      }
                  }
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_linhas']))
      {
          if ($this->campo > 0)
          {
              $lab_quebra    = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_linhas'][$this->campo][0], 1);
              $lab_quebra    = str_replace("&nbsp;", "", $lab_quebra);
              $this->titulo .= " - " . $this->label[$this->nivel] . " = " . $lab_quebra;
          }
          if ($this->campo > 0)
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_linhas'][$this->campo] as $ind => $valor)
              {
                  if ($ind > 0)
                  {
                      $this->array_datay[" "][$ind - 1] = $valor[$this->campo_val];
                  }
              }
              for ($i = 0; $i < count($this->array_label); $i++)
              {
                   if (!isset($this->array_datay[" "][$i]))
                   {
                       $this->array_datay[" "][$i] = 0;
                   }
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['del_graph_col']))
      {
          $trab_graf = $this->array_label;
          $this->array_label = array();
          foreach ($trab_graf as $ind => $resto)
          {
              $tst_ind = $ind + 1;
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['del_graph_col'][$tst_ind]))
              {
                  $this->array_label[] = $resto;
              }
          }
          $trab_graf = $this->array_datay;
          $this->array_datay = array();
          foreach ($trab_graf as $legenda => $dados)
          {
              ksort($dados);
              foreach ($dados as $ind => $resto)
              {
                  $tst_ind = $ind + 1;
                  if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['del_graph_col'][$tst_ind]))
                  {
                      $this->array_datay[$legenda][] = $resto;
                  }
              }
          }
      }
      $this->max_size_label = 0;
      for ($i = 0; $i < sizeof($this->array_label); $i++)
      {
         $size_label           = strlen("" . $this->array_label[$i]);
         $this->max_size_label = ($this->max_size_label < $size_label) ? $size_label : $this->max_size_label;
      }
      $this->max_size_datay = 0;
      $this->total_datay = 0;
      foreach ($this->array_datay as $legenda => $dadosY)
      {
          for ($i = 0; $i < sizeof($dadosY); $i++)
          {
             $size_datay           = strlen("" . $dadosY[$i]);
             $this->max_size_datay = ($this->max_size_datay < $size_datay) ? $size_datay : $this->max_size_datay;
             $this->total_datay   += $dadosY[$i];
          }
      }
   }

   function storeCombinationTable($arr_series)
   {
       foreach ($arr_series as $serie_data)
       {
           if ($serie_data['comb'])
           {
               $this->storeCombinationTableSerie($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['comb_table_data'], $serie_data, $serie_data['param']);
           }
       }
   }

   function storeCombinationTableSerie(&$comb_data, $serie_data, $param)
   {
       if (!empty($param))
       {
           $index = array_shift($param);
           if(!isset($comb_data[$index]))
           {
               $comb_data[$index] = array(
                   'field_x'  => '',
                   'label_x'  => '',
                   'label'    => '',
                   'values'   => array(),
                   'children' => array(),
               );
           }
           $this->storeCombinationTableSerie($comb_data[$index]['children'], $serie_data, $param);
       }
       else
       {
           $this->storeCombinationTableSerieData($comb_data, $serie_data);
       }
   }

   function storeCombinationTableSerieData(&$comb_data, $serie_data)
   {
       foreach ($serie_data['db_values'] as $index => $dbval)
       {
           $comb_data[$dbval]['field_x']                           = $serie_data['field_x'];
           $comb_data[$dbval]['label_x']                           = $serie_data['label_x'];
           $comb_data[$dbval]['label']                             = $serie_data['label'][$index];
           $comb_data[$dbval]['values'][ $serie_data['summ_idx'] ] = $serie_data['data'][$index];

           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['comb_table_def']['field'][ $serie_data['summ_idx'] ] = $serie_data['field_y'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['comb_table_def']['label'][ $serie_data['summ_idx'] ] = $serie_data['name'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['comb_table_def']['summ'][ $serie_data['summ_idx'] ]  = $serie_data['summ_idx'];
       }
   }

   function storeAnalyticTable($arr_series)
   {
       foreach ($arr_series as $serie_data)
       {
           $this->storeAnaliticTableSerie($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['anlt_table_data'], $serie_data);
       }
   }

   function storeAnaliticTableSerie(&$comb_data, $serie_data)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['anlt_table_def']['field'][ $serie_data['name'] ] = $serie_data['field_y'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['anlt_table_def']['label'][ $serie_data['name'] ] = $serie_data['name'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['anlt_table_def']['summ'][ $serie_data['name'] ]  = $serie_data['summ_idx'];

       foreach ($serie_data['db_values'] as $index => $dbval)
       {
           if (!isset($comb_data[ $serie_data['label'][$index] ]))
           {
               $comb_data[ $serie_data['label'][$index] ] = array(
                   'field_x'  => $serie_data['field_x'],
                   'label_x'  => $serie_data['label_x'],
                   'label'    => $serie_data['label'][$index],
                   'values'   => array(),
                   'children' => array(),
               );
           }

           $comb_data[ $serie_data['label'][$index] ]['values'][ $serie_data['name'] ] = $serie_data['data'][$index];
       }
    }

   function grafico_flash($arr_param, $arr_charts, $html_par = 'full')
   {
      global $nm_saida, $nm_retorno_graf;
         $Ind_groupby = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['SC_Ind_Groupby'];
         $this->orderCharts($arr_charts, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_order']);

         $arr_series     = $arr_charts[0];

         $dp_settings    = array();
         $y_scale        = array();
         $shape_type     = '';
         $chart_series   = 'bar_series';
         $chart_series_a = array();
         $series_explode = '';

         $tipo           = $arr_param['type'];
         $width          = $arr_param['width'];
         $height         = $arr_param['height'];
         $tit_datay      = $arr_param['tit_datay'];
         $tit_label      = $arr_param['tit_label'];
         $tit_graf       = $arr_param['tit_chart'];
         $export         = $arr_param['export'];

         $host           = (isset($arr_param['host'])   && !empty($arr_param['host']))   ? $arr_param['host']   : '';
         $export         = (isset($arr_param['export']) && !empty($arr_param['export'])) ? $arr_param['export'] : 'N';

         $this->storeCombinationTable($arr_series);

         if ('xml_only' == $html_par)
         {
             if (isset($arr_param['xml']) && '' != $arr_param['xml'])
             {
                 $fileParts = explode('!!!', $arr_param['xml']);
                 if (1 == count($fileParts))
                 {
                     $fileName = $arr_param['xml'];
                 }
                 else
                 {
                     $fileParts[1] = md5($fileParts[1]);
                     $fileName     = implode('', $fileParts);
                 }
                 $sFileLocal = $this->Ini->path_imag_temp . '/' . $fileName;
                 $ac         = fopen($this->Ini->root . $sFileLocal, 'w');
                 fwrite($ac, $this->grafico_flash_xml($arr_param, $arr_series));
                 fclose($ac);
             }
             return;
         }

         if ($this->reload_as_analytic)
         {
              $this->storeAnalyticTable($arr_series);
         }

         $sFileLocal = $this->Ini->path_imag_temp . '/sc_flashchart_' . md5(microtime() . mt_rand(1, 1000)) . '.json';
         $ac         = fopen($this->Ini->root . $sFileLocal, 'w');
         fwrite($ac, $this->grafico_flash_xml($arr_param, $arr_series));
         fclose($ac);

         if ('full' == $html_par || 'page' == $html_par || in_array('page', $html_par))
         {
?>
<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
             if ($_SESSION['scriptcase']['proc_mobile'])
             {
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
             }
             if (isset($_POST['summary_css']) && '' != $_POST['summary_css'])
             {
?>
<link rel="stylesheet" href="<?php echo NM_encode_input($_POST['summary_css']) ?>" type="text/css" media="screen" />
<?php
             }
?>
<title>
<?php
             if ('UTF-8' != $_SESSION['scriptcase']['charset'])
             {
                 echo sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
             }
             else
             {
                 echo $tit_graf;
             }
?>
</title>
<?php
         }
         if ('full' == $html_par || 'js' == $html_par || '__no_record_found__' == $html_par || in_array('js', $html_par))
         {
            $this->grafico_flash_js();
         }
         if (!$this->graf_col && ('full' == $html_par || 'config' == $html_par || in_array('config', $html_par)))
         {
            $this->grafico_flash_config_js();
            $nm_saida->saida("<link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" />\r\n");
         if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
         { 
            $nm_saida->saida("<link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\" />\r\n");
         } 
         }
         if ('full' == $html_par || 'page' == $html_par || in_array('page', $html_par))
         {
?>
</head>
<body class="scGridPage">
<?php
         }
         if ('full' == $html_par || 'form' == $html_par || in_array('form', $html_par))
         {
            $this->grafico_flash_form();
         }
         if (!$this->graf_col && ('full' == $html_par || 'config' == $html_par || in_array('config', $html_par)))
         {
            $this->grafico_flash_config_div();
         }
         if ('full' == $html_par || 'chart' == $html_par || in_array('chart', $html_par))
         {
            $this->grafico_flash_chart($width, $height, $sFileLocal, $export, $arr_charts, $arr_param['pdf']);
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['phantomjs_export_process']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['phantomjs_export_process'])
         {
             return;
         }
         if ('full' == $html_par || 'page' == $html_par || in_array('chart', $html_par))
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['opcao'] != "pdf")
            {
                if (empty($nm_retorno_graf))
                {
                    $nm_retorno_graf = "resumo";
                }
            }
         }
         if ('full' == $html_par || 'page' == $html_par || in_array('page', $html_par))
         {
?>
</body>
</html>
<?php
         }
   }

   function load_chart_theme()
   {
       $sChartTheme = 'scriptcase__NM__sc_Flat.php';
       if (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['opcao'] == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['opcao'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       {
           $sChartTheme = 'scriptcase__NM__sc_GrayScale.php';
       }
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['export_print_bw']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['export_print_bw'])
       {
           $sChartTheme = 'scriptcase__NM__sc_GrayScale.php';
       }
       $prjFallback = '';
       if ('grp__NM__' == substr($this->Ini->str_chart_theme, 0, 9)) {
           $prjFallback = 'prj__NM__' . substr($this->Ini->str_chart_theme, 9);
       }
       if ('__app' == $sChartTheme)
       {
           return array(
           );
       }
       elseif ('__theme' == $sChartTheme && isset($this->Ini->str_chart_theme) && !empty($this->Ini->str_chart_theme) && is_file($this->Ini->path_chart_theme . $this->Ini->str_chart_theme . '.php'))
       {
           include $this->Ini->path_chart_theme . $this->Ini->str_chart_theme . '.php';
           return $__scChartTheme;
       }
       elseif ('__theme' == $sChartTheme && isset($prjFallback) && !empty($prjFallback) && is_file($this->Ini->path_chart_theme . $prjFallback . '.php'))
       {
           include $this->Ini->path_chart_theme . $prjFallback . '.php';
           return $__scChartTheme;
       }
       elseif ('' == $sChartTheme || !@is_file($this->Ini->path_chart_theme . $sChartTheme))
       {
           return false;
       }
       else
       {
           include $this->Ini->path_chart_theme . $sChartTheme;
           return $__scChartTheme;
       }
   }

   function formatSecondary($originalFormat)
   {
       $aSecFormat = array();
       foreach ($originalFormat as $sTag => $sValue) {
           switch ($sTag) {
               case 'decimals':
                   $aSecFormat['sDecimals'] = $sValue;
                   break;
               case 'decimalSeparator':
                   $aSecFormat['sDecimalSeparator'] = $sValue;
                   break;
               case 'thousandSeparator':
                   $aSecFormat['sThousandSeparator'] = $sValue;
                   break;
               case 'trailingZeros':
                   $aSecFormat['sTrailingZeros'] = $sValue;
                   break;
               case 'monetarySymbol':
                   $aSecFormat['sMonetarySymbol'] = $sValue;
                   break;
               case 'monetaryPosition':
                   $aSecFormat['sMonetaryPosition'] = $sValue;
                   break;
               case 'monetarySpace':
                   $aSecFormat['sMonetarySpace'] = $sValue;
                   break;
               case 'monetaryDecimal':
                   $aSecFormat['sMonetaryDecimal'] = $sValue;
                   break;
               case 'monetaryThousands':
                   $aSecFormat['sMonetaryThousands'] = $sValue;
                   break;
               case 'formatNumberScale':
                   $aSecFormat['sFormatNumberScale'] = $sValue;
                   break;
               case 'forceDecimals':
                   $aSecFormat['sForceDecimals'] = $sValue;
                   break;
               case 'numberPrefix':
                   $aSecFormat['sNumberPrefix'] = $sValue;
                   break;
               default:
                   $aSecFormat[$sTag] = $sValue;
                   break;
           }
       }
       return $aSecFormat;
   }
   function formatThemeSecondary(&$chartTheme)
   {
       foreach ($chartTheme as $sTag => $sValue) {
           if ('yAxisNameFont' == substr($sTag, 0, 13)) {
               $sTag = 'Y' . substr($sTag, 1);
               $chartTheme['p' . $sTag] = $sValue;
               $chartTheme['s' . $sTag] = $sValue;
           }
       }
   }

   function grafico_flash_xml($arr_param, $arr_series, $newline = "\r\n")
   {
       $tipo         = $arr_param['type'];
       $width        = $arr_param['width'];
       $height       = $arr_param['height'];
       $tit_datay    = $arr_param['tit_datay'];
       $tit_label    = $arr_param['tit_label'];
       $tit_graf     = $arr_param['tit_chart'];
       $export       = $arr_param['export'];
       $value_format = isset($arr_series[0]['format']) && '' != $arr_series[0]['format'] ? $arr_series[0]['format'] : (isset($arr_series[0]['formatfc']) && !empty($arr_series[0]['formatfc']) ? $arr_series[0]['formatfc'] : array());
       $is_combinat  = isset($arr_series[0]['comb']) ? $arr_series[0]['comb'] : false;

       $repeat_value = false;

       $chart_theme  = $this->load_chart_theme();

       $chart_attr_j = array();

       $chart_attr_j['showValues'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_exibe_val'];

       $bDisableLinks = false;
       $b_dual_axys   = false;
       if ($is_combinat)
       {
           if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['chart_combination_type'], array('angulargauge', 'hlineargauge', 'msstepline', 'stackedarea', 'stackedbar2d', 'stackedbar3d', 'stackedcolumn2d', 'stackedcolumn3d')))
           {
               $bDisableLinks = true;
           }
           if ('' == $tit_label && isset($arr_series[0]['label_x']))
           {
               $tit_label = $arr_series[0]['label_x'];
           }
           if (1 == sizeof($arr_series))
           {
               if ('C' == $arr_series[0]['summ_fn'])
               {
                   $tit_datay = "";
               }
               else
               {
                   $tit_datay = "";
               }
               if ('' == $tit_datay)
               {
                   $tit_datay = $arr_series[0]['label_y'];
               }
           }
           else
           {
               $tit_datay = "";
               $pri_label = "";
               $sec_label = "";
               if ('' == $pri_label || '' == $sec_label)
               {
                   foreach ($arr_series as $i_serie => $a_serie)
                   {
                       if ('C' != $a_serie['summ_fn'] && '' == $pri_label)
                       {
                           $pri_label = $a_serie['label_y'];
                       }
                       elseif ('C' == $a_serie['summ_fn'] && '' == $sec_label)
                       {
                           $sec_label = $a_serie['label_y'];
                       }
                   }
               }
               $chart_attr_j['pyaxisname'] = $this->formatFusionLabel($pri_label);
               $chart_attr_j['syaxisname'] = $this->formatFusionLabel($sec_label);
           }
           $arr_formats      = array();
           $arr_format_count = array();
           $arr_labels       = array();
           $s_label_second   = '';
           $i_serie_count    = '';
           $i_serie_second   = '';
           foreach ($arr_series as $i_serie => $a_serie)
           {
               if ('C' == $a_serie['summ_fn'])
               {
                   $arr_format_count = $arr_series[$i_serie]['formatfc'];
                   $i_serie_count    = $i_serie;
               }
               else
               {
                   $arr_labels[$i_serie] = $a_serie['label_y'];
                   $arr_formats[]        = $arr_series[$i_serie]['formatfc'];
               }
               if (0 < $i_serie && '' === $i_serie_second)
               {
                   $i_serie_second = $i_serie;
               }
           }
           if (!empty($arr_format_count))
           {
               if (2 > count($arr_formats))
               {
                   if (1 == count($arr_formats))
                   {
                       $i_serie_second = $i_serie_count;
                       $s_label_second = $arr_series[$i_serie_count]['label_y'];
                   }
                   $arr_formats[] = $arr_format_count;
               }
               else
               {
                   $arr_formats[1] = $arr_format_count;
                   $i_serie_second = $i_serie_count;
               }
           }
           elseif (isset($arr_labels[1]))
           {
               unset($arr_labels[1]);
           }
           if (1 == sizeof($arr_formats))
           {
               $s_format_idx = key($arr_formats);
               $value_format = $arr_formats[0];
           }
           else
           {
               $b_dual_axys  = true;
               $value_format = array_merge($arr_formats[0], $this->formatSecondary($arr_formats[1]));
               $this->formatThemeSecondary($chart_theme);
               $chart_attr_j['pyaxisname'] = $this->formatFusionLabel(implode(', ', $arr_labels));
               $chart_attr_j['syaxisname'] = '' != $s_label_second ? $this->formatFusionLabel($s_label_second) : $this->formatFusionLabel($arr_series[1]['label_y']);
           }
       }

       if ($this->reload_as_analytic && !$bDisableLinks)
       {
            $bDisableLinks = true;
       }

       $chart_attr_j['trendlineColor'] = '#1aaf5d';
       if ($chart_theme)
       {
           foreach ($chart_theme as $chart_tag_name => $chart_tag_value)
           {
               if ('' != $chart_tag_value)
               {
                   $chart_attr_j[$chart_tag_name] = $chart_tag_value;
               }
           }
       }


       if ('Y' == $arr_param['pdf'])
       {

           if (!isset($chart_attr_j['animation']) || '0' != $chart_attr_j['animation'])
           {
               $chart_attr_j['animation'] = '0';
           }
       }

       $chart_attr_j['plotHoverEffect'] = '1';
       $toolTipValue = "\$dataValue";

       switch ($tipo)
       {
           case 'Bar':
               if ('Percent' == $arr_param['barra_empil'] && 1 < sizeof($arr_series))
               {
                   $chart_attr_j['stack100Percent']   = '1';
                   $chart_attr_j['showPercentValues'] = '0';
               }
               if ('Yes' == $arr_param['barra_sobre'] && 1 < sizeof($arr_series))
               {
                   $chart_attr_j['clustered'] = '0';
               }
               $chart_attr_j['placeValuesInside'] = '1';
               $chart_attr_j['rotateValues'] = '1';
               break;

           case 'Bubble':
               $chart_attr_j['showValues'] = '1';
               break;

           case 'Line':
               break;

           case 'Area':
               break;

           case 'Pie':
               $chart_attr_j['showLegend']    = '1';
               $chart_attr_j['use3DLighting'] = '0';
               if ('Percent' == $arr_param['pizza_valor'])
               {
                   $chart_attr_j['showPercentValues'] = '1';
                   $toolTipValue                      = "\$percentValue";
               }
               else
               {
                   $chart_attr_j['showPercentValues'] = '0';
               }
               break;

           case 'Funnel':
               $chart_attr_j['useSameSlantAngle'] = '1';
               $chart_attr_j['isHollow']          = '0';
               $chart_attr_j['showLegend']        = '1';
               $chart_attr_j['showLabels']        = '0';
               if ('2d' == $arr_param['funil_dimen'] || $is_2d)
               {
                   $chart_attr_j['is2D'] = '1';
               }
               break;

           case 'Pyramid':
               $chart_attr_j['showLegend'] = '1';
               $chart_attr_j['showLabels'] = '0';
               if ('2d' == $arr_param['pyram_dimen'] || $is_2d)
               {
                   $chart_attr_j['is2D'] = '1';
               }
               if ('Percent' == $arr_param['pyram_valor'])
               {
                   $repeat_value = true;
                   $chart_attr_j['showPercentValues'] = '1';
               }
               else
               {
                   $chart_attr_j['showPercentValues'] = '0';
               }
               if ('S' == $arr_param['pyram_forma'])
               {
                   $chart_attr_j['isSliced'] = '1';
               }
               else
               {
                   $chart_attr_j['isSliced'] = '0';
               }
               break;

           case 'Gauge':
           case 'LinearGauge':
               if ('Circular' == $arr_param['gauge_forma'] && !$is_semi)
               {
                   $chart_attr_j['gaugeStartAngle']   = '180';
                   $chart_attr_j['gaugeEndAngle']     = '-180';
                   $chart_attr_j['lowerLimitDisplay'] = ' ';
               }
               $iGaugeMin = 0;
               $iGaugeMax = 0;
               foreach ($arr_series as $arr_serie)
               {
                   $label = $arr_serie['label'];
                   $datay = $arr_serie['data'];
                   foreach ($label as $iIndex => $sLabel)
                   {
                       $iGaugeMin = min($iGaugeMin, $datay[$iIndex]);
                       $iGaugeMax = max($iGaugeMax, $datay[$iIndex]);
                   }
               }
               $iGaugeMin = floor($iGaugeMin);
               $iGaugeMax = $iGaugeMax * 1.2;
               if (100 < $iGaugeMax)
               {
                   $iGaugeMax = floor($iGaugeMax / 100) * 100;
               }
               elseif (10 < $iGaugeMax)
               {
                   $iGaugeMax = floor($iGaugeMax / 10) * 10;
               }
               elseif (10 < $iGaugeMax)
               {
                   $iGaugeMax = 10;
               }
               $chart_attr_j['lowerLimit'] = $iGaugeMin;
               $chart_attr_j['upperLimit'] = $iGaugeMax;
               break;
       }

       if ('' != $arr_series[0]['subtitle'])
       {
           $chart_attr_j['subCaption'] = $arr_series[0]['subtitle'];
       }
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_font']))
       {
           $chart_attr_j['baseFontSize'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_font'];
       }
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['chartpallet']) && false == $chart_theme)
       {
           $chart_attr_j['palette'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['chartpallet'];
       }

       foreach ($chart_attr_j as $sTmpTag => $sTmpVal)
       {
           if ('' === $sTmpVal)
           {
               unset($chart_attr_j[$sTmpTag]);
           }
       }

       if ('' == $tit_label) {
           $tmpLabel = '';
           $isDiff   = false;
           foreach ($arr_series as $serieData) {
               if ('' == $tmpLabel) {
                   $tmpLabel = $serieData['label_x'];
               }
               elseif ($tmpLabel != $serieData['label_x']) {
                   $isDiff = true;
               }
           }
           if (!$isDiff) {
               $tit_label = $tmpLabel;
           }
       }

       if ('' == $tit_datay) {
           $labelList = array();
           foreach ($arr_series as $serieData) {
               if (!in_array($serieData['label_y'], $labelList)) {
                   $labelList[] = $serieData['label_y'];
               }
           }
           if (!empty($labelList)) {
               $tit_datay = implode(', ', $labelList);
           }
       }

       $chart_attr_j['caption']   = $this->formatFusionLabel($tit_graf);
       $chart_attr_j['xAxisName'] = $this->formatFusionLabel($tit_label);
       $chart_attr_j['yAxisName'] = $this->formatFusionLabel($tit_datay);

       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['this_chart_label'] = $chart_attr_j['caption'];
       if ('' != $chart_attr_j['subCaption']) {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['this_chart_label'] .= $chart_attr_j['subCaption'];
       }

       $a_json = is_array($value_format) ? ['chart' => array_merge($chart_attr_j, $value_format)] : ['chart' => $chart_attr_j];

       if (isset($a_json['chart']['formatNumberScale']) && 1 == $a_json['chart']['formatNumberScale'])
       {
           $a_json['chart']['numberScaleValue'] = '1000,1000,1000';
           $a_json['chart']['numberScaleUnit']  = 'K,M,B';
       }
       else
       {
           $a_json['chart']['formatNumberScale'] = 0;
       }

       $link_call = 'newchart-jsonurl-' . $this->Ini->path_imag_temp . '/';
       if ('Gauge' == $tipo || 'LinearGauge' == $tipo)
       {
           $iMin = 0;
           $iMax = 0;
           foreach ($arr_series as $arr_serie)
           {
               $label = $arr_serie['label'];
               $datay = $arr_serie['data'];
               $link  = $arr_serie['xml_link'];
               foreach ($label as $iIndex => $sLabel)
               {
                   $iMin = min($iMin, $datay[$iIndex]);
                   $iMax = max($iMax, $datay[$iIndex]);
               }
           }
           if (10 > $iMax) $iMax = 10;
           $iMax    = ceil($iMax * 1.1);
           $iMaxInt = ($iMax - $iMin) / 10;
           $iMinInt = ($iMax - $iMin) / 40;

           if (false == $chart_theme)
           {
               $a_json['colorRange'] = ['color' => [[
                   'minValue' => '0',
                   'maxValue' => $iMax,
                   'code' => ''
               ]]];
           }
           elseif ('' != $chart_theme['css_chart_background_pallete_color'])
           {
               $aGaugeColors = explode(',', $chart_theme['css_chart_background_pallete_color']);
               $a_json['colorRange'] = ['color' => [[
                   'minValue' => '0',
                   'maxValue' => $iMax,
                   'code' => str_replace('#', '', $aGaugeColors[0])
               ]]];
           }
           else
           {
               $a_json['colorRange'] = ['color' => [[
                   'minValue' => '0',
                   'maxValue' => $iMax,
                   'code' => '9bc8f2'
               ]]];
           }
           $sGaugeMarker = 'Gauge' == $tipo ? 'dial' : 'pointer';
           $a_json[$sGaugeMarker . 's'] = [$sGaugeMarker => []];
           foreach ($arr_series as $arr_serie)
           {
               $label = $arr_serie['label'];
               $datay = $arr_serie['data'];
               $link  = $arr_serie['xml_link'];
               foreach ($label as $iIndex => $sLabel)
               {
                   if (isset($link[$iIndex]) && !$bDisableLinks)
                   {
                       $a_json[$sGaugeMarker . 's'][$sGaugeMarker][] = ['value' => $datay[$iIndex], 'tooltext' => $sLabel . ': ' . $datay[$iIndex], 'link' => $link_call . $link[$iIndex]];
                   }
                   else
                   {
                       $a_json[$sGaugeMarker . 's'][$sGaugeMarker][] = ['value' => $datay[$iIndex], 'tooltext' => $sLabel . ': ' . $datay[$iIndex]];
                   }
               }
           }
       }
       elseif (2 == sizeof($arr_series) && 'Scatter' == $tipo)
       {
           $label = $arr_series[0]['label'];
           $datay = $arr_series[0]['data'];
           $link  = $arr_series[0]['xml_link'];
           $a_data = [];
           foreach ($arr_series as $i => $arr_serie)
           {
               $label     = $arr_serie['label'];
               $dbval     = $arr_serie['db_values'];
               $datay     = $arr_serie['data'];
               $link      = $arr_serie['xml_link'];
               $link_anal = array();
               $link_anal = array();
               if (0 == $i)
               {
                   $a_json['chart']['xAxisName'] = $this->formatFusionLabel($arr_serie['name']);
               }
               elseif (1 == $i)
               {
                   $a_json['chart']['yAxisName'] = $this->formatFusionLabel($arr_serie['name']);
               }
               foreach ($label as $iIndex => $sLabel)
               {
                   if (!isset($a_data[$iIndex]['x']))
                   {
                       $a_data[$iIndex]['x'] = $datay[$iIndex];
                   }
                   else
                   {
                       $a_data[$iIndex]['y'] = $datay[$iIndex];
                   }
                   if (isset($a_data[$iIndex]['x']) && isset($a_data[$iIndex]['y']))
                   {
                       $a_data[$iIndex]['tooltext'] = "$sLabel, " . $a_data[$iIndex]['x'] . ", " . $a_data[$iIndex]['y'];
                   }
                   if (!$this->sc_graf_sint && isset($link_anal[$arr_serie['serie_val']][$iIndex]) && !$bDisableLinks)
                   {
                       $a_data[$iIndex]['link'] = $link_call . $link_anal[$arr_serie['serie_val']][$iIndex];
                   }
                   elseif (isset($link[$iIndex]) && !$bDisableLinks)
                   {
                       $a_data[$iIndex]['link'] = $link_call . $link[$iIndex];
                   }
               }
           }
           $a_json['dataset'][] = ['showregressionline' => '1', 'data' => $a_data];
       }
       elseif (3 == sizeof($arr_series) && 'Bubble' == $tipo)
       {
           $label = $arr_series[0]['label'];
           $datay = $arr_series[0]['data'];
           $link  = $arr_series[0]['xml_link'];
           $a_data = [];
           foreach ($arr_series as $i => $arr_serie)
           {
               $label     = $arr_serie['label'];
               $dbval     = $arr_serie['db_values'];
               $datay     = $arr_serie['data'];
               $link      = $arr_serie['xml_link'];
               $link_anal = array();
               $link_anal = array();
               if (0 == $i)
               {
                   $a_json['chart']['xAxisName'] = $this->formatFusionLabel($arr_serie['name']);
               }
               elseif (1 == $i)
               {
                   $a_json['chart']['yAxisName'] = $this->formatFusionLabel($arr_serie['name']);
               }
               foreach ($label as $iIndex => $sLabel)
               {
                   $a_data[$iIndex]['name'] = $sLabel;
                   if (!isset($a_data[$iIndex]['x']))
                   {
                       $a_data[$iIndex]['x'] = $datay[$iIndex];
                   }
                   elseif (!isset($a_data[$iIndex]['y']))
                   {
                       $a_data[$iIndex]['y'] = $datay[$iIndex];
                   }
                   else
                   {
                       $a_data[$iIndex]['z'] = $datay[$iIndex];
                   }
                   if (isset($a_data[$iIndex]['x']) && isset($a_data[$iIndex]['y']) && isset($a_data[$iIndex]['z']))
                   {
                       $a_data[$iIndex]['tooltext'] = "$sLabel, " . $a_data[$iIndex]['x'] . ", " . $a_data[$iIndex]['y'] . ", " . $a_data[$iIndex]['z'];
                   }
                   if (!$this->sc_graf_sint && isset($link_anal[$arr_serie['serie_val']][$iIndex]) && !$bDisableLinks)
                   {
                       $a_data[$iIndex]['link'] = $link_call . $link_anal[$arr_serie['serie_val']][$iIndex];
                   }
                   elseif (isset($link[$iIndex]) && !$bDisableLinks)
                   {
                       $a_data[$iIndex]['link'] = $link_call . $link[$iIndex];
                   }
               }
           }
           $a_json['dataset'][] = ['showregressionline' => '1', 'data' => $a_data];
       }
       elseif (1 < sizeof($arr_series) || 'Radar' == $tipo || 'Step' == $arr_param['linha_forma'] || $is_combinat)
       {
           $label = $arr_series[0]['label'];
           $datay = $arr_series[0]['data'];
           $link  = $arr_series[0]['xml_link'];
           $a_json['categories'] = [];
           $a_categories = [];
           foreach ($label as $iIndex => $sLabel)
           {
               $a_categories[] = ['label' => $this->formatFusionLabel($sLabel)];
           }
           $a_json['categories'][] = ['category' => $a_categories];
           $a_json['dataset'] = [];
           foreach ($arr_series as $i_serie => $arr_serie)
           {
               $a_dataset = [];
               $label     = $arr_serie['label'];
               $dbval     = $arr_serie['db_values'];
               $datay     = $arr_serie['data'];
               $link      = $arr_serie['xml_link'];
               $link_anal = array();
               $series_nm = 1 == sizeof($arr_series) && 'Radar' == $tipo ? "" : " seriesName=\"" . $this->formatFusionLabel($arr_serie['name']) . "\"";
               if (1 != sizeof($arr_series) || 'Radar' != $tipo)
               {
                   $a_dataset['seriesName'] = $this->formatFusionLabel($arr_serie['name']);
               }


               if ($is_combinat)
               {
                   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['comb_field_display_type'][ ($arr_serie['summ_idx'] + 1) ]))
                   {
                       $a_dataset['renderas'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['comb_field_display_type'][ ($arr_serie['summ_idx'] + 1) ];
                   }
                   if ($i_serie == $i_serie_second)
                   {
                       $a_dataset['parentyaxis'] = 'S';
                   }
               }

               foreach ($label as $iIndex => $sLabel)
               {
                   $a_data = ['value' => $datay[$iIndex]];
                   if (!$this->sc_graf_sint && isset($link_anal[$arr_serie['serie_val']][$iIndex]) && !$bDisableLinks)
                   {
                       $a_data['link'] = $link_call . $link_anal[$arr_serie['serie_val']][$iIndex];
                   }
                   elseif (isset($link[$iIndex]) && !$bDisableLinks)
                   {
                       $a_data['link'] = $link_call . $link[$iIndex];
                   }
                   $a_dataset['data'][] = $a_data;
               }
               $a_json['dataset'][] = $a_dataset;
           }
       }
       else
       {
           $label = $arr_series[0]['label'];
           $dbval = $arr_series[0]['db_values'];
           $datay = $arr_series[0]['data'];
           $link  = $arr_series[0]['xml_link'];
           $a_json['data'] = [];
           foreach ($label as $iIndex => $sLabel)
           {
               $a_item = ['label' => $this->formatFusionLabel($sLabel), 'value' => $datay[$iIndex]];
               if (isset($link[$iIndex]) && !$bDisableLinks)
               {
                   $a_item['link'] = $link_call . $link[$iIndex];
               }
               if ($repeat_value)
               {
                   $a_item['tooltext'] = $datay[$iIndex];
               }
               $a_json['data'][] = $a_item;
           }
       }


       return json_encode($a_json);
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

   function formatFusionLabel($sLabel)
   {
       return str_replace(array('&nbsp;', '"'), array(' ', '&quot;'), $sLabel);
   }

   function grafico_flash_js()
   {
      global $nm_saida;

      if ($_SESSION['scriptcase']['fusioncharts_new'])
      {
         $nm_saida->saida("<script type=\"text/javascript\" language=\"javascript\" src=\"" . $this->Ini->path_prod . "/third/oem_fs/FusionCharts/js/fusioncharts.js\"></script>\r\n");
      }
      else
      {
         $nm_saida->saida("<script type=\"text/javascript\" language=\"javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts_xt_ol/FusionCharts/js/fusioncharts.js\"></script>\r\n");
      }
   }

   function grafico_flash_form()
   {
      global $nm_saida;

      $sOpcao = isset($_GET['nmgp_opcao']) && 'pdf_res' == $_GET['nmgp_opcao'] ? 'pdf_res' : 'pdf';
?>
<form name="flashRedir" method="GET" action="./" style="display: none">
  <input type="hidden" name="flash_graf" value="pdf" />
  <input type="hidden" name="nmgp_opcao" value="<?php       echo NM_encode_input($sOpcao);                         ?>" />
  <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($_GET['script_case_init']);       ?>" />
  <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id());                  ?>" />
  <input type="hidden" name="pbfile" value="<?php           echo NM_encode_input($_GET['pbfile']);                 ?>" />
  <input type="hidden" name="sc_apbgcol" value="<?php       echo urlencode($this->Ini->path_css); ?>" />
  <input type="hidden" name="nmgp_tipo_pdf" value="<?php    echo NM_encode_input($_GET['nmgp_tipo_pdf']);          ?>" />
  <input type="hidden" name="nmgp_parms_pdf" value="<?php   echo NM_encode_input($_GET['nmgp_parms_pdf']);         ?>" />
  <input type="hidden" name="nmgp_graf_pdf" value="<?php    echo NM_encode_input($_GET['nmgp_graf_pdf']);          ?>" />
  <input type="hidden" name="pdf_base" value="<?php         echo NM_encode_input($_GET['pdf_base']);               ?>" />
  <input type="hidden" name="pdf_url" value="<?php          echo NM_encode_input($_GET['pdf_url']);                ?>" />
</form>
<?php
   }

   function grafico_flash_config_js()
   {
      global $nm_saida;

      $sUrlConfigSave = $this->Ini->path_link . "grid_tbtranlab/grid_tbtranlab_config_graf_flash.php?nome_apl=grid_tbtranlab&campo_apl=nm_resumo_graf&sc_page=" . NM_encode_input($this->Ini->sc_page) . "&language=id";

      if (!$_SESSION['scriptcase']['fusioncharts_new'])
      {
          $nm_saida->saida("<script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts/" . $this->getChartModule() . "/jquery.min.js\"></script>\r\n");
      }
      else
      {
      $nm_saida->saida("<script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
      }
      $nm_saida->saida("<script type=\"text/javascript\">\r\n");
      $nm_saida->saida("  $(function() {\r\n");
      $nm_saida->saida("    $(\"#sc-id-button-submit\").click(function() {\r\n");
      $nm_saida->saida("      $.ajax({\r\n");
      $nm_saida->saida("        type: \"POST\",\r\n");
      $nm_saida->saida("        url: \"" . $sUrlConfigSave . "\",\r\n");
      $nm_saida->saida("        data: {\r\n");
      $nm_saida->saida("          bok_graf: \"OK\",\r\n");
      $nm_saida->saida("          ajax: \"OK\",\r\n");
      $nm_saida->saida("          nome_apl: \"grid_tbtranlab\",\r\n");
      $nm_saida->saida("          campo_apl: \"nm_resumo_graf\",\r\n");
      $nm_saida->saida("          sc_page: \"" . NM_encode_input($this->Ini->sc_page) . "\",\r\n");
      $nm_saida->saida("          tipo: $(\"#sc-id-chart-type\").val(),\r\n");
      $nm_saida->saida("          opc_atual: $(\"#sc-id-chart-mode\").val(),\r\n");
      $nm_saida->saida("          largura: $(\"#sc-id-chart-width\").val(),\r\n");
      $nm_saida->saida("          altura: $(\"#sc-id-chart-height\").val(),\r\n");
      $nm_saida->saida("          order: $(\"#sc-id-chart-order\").val()\r\n");
      $nm_saida->saida("        }\r\n");
      $nm_saida->saida("      }).done(function(data) {\r\n");
      $nm_saida->saida("        document.refresh_chart.submit();\r\n");
      $nm_saida->saida("      });\r\n");
      $nm_saida->saida("    });\r\n");
      $nm_saida->saida("    $(\"#sc-id-button-cancel\").click(function() {\r\n");
      $nm_saida->saida("      $(\"#sc-id-div-config\").slideUp();\r\n");
      $nm_saida->saida("      $(\"#sc-id-div-control\").show();\r\n");
      $nm_saida->saida("    });\r\n");
      $nm_saida->saida("    $(\"#sc-id-div-open\").click(function() {\r\n");
      $nm_saida->saida("      $(\"#sc-id-div-control\").hide();\r\n");
      $nm_saida->saida("      $(\"#sc-id-div-config\").slideDown();\r\n");
      $nm_saida->saida("    }).mouseover(function() {\r\n");
      $nm_saida->saida("      $(this).css(\"cursor\", \"pointer\");\r\n");
      $nm_saida->saida("    });\r\n");
      $nm_saida->saida("  });\r\n");
      $nm_saida->saida("</script>\r\n");
   }

   function grafico_flash_config_div()
   {
      global $nm_saida;

      $translate = array();
      $language  = 'id';
      if (isset($_SESSION['scriptcase']['sc_idioma_graf_flash']))
      {
         $translate = $_SESSION['scriptcase']['sc_idioma_graf_flash'];
      }
      if (!isset($translate[$language]))
      {
         foreach ($translate as $language => $rest)
         {
            break;
         }
      }

      $aChartDisp        = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_disp'])      && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_disp']))    ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_disp']      : array('Bar', 'Pie', 'Line', 'Area');
      $sChartType        = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_tipo'])      && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_tipo'])      ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_tipo']      : 'Bar';
      $iSinteticAnalitic = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_opc_atual']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_opc_atual']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_opc_atual'] : '1';
      $iChartWidth       = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_larg'])      && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_larg'])      ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_larg']      : '800';
      $iChartHeight      = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_alt'])       && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_alt'])       ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['cfg_graf']['graf_alt']       : '600';
      $sChartOrder       = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_order'])     && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_order'])     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['graf_order']     : '';
      $sSinteticSelected = ('1' == $iSinteticAnalitic) ? ' selected="selected"' : '';
      $sAnaliticSelected = ('2' == $iSinteticAnalitic) ? ' selected="selected"' : '';
      $sOrderNone        = (''     == $sChartOrder) ? ' selected="selected"' : '';
      $sOrderAsc         = ('asc'  == $sChartOrder) ? ' selected="selected"' : '';
      $sOrderDesc        = ('desc' == $sChartOrder) ? ' selected="selected"' : '';

      $nm_saida->saida("<div id=\"sc-id-div-control\" class=\"scGridToolbar\" style=\"position: absolute; top: 0; left: 0; z-index: 100; box-shadow: 3px 3px 2px #888888\">\r\n");
      $nm_saida->saida("  <img id=\"sc-id-div-open\" src=\"" . $this->Ini->path_img_global . "/gear_24.png\" />\r\n");
      $nm_saida->saida("</div>\r\n");
      $nm_saida->saida("<br />\r\n");
      $nm_saida->saida("<div id=\"sc-id-div-config\" class=\"scGridToolbar\" style=\"position: absolute; top: 0; left: 0; padding: 5px 10px; z-index: 101; box-shadow: 3px 3px 2px #888888; display: none\">\r\n");
      $nm_saida->saida("  " . $translate[$language]['tipo_g'] . "\r\n");
      $nm_saida->saida("  <select id=\"sc-id-chart-type\" class=\"css_toolbar_obj\">\r\n");
      foreach ($aChartDisp as $sChartDisp)
      {
         switch ($sChartDisp) {
            case 'Bar':
               $sChartTitle = 'tp_barra';
               break;
            case 'Pie':
               $sChartTitle = 'tp_pizza';
               break;
            case 'Line':
               $sChartTitle = 'tp_linha';
               break;
            case 'Area':
               $sChartTitle = 'tp_area';
               break;
            case 'Mark':
               $sChartTitle = 'tp_marcador';
               break;
            case 'Gauge':
               $sChartTitle = 'tp_gauge';
               break;
            case 'Radar':
               $sChartTitle = 'tp_radar';
               break;
            case 'Polar':
               $sChartTitle = 'tp_polar';
               break;
            case 'Funnel':
               $sChartTitle = 'tp_funil';
               break;
            case 'Pyramid':
               $sChartTitle = 'tp_pyramid';
               break;
         }
         $sChartSelected = $sChartType == $sChartDisp ? ' selected="selected"' : '';
         $nm_saida->saida("    <option value=\"" . $sChartDisp . "\"" . $sChartSelected . ">" . $translate[$language][$sChartTitle] . "</option>\r\n");
      }
      $nm_saida->saida("  </select>\r\n");
      $nm_saida->saida("  &nbsp; &nbsp;\r\n");
      $nm_saida->saida("  " . $translate[$language]['modo_gera'] . "\r\n");
      $nm_saida->saida("  <select id=\"sc-id-chart-mode\" class=\"css_toolbar_obj\">\r\n");
      $nm_saida->saida("    <option value=\"1\"" . $sSinteticSelected . ">" . $translate[$language]['sintetico'] . "</option>\r\n");
      $nm_saida->saida("    <option value=\"2\"" . $sAnaliticSelected . ">" . $translate[$language]['analitico'] . "</option>\r\n");
      $nm_saida->saida("  </select>\r\n");
      $nm_saida->saida("  &nbsp; &nbsp;\r\n");
      $nm_saida->saida("  " . $translate[$language]['largura'] . "\r\n");
      $nm_saida->saida("  <input id=\"sc-id-chart-width\" type=\"text\" size=\"5\" value=\"" . $iChartWidth . "\" class=\"css_toolbar_obj\" style=\"text-align: right\" />\r\n");
      $nm_saida->saida("  &nbsp; &nbsp;\r\n");
      $nm_saida->saida("  " . $translate[$language]['altura'] . "\r\n");
      $nm_saida->saida("  <input id=\"sc-id-chart-height\" type=\"text\" size=\"5\" value=\"" . $iChartHeight . "\" class=\"css_toolbar_obj\" style=\"text-align: right\" />\r\n");
      $nm_saida->saida("  &nbsp; &nbsp;\r\n");
      $nm_saida->saida("  " . $translate[$language]['order'] . "\r\n");
      $nm_saida->saida("  <select id=\"sc-id-chart-order\" class=\"css_toolbar_obj\">\r\n");
      $nm_saida->saida("    <option value=\"\"" . $sOrderNone . ">" . $translate[$language]['order_none'] . "</option>\r\n");
      $nm_saida->saida("    <option value=\"asc\"" . $sOrderAsc . ">" . $translate[$language]['order_asc'] . "</option>\r\n");
      $nm_saida->saida("    <option value=\"desc\"" . $sOrderDesc . ">" . $translate[$language]['order_desc'] . "</option>\r\n");
      $nm_saida->saida("  </select>\r\n");
      $nm_saida->saida("  &nbsp; &nbsp;\r\n");
      $sBtnOk   = nmButtonOutput($this->arr_buttons, "bok", "", "", "sc-id-button-submit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
      $sBtnExit = nmButtonOutput($this->arr_buttons, "bcancelar", "", "", "sc-id-button-cancel", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
      $nm_saida->saida("  " . $sBtnOk . "\r\n");
      $nm_saida->saida("  " . $sBtnExit . "\r\n");
      $nm_saida->saida("</div>\r\n");
      $sUrlConfigXml = "./";
      $nm_saida->saida("<form name=\"refresh_chart\" action=\"" . $sUrlConfigXml . "\" method=\"POST\">\r\n");
      foreach ($_POST as $postItem => $postValue)
      {
         $postData = 'name="' . $postItem . '" value="' . $postValue . '"';
         $nm_saida->saida("  <input type=\"hidden\" " . $postData . " />\r\n");
      }
      $nm_saida->saida("</form>\r\n");
   }

   function grafico_flash_chart($width, $height, $sFileLocal, $export, $arr_charts, $isPDF = 'N')
   {
      global $nm_saida;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['skip_charts']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['skip_charts']) {
          return;
      }

      $sChartId = 'id_chart_' . mt_rand(1, 1000);
      $sDivId   = 'id_div_' . mt_rand(1, 1000);
      $sStyle   = 'Y' == $export ? ' style="position: absolute; top: 0px; left: 0px"' : ' style="width: 100%"';
      $bMulti   = 1 < sizeof($arr_charts[0]);
      $bComb    = isset($arr_charts[0][0]['comb']) ? $arr_charts[0][0]['comb'] : false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['bmulti'] = $bMulti;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['bcomb']  = $bComb;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['phantomjs_export_process']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['phantomjs_export_process'])
      {
          $sImageUrl = $this->generatePhantom($sFileLocal, $width, $height, $bMulti, $bComb);
          return;
      }
      $nm_saida->saida("<div id=\"" . $sDivId . "\"" . $sStyle . "></div>\r\n");
      if ($_SESSION['scriptcase']['phantomjs_charts'] && "Y" == $isPDF)
      {
          $sImageUrl = $this->generatePhantom($sFileLocal, $width, $height, $bMulti, $bComb);
      if ($this->Ini->Export_img_zip)
      {
          $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $sImageUrl;
          $sImageUrl = str_replace($this->Ini->path_imag_temp . "/", "", $sImageUrl);
      }

 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['proc_pdf_vert'])
 { 
          $nm_saida->saida("<img style=\"width: 100%; page-break-inside: avoid !important;\" src=\"" . $sImageUrl . "\" style=\"border-width: 0\" />\r\n");
 } else {
          $nm_saida->saida("<img src=\"" . $sImageUrl . "\" style=\"border-width: 0\" />\r\n");
 } 
      }
      elseif ($_SESSION['scriptcase']['fusioncharts_new'])
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['responsive_chart']['active']) {
              $summary_width  = '100%';
              $summary_height = '75%';
          }
          else {
              $summary_height = $height;
              if ($_SESSION['scriptcase']['proc_mobile'])
              {
                  $summary_width = '100%';
              }
              else
              {
                  $summary_width = $width;
              }
          }
          $sPhantomImg   = "";
          $sPDFHtmlCall  = "  FusionCharts.ready(function() {";
          $sPDFHtmlCall .= "   var myChart = new FusionCharts({";
          $sPDFHtmlCall .= "    'type': '" . $this->getChartType($bMulti, $bComb) . "',";
          $sPDFHtmlCall .= "    'renderAt': '" . $sDivId . "',";
          $sPDFHtmlCall .= "    'id': '" . $sChartId . "',";
          $sPDFHtmlCall .= "    'width': '" . $summary_width . "',";
          $sPDFHtmlCall .= "    'height': '" . $summary_height . "',";
          $sPDFHtmlCall .= "    'dataFormat': 'jsonurl',";
          $sPDFHtmlCall .= "    'dataSource': '" . $sFileLocal . "'";
          $sPDFHtmlCall .= "   }).render();";
          $sPDFHtmlCall .= "   myChart.configureLink({overlayButton: { message: \"" . $this->Ini->Nm_lang['lang_btns_chart_back'] . "\" }});";
          $sPDFHtmlCall .= "  });";
          $sCombId       = "  var scCombChartId = '" . $sChartId . "'";
      }
      else
      {
          $sPhantomImg   = "";
          $sPDFHtmlCall  = "  var chart = new FusionCharts('" . $this->Ini->path_prod . "/third/fusioncharts/" . $this->getChartModule() . "/" . $this->getChartRenderer($bMulti) . ".swf', '" . $sChartId . "', '" . $width . "', '" . $height . "', '0', '1');";
          $sPDFHtmlCall .= "  chart.setJSONUrl('" . $sFileLocal . "');";
          $sPDFHtmlCall .= "  chart.render('" . $sDivId . "');";
      }
      if ("N" == $isPDF)
      {
         $nm_saida->saida("<script type=\"text/javascript\" language=\"javascript\">\r\n");
         $nm_saida->saida("  FusionCharts.setCurrentRenderer(\"javascript\");\r\n");
         $nm_saida->saida("$sPDFHtmlCall\r\n");
         $nm_saida->saida("</script>\r\n");
      }
      else
      {
         if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['charts_html']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['charts_html'])
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['charts_html'] = "  FusionCharts.setCurrentRenderer('javascript');";
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['charts_html'] .= $sPDFHtmlCall;
      }
   }

   function generatePhantom($sFileLocal, $width, $height, $bMulti, $bComb)
   {
          $sChartXml = @file_get_contents($this->Ini->root . $sFileLocal);
          if (false === $sChartXml)
          {
              $sTmpId = microtime() . rand(1, 1000) . session_id();
          }
          else
          {
              $sTmpId = $sChartXml . $width . $height . $this->getChartModule() . $this->getChartType($bMulti, $bComb);
          }
          $sTmpId       = md5($sTmpId . 'grid_tbtranlab');
          $sImageName   = 'sc_pjs_png_' . $sTmpId . '.png';
          $sImageUrl    = $_SESSION['scriptcase']['grid_tbtranlab']['glo_nm_path_imag_temp'] . '/' . $sImageName;
          $sImageFile   = $this->Ini->root . $sImageUrl;
          $sPDFHtmlCall = "";
          $sAppDir      = getcwd();
          $aOS          = $this->Ini->getRunningOS();
          $sPhantomCmd  = 'phantomjs --ignore-ssl-errors=true "' . $this->Ini->root . $_SESSION['scriptcase']['grid_tbtranlab']['glo_nm_path_imag_temp'] . '/sc_pjs_js_' . $sTmpId . '.js"';
          $iJsDelay     = 150;
          if ('win' != $aOS['os'])
          {
              $sPhantomCmd = './' . $sPhantomCmd;
          }

          $bImageGenerated = @is_file($sImageFile);
          $iImageSizeLimit = 6 * 1024;
          $iImageSize      = $bImageGenerated ? @filesize($sImageFile) : 0;
          if (!$bImageGenerated || $iImageSize < $iImageSizeLimit)
          {
              $this->generatePhantomJs($sTmpId, $sImageFile, $iJsDelay);
              $this->generatePhantomPhp($sTmpId, $bMulti, $width, $height, $sFileLocal, $bComb);

              @chdir($this->Ini->path_third . '/phantomjs/' . $aOS['os']);

              $iAttempt   = 0;
              $iImageSize = 0;
              while ($iAttempt < 3 && $iImageSize < $iImageSizeLimit)
              {
                  @exec($sPhantomCmd);
                  $iAttempt++;

                  $iImageSize = @is_file($sImageFile) ? @filesize($sImageFile) : 0;
                  if ($iImageSize < $iImageSizeLimit)
                  {
                      $iJsDelay += 100;
                      $this->generatePhantomJs($sTmpId, $sImageFile, $iJsDelay);
                  }
              }

              @chdir($sAppDir);
          }

          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['phantomjs_export_file'] = $sImageName;
          return $sImageUrl;
   }
   function generatePhantomJs($sTmpId, $sImageFile, $iDelay)
   {
       $server_phanton = $this->Ini->server_pdf;
       $fPhantomJs = @fopen($this->Ini->root . $_SESSION['scriptcase']['grid_tbtranlab']['glo_nm_path_imag_temp'] . '/sc_pjs_js_' . $sTmpId . '.js', 'w');
       @fwrite($fPhantomJs, "var oPage      = require('webpage').create(),\r\n");
       @fwrite($fPhantomJs, "    sChartPage = '" . $server_phanton . $this->Ini->path_imag_temp . "/sc_pjs_php_" . $sTmpId . ".html',\r\n");
       @fwrite($fPhantomJs, "    sImageFile = '" . $sImageFile . "',\r\n");
       @fwrite($fPhantomJs, "    iJsDelay   = " . $iDelay . ";\r\n");
       @fwrite($fPhantomJs, "oPage.open(sChartPage, function () {\r\n");
       @fwrite($fPhantomJs, "  window.setTimeout(function () {\r\n");
       @fwrite($fPhantomJs, "    oPage.render(sImageFile);\r\n");
       @fwrite($fPhantomJs, "    phantom.exit();\r\n");
       @fwrite($fPhantomJs, "  }, iJsDelay);\r\n");
       @fwrite($fPhantomJs, "});\r\n");
       @fclose($fPhantomJs);
   }

   function generatePhantomPhp($sTmpId, $bMulti, $width, $height, $sFileLocal, $bComb = false)
   {
       $fPhantomChart = @fopen($this->Ini->root . $_SESSION['scriptcase']['grid_tbtranlab']['glo_nm_path_imag_temp'] . '/sc_pjs_php_' . $sTmpId . '.html', 'w');
       @fwrite($fPhantomChart, "<html>\r\n");
       @fwrite($fPhantomChart, "<head>\r\n");
       @fwrite($fPhantomChart, $_SESSION['nm_session']['charset'] . "\r\n");
       if ($_SESSION['scriptcase']['fusioncharts_new']) {
           @fwrite($fPhantomChart, "<script type=\"text/javascript\" language=\"javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts_xt_ol/FusionCharts/js/fusioncharts.js\"></script>\r\n");
       }
       else {
           @fwrite($fPhantomChart, "<script type=\"text/javascript\" language=\"javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts_xt_ol/" . $this->getChartModule() . "/js/fusioncharts.js\"></script>\r\n");
       }
       @fwrite($fPhantomChart, "</head>\r\n");
       @fwrite($fPhantomChart, "<body>\r\n");
       @fwrite($fPhantomChart, "<div id=\"sc-id-fusionchart\"></div>\r\n");
       @fwrite($fPhantomChart, "<script type=\"text/javascript\">\r\n");
       @fwrite($fPhantomChart, "  var d = new Date();\r\n");
       @fwrite($fPhantomChart, "  d.setTime(d.getTime() + (24*60*60*1000));\r\n");
       @fwrite($fPhantomChart, "  var expires = \"expires=\"+ d.toUTCString();\r\n");
       @fwrite($fPhantomChart, "  document.cookie = \"PHPSESSID_=;\"+ Math.random().toString(36).substring(2) +\";\" + expires + \";path=/\";\r\n");
       @fwrite($fPhantomChart, "  FusionCharts.ready(function() {\r\n");
       @fwrite($fPhantomChart, "   var myChart = new FusionCharts({\r\n");
       @fwrite($fPhantomChart, "    'type': '" . $this->getChartType($bMulti, $bComb) . "',\r\n");
       @fwrite($fPhantomChart, "    'renderAt': 'sc-id-fusionchart',\r\n");
       @fwrite($fPhantomChart, "    'width': '" . $width . "',\r\n");
       @fwrite($fPhantomChart, "    'height': '" . $height . "',\r\n");
       @fwrite($fPhantomChart, "    'dataFormat': 'jsonurl',\r\n");
       @fwrite($fPhantomChart, "    'dataSource': '" . $sFileLocal . "'\r\n");
       @fwrite($fPhantomChart, "   }).render();\r\n");
       @fwrite($fPhantomChart, "  });\r\n");
       @fwrite($fPhantomChart, "</script>\r\n");
       @fwrite($fPhantomChart, "</body>\r\n");
       @fwrite($fPhantomChart, "</html>\r\n");
       @fclose($fPhantomChart);
   }

   function string_to_utf8($str)
   {
       if ('UTF-8' != $_SESSION['scriptcase']['charset'])
       {
           $str = sc_convert_encoding($str, 'UTF-8', $_SESSION['scriptcase']['charset']);
       }
       return $str;
   }

   function grafico_dados($cht_data, $export, $chart_key)
   {
       $link_anal  = array();
       $value_anal = array();
       $arr_charts = array();

       $reload_analytic = false;

       if ('Y' != $export)
       {
           if (isset($cht_data['combination']) && $cht_data['combination'])
           {
               $datay = array('anal' => array());
               $lab_y = array();
               $sum_i = array();
               $sum_f = array();
               $fmt   = array();
               $xml_l = array();
               $label = array();
               $dbval = array();
               $lbord = array();
               $param = array();
               $link  = array();
               $xml   = array();
               $name  = '';
               $fld_x = '';
               $fld_y = array();
               $subt  = '';
               $legnd = '';
               foreach ($cht_data['charts'] as $s_comb_chart_index)
               {
                   if (empty($label))
                   {
                       $label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['labels'];
                   }
                   if (empty($dbval))
                   {
                       $dbval = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['db_values'];
                   }
                   if (empty($lbord))
                   {
                       $lbord = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['label_order'];
                   }
                   if (empty($param))
                   {
                       $param = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['param'];
                   }
                   if ('' == $name)
                   {
                       $name = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['label_x'];
                   }
                   if ('' == $fld_x)
                   {
                       $fld_x = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['field_x'];
                   }
                   if ('' == $subt)
                   {
                       $subt = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['subtitle'];
                   }
                   if ('' == $legnd && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['legend']))
                   {
                       $legnd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['legend'];
                   }
                   $fld_y[]         = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['field_y'];
                   $lab_y[]         = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['label_y'];
                   $sum_i[]         = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['summ_idx'];
                   $sum_f[]         = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['summ_fn'];
                   $fmt[]           = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['format'];
                   $datay['anal'][] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['values']['sint'][0];
                   $tmp_xml_links   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'][$s_comb_chart_index]['xml_links'];
                   $xml_l[]         = $cht_data['xml_pholder'];
               }
           }
           else
           {
               $datay = $cht_data['values'];
               $label = $cht_data['labels'];
               $dbval = $cht_data['db_values'];
               $lbord = $cht_data['label_order'];
               $param = $cht_data['param'];
               $link  = $cht_data['grid_links'];
               $xml   = $cht_data['xml_links'];
               $name  = $cht_data['label_x'];
               $fld_x = $cht_data['field_x'];
               $fld_y = $cht_data['field_y'];
               $subt  = $cht_data['subtitle'];
               $legnd = '';
           }

           if (isset($cht_data['combination']) && $cht_data['combination'])
           {
               $arr_data = $datay['anal'];
           }
           elseif ('xml' == $export)
           {
               $arr_data = $datay['sint'];
           }
           elseif (!$this->sc_graf_sint && isset($datay['anal']) && !empty($datay['anal']))
           {
               $arr_data   = $datay['anal'];
               $link_anal  = $datay['anal_links'];
               $value_anal = $datay['anal_values'];
               $label      = isset($cht_data['labels_anal']) && !empty($cht_data['labels_anal']) ? $cht_data['labels_anal'] : $cht_data['labels'];
           }
           else
           {
               $arr_data = $datay['sint'];
           }
           $arr_series = array();

           foreach ($label as $i => $v)
           {
               $label[$i] = $this->string_to_utf8($v);
           }

           foreach ($arr_data as $i_chart => $arr_chart)
           {
               if ($reload_analytic)
               {
                   $b_comb     = true;
                   $t_subtitle = $subt;
                   $t_field_x  = $fld_x;
                   $t_field_y  = $fld_y;
                   $t_label_x  = $name;
                   $t_label_y  = $lab_y;
                   $t_name     = $i_chart;
                   $summ_idx   = $sum_i;
                   $summ_fn    = $sum_f;
                   $formatfc   = $fmt;
                   $xml        = $xml_l;
                   $t_name_lab = $legnd;
               }
               elseif (isset($cht_data['combination']) && $cht_data['combination'])
               {
                   $b_comb     = true;
                   $t_subtitle = $subt;
                   $t_field_x  = $fld_x;
                   $t_field_y  = isset($fld_y[$i_chart]) ? $fld_y[$i_chart] : '';
                   $t_label_x  = $name;
                   $t_label_y  = isset($lab_y[$i_chart]) ? $lab_y[$i_chart] : '';
                   $t_name     = isset($lab_y[$i_chart]) ? $lab_y[$i_chart] : $i_chart;
                   $summ_idx   = isset($sum_i[$i_chart]) ? $sum_i[$i_chart] : '';
                   $summ_fn    = isset($sum_f[$i_chart]) ? $sum_f[$i_chart] : '';
                   $formatfc   = isset($fmt[$i_chart])   ? $fmt[$i_chart]   : '';
                   $xml        = isset($xml_l[$i_chart]) ? $xml_l[$i_chart] : '';
                   $t_name_lab = $legnd;
               }
               else
               {
                   $b_comb     = false;
                   $t_subtitle = $cht_data['subtitle'];
                   $t_field_x  = $cht_data['field_x'];
                   $t_field_y  = $cht_data['field_y'];
                   $t_label_x  = $cht_data['label_x'];
                   $t_label_y  = $cht_data['label_y'];
                   $t_name     = $i_chart;
                   $summ_idx   = '';
                   $summ_fn    = '';
                   $formatfc   = '';
                   $t_name_lab = $legnd;
               }
               if ($reload_analytic)
               {
                   $b_comb = false;
               }
               $arr_series[] = array('chart_key' => $chart_key, 'reload_analytic' => $reload_analytic, 'name_label' => $this->string_to_utf8($t_name_lab), 'name' => $this->string_to_utf8($t_name), 'serie_val' => isset($value_anal[$i_chart]) ? $value_anal[$i_chart] : $i_chart, 'summ_idx' => $summ_idx, 'summ_fn' => $summ_fn, 'formatfc' => $formatfc, 'label' => $label, 'db_values' => $dbval, 'label_order' => $lbord, 'param' => $param, 'data' => $arr_chart, 'title' => $cht_data['title'], 'subtitle' => $t_subtitle, 'field_x' => $t_field_x, 'field_y' => $t_field_y, 'label_x' => $t_label_x, 'label_y' => $t_label_y, 'legend' => $cht_data['legend'], 'format' => $cht_data['format'], 'link' => $link, 'link_anal' => $link_anal, 'xml_link' => $xml, 'comb' => $b_comb);
           }

           $arr_charts[] = $arr_series;
       }
       else
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['pivot_charts'] as $chart_index => $chart_data)
           {
               $datay = $chart_data['values'];
               $label = $chart_data['labels'];
               $link  = $chart_data['grid_links'];
               $xml   = $chart_data['xml_links'];
               $fld_x = $chart_data['field_x'];
               $fld_y = $chart_data['field_y'];
               $name  = $chart_data['label_x'];

               if (!$this->sc_graf_sint && isset($datay['anal']) && !empty($datay['anal']))
               {
                   $arr_data   = $datay['anal'];
                   $link_anal  = $datay['anal_links'];
                   $value_anal = $datay['anal_values'];
                   $label      = isset($chart_data['labels_anal']) && !empty($chart_data['labels_anal']) ? $chart_data['labels_anal'] : $chart_data['labels'];
               }
               else
               {
                   $arr_data = $datay['sint'];
               }
               $arr_series = array();

               foreach ($label as $i => $v)
               {
                   $label[$i] = $this->string_to_utf8($v);
               }

               foreach ($arr_data as $i_chart =>$arr_chart)
               {
                   $arr_series[] = array('chart_key' => $chart_key, 'name' => $this->string_to_utf8($i_chart), 'serie_val' => isset($value_anal[$i_chart]) ? $value_anal[$i_chart] : $i_chart, 'label' => $label, 'data' => $arr_chart, 'title' => $chart_data['title'], 'subtitle' => $chart_data['subtitle'], 'field_x' => $chart_data['field_x'], 'field_y' => $chart_data['field_y'], 'label_x' => $chart_data['label_x'], 'label_y' => $chart_data['label_y'], 'legend' => $chart_data['legend'], 'format' => $chart_data['format'], 'link' => $link, 'link_anal' => $link_anal, 'xml_link' => $xml);
               }

               $arr_charts[] = $arr_series;
           }
       }

       return $arr_charts;
   }

    function orderCharts(&$arr_charts, $rule = '', $field = '')
    {
        if ('' == $rule)
        {
            return;
        }

        if ('' == $field)
        {
            $field = 0;
        }

        if ('label' != $field && !isset($arr_charts[0][$field]))
        {
            $field = 0;
        }

        foreach ($arr_charts as $i => $c)
        {
            if ('label' === $field)
            {
                $sOrderIndex  = isset($arr_charts[$i][0]['label_order']) && 'value' == $arr_charts[$i][0]['label_order'] ? 'db_values' : 'label';
                $aOrderSample = $arr_charts[$i][0][$sOrderIndex];
            }
            else
            {
                $aOrderSample = $arr_charts[$i][$field]['data'];
            }
            $aNewOrder = $this->getNewOrder($aOrderSample, $rule);
            $this->applyNewOrder($aNewOrder, $arr_charts[$i]);
        }
    }

    function getNewOrder($data, $rule)
    {
        if ('asc' == $rule)
        {
            asort($data);
        }
        elseif ('desc' == $rule)
        {
            arsort($data);
        }

        return $data;
    }

    function applyNewOrder(&$order, &$charts)
    {
        for ($i = 0; $i < sizeof($charts); $i++)
        {
            $fix_xml   = is_array($charts[$i]['xml_link']);
            $new_data  = array();
            $new_label = array();
            $new_dbval = array();
            $new_link  = array();
            if ($fix_xml)
            {
                $new_xml = array();
            }

            foreach ($order as $new_index => $value)
            {
                $new_data[]  = $charts[$i]['data'][$new_index];
                $new_label[] = $charts[$i]['label'][$new_index];
                $new_dbval[] = $charts[$i]['db_values'][$new_index];
                $new_link[]  = $charts[$i]['link'][$new_index];
                if ($fix_xml)
                {
                    $new_xml[] = $charts[$i]['xml_link'][$new_index];
                }
            }

            $charts[$i]['data']      = $new_data;
            $charts[$i]['label']     = $new_label;
            $charts[$i]['db_values'] = $new_dbval;
            $charts[$i]['link']      = $new_link;
            if ($fix_xml)
            {
                $charts[$i]['xml_link'] = $new_xml;
            }
        }
    }

   function orderChart(&$label, &$data, &$link, $rule = '')
   {
       if ('' == $rule)
       {
           return;
       }
       elseif ('asc' == $rule)
       {
           asort($data);
       }
       elseif ('desc' == $rule)
       {
           arsort($data);
       }

       $new_data  = array();
       $new_label = array();
       $new_link  = array();
       foreach ($data as $i => $v)
       {
           $new_data[]  = $v;
           $new_label[] = $label[$i];
           $new_link[]  = $link[$i];
       }
       $data  = $new_data;
       $label = $new_label;
       $link  = $new_link;
   }

   function getChartType($bMulti, $bComb = false)
   {
       return strtolower($this->getChartRenderer($bMulti, $bComb));
   }

   function getChartRenderer($bMulti, $bComb)
   {
       $Ind_groupby = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['SC_Ind_Groupby'];
       if ($bComb)
       {
           $tmp_count = 0;
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['summarizing_fields_order'][$Ind_groupby] as $i_sum)
           {
               if ('' != $i_sum && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['summarizing_fields_display'][$Ind_groupby][$i_sum]))
               {
                   $d_sum = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['summarizing_fields_display'][$Ind_groupby][$i_sum];
                   if ($d_sum['display'])
                   {
                       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['summarizing_fields_control'][$Ind_groupby] as $l_field => $d_field)
                       {
                           foreach ($d_field['options'] as $d_option)
                           {
                               if ($d_option['index'] == $i_sum)
                               {
                                   $tmp_count++;
                               }
                           }
                       }
                   }
               }
           }
           $multiDimensions = $bMulti;
           $multiMetrics = $tmp_count > 1;
           switch ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['chart_combination_type']) {
               case 'angulargauge':
                   $newChartType = "angulargauge";
                   break;
               case 'semicirculargauge':
                   $newChartType = "angulargauge";
                   break;
               case 'hlineargauge':
                   $newChartType = "hlineargauge";
                   break;
               case 'area';
               case 'msarea';
               case 'msarea';
                   $newChartType = $multiMetrics || $multiDimensions ? "msarea" : "msarea";
                   break;
               case 'areaspline';
               case 'mssplinearea';
               case 'splinearea';
                   $newChartType = $multiMetrics || $multiDimensions  ? "mssplinearea" : "splinearea";
                   break;
               case 'bar2d';
               case 'msbar2d';
                   $newChartType = $multiMetrics || $multiDimensions  ? "msbar2d" : "bar2d";
                   break;
               case 'bar3d';
               case 'msbar3d';
                   $newChartType = $multiMetrics || $multiDimensions  ? "msbar3d" : "bar3d";
                   break;
               case 'bubble':
                   $newChartType = "bubble";
                   break;
               case 'column2d';
               case 'mscolumn2d';
                   $newChartType = $multiMetrics || $multiDimensions  ? "mscolumn2d" : "column2d";
                   break;
               case 'column3d';
               case 'mscolumn3d';
                   $newChartType = $multiMetrics || $multiDimensions  ? "mscolumn3d" : "column3d";
                   break;
               case 'combination2d';
               case 'mscombidy2d';
               case 'mscombi2d';
                   $newChartType = $multiMetrics || $multiDimensions  ? "mscombidy2d" : "mscombi2d";
                   break;
               case 'combination3d';
               case 'mscolumn3dlinedy';
                   $newChartType = "mscolumn3dlinedy";
                   break;
               case 'doughnut2d':
                   $newChartType = "doughnut2d";
                   break;
               case 'doughnut3d':
                   $newChartType = "doughnut3d";
                   break;
               case 'funnel':
                   $newChartType = "funnel";
                   break;
               case 'funnel2d':
                   $newChartType = "funnel";
                   break;
               case 'line';
               case 'msline';
                   $newChartType = $multiMetrics || $multiDimensions  ? "msline" : "line";
                   break;
               case 'pie2d':
                   $newChartType = "pie2d";
                   break;
               case 'pie3d':
                   $newChartType = "pie3d";
                   break;
               case 'pyramid':
                   $newChartType = "pyramid";
                   break;
               case 'pyramid2d':
                   $newChartType = "pyramid";
                   break;
               case 'radar':
                   $newChartType = "radar";
                   break;
               case 'scatter':
                   $newChartType = "scatter";
                   break;
               case 'spline';
               case 'msspline';
                   $newChartType = $multiMetrics || $multiDimensions  ? "msspline" : "spline";
                   break;
               case 'stackedarea';
               case 'stackedarea2d';
                   $newChartType = "stackedarea2d";
                   break;
               case 'stackedbar2d':
                   $newChartType = "stackedbar2d";
                   break;
               case 'stackedbar3d':
                   $newChartType = "stackedbar3d";
                   break;
               case 'stackedcolumn2d':
                   $newChartType = "stackedcolumn2d";
                   break;
               case 'stackedcolumn3d':
                   $newChartType = "stackedcolumn3d";
                   break;
               case 'step';
               case 'msstepline';
                   $newChartType = "msstepline";
                   break;
           }
           return $newChartType;
       }
       $sChart = '';
       $sMulti = $bMulti ? 'MS' : '';
       switch ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_tipo'])
       {
           case 'Bar':
               if ('Horizontal' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_orien'])
               {
                   if ('Off' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_empil'] && $bMulti)
                   {
                       $sChart .= 'StackedBar';
                       $sChart .= '3d' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_dimen']  ? '3D' : '2D';
                   }
                   else
                   {
                       $sChart .= $sMulti . 'Bar';
                       $sChart .= '3d' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_dimen'] ? '3D' : '2D';
                   }
               }
               else
               {
                   if ('Off' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_empil'] && $bMulti)
                   {
                       $sChart .= 'StackedColumn';
                       $sChart .= '2d' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_dimen'] ? '2D' : '3D';
                   }
                   else
                   {
                       $sChart .= $sMulti . 'Column';
                       $sChart .= '2d' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_barra_dimen'] ? '2D' : '3D';
                   }
               }
               break;
           case 'Pie':
               if ('Pie' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_pizza_forma'])
               {
                   $sChart .= 'Pie';
               }
               else
               {
                   $sChart .= 'Doughnut';
               }
               $sChart .= '2d' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_pizza_dimen'] ? '2D' : '3D';
               break;
           case 'Line':
               if ('Line' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_linha_forma'])
               {
                   $sChart .= $sMulti . 'Line';
               }
               elseif ('Spline' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_linha_forma'])
               {
                   $sChart .= $sMulti . 'Spline';
               }
               else
               {
                   $sChart .= 'MSStepLine';
               }
               break;
           case 'Area':
               if ('Area' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_area_forma'])
               {
                   if ($bMulti)
                   {
                       $sChart .= $sMulti . 'Area';
                   }
                   else
                   {
                       $sChart .= 'Area2D';
                   }
               }
               else
               {
                   $sChart .= $sMulti . 'SplineArea';
               }
               break;
           case 'Mark':
               $sChart .= 'Column3D';
               break;
           case 'Gauge':
               $sChart .= 'AngularGauge';
               break;
           case 'Radar':
           case 'Polar':
               $sChart .= 'Radar';
               break;
           case 'Funnel':
               $sChart .= 'Funnel';
               break;
           case 'Pyramid':
               $sChart = 'Pyramid';
               break;
       }
       return $sChart;
   }

   function getChartModule($sChartType = '')
   {
       if ('' == $sChartType)
       {
           $sChartType = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_tipo'];
       }
       switch ($sChartType)
       {
           case 'Bar':
               return 'FusionCharts';
               break;
           case 'Pie':
               return 'FusionCharts';
               break;
           case 'Line':
               if ('Line' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_linha_forma'])
               {
                   return 'FusionCharts';
               }
               elseif ('Spline' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_linha_forma'])
               {
                   return 'PowerCharts';
               }
               else
               {
                   return 'PowerCharts';
               }
               break;
           case 'Area':
               if ('Area' == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbtranlab']['parms_graf']['graf_area_forma'])
               {
                   return 'FusionCharts';
               }
               else
               {
                   return 'PowerCharts';
               }
               break;
           case 'Mark':
               return 'FusionCharts';
               break;
           case 'Gauge':
               return 'FusionWidgets';
               break;
           case 'Radar':
           case 'Polar':
               return 'PowerCharts';
               break;
           case 'Pyramid':
               return 'FusionWidgets';
               break;
           case 'Funnel':
               return 'FusionWidgets';
               break;
       }
       return $sChart;
   }

   function getColorList($values, $colors)
   {
       $iValCount = 0;
       foreach ($values as $serie)
       {
           $iValCount = max($iValCount, sizeof($serie['label']));
       }
       $aColors   = explode(',', $colors);
       $iColCount = sizeof($aColors);
       $aMulti    = $this->getDivisions($iValCount, $iColCount);
       if (1 == $aMulti)
       {
           return $aColors[0];
       }
       $aAllColors = $this->getAllColors($aMulti[2], $aColors);
       return implode(',', $this->getUsedColors($aMulti[1], $iValCount, $aAllColors));
   }

   function getDivisions($a, $b)
   {
       if (1 >= $a || 1 >= $b)
       {
           return 1;
       }
       return $this->getSubDivisions($a, 0, $b, 0);
   }

   function getSubDivisions($a, $am, $b, $bm)
   {
       $v1 = $a + (($a - 1) * $am);
       $v2 = $b + (($b - 1) * $bm);
       if ($v1 == $v2)
       {
           return array($v1, $am, $bm);
       }
       elseif ($v1 > $v2)
       {
           return $this->getSubDivisions($a, $am, $b, $bm + 1);
       }
       else
       {
           return $this->getSubDivisions($a, $am + 1, $b, $bm);
       }
   }

   function getAllColors($div, $colors)
   {
       $aNewColors = array($colors[0]);
       for ($i = 1; $i < sizeof($colors); $i++)
       {
           $this->getColorIntervals($aNewColors, $colors[$i - 1], $colors[$i], $div);
           $aNewColors[] = $colors[$i];
       }
       return $aNewColors;
   }

   function getUsedColors($div, $count, $colors)
   {
       $used = array();
       for ($i = 0; $i < $count; $i++)
       {
           $used[] = $colors[($div + 1) * $i];
       }
       return $used;
   }

   function getColorIntervals(&$colors, $first, $last, $div)
   {
       $RGBini = $this->hex2dec($first);
       $RGBend = $this->hex2dec($last);
       $RGBint = array(
           abs(($RGBini[0] - $RGBend[0]) / ($div + 1)),
           abs(($RGBini[1] - $RGBend[1]) / ($div + 1)),
           abs(($RGBini[2] - $RGBend[2]) / ($div + 1)),
       );
       for ($i = 1; $i <= $div; $i++)
       {
           $newR = $RGBini[0] > $RGBend[0] ? $RGBini[0] - ($i * $RGBint[0]) : $RGBini[0] + ($i * $RGBint[0]);
           $newG = $RGBini[1] > $RGBend[1] ? $RGBini[1] - ($i * $RGBint[1]) : $RGBini[1] + ($i * $RGBint[1]);
           $newB = $RGBini[2] > $RGBend[2] ? $RGBini[2] - ($i * $RGBint[2]) : $RGBini[2] + ($i * $RGBint[2]);
           $colors[] = $this->dec2hex($newR, $newG, $newB);
       }
   }

   function hex2dec($color)
   {
       $dec = explode(' ', chunk_split($color, 2, ' '));
       return array(
           hexdec($dec[0]),
           hexdec($dec[1]),
           hexdec($dec[2]),
       );
   }

   function dec2hex($r, $g, $b)
   {
       $newr = dechex(round($r));
       if (1 == strlen($newr))
       {
           $newr = '0' . $newr;
       }
       $newg = dechex(round($g));
       if (1 == strlen($newg))
       {
           $newg = '0' . $newg;
       }
       $newb = dechex(round($b));
       if (1 == strlen($newb))
       {
           $newb = '0' . $newb;
       }
       return $newr . $newg . $newb;
   }

//
}

?>
