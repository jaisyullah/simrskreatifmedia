(function($){
    $.DatePicker = function(el, options){
        // To avoid scope issues, use 'base' instead of 'this'
        // to reference this class from internal events and functions.
        var base = this;
        
        // Access to jQuery and DOM versions of element
        base.$el = $(el);
        base.el = el;
        
        // Add a reverse reference to the DOM object
        base.$el.data("DatePicker", base);
        
        base.setSelectValue = function(bol_select, str_value){
			$( "#"+ base.$el.attr('id') +" option[value='"+ str_value +"']" ).attr('selected', bol_select);
			$( "#"+ base.$el.attr('id')).change();
		};
		
        base.init = function(){
            base.options = $.extend({},$.DatePicker.defaultOptions, options);
            
			str_multiple = 'single';
			if(base.$el.attr('multiple'))
			{
				str_multiple = 'multiple';
			}
			
			pickerLeft = "";
			if(($(window).width() - base.$el.offset().left) < (500/base.options.cols))
			{
				pickerLeft = "options-picker"+ base.options.cols +"-left";
			}

			base.$el.after( "<div id='id_"+ base.$el.attr('id') +"_datepicker' class='options-picker options-picker"+ base.options.cols +" "+ pickerLeft +" "+ str_multiple +"'><div title=\""+ base.options.title +"\" class='options-picker-link'>"+ base.options.title +"</div><div class='options-picker-arrow'></div><ul id='id_"+ base.$el.attr('id') +"_datepicker_ul'></ul></div>" );
			
			str_value_selected = "";
			str_title_selected = "";
			$('#' + base.$el.attr('id') + ' option').each(function (index, value) { 
				str_small="";
				if($(this).attr('small'))
				{
					str_small = "<small>" + $(this).attr('small') + "</small>";
				}
				
				if($(this).attr('display_selected'))
				{
					display_selected = $(this).attr('display_selected');
				}
				else
				{
					display_selected = $(this).html();
				}
				
				str_active="";
				if($(this).attr('selected'))
				{
					str_active = " class='active'";
					
					str_value_selected = display_selected;
					str_title_selected = $(this).text();
				}
				
				$( "#id_"+ base.$el.attr('id') +"_datepicker_ul" ).append( "<li "+ str_active +" display_selected=\""+ display_selected +"\" formato=\""+ $(this).val() +"\">"+ $(this).text() + str_small + "</li>" );
			});
			
			$('#id_'+ base.$el.attr('id') +'_datepicker > .options-picker-link').html(str_value_selected);
			$('#id_'+ base.$el.attr('id') +'_datepicker > .options-picker-link').attr('title', str_title_selected);
			
			base.$el.hide();
			
			
			$('#id_'+ base.$el.attr('id') +'_datepicker').click(function(){ 
				$(".data").removeClass('opened');
				$(".option").removeClass('opened');
				$(".options-picker").not(this).removeClass('opened');
				$(this).toggleClass('opened');
			}); 

			$('#id_'+ base.$el.attr('id') +'_datepicker.single li').click(function(){
				$('#id_'+ base.$el.attr('id') +'_datepicker.single li').removeClass('active');
				$(this).toggleClass('active');
				base.setSelectValue($(this).hasClass('active'), $(this).attr('formato'));
				
				if($(this).attr('display_selected'))
				{
					str_valor = $(this).attr('display_selected');
				}
				else
				{
					str_valor = $(this).html();
				}
								
				if(str_valor.indexOf("small") >= 0)
				{
					str_valor = str_valor.substr(0, str_valor.indexOf("small")-1);
				}
				
				str_title = $(this).html();
				if(str_title.indexOf("small") >= 0)
				{
					str_title = str_title.substr(0, str_title.indexOf("small")-1);
					//hack pra transformar caracter html em texto (de &amp; pra &)
					$('#id_'+ base.$el.attr('id') +'_datepicker > .options-picker-link').html(str_title);
					str_title = $('#id_'+ base.$el.attr('id') +'_datepicker > .options-picker-link').text();
				}
				
				$('#id_'+ base.$el.attr('id') +'_datepicker > .options-picker-link').html(str_valor);
				$('#id_'+ base.$el.attr('id') +'_datepicker > .options-picker-link').attr('title', str_title);
				
				$('.options-picker').removeClass('opened');
				//previne propagacao do click
				return false;
			});

			$('#id_'+ base.$el.attr('id') +'_datepicker.multiple li').click(function(){
				$(this).toggleClass('active');
				base.setSelectValue($(this).hasClass('active'), $(this).attr('formato'));
				
				$('.options-picker').removeClass('opened');
			});
			
			$('#id_'+ base.$el.attr('id') +'_datepicker').click(function(event) {
			  $('html').one('click',function() {				  
				$('.options-picker').removeClass('opened');
			  });
			  
			  event.stopPropagation();
			});
        };
        base.init();
    };
    
    $.DatePicker.defaultOptions = {
        cols: 2,
        title: "Opções"
    };
    
    $.fn.datePicker = function(options){
        return this.each(function(){
            (new $.DatePicker(this, options));
        });
    };
    
})(jQuery);