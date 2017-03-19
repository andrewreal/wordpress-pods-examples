<?php
/*	Group Pods fields into Meta Boxes

Group Pods fields to pull related fields together in the WP_Admin user interface.
Also allows you to set the title of the group instead of "More Fields". 

*/

function blaze_metaboxes ( $type, $name ) { 
    pods_group_add( 'meta-box-one', 'Meta Box One', 
    				'field_one,
    				field_two,
    				field_three
			'); 
    pods_group_add( 'meta-box-two', 'Meta Box Two', 
    				'field_four,
    				field_five,
    				field_six
			'); 
}

// Group question details - Hook into Pods Metaboxes 
add_action( 'pods_meta_groups', 'blaze_metaboxes', 10, 2 );
