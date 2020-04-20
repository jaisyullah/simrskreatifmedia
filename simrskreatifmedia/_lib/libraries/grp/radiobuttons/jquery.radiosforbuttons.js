( function( $ ) {
  var colors = {
    white: 'btn-white',
    blue: 'btn-primary',
    primary: 'btn-primary', 
    lightblue: 'btn-info',
    info: 'btn-info',
    green: 'btn-success',
    success: 'btn-success',
    yellow: 'btn-warning',
    warning: 'btn-warning',
    red: 'btn-danger',
    danger: 'btn-danger',   
    black: 'btn-inverse',
    inverse: 'btn-inverse',
    link: 'btn-link',
  }

  $.fn.radiosforbuttons = function (options) {
    var defaults = {
      buttonstyle: this.data('button-bootstrap-class'),
      color: this.data('button-color'),
      group: true,
      vertical: false,
			autowidth: true,
      margin: 0,
    };
    var options = $.extend(defaults, options);
    options.margindirection = options.vertical ? 'margin-top' : 'margin-left';
		if (options.margin) options.margin = options.margin - 1;
    if (options.color in colors) options.buttonstyle = colors[options.color];
    if (options.buttonstyle in colors) options.buttonstyle = colors[options.buttonstyle];

    var div = this.eq(0);
    var name = div.find('input[type="radio"]').attr('name');
    var trash = $('<div/ >').addClass('radiosforbuttons-'+name+'-trash').appendTo( div.closest('form') );

    div.find('input[type="radio"]').each( function (k, v) {
      var radio = $( this );
      var label = $( 'label[for="'+radio.attr('id')+'"]' );

      var color;
      color = radio.data('button-color');
      color = radio.data('button-bootstrap-class');
      if ( radio.data('button-color') in colors ) color = colors[radio.data('button-color')];
      if ( radio.data('button-bootstrap-class') in colors ) color = colors[radio.data('button-bootstrap-class')];
      $( '<button/ >' )
        .addClass('btn')
        .addClass( color ? color : options.buttonstyle )
        .addClass('radiosforbuttons-'+name)
				.addClass( radio.prop('checked') ? 'active' : '' )
        .data('id', radio.attr('id'))
        .val( radio.val() )
        .html( label.html() )
				.css('margin-right', 0)
        .css(options.margindirection, k != 0 && options.margin != 0 ? options.margin : '')
        .appendTo(div);

      radio.hide().appendTo(trash);
      label.remove();
    })

		div.addClass('radiosforbuttons-maindiv-'+name);
		if (options.group) {
		  div
		    .addClass('btn-group')
		    .addClass('btn-group-'+name);
		  if (options.vertical) {
				div.addClass('btn-group-vertical');
				if (options.autowidth) {
					var widths = [];
					div.find('button').each( function () {
						widths.push( $(this).outerWidth() )
					}).css('width', Math.max.apply(Math, widths))
				}
			}
		}

    $( '.radiosforbuttons-'+name ).click( function () {
      $( '.radiosforbuttons-'+name+' input:radio[name="'+name+'"]' ).prop('checked', false);
      $( '#'+$(this).data('id') ).prop('checked', true).trigger("change");
      $( '.radiosforbuttons-'+name ).removeClass('active');
      $( this ).addClass('active');
      return false;
    })

    return div;
  };

})(jQuery);
