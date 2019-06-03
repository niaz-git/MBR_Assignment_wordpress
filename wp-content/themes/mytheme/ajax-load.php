<?php 
/**
 * Plugin Name: Ajax Test
 * Plugin URI: https://github.com/itsmeNiyaz
 * Description: This is a plugin that allows us to test Ajax functionality in WordPress
 * Version: 1.4.0
 * Author: Niyaz Shoukath
 * Author URI: https://github.com/itsmeNiyaz
 */

 // hook into admin-ajax
// the text after 'wp_ajax_' and 'wp_ajax_no_priv_' in the add_action() calls
// that follow is what you will use as the value of data.action in the ajax
// call in your JS


/** Load WordPress Bootstrap */



// if the ajax call will be made from JS executed when user is logged into WP,
// then use this version
add_action ('wp_ajax_call_Get_posts_by_type', 'call_Get_posts_by_type') ;
// if the ajax call will be made from JS executed when no user is logged into WP,
// then use this version
add_action ('wp_ajax_nopriv_call_Get_posts_by_type', 'call_Get_posts_by_type') ;

function call_Get_posts_by_type ()
{
    
    if (!isset ($_REQUEST['id'])) {

       // foreach($_REQUEST['types'])
      
        // set the return value you want on error
        // return value can be ANY data type (e.g., array())
        $return_value = 'your error message' ;

        wp_send_json_error ($return_value) ;
        }
        $return_value = '' ;
    // $data = array(); 
    $a=array();
    $str ='';
//array_push($a,"blue","yellow");
   // wp_send_json_success ($return_value) ;

  $count_arr =  count($_REQUEST['id'] );

  foreach ($_REQUEST['id'] as $key => $value)  
  {  
         array_push($a,$value);
  }
  $second_post_ids = get_posts( array(
    //'fields'         => 'post_name', // only return post ID´s
    //'posts_per_page' => '5',
    'post_type'      => $a[0],
));



  for($i= 1;$i<  $count_arr; $i++){

    $first_post_ids = get_posts( array(
        //'fields'         => 'post_name', // only return post ID´s
        //'posts_per_page' => '5',
        'post_type'      => $a[$i],
    ));
    $second_post_ids =array_merge( $second_post_ids, $first_post_ids);

  }

  wp_send_json_success (  $second_post_ids) ;


}

