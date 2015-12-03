<?php
/*
Plugin Name: B-Shift
Plugin URI: http://www.brafton.com
Description: A less than premium qulaity slider application.
Author: Brafton
Version: 1

*/
include 'register-settings.php';



function b_shift_admin_actions() {
    add_menu_page("B-Shift Settings", "B-Shift Settings", "administrator", "b-shift-settings", "b_shift_admin_page","dashicons-admin-generic");
}
 
add_action('admin_menu', 'b_shift_admin_actions');

function b_shift_admin_page() { ?>

<div class="wrap">
<h2>Slider Options</h2>

<form method="post" action="options.php">
    <?php settings_fields('b-shift-settings-group'); ?>
    <?php do_settings_sections('b-shift-settings-group'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Text</th>
        <td><input type="text" name="b-shift-text" value="<?php echo esc_attr( get_option('b-shift-text') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Speed</th>
        <td><input type="text" name="b-shift-speed" value="<?php echo esc_attr( get_option('b-shift-speed') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Height</th>
        <td><input type="text" name="b-shift-height" value="<?php echo esc_attr( get_option('b-shift-height') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>

<?php
	}
?>