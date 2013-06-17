$(document).ready(function(){
	$('.hiddenbox').mouseenter(function(){
		$('.hiddenbox').fadeTo('fast', 1);
	});
		$('.hiddenbox').mouseleave(function(){
		$('.hiddenbox').fadeTo('fast', 0.5);
	});
});

$(document).ready(function(){
	$('#faderorange').mouseenter(function(){
		$('#faderorange').fadeTo('fast', 1);
	});
		$('#faderorange').mouseleave(function(){
		$('#faderorange').fadeTo('fast', 0.5);
	});
});
