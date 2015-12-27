<?php
/**
 * The template used for displaying post content in single.php
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	/** 
	 * catchresponsive_before_post_container hook
	 *
	 * @hooked catchresponsive_single_content_image - 10
	 */
	do_action( 'catchresponsive_before_post_container' ); ?>

	<div class="entry-container">
		<header class="entry-header">
			<?php the_post_thumbnail( 'thumbnail' ); ?>

			<div class="title">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php catchresponsive_entry_meta(); ?>
                <?php echo do_shortcode('[shareaholic app="share_buttons" id="523823"]'); ?>
            </div>
		</header><!-- .entry-header -->

		<div class="entry-content">

            <?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="pages">' . __( 'Pages:', 'catch-responsive' ) . '</span>',
					'after'  => '</div>',
					'link_before' 	=> '<span>',
                    'link_after'   	=> '</span>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php catchresponsive_tag_category(); ?>
            <br/><br/>
            <h1 class="contact"><a href="/contact">Nous écrire</a></h1>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-container -->
</article><!-- #post-## -->
