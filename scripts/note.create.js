$(document).ready(function() {
  $("form#add_note").submit(function() {
	  var note_text = $("#note_text").val();
		var contact_id = $("#contact_id").val();
		var note_date = $("#note_date").val();
		
		var dataString = 'contact_id=' + contact_id + '&note_text='+ note_text;

		//alert(dataString);

		if (contact_id == '' || note_text == '')
		{
			//$('.success').fadeOut(200).hide();
			//$('.error').fadeOut(200).show();
		} 
		else
		{
			$.ajax({
	      type: "POST",
	      url: "bin/note.process.php",
	      data: dataString,
	      success: function() {
	        //$('.success').fadeIn(200).show();
					$('.error').fadeOut(200).hide();
					$("ul#note").prepend("<li style='display:none'><label>" + note_date + "</label> " + note_text + "</li>");
					$("ul#note li:first").fadeIn();
	      }
	     });
			}
    return false;
	});
});
