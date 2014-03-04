$( document ).ready(function() {
  // Handler for .ready() called.

$( "#author" ).change(function() {
	// Check input( $( this ).val() ) for validity here
	check_author();
});

$( "#email" ).change(function() {
	// Check input( $( this ).val() ) for validity here
	check_email();
});

$( "#comment" ).change(function() {
	// Check input( $( this ).val() ) for validity here
	check_comment();
});

$("#commentform").submit(function(e){
	if(check_author()){
		if(check_comment()){
			if(check_email()){
				return true;
			}
		}
	}
	e.preventDefault();
	return false;
});

});


function check_author(){
	var author = $( "#author" ).val(); 
	if (author !== "") {  // If something was entered
		$("#author-error").html('');
		return true;
	}
	$("#author-error").html('Please provide a valid Name in order to post a comment.'); //error message
	$("#author").focus();   //focus on author field
	return false;
}

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

function check_email(){
	var email = $( "#email" ).val();  
	if (email !== "") {  // If something was entered
		if (isValidEmailAddress(email)) {
			$("#email-error").html('');
			return true;
		}
	}
	$("#email-error").html('Please provide a valid email address in order to post a comment.'); //error message
	$("#email").focus();   //focus on email field
	return false;
}


//thank you to this guy: https://stackoverflow.com/questions/8398403/jquery-javascript-to-check-if-correct-e-mail-was-entered
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};