// variavel com valor do tamanho da janela.
//var janela_largura = screen.availWidth;
//var janela_altura = screen.availHeight;

function resizewindow(){
	vindice = document.getElementById('idindice');
	vbody = document.getElementById('idbody');
	//idindice.style.display = 'none';
	if(vindice.style.display == "none"){
		vindice.style.display = 'block';
		vbody.style.width = "75%";
	}
	else{
		vindice.style.display = "none";
		vbody.style.width = "99%";
	}
	
}

function printpage(){
	var newurl = parent.document.getElementById('idbody');
	var janela_largura = screen.availWidth;
	var janela_altura = screen.availHeight;
	var setting = 'scrollbars=yes,status=no,toolbar=no,menubar=yes,width='+janela_largura;	 
	setting += ',height='+janela_altura+',left=20,top=10,resizable=no';
	window.open(newurl.src,'',setting);	
}

function changePage(page)
{
	var folder = document.location.href.split('TestCase.htm')[0];
	window.history.pushState("Web Help", "Web Help", folder + 'TestCase.htm?item='+page);
	if(document.location.href.indexOf(folder + 'TestCase.htm?item='+page) < 0)
	{
		document.location.href = folder + 'TestCase.htm?item='+page;
	}
}

function changeInternalPage(page)
{
	page = page.replace(/(\.\.\/)+/g, "");
	console.log(page);
	if(page == 'home')
	{
			$('#id_bodyContent').attr('src', document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/_home.htm');
	}
	else if($("a[data-rel='"+page+"']").length == 0)
	{
		$.jstree.reference('#id_menu').open_all();
		$('#id_bodyContent').attr('src',document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ page);
		window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ page, "bodyContent");
		
		$("a[data-rel='"+ page +"']").click();
		var ids = $.jstree.reference('#id_menu').get_selected(true)[0].parents;
		$.jstree.reference('#id_menu').close_all();
		for(var i = ids.length -1; i>=0;i--)
		{
			if(ids[i] == '#') continue;
			$('#'+ids[i] + ' > a').click();
		}
		$("a[data-rel='"+ page +"']").click();
	}
	else
	{
		$("a[data-rel='"+ page +"']").click();
		window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ page, "bodyContent");
	}

}

$(function () {
	$('#id_bodyContent').load(function(){

	        var iframe = $('#id_bodyContent').contents();

	        iframe.find("a").click(function(){
			if($(this).attr('href').substr(0,1) != '#' && $(this).attr('href').substr(0,7) != 'http://' && $(this).attr('href').substr(0,8) != 'https://')
			{
		               changeInternalPage($(this).attr('href'));
			}
	        });
	});
});

