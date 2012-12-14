<?php print $doctype; ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>>
<head<?php print $rdf->profile; ?>>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>  
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript" src="/sites/all/themes/cgb_omega/js/jquery.pajinate.min.js"></script>
  <script type="text/javascript" src="/sites/all/themes/cgb_omega/js/jquery.placeholder.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
		jQuery('#consultants-list-frontpage').pajinate({
			items_per_page : 6,
			wrap_around : true
		});
		jQuery(".page-node-registrations .sticky-table").addClass("table table-bordered table-striped");
		var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
		jQuery('.view-id-consultants.view-display-id-page li.views-row').each(function() {
			$el = jQuery(this);
			topPostion = $el.position().top;
			if (currentRowStart != topPostion) {
				// we just came to a new row.  Set all the heights on the completed row
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
				// set the variables for the new row
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);				
			} else {
				// another div on the current row.  Add it to the list and check if it's taller
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}	 
			// do the last row
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}				 
		});
		jQuery('#breadcrumb li').append('<span class="divider">/</span>');
		jQuery('#views-exposed-form-consultants-page').addClass('form-search');
		jQuery('#block-system-main-menu ul.menu a:contains("Home")').prepend('<i class="icon-home"></i>  ');
		jQuery('#zone-content table').addClass('table');
		jQuery('#user-login-form .form-item input').each(function(){
			var p = jQuery(this).prev('label').text();
			jQuery(this).attr('placeholder',p);
		});
		jQuery('#user-login-form .form-item label').css('display','none');
		jQuery('#consultants-list-frontpage .profile-link a').text('');
		jQuery('.pagination li.active').wrapInner('<a />');
		jQuery('#consultants-list-frontpage .profile-link a').prepend('<i class="icon-chevron-right"></i>');
		jQuery('#past-events-list a.unflag-action').html(jQuery('#past-events-list a.unflag-action').html().replace('I\'m available','I participated'));
		jQuery('#past-events-list a.flag-action').html(jQuery('#past-events-list a.flag-action').html().replace('availability','participation'));
		var val = jQuery(".field-name-field-telephone .field-item").html();
		if (val != null){
			jQuery(".field-name-field-telephone .field-item").html(val.substring(3, val.length));
		}
	});
    </script>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body<?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>