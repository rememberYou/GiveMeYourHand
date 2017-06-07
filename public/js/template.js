/* Theme Name: Worthy - Free Powerful Theme by HtmlCoder
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.0.0
 * Created:November 2014
 * License: Creative Commons Attribution 3.0 License (https://creativecommons.org/licenses/by/3.0/)
 * File Description: Initializations of plugins 
 */

(function($){
    $(document).ready(function(){
        
	// Fixed header
	//-----------------------------------------------
	$(window).scroll(function() {
	    if (($(".header.fixed").length > 0)) { 
		if(($(this).scrollTop() > 0) && ($(window).width() > 767)) {
		    $("body").addClass("fixed-header-on");
		} else {
		    $("body").removeClass("fixed-header-on");
		}
	    };
	});

	$(window).load(function() {
	    if (($(".header.fixed").length > 0)) { 
		if(($(this).scrollTop() > 0) && ($(window).width() > 767)) {
		    $("body").addClass("fixed-header-on");
		} else {
		    $("body").removeClass("fixed-header-on");
		}
	    };
	});
        
    }); // End document ready

    $(function () {
        $('.data-delete').on('click', function (e) {
            if (!confirm('Are you sure you want to delete?')) return;
            e.preventDefault();
            $('#form-delete-' + $(this).data('form')).submit();
        });
    });
})(this.jQuery);
