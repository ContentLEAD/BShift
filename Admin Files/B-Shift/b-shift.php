<?php 
    /*
    Plugin Name: B-Shift
    Plugin URI: http://www.brafton.com
    Description: Plugin for displaying sliding or rotating images
    Author: 
    Version: 1.0
    Author URI: http://www.brafton.com
    */
wp_enqueue_script('jquery');
wp_enqueue_script('thickbox');
wp_enqueue_script('media-models');
wp_enqueue_script('media-upload');
wp_enqueue_script('jquery-ui');
wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__).'js/upload-media.js', array());
wp_enqueue_script('add-slider',plugin_dir_url(__FILE__).'js/add_slider.js', array());
wp_enqueue_style('jquery-ui','//code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css');
wp_enqueue_style('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
wp_enqueue_style('bshift',plugin_dir_url(__FILE__).'css/bshift.css', array());

function load_wp_media_files() {
  wp_enqueue_media();
}
add_action('admin_enqueue_scripts','load_wp_media_files' );

?>

<?php
function b_shift_admin() {
    include('b_shift_import_admin.php');

    if (post_type_exists('b-shift-slider')) {
        echo "ok" . '<br>';
        echo get_home_path();
        } else { 
                  echo "not ok...";
                }
}

function b_shift_admin_actions() {
   
    add_menu_page("B-Shift", "B-Shift", 1, "B-Shift", "b_shift_admin");
    add_submenu_page(
        'b-shift', //B-Shift slug
        'Create Slider Page',
        'Create Slider Page',
        'manage_options',
        'slider_settings_page',
        'b_shift_submenu_page_callback'
 );
    add_submenu_page(
        'b-shift', //B-Shift slug
        'Edit Slider Page',
	    'Edit Slider Page',
        'manage_options',
        'edit_slider',
        'b_shift_submenu_page_callback'
 );


}

function b_shift_submenu_page_callback() {
    if(isset($_POST['add_new_slider'])){
    echo "created</br>";
        //call another function to insert post on form submission and return slider id
    $b_slider_id = create_slider();
	include('edit_slider.php');
    }
    elseif(isset($_GET['slider_id'])||isset($b_slider_id)||isset($_POST['update'])){
        include('edit_slider.php');
    } else {
            include('slider_settings_page.php');
        }
} 
add_action('admin_menu', 'b_shift_admin_actions');

add_action( 'init', 'B_Shift_post_register' );

function B_Shift_post_register() {

register_post_type( 'b-shift-slider',
    array(
      'labels' => array(
        'name' => __( 'Slider' ),
        'singular_name' => __( 'Slider' )
      ),
      'public' => false,
      'map_meta_cap'=> true,
      'capabilities'=>array('delete_post'=>'true')

    )
  );
}

function create_slider() {
		global $post;
            $slides = array(array());
        	$title=$_POST['slider_title'];
        	$state=$_POST['state'];
            $delay=$_POST['delay'];
            $height=$_POST['height'];
            $width=$_POST['width'];
            $effect=$_POST['effect'];
            $bgcolor=$_POST['bgcolor'];
            $height_metric=$_POST['height_metric'];
            $width_metric=$_POST['width_metric'];
		    $vars = array(
    			'post_type'=>'b-shift-slider',
    			'post_title'=> $title,
    			'post_status'=> $state,
    			'meta_input'=>array("slider_title"=>$title)
                
    		);
		$post = wp_insert_post( $vars );
		add_post_meta($post,'Slider_Name',$title,unique);
		add_post_meta($post,'Slider_Delay',$delay,unique);
        add_post_meta($post,'Slider_State',$state,unique);
        add_post_meta($post,'Slider_Height',$height,unique);
        add_post_meta($post,'Slider_Height_Metric',$height_metric,unique);
        add_post_meta($post,'Slider_Width',$width,unique);
        add_post_meta($post,'Slider_Effect',$effect,unique);
        add_post_meta($post,'Slider_Bgcolor',$bgcolor,unique);
        add_post_meta($post,'Slider_Width_Metric',$width_metric,unique);

}
/* WP AJAX TEST HERE */

add_action( 'wp_ajax_bshift_action', 'bshift_callback' );

function bshift_callback() {
    global $wpdb; // this is how you get access to the database

    $pid = intval( $_POST['id'] );

    $wid = get_post_meta($pid,'Slider_Width',true);
    $hid = get_post_meta($pid,'Slider_Height',true);
    $eid = get_post_meta($pid,'Slider_Effect',true);
    $ajax_array = array();
    $ajax_array['wid'] = $wid;
    $ajax_array['hid'] = $hid;
    $ajax_array['eid'] = $eid;

    echo json_encode($ajax_array);

        //echo json_encode(var_dump($wpdb));

    die(); // this is required to return a proper result
}

function bshift_shortcode($atts) {

    $a = shortcode_atts( array(
        'id' => 'something'
    ), $atts );
    $post_id =  $a['id'];
    $slides = array(array());
    $slider_title = get_post_meta($post_id,'Slider_Name',true);
    $slides = get_post_meta($post_id,'Slides_Array',true);
    $slide_count = get_post_meta($post_id,'Slides_Array_Count',true);

    ob_start();
    var_dump($slides['content']);
    echo '</br>'. $slider_title;
    echo '<p>';
    for($i=0;$i<$slide_count;$i++) {
        echo $slides['content'][$i];
        echo'</br>';
    }
    echo '</p>';
    return ob_get_clean();
}
add_shortcode('bshift', 'bshift_shortcode');


?>
