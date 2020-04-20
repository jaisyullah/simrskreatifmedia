/**
 * $Id: editor_plugin.js,v 1.1.1.1 2011-05-12 20:31:40 diogo Exp $
 *
 * @author marcos
 * @copyright Copyright © 2008, NetMake Soluções em Informática, Todos os direitos reservados.
 */

(function() {
	tinymce.create('tinymce.plugins.HelpcaseInclude', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('HelpcaseInclude', function() {
				var e = ed.selection.getNode();

				// Internal image object like a flash placeholder
				if (ed.dom.getAttrib(e, 'class').indexOf('mceItem') != -1)
					return;

				ed.windowManager.open({
					file : url + '/include.htm',
					width : 480,
					height : 130,
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('helpcaseinclude', {
				title : 'HelpCase Include',
				image : '../../prod/third/tiny_mce/plugins/helpcaseinclude/img/include.gif',
				cmd : 'HelpcaseInclude'
			});
		},

		getInfo : function() {
			return {
				longname : 'Helpcase Include',
				author : 'Marcos Souza Filho - NetMake Solucoes em Informatica',
				authorurl : 'http://www.netmake.com.br',
				infourl : 'http://www.netmake.com.br',
				version : "1.0.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('helpcaseinclude', tinymce.plugins.HelpcaseInclude);
})();