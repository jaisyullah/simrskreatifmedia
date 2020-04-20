/**
 * Alteracao de visualizacao.
 *
 * Funcoes para exibir/esconder objetos no HTML.
 *
 * @package     Biblioteca
 * @subpackage  Javascript
 * @creation    2003/10/22
 * @copyright   NetMake Solucoes em Informatica
 * @author      Luis Humberto Roman <romanlh@netmake.com.br>
 *
 * $Id: display.js,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

/**
 * Troca grupos de exibicao.
 *
 * Alterna entre dois grupos de exibicao no HTML.
 *
 * @access  public
 * @param   string  v_str_grp1  ID do grupo 1.
 * @param   string  v_str_grp2  ID do grupo 2.
 */
function nm_toggle_group(v_str_grp1, v_str_grp2)
{
 obj_grp1 = document.getElementById(v_str_grp1);
 obj_grp2 = document.getElementById(v_str_grp2);
 if ('' == obj_grp1.style.display)
 {
  obj_grp1.style.display = 'none';
  obj_grp2.style.display = '';
 }
 else
 {
  obj_grp1.style.display = '';
  obj_grp2.style.display = 'none';
 }
}

/**
 * Troca exibicao de objeto.
 *
 * Alterna a exibicao de um objeto HTML.
 *
 * @access  public
 * @param   string  v_str_obj   ID do objeto HTML.
 * @param   string  v_str_stat  Status de exibicao (on/off).
 */
function nm_toggle_object(v_str_obj, v_str_stat)
{
	if(document.getElementById(v_str_obj))
	{
		obj_html               = document.getElementById(v_str_obj);
 		obj_html.style.display = ('off' == v_str_stat) ? 'none' : '';
	}
}