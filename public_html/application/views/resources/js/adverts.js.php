$(".location-options").change(function () {

	var selected_option = $('.location-options').val();

	if (selected_option === 'site') {
		$('.site-options').removeClass('hidden');
		$('.magazine-options').addClass('hidden');
	};

	if (selected_option === 'magazine') {
		$('.magazine-options').removeClass('hidden');
		$('.site-options').addClass('hidden');
	};

});

$(function() {

	$( "#slider" ).slider({
		value:1000,
		min: 1000,
		max: 50000,
		step: 1000,
		slide: function( event, ui ) {

			var type = $('#site-adtype').val();
			var impressions = ui.value / 1000;

			switch (type) { 
				case 'banner': 
					var price = <?php echo $siteprices['banner'];?>;
					break;
				case 'footer': 
					var price = <?php echo $siteprices['footer'];?>;
					break;
				case 'events': 
					var price = <?php echo $siteprices['events'];?>;
					break;		
				case 'skyscraper': 
					var price = <?php echo $siteprices['skyscraper'];?>;
					break;
				default:
					var price = 0;
			};

			$( "#impressions" ).val( ui.value + " - impressions (£" + (price * impressions ) + ")"  );
		}
	});

	$( "#impressions" ).val( ($( "#slider" ).slider( "value" )) + " - impressions" );

});

$("#site-adtype").change(function () {

			var type = $('#site-adtype').val();
			var oldimpressions = $.trim($( "#impressions" ).val().substring(0, 5));
			var impressions = oldimpressions / 1000;

			switch (type) { 
				case 'banner': 
					var price = <?php echo $siteprices['banner'];?>;
					break;
				case 'footer': 
					var price = <?php echo $siteprices['footer'];?>;
					break;
				case 'events': 
					var price = <?php echo $siteprices['events'];?>;
					break;		
				case 'skyscraper': 
					var price = <?php echo $siteprices['skyscraper'];?>;
					break;
				default:
					var price = 0;
			};

			$( "#impressions" ).val( oldimpressions + " - impressions (£" + (price * impressions ) + ")"  );

});

$("#mag-adtype").change(function () {

			var type = $('#mag-adtype').val();

			switch (type) {
				case 'sponsor': 
					var price = <?php echo $magprices['sponsor'];?>;
					break;
				case 'fullpage': 
					var price = <?php echo $magprices['fullpage'];?>;
					break;
				case 'halfpage': 
					var price = <?php echo $magprices['halfpage'];?>;
					break;
				case 'articleblock': 
					var price = <?php echo $magprices['articleblock'];?>;
					break;		
				case 'banner': 
					var price = <?php echo $magprices['banner'];?>;
					break;
				default:
					var price = 0;
			};

			$( "#magadprice" ).html( "Price: £" + price );

});

$(".section-options").change(function () {

	var issue = ".article-issue-" + $('.section-options').val();

	$('.article-option').addClass('hidden');
	$(issue).removeClass('hidden');

	$(".article-page").val('page');

});