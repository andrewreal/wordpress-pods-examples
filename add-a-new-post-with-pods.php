<?php
/* Add a new post with Pods from PHP */
/*

In this example we assume that we have created a Question and Answer ('question') content type with Pods
The question content type has the following Pods Fields
	Title 		- 					- The standard WordPress post Title
	Asked By 	- 	asked_by		- Just a simple Plain Text field (Let's not worry about WordPress Userss at this stage)
	Email 		- 	email 			- Email address of the person asking the question
	Question	- 	question 		- A Plain Text (multiline) field for the text of the question
	Answer		- 	answer 			- A Plain Text (multiline) field for the text of the answer

*/

function submit_question(){
	// Let's grab the question info from a submitted form - This could be in response to an Ajax call.
	$name = $_POST['name'];   			// The name of the person asking the question
	$email = $_POST['email'];			// The email address of the person asking the question
	$title = $_POST['title'];			// The title field
	$question = $_POST['question'];		// The text of the question
	// Now build an array with the post data
	$new_question = array (
			'name'			=>	wp_strip_all_tags($title);	// Note that 'name' is the post title in Pods
			'asked_by'		=>	wp_strip_all_tags($name);	// This is the $name from the form, not the name of the post
			'email'			=>	sanitize_email( $email );
			'question'		=>	sanitize_text_field($question);
		);
	// Check that all fields are supplied and return error if any are empty, in this example via an Ajax response
	if (array_search('', $new_question)) {
		return wp_send_json('One or more items are empty.' );
		die();
	}
	// Set up a pod variable for posting
	$pod = pods('question');
	$new_question_id = $pod->add($new_question);
	// The question has been posted to the WordPress database and we have an ID (post ID) to work with, for exaple to give a response ID number.
	return wp_send_json('Your question has been submitted with question ID ' . $new_question_id );
	die();

}

?>