<?php

add_action( 'admin_init', 'b_shift_settings' );


function b_shift_settings() {

	
	register_setting('b-shift-settings-group','b-shift-text');
	register_setting('b-shift-settings-group','b-shift-speed');
	register_setting('b-shift-settings-group','b-shift-height');

}

?>