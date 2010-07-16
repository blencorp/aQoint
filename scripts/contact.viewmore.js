$(document).ready(function expand() {
	//hide the all of the element with class msg_body
	$(".msg_body").hide();
	$("p#showless").hide()
	//toggle the componenet with class msg_body
	$("p#showmore").click(function() {
		$("p#showmore").hide()
		$("p#showless").show();
		//$(this).next(".msg_body").slideToggle(600);
		$(".msg_body").slideToggle(600);
	});
	$("p#showless").click(function() {
		$("p#showless").hide();
		$("p#showmore").show()
		//$(this).next(".msg_body").slideToggle(600);
		$(".msg_body").slideToggle(600);
	});
});
