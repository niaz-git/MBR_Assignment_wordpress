<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage mytheme
 * @since 1.0.0
 */
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php  echo  get_bloginfo('name') ?></title>
<?php wp_head(); ?>
</head>
<?php if(is_home()){
    $homeclassess = array("main_bg");
}else{
    $homeclassess = array("content_bg");

}?>
<body <?php body_class($homeclassess) ?> >
<!-- header -->
<!-- header -->
<div class="banner">
	<div class="container">
		<div class="header">
			<div class="logo">
				<a href="#" style="font-size:24px; font-weight:bold; color:#fff"> <span  style="font-size:34px; ">[</span> ASSIGNMENT <span  style="font-size:34px; ">]</span></a>
			</div>
				<div class="clearfix"> </div>
			</div>
				<div class="head-nav">
					<span class="menu"> </span>
                    <?php 
                    wp_nav_menu ( array(
                        'menu' => 'primary_menu',
                        'container' => '',
                        'items_wrap' =>'<ul class="cl-effect-15">%3$s</ul>'
                    ));
                    ?>
				</div>
               				 
	</div> 
</div>
<!-- header -->

