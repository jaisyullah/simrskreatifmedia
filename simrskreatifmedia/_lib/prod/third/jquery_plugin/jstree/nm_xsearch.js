function trecords()
{
	this.index=(trecords.count++)
	//this.link=''
	this.pages=''
	this.keywords=''
	//this.description=''
	return this
}
trecords.prototype.set=function(pages,keywords)
{
	//this.link=link
	this.pages=pages
	this.keywords=keywords
	//this.description=description
}
trecords.prototype.searchstring=function() { return this.keywords }
trecords.prototype.count=0

function add(pages,keywords)
{
	al=records.length
	records[al]=new trecords()
	records[al].set(pages,keywords)
}

records = new Array()
finds=0
var ipalavra = 0;
sites=0

andresult=false
SortResults=true
display_start=0
displast=10

function clone(obj) {
    if (null == obj || "object" != typeof obj) return obj;
    var copy = obj.constructor();
    for (var attr in obj) {
        if (obj.hasOwnProperty(attr)) copy[attr] = obj[attr];
    }
    return copy;
}

function searchAll(keyword)
{
	var strResultContent = '';
	
	var nw=0
	finds=0
	sites=0

	//if (keyword.length>50) keyword=keyword.substring(0,60)+"..."
	var palavras = keyword.split(' ');
	var results=new Array()
	var results2=new Array();

	if($('input[name=tipo_busca]:checked').val() == 'exata') 
	{
		var er = new RegExp(keyword, 'ig');

		var records_copy = clone(records);
		records_copy.forEach(function(entry, i){
				if($.inArray(entry.keywords, keyword ) !=  -1)
				{
					results[finds] = {keywords: entry.keywords, pages: entry.pages}
					finds++;
					delete records_copy[i];
				}
			});
		palavras.forEach(function(palavra){
			var er = new RegExp(palavra, 'ig');
			finds = 0;
			results2[ipalavra] = new Array();
			var records_copy = clone(records);
			records_copy.forEach(function(entry, i){
					if($.inArray(entry.keywords, palavra ) !=  -1)
					{
						results2[ipalavra][finds] = {keywords: entry.keywords, pages: entry.pages}
						finds++;
						delete records_copy[i];
					}
				});
			er = new RegExp("^"+palavra + ".*", 'ig');
			records_copy.forEach(function(entry, i){
					if(er.test(entry.keywords))
					{
						results2[ipalavra][finds] = {keywords: entry.keywords, pages: entry.pages}
						finds++;
						delete records_copy[i];
					}
				});
			er = new RegExp(palavra, 'ig');
			records_copy.forEach(function(entry, i){
					if(er.test(entry.keywords))
					{
						results2[ipalavra][finds] = {keywords: entry.keywords, pages: entry.pages}
						finds++;
						delete records_copy[i];
					}
				});
			ipalavra++;
		});
		var partialLoop;
		finds = 0;
		
			results2.forEach(function(entry, i){
				if(partialLoop == undefined)
				{
					partialLoop = clone(entry);
				}
				else
				{
					entry.forEach(function(entry2)
					{
						console.log(entry2);
//						(entry2.pages)
							partialLoop.forEach(function(partialentry)
							{
								var arr_inter = arrayIntersect(entry2.pages, partialentry.pages);
								//console.log(arr_inter);
								if(arr_inter.length > 0)
								{
									results[finds] = {keywords: partialentry.keywords + ' ' + entry2.keywords + ' ', pages: arr_inter}
									finds++;
								}
							});
					});
					//results[finds] = {keywords: entry.keywords, pages: entry.pages}
				}
			});
			//console.log(results);
	}
	else if($('input[name=tipo_busca]:checked').val() == 'umadas')
	{
		var er = new RegExp(keyword, 'ig');

		//parou aqui
		var records_copy = clone(records);
		records_copy.forEach(function(entry, i){
				if($.inArray(entry.keywords, keyword ) !=  -1)
				{
					results[finds] = {keywords: entry.keywords, pages: entry.pages}
					finds++;
					delete records_copy[i];
				}
			});
		er = new RegExp("^"+keyword + ".*", 'ig');
		records_copy.forEach(function(entry, i){
				if(er.test(entry.keywords))
				{
					results[finds] = {keywords: entry.keywords, pages: entry.pages}
					finds++;
					delete records_copy[i];
				}
			});
		er = new RegExp(keyword, 'ig');
		records_copy.forEach(function(entry, i){
				if(er.test(entry.keywords))
				{
					results[finds] = {keywords: entry.keywords, pages: entry.pages}
					finds++;
					delete records_copy[i];
				}
			});
		er = new RegExp(palavras.join('|'), 'ig');
		records_copy.forEach(function(entry, i){
			
				if($.inArray(entry.keywords, palavras ) !=  -1 || er.test(entry.keywords))
				{
					results[finds] = {keywords: entry.keywords, pages: entry.pages}
					finds++;
					delete records_copy[i];
				}
			});

	}
	
	// Now we build the output page
	//strResultContent += sprintf(lang_results, (display_start+1), (displast), sites, keyword);

	if (finds==0) {
		strResultContent += sprintf(lang_notfound, keyword, keyword);
	}
	else
	{
		var itera = 0;
		results.forEach(function(entry)
		{
		
			strResultContent += "<div class='xresultDiv'>";
			strResultContent += "<span class='arrow-right' id='id_find_result_"+ itera +"'></span><div class='xtitle' onclick=\"$(this).next().toggle();$('#id_find_result_"+ itera +"').toggleClass('arrow-up');\" >"+entry.keywords+"</div><div class='xresultDetail'><ul>";
			for (p in entry.pages)
			{
				if(indices[entry.pages[p]] == undefined || indices[entry.pages[p]] == '') continue;
				aLink = indices[entry.pages[p]].split("|");
				link = aLink[0];
				desc = aLink[1];
				strResultContent += "<li class='xresult'>"
									+"<a href='javascript:openPage("+entry.pages[p]+", \""+entry.keywords+"\")'>"+desc+"</a></li>";
			}
			strResultContent += "</ul></div></div><br>";	
			itera++;
		});
	}
	document.getElementById('pageContent').innerHTML = strResultContent;
	
}
function arrayIntersect(a, b)
{
    return $.grep(a, function(i)
    {
        return $.inArray(i, b) > -1;
    });
};

function initXsearch()
{
	document.open()
	document.clear()
	
	AddBody()
	
	templateEnd();
	document.close()
			
}

var keywords = new Array()
var results

function AddBody()
{
	templateBody();

	var keytext='"'+searchname+'#keywords="+'
	var andtext='"&and="+'
	
	document.write('<script>function doSearch(){'+
						'	searchwords=document.searchform.searchwords.value; '+
						'	searchAll(searchwords);'+
						'}'+
						'<'+'/'+'script>'						
						)
	
	
	document.write("<form class='searchform' name='searchform' method='post' onSubmit='doSearch(); return false;'>"
					+"<table class='search_form_table' border='0' width='10%' style='font-family:Arial, Helvetica, sans-serif;font-size:12px;'>"
					+"<tr><td align='left' nowrap>"+lang_searchfor+"<br>"
					+"<input name='searchwords' id='id_searchwords' type='text' size='25'>"
					+"</td></tr>"
					+"<tr><td><label><input type='radio' name='tipo_busca' value='umadas' checked='checked'/>"+ lang_tipobusca_qualquer +"</label></td></tr>"
					+"<tr><td><label><input type='radio' name='tipo_busca' value='exata'/>"+ lang_tipobusca_all +"</label></td></tr>"
					+"<tr><td><br/><div style='text-align: center'><a href='javascript:doSearch()' style='color: #FFF !important;background-color: #333;padding: 4px;border-radius: 3px;'>"+lang_searchbtn+"</a></div></td></tr>"
					+"</table></form><div id='pageContent'></div>");
	
	if (usebannercode) bannerCode()
}

function openPage(page, palavra)
{
	aLink = indices[page].split("|");
	link = aLink[0];
	$("#id_bodyContent").attr("src", link);
	if($("a[data-rel='"+link+"']").length == 0)
	{
		$.jstree.reference('#id_menu').open_all();
		$('#id_bodyContent').attr('src',document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ link);
		window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ link, "bodyContent");
		
		if($("a[data-rel='"+link+"']").length == 0)
		{
				link = link.split('.htm').join('');
		}
		
		$("a[data-rel='"+link+"']").click();
		var ids = $.jstree.reference('#id_menu').get_selected(true)[0].parents;
		$.jstree.reference('#id_menu').close_all();
		for(var i = ids.length -1; i>=0;i--)
		{
			if(ids[i] == '#') continue;
			$('#'+ids[i] + ' > a').click();
			
		}
		$("a[data-rel='"+link+"']").click();
	}
	palavra.split(' ').forEach(function(p){ $("#id_bodyContent").contents().find('body').highlight(p);});
	setTimeout(function(){palavra.split(' ').forEach(function(p){ $("#id_bodyContent").contents().find('body').highlight(p);});}, 500);
	setTimeout(function(){palavra.split(' ').forEach(function(p){ $("#id_bodyContent").contents().find('body').highlight(p);});}, 1000);
	setTimeout(function(){palavra.split(' ').forEach(function(p){ $("#id_bodyContent").contents().find('body').highlight(p);});}, 2000);
}

