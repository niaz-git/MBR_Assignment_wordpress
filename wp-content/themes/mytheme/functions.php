<?php 
/**
 * Description:  This function used for load Scripts 
 * Author: Niyaz Shoukath  */

 /*================================================================================
                            INCLUDE SCRIPTS
 ==================================================================================
 */
function my_scripts(){
    //stylesheets
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css'); 
    wp_enqueue_style('style_file', get_template_directory_uri().'/css/style.css'); 
    wp_enqueue_style('main_file',  get_stylesheet_uri().'/css/style.css'); 

    //scripts 
   wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.min.js',array(), '1.1',true); 
   wp_enqueue_script('ajcall', get_template_directory_uri().'/js/ajcall.js',array(), '1.1',true); 
}
//Attach with action hook

add_action("wp_enqueue_scripts","my_scripts");

 /*================================================================================
                            ADMIN SCRIPTS -  FOR LOAD AJAX CALL
 ==================================================================================
 */
function my_enqueue($hook) {
   /* if ( 'edit.php' != $hook ) {
        return;
    }*/
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css'); 


    wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.min.js',array(), '1.1',true); 
    wp_enqueue_script('ajcall', get_template_directory_uri().'/js/ajcall.js',array(), '1.1',true); 
 
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

 /*================================================================================
                            THEME SETUP
 ==================================================================================
 */
function  reg_mytheme_setup(){
    add_theme_support("menus");
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'text_domain' ),
        'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
    ) );
}
//add_action("after_setup_theme","reg_mytheme_setup");
add_action("init","reg_mytheme_setup");


 /*================================================================================
                            EXCERPT -  SUMMARY LIMIT
 ==================================================================================
 */
function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( ' <a href="%1$s" class="link">%2$s</a> ',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/*================================================================================
                            INSERT THUMBNAIL FOR POST
 ==================================================================================
 */
add_theme_support('post-thumbnails');
/*================================================================================
                            SIDEBAR FUNCTION
 ==================================================================================
 */

 function mytheme_widget_setup(){
     register_sidebar(array(
         'name' =>'Sidebar',
         'id' => 'sidebar-1',
         'class' => 'custom',
         'description'=>'standard Sidebar',
         'before_widget'=> '<aside id="%1$s" class="widget %2$s">',
         'after_widget' => '</aside>',
         'before_title' => '<h1 class="widget-title">',
         'after_title'  => '</h1>',

     ));
 }
 add_action('widgets_init','mytheme_widget_setup');

 


 /*================================================================================
                            SIMPLE ALERT
 ==================================================================================
 */


function add_menu_setting_panel(){


    add_submenu_page( 'options-general.php', 'Simple Alert', 'Simple Alert', 'manage_options', 'simple-alert-slug', 'wps_simple_alert');
  

}
  add_action('admin_menu', 'add_menu_setting_panel');
   
  function wps_simple_alert(){

    ?>
    <div>
    <form action="options.php" method="post">
    <?php
    settings_fields("section");
    //do_settings_sections("simple-alert-slug");
    do_settings_sections("simple-alert-slug");
     ?>
<!--<div class="row"><div class="col-md-2"><label>choose Post Types</label></div><div class="col-md-3"> -->
     <?php 
/*
$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

$post_types = get_post_types( $args, $output, $operator ); 

foreach ( $post_types  as $post_type ) {

   echo ' <div class="col-md-3"><input type="checkbox" name="posttype[]" class="posttype" id="posttype" value="'.  $post_type . '">' . $post_type . '</div>';
}
*/
?>
<!--</div>
</div>
<div class="row"><div class="col-md-2"><label>Select Items</label></div>
<div class="col-md-5">
<select id="bloglistselect" multiple  class="form-control" style="height:300px;"></select>
</div>
</div>!-->


     <?php
     submit_button();
    ?>
    </form>
    </div>
    <?php
         
  }
  add_action("admin_init","simple_alert_settings");


  function simple_alert_settings(){
      add_settings_section(
          "section",
          "Simple Alert ",
          null,
          "simple-alert-slug"
      );

      add_settings_field(
          "alert_text",
          "Alert Text",
          "display_alert_text",
          "simple-alert-slug",
          "section"
      );

      add_settings_field(
        "posttype",
        "Post Types",
        "display_post_types",
        "simple-alert-slug",
        "section"
    );
    add_settings_field(
        "bloglistselect",
        "Items",
        "display_post_list",
        "simple-alert-slug",
        "section"
    );

    

      //step III - we need to add area add this channel
      register_setting("section","alert_text");
      register_setting("section","posttype");

      register_setting("section","bloglistselect");


  }


  function display_alert_text(){
      ?>
<input type="text" class="form-control input-lg" name="alert_text" id="alert_text" value="<?php echo get_option('alert_text');?>" />
      <?php
  }


  function display_post_types(){
      ?>
<?php
$args = array(
    'public'   => true
   // '_builtin' => false
 );
$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

$post_types = get_post_types( $args, $output, $operator ); 

foreach ( $post_types  as $post_type ) {

    $getposttype = get_option('posttype');
    foreach($getposttype as $pst){
        if($pst == $post_type)
        echo ' <div class="col-md-2"><input type="checkbox" checked name="posttype[]" class="posttype" id="posttype" value="'.  $post_type . '">' . $post_type . '</div>';
        else
        echo ' <div class="col-md-2"><input type="checkbox" name="posttype[]" class="posttype" id="posttype" value="'.  $post_type . '">' . $post_type . '</div>';

    }
}

?>
      <?php
  }


  function display_post_list(){?>
    <select id="bloglistselect" multiple name="bloglistselect[]"  class="form-control" style="height:300px;">
   <?php
  $first_post_ids = get_posts( array(
    //'fields'         => 'post_name', // only return post ID´s
    //'posts_per_page' => '5',
    'simple_alert'      => 1,
));
foreach($first_post_ids as $pst){
    ?>
    <option value="<?php echo $pst->id ?>"  style="padding:5px; border-bottom:1px dashed #dddddd" selected><?php echo $pst->post_name ?></option>
    <?php
}

   ?>
    </select>
    <?php
  }



  /** =========================================================================
   *                        CREATE META TAG 
   * ==========================================================================
   */
  function create_mettag_authors(){
    add_meta_box('res_authors', 'contributors', 'respons_author_call','post','normal');
}

function respons_author_call($post){
    wp_nonce_field('response_authors_name_data', 'response_authors_name_meta_box_nonce');
$value = get_post_meta($post->ID, 'contributors_key',true);
echo '<label> select contributors</label>';

$roles = array( 'administrator', 'author', 'editor');

$users = array();
foreach($roles as $role){
  $args = array(
               'role' => $role
               );
  $current_role_users = get_users($args);
  $users = array_merge($current_role_users, $users);
}
//value="'.esc_attr($value).'"
echo '<select name="response_authors_name_txt[]" style="width:100%" multiple id="response_authors_name_txt" >';

foreach($users as $user){
echo '<option value="'. esc_html( $user->ID ) .'" style="padding:5px; border-bottom:1px dashed #dddddd">'. esc_html( $user->display_name ) .'</option>';
}
echo "</select>";

}
add_action('add_meta_boxes','create_mettag_authors');

// ======================================

function response_authors_name_data($post_id){
  if(!isset($_POST["response_authors_name_meta_box_nonce"]))
  return;

  if(!wp_verify_nonce($_POST["response_authors_name_meta_box_nonce"],'response_authors_name_data'))
  return;
  if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE )
  return;

  if(!current_user_can('edit_post',$post_id))
  return ;

  if(!isset($_POST["response_authors_name_txt"]))
  return;

  $mydata = $_POST["response_authors_name_txt"];

  update_post_meta($post_id,'contributors_key', $mydata);
}
add_action('save_post', 'response_authors_name_data');

    
 
?>