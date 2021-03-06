<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0 
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php _e( 'Bienvenue sur le site de l’association Vivre Gare du Nord et Est.', 'catch-responsive' ); ?>
				</h1>
			</header>

            <p>
				Association de quartier, citoyenne et apolitique.<br>Pour l’amélioration du quartier des Gares du Nord et de l’Est
            </p>

			<h1><span>Nos dernières publications</span></h1>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
                    static $count = 0;

                    if ($count == "3") { break; }
                    else {
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

                    $count++; }
				?>

			<?php endwhile; ?>

			<?php //catchresponsive_content_nav( 'nav-below' ); ?>

            <article class="post">
                <div class="archive-post-wrap">
                    <div class="entry-container">
                        <header class="entry-header">
                            <h1 class="entry-title">Plus des publications</h1>
                        </header>
                        <div class="entry-content">
                            <ul>
                                <?php wp_list_categories('title_li=&show_count=1&exclude=1'); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

        <h1><span>Calendrier</span></h1>
        <?php echo do_shortcode('[calendar id="808"]'); ?>

    </main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>