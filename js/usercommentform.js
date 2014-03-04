$( document ).ready(function() {
  // Handler for .ready() called.



$( "#comment" ).change(function() {
	// Check input( $( this ).val() ) for validity here
	check_comment();
});

$("#commentform").submit(function(e){
	if(check_comment()){
		return true;
	}
	e.preventDefault();
	return false;
});

});

function check_comment(){
	var comment = $( "#comment" ).val(); 
	if (comment !== "") {  // If something was entered
		$("#comment-error").html('');
		return true;
	}
	$("#comment-error").html('Please provide a valid comment for it to be posted.'); //error message
	$("#comment").focus();   //focus on comment field
	return false;
}