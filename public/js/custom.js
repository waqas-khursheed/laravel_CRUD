/*------------------------custom scrollbar--------------------------------------*/
jQuery(document).ready(function(){
    jQuery('.scrollbar-inner').scrollbar();
});


/*------------------------custom scrollbar--------------------------------------*/

/*------------------------------- Custom input file---------------------------------------------------------------------*/
(function($){
/*----------------------------------------------------------------------------------------------------*/
	$.fn.extend({
		//Plugin Code Start here
		customFileinput: function(options){
			
			//Set Default setting for plugin
			var defaults = {
                buttontext : 'Send',
				customboxwidth : '98%',
				customboxclass : 'customfile',
				fileinputclass : 'fileinput'
            };
			
			//Define Default option using extend 
            var options = $.extend(defaults, options);
			
			var fileinput = $(this).find('input[type=file]').css({"width":"100%", "height":"100%", "position":"absolute", "left":"0", "top":"0"});
			fileinput.addClass(options.fileinputclass); //adding Class in to File input
			fileinput.css({opacity:0}); // Hide File input
			
			//create Element for custom design
			var customfile = $('<div class="'+options.customboxclass+'"><div class="innersec"></div></div>').css({"position":"relative"}); //custome file wrapper
			var cfilefield = $('<span class="cust-field"></span>'); //custome file field
			var cfilebutton = $('<span class="cust-btn"></span>').text(options.buttontext); //custome file button
			
			//Adding file name In Custome design
			fileinput.bind('change', function(){
				var filename = $(this).val().split(/\\/).pop();
				$(this).next().next(cfilefield).text(filename); 
			})
			
			//Implement HTML object For Custom Design
			fileinput.wrap(customfile);
			fileinput.after(cfilebutton);
			fileinput.next(cfilebutton).after(cfilefield);
			var movebox = customfile.attr('class');
			
			//Follow Mouse in custom file block area region
			$("."+movebox).bind('mousemove',function(e){ 
				var offleft = $(this).offset().left;
				var offtop = $(this).offset().top;
				var leftpos =  e.pageX - offleft - 190;
				var toppos =  e.pageY - offtop-5 ;
			});
			$("."+movebox).bind('mouseleave', function(e){
				$(this).find('input[type=file]').css({left: 0, top: 0});
			}).width(options.customboxwidth);
			
		}
	});
/*----------------------------------------------------------------------------------------------------*/	
})(jQuery);

$(document).ready( function(){
	$('.customfileinput').customFileinput({
		buttontext : 'SELECT FILE',
		customboxwidth : 470
	});
	$('.invisible').show();
});

/*------------------------Form required field--------------------------------------*/
$(document).ready(function() {
    
    $('.field').focus(function() {
        $(this).siblings('.placeholder').addClass('placeFocus');
    });
    $('.field').blur(function() {
        if ($(this).val().length === 0) {
            $(this).siblings('.placeholder').removeClass('placeFocus');
        }
    });
   
});

/*------------------------calender datepicker--------------------------------------*/
$( function() {
    $( "#datepicker" ).datepicker();
 } );

$( function() {
    $( "#datepicker2" ).datepicker();
 } );

$( function() {
    $( "#datepicker3" ).datepicker();
 } );

$( function() {
    $( "#datepicker4" ).datepicker();
 } );
$( function() {
    $( "#datepicker5" ).datepicker();
 } );


/*------------------------calender datepicker--------------------------------------*/

$( function() {
    $( "#tabs" ).tabs();
  } );

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

