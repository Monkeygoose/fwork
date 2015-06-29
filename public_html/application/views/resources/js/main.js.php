$('.actbtn').on('click', function(event){

	$('.content').html( "<div class='spinner'><div class='spinner-container container1'><div class='circle1'></div><div class='circle2'></div><div class='circle3'></div><div class='circle4'></div></div><div class='spinner-container container2'><div class='circle1'></div><div class='circle2'></div><div class='circle3'></div><div class='circle4'></div></div><div class='spinner-container container3'><div class='circle1'></div><div class='circle2'></div><div class='circle3'></div><div class='circle4'></div></div></div>" );
	$(".scroller").click();	
	//AJAX slugeg: data-url="http://ampd.org.uk/index.php/news/adelphi-contemporary-music-group"
	$.get( $(this).data('loc'), function( data ) {
	  $('.content').html( data );
	  //alert( "Load was performed." );
	});

});

$('.qactbtn').on('click', function(event){

	$('.content').html( "<div class='spinner'><div class='spinner-container container1'><div class='circle1'></div><div class='circle2'></div><div class='circle3'></div><div class='circle4'></div></div><div class='spinner-container container2'><div class='circle1'></div><div class='circle2'></div><div class='circle3'></div><div class='circle4'></div></div><div class='spinner-container container3'><div class='circle1'></div><div class='circle2'></div><div class='circle3'></div><div class='circle4'></div></div></div>" );
	//AJAX slugeg: data-url="http://ampd.org.uk/index.php/news/adelphi-contemporary-music-group"
	$.get( $(this).data('loc'), function( data ) {
	  $('.content').html( data );
	  //alert( "Load was performed." );
	});

});