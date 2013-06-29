/**
 *  @author Sandip Ghadge
 *
 */

(function($) {



    $.fn.centerPopup = function(options){
        var selector_ele =  $(this).selector;;

        var ele = jQuery('<div id="overlay"><div id="popup_div" style="display:none;"><div id="render_content"></div><div style=" clear: both; margin:17px; text-align: center;"><span class="close_me" style=" background: none repeat scroll 0 0 red; cursor: pointer; color: white; font-weight: bolder;  padding: 6px 12px;  ">Close</span></div></div><div/>');
        if($('#overlay').length == 0){
            $(ele).appendTo('body');
        }



        $.fn.centerPopup.defaultOptions = {
            'width'  : '50%',
            'height' : '50%',
            'left'   : '50%',
            'top'    : '50%'
        }

        var options = $.extend({},$.fn.centerPopup.defaultOptions,options);



        $(selector_ele).on('click',function(e){
            e.preventDefault();
            $("#overlay").addClass('popup_div_background');
            $("#popup_div").fadeIn().center();
            $("#render_content").addClass('render_div_style');
            $('#render_content').load($(selector_ele).attr('href'));
            $('#render_content').slimscroll({
                'size' : '10px',
                'height' : '100%',
                'railVisible' : true,
                'margin-': '30px'


            });
        });

        $(".close_me").click(function(){
            $("#popup_div").fadeOut();
            $("#overlay").removeClass('popup_div_background');
        });

        $.fn.center = function () {
            this.addClass('popup_div_style');
            this.css(options);
            this.css({
                'margin-left': -this.width() / 2 + 'px',
                'margin-top': -this.height() / 2 + 'px'
            });



        }




    };





})(jQuery);