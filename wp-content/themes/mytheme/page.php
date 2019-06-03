<?php
get_header();
?>

<div>
<?php
if(have_posts()){
    while(have_posts()){
the_post();

?>
<!-- content -->
<div class="content">
	<div class="container">
<h1> <a href="<?php echo  get_the_permalink();?>"> <?php echo get_the_title();?></a>  </h1>
<p> <?php echo get_the_content();?> </p>
<?php
    }
}

?>
</div></div>
</div>


<?php
get_footer();
?>



