<?php 
    /*
    Plugin Name: B-Shift
    Plugin URI: http://www.brafton.com
    Description: Plugin for displaying sliding or rotating images
    Author: 
    Version: 1.0
    Author URI: http://www.brafton.com
    */
//wp_enqueue_script('jquery');
wp_enqueue_script('thickbox');
wp_enqueue_script('media-models');
wp_enqueue_script('media-upload');
wp_enqueue_script('jquery-ui');
wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__).'js/upload-media.js', array());
wp_enqueue_script('add-slider',plugin_dir_url(__FILE__).'js/add_slider.js', array());
wp_enqueue_script('bshift-js',plugin_dir_url(__FILE__).'js/bshift.js', array());
wp_enqueue_style('sass',plugin_dir_url(__FILE__).'css/new_sass.css', array());
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
    
    global $wpdb; 

    $pid = intval( $_POST['id'] );
    ob_start();
    $current = get_post_meta($pid,'Slides_Array_Count',true);
    $editor_id = 'slide_editor'.$current;
    $settings = array( 'media_buttons' => false, 'textarea_name'=> 'slide_content[]','editor_height'=>'75px','editor_css'=>'<style>.wp-editor-wrap{width: 175px;}a#content-tmce, a#content-tmce:hover, #qt_content_fullscreen textarea{ display:none;}</style>');
    $content = "";
    wp_enqueue_script('jquery');
    wp_enqueue_script('tiny_mce');
    wp_enqueue_script('thickbox');
    wp_editor($content,$editor_id, $settings);


    $link = ob_get_contents();
    ob_end_clean();
    $cid = $link;
    $wid = get_post_meta($pid,'Slider_Width',true);
    $hid = get_post_meta($pid,'Slider_Height',true);
    $eid = get_post_meta($pid,'Slider_Effect',true);
    $did = get_post_meta($pid,'Slider_Delay',true);
    $lid = get_post_meta($pid,'Slides_Array_Count',true);
    $widm = get_post_meta($pid,'Slider_Width_Metric',true);
    $ajax_array = array();
    $ajax_array['wid'] = $wid;
    $ajax_array['hid'] = $hid;
    $ajax_array['eid'] = $eid;
    $ajax_array['did'] = $did;
    $ajax_array['lid'] = $lid;
    $ajax_array['cid'] = $cid;
    $ajax_array['widm'] = $widm;

    echo json_encode($ajax_array);

        //echo json_encode(var_dump($wpdb));

    die(); 
}

function bshift_shortcode($atts) {

    $a = shortcode_atts( array(
        'id' => 'something'
    ), $atts );
    $post_id =  $a['id'];
    $slides = array(array());
    $slider_title = get_post_meta($post_id,'Slider_Name',true);
    $slider_state = get_post_meta($post_id,'Slider_State',true);
    $slides = get_post_meta($post_id,'Slides_Array',true);
    $slide_count = get_post_meta($post_id,'Slides_Array_Count',true);
    $total_width = get_post_meta($post_id,'Slider_Width',true) . get_post_meta($post_id,'Slider_Width_Metric',true);
  

    
    ob_start(); /*
    var_dump($slides['content']);
    echo '</br>'. $slider_title;
    echo '<p>';
    for($i=0;$i<$slide_count;$i++) {
        echo $slides['content'][$i];
        echo'</br>';
    }
    echo '</p>'; */?>

    <div class="b-outer-frame">
        <ul class="b-frame normal-slider fullwidth-slider" style="background-color: #000; height: <?php echo get_post_meta($post_id,'Slider_Height',true); echo get_post_meta($post_id,'Slider_Height_Metric',true); ?>; width: <?php echo get_post_meta($post_id,'Slider_Width',true); echo get_post_meta($post_id,'Slider_Width_Metric',true); ?>;">

            <!-- Each li should have the animation specified not the ul -->
            <?php /*foreach($slides as $slide){ if($slide['state']=='published'){ */?>
            <?php for($i=0;$i<$slide_count;$i++) {  if($slider_state == 'published'){ ?>
            <li id="<?php echo $post_id; ?>" class="<?php echo $post_id .' '.$slides['effect'][$i] ?>" 
                data-speed="<?php echo $slides['delay'][$i]; ?>" data-effect="<?php echo $slides['effect'][$i]; ?>" style="background-image: url('<?php echo $slides['slide_upload'][$i]; ?>'); background-size:cover; width: <?php echo $slides['width'][$i]; echo $slides['width_metric'][$i]; ?>; height: 100%; background-position: 0, <?php echo $total_width; ?>;  ">
                    <!-- this div needs to be placed perfect center not center text.  contrain it so it is not 100% of the parent container add slight padding and center div horiz and vertic.  DO NOT center content -->     
                <div class="b-shift-content">
                    <!-- need to start setting some basic constraitns on the elements to ensure they always render as good as possible under minimal settings. -->
                <span class="slide-nav-left" data-direction="left"></span>
                <span class="slide-nav-right" data-direction="right"></span>                    
                    
                    <?php echo $slides['slide_content'][$i]; echo $slides['width_metric'][$i];?>

                </div>
            </li>

            <?php } } ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('bshift', 'bshift_shortcode');


?>