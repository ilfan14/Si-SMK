$(function(){
	
	function move404(){
		$('#animate').animate({'left':'+=40%'},3500).delay(100)
					.animate({'left':'-=40%'},3500,function(){
				setTimeout(move404,1000);
		});
	}	
	move404();
	
});	


$("document").ready(function() {
    setTimeout(function() {
        $(".livicon").trigger('click');
    },10);
});

