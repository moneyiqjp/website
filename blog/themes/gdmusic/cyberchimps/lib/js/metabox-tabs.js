jQuery(document).ready(function($) {

	// Hide/show category field of featured post option with respect to selcted option
	var val = jQuery('[name="cyberchimps_featured_post_category_toggle"]').val();
	if( val == 0 )
		jQuery('.cyberchimps_featured_post_category').hide();
	 
	jQuery('[name="cyberchimps_featured_post_category_toggle"]').change(function(){
		var val = jQuery('[name="cyberchimps_featured_post_category_toggle"]').val();
		if( val == 0 )
			jQuery('.cyberchimps_featured_post_category').hide();
		else if( val == 1 )
			jQuery('.cyberchimps_featured_post_category').show();
	});

	// tab between them
	jQuery('.metabox-tabs li a').each(function(i) {
		var thisTab = jQuery(this).parent().attr('class').replace(/active /, '');

		if ( 'active' != jQuery(this).attr('class') )
			jQuery('div.' + thisTab).hide();
		
		jQuery('div.' + thisTab).addClass('tab-content');
 
		jQuery(this).click(function(){
			// hide all child content
			jQuery(this).parent().parent().parent().children('div').hide();
 
			// remove all active tabs
			jQuery(this).parent().parent('ul').find('li.active').removeClass('active');
 
			// show selected content
			jQuery(this).parent().parent().parent().find('div.'+thisTab).show();
			jQuery(this).parent().parent().parent().find('li.'+thisTab).addClass('active');
		});
	});

	jQuery('.heading').hide();
	jQuery('.metabox-tabs').show();

	jQuery(".subsection-items").hide();
	$(".subsection > h4").click(function() {
		var $this = $(this);
		$this.find("span.minus").removeClass('minus');
		if($this.siblings('div').is(":visible")) {
			$this.siblings('div').fadeOut();
		} else {
			$this.siblings('div').fadeIn();
			$this.find("span").addClass('minus');
		}
	});

	// show by default
	
	$("#subsection-Boxes-Lite-Element").children('.subsection-items').show();
	$("#subsection-Custom-Slide-Options > h4").click();
	$("#subsection-Featured-Post-Carousel-Options > h4").click();

	$("#subsection-Page-Options > h4").click();
	var page_subsection_map = {
		page_slider			: "subsection-iFeature-Slider-Options",
		page_nivoslider		: "subsection-iFeature-Pro-NivoSlider-Options",
		callout_section		: "subsection-Callout-Options",
		carousel_section	: "subsection-Carousel-Options",
		html_box			: "subsection-HTML-Box-Options",
		custom_html_element	: "subsection-Custom-HTML",
		product				: "subsection-Product-Options",
		twitterbar_section	: "subsection-Twitter-Options",
		//magazine			: "subsection-Magazine-Layout-Options",
		slider_lite			: "subsection-Slider-Options",
		recent_posts		: "subsection-Recent-Posts-Options",
		featured_posts		: "subsection-Featured-Posts-Options",
		boxes				: "subsection-Boxes-Options",
		profile				: "subsection-Profile-Options"
	};
	$(".section-order-tracker").change(function(){
		var array = $(this).val().split(",");
		$.each(page_subsection_map, function(key, value) {
			if($.inArray(key, array) != -1) {
				$("#" + value).show();
			} else {
				$("#" + value).hide();
			}
		});
	}).change();


	// image_select
	$(".image_select").each(function(){
		$(this).find("img").click(function(){
			if($(this).hasClass('selected')) return;
			$(this).siblings("img").removeClass('selected');
			$(this).addClass('selected');
			$(this).siblings("input").val($(this).data("key"));
		});
    if($(this).find("img.selected").length) {
			$(this).find("input").val($(this).find("img.selected").data("key"));
    }
	});

	 /*
      Add toggle switch after each checkbox.  If checked, then toggle the switch.
    */
     $('.checkbox').after(function(){
       if ($(this).is(":checked")) {
         return "<a href='#' class='toggle checked' ref='"+$(this).attr("id")+"'></a>";
       }else{
         return "<a href='#' class='toggle' ref='"+$(this).attr("id")+"'></a>";
       }
       
     });
     
     /*
      When the toggle switch is clicked, check off / de-select the associated checkbox
     */
    $('.toggle').click(function(e) {
       var checkboxID = $(this).attr("ref");
       var checkbox = $('#'+checkboxID);

       if (checkbox.is(":checked")) {
         checkbox.removeAttr("checked").change();
       }else{
         checkbox.attr("checked","checked").change();
       }
       $(this).toggleClass("checked");

       e.preventDefault();

    });

    /*
      For demo purposes only....shows/hides checkboxes.
    */
    $('#showCheckboxes').click(function(e) {
     $('.checkbox').toggle()
     e.preventDefault();
    });

    $('#checkbox-extra_callout_options').change(function(){
	    var items = $("tr.callout_image, tr.custom_callout_color, tr.custom_callout_title_color, tr.custom_callout_text_color, tr.custom_callout_button_color, tr.custom_callout_button_text_color");
		if($(this).is(':checked')) {
			items.show();
		} else {
			items.hide();
		}
		$("#checkbox-disable_callout_button").trigger("change");
    }).trigger('change');

    $('#checkbox-disable_callout_button').change(function(){
	    var items = $("tr.callout_button_text, tr.callout_url");
		if($(this).is(':checked')) {
			items.show();
		} else {
			items.hide();
		}
    }).trigger('change');
	
	$('#checkbox-cyberchimps_recent_posts_title_toggle').change(function(){
	    var items = $("tr.cyberchimps_recent_posts_title");
		if($(this).is(':checked')) {
			items.show();
		} else {
			items.hide();
		}
    }).trigger('change');
	
	$('#checkbox-cyberchimps_magazine_wide_post_toggle').change(function(){
	var items = $("tr.cyberchimps_magazine_no_of_wide_posts");
	if($(this).is(':checked')) {
		items.show();
	} else {
		items.hide();
	}
    }).trigger('change');
		
	/* **************** JS for slider customization starts ****************** */
	
	// Hide empty slider options 
	$('#subsection-Slider-Options tr').each(function(){
		if( $(this).children().children('.upload_image_field').val() == '' ){
			$(this).hide();
			$(this).next().hide();
			$(this).next().next().hide();
		}
	});
	
	// Check whetehr total number of slider is less than maximum possible number of sliders.
	if($('#subsection-Slider-Options tr:last').css('display') == "none"){
		
		// Add button to add new slider.
		$('#subsection-Slider-Options table').append('<tr><td></td><td><button id="add_new_slide" class="button button-primary button-large">+</button></td></tr>');
		
		// Print remaining number of slider that can be added.
		$('#subsection-Slider-Options table tr:last td:last').append('<div class="slider-countdown">' + slider_countdown() + ' more sliders remaining</div>');
	}
	else {
		$('#subsection-Slider-Options table').append('<tr><td></td><td>Maximum possible number of sliders are already added</td></tr>');	
	}
	
	// Things to be done when add new slider button is clicked.
	$('#subsection-Slider-Options #add_new_slide').click(function(e){
		e.preventDefault();
		
		// Running the show thrice call both the slide and link inputs
		$('#subsection-Slider-Options tr:hidden:first').show();
		$('#subsection-Slider-Options tr:hidden:first').show();
		$('#subsection-Slider-Options tr:hidden:first').show();
		
		// Hide "Add new slider" button if maximum possible number of sliders are already added.
		$('#subsection-Slider-Options tr:last').each(function(){
			if($(this).prev().is(':visible')){
				$('#subsection-Slider-Options #add_new_slide').hide();
			};
		});
		
		// Modify slider countdown.
		$('.slider-countdown').text( slider_countdown() + ' more sliders remaining' );	
	});
	
	// Calculates and returns remaining number of sliders
	function slider_countdown() {
		var countdown = 0;
		$('#subsection-Slider-Options tr').each(function(){
			if( $(this).css('display') == 'none' ) {
				countdown++;
			}
		});
		return countdown/3;
	}
	
	// Add remove button to slider image.
	jQuery('#subsection-Slider-Options .upload_image_field').parent().
		append('<input class="remove-slider" type="button" value="Remove" />');

	$('.remove-slider').click( function(event) {
		$(this).hide();
		$(this).siblings('.upload_image_field').attr('value', '');
		$(this).siblings('.image_preview').slideUp();
    });
	
	/* ***************** JS for slider customization ends ***************** */
	
	/* ***************** JS for product element starts ***************** */
	
	// Hide/show image link field on click of toggle.
	$('#checkbox-cyberchimps_product_image_link_toggle').change(function(){
	var items = $("tr.cyberchimps_product_image_link");
	if($(this).is(':checked')) {
		items.show();
	} else {
		items.hide();
	}
    }).trigger('change');
	
	// Hide/show video option and image option on change of the selection
	function cyberchimps_check_product_value(value) {
		var product_value = $("select[name=\'cyberchimps_product_media_type\']").val();

		if ( product_value == "1" ) {
		
			// Hide video option and show image options
			$(".cyberchimps_product_video").hide();
			$(".cyberchimps_product_image").fadeIn();
			$(".cyberchimps_product_image_link_toggle").fadeIn();
			if($('#checkbox-cyberchimps_product_image_link_toggle').is(':checked')) {
				$("tr.cyberchimps_product_image_link").fadeIn();
			} 
		} else if ( product_value == "2" ){
		
			// Hide image options and show video option
			$(".cyberchimps_product_image").hide();
			$(".cyberchimps_product_image_link_toggle").hide();
			$(".cyberchimps_product_image_link").hide();
			$(".cyberchimps_product_video").fadeIn();
		}

		return false;
	}

	cyberchimps_check_product_value();

	$("select[name=\'cyberchimps_product_media_type\']").change(function() {
		cyberchimps_check_product_value();
	});
	
	/* ***************** JS for product element ends ***************** */
	
});