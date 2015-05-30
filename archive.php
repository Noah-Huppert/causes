<?php 
/*
Template Name: Archive
*/
get_header();
?>

<?php if(is_page()): ?>

<div class="content">
	<span class="title">Blog Archive</span>
	<div class="body">
		<?php wp_get_archives(); ?>
	</div>
</div>

<?php else: ?>

<div class="container">

	<a class="waves-effect waves-light btn background-secondary" style="margin-top: 20px;" href="<?php echo get_site_url(); ?>/Blog">Back</a>

	<div class="row">
	<?php while (have_posts()): the_post();?>
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-content">
					<span class="card-title color-secondary"><?php the_title() ?></span>
					<p><?php echo get_the_excerpt(); ?></p>
				</div>

				<div class="card-action">
					<a href="<?php echo get_the_permalink(); ?>" class="color-secondary">Read More</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
</div>

<?php endif; ?>


<?php 
global $footer_show_recent_posts;
$footer_show_recent_posts = false;
get_footer();
?>