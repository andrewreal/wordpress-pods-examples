<?php
/* Find a user by a boolean value */
/*

In this example we assume that the WordPress Users content type has been expanded with a booleam field with Pods 
We'll call our field 'Featured' and return array of featured users.

*/

function featured_users(){
	$params = array(
			'limit'	=> -1, 	//Unlimited 
			'where'	=> 'featured.meta_value = true'
		);

	$userpod = pods('user', $params);
	while ($userpod->fetch()){
		// Let's display some fields from each user
		echo $userpod->display('ID'); 			// The users ID
		echo $userpod->display('user_email');	// The users email address
	}
}


?>