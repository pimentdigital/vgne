<?php
/**
 * Child Theme functions and definitions
 *
 */

add_action( 'wp_enqueue_scripts', 'catch_child_enqueue_styles' );

function catch_child_enqueue_styles() {
    wp_enqueue_style( 'catch-parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Shows Header Right Social Icon & newsletter sign up
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_header_right() { ?>
    <aside class="sidebar sidebar-header-right widget-area">
        <section class="widget widget_newsletter" id="header-right-search">
            <div class="widget-wrap">
                <?php //echo do_shortcode('[mc4wp_form id="819"]'); ?>
            </div>
        </section>
        <?php if ( '' != ( $catchresponsive_social_icons = catchresponsive_get_social_icons() ) ) { ?>
            <section class="widget widget_catchresponsive_social_icons" id="header-right-social-icons">
                <div class="widget-wrap">
                    <?php echo $catchresponsive_social_icons; ?>
                </div><!-- .widget-wrap -->
            </section><!-- #header-right-social-icons -->
            <?php
        } ?>
    </aside><!-- .sidebar .header-sidebar .widget-area -->
    <?php
}

function catchresponsive_archive_content_image() {
    $options = catchresponsive_get_theme_options();

    $featured_image = $options['content_layout'];

    if ( has_post_thumbnail() && 'excerpt-image-left' == $featured_image ) {
        ?>
        <figure class="featured-image">
            <a rel="bookmark" href="<?php the_permalink(); ?>">
                <?php
                the_post_thumbnail( 'catchresponsive-featured' );
                ?>
            </a>
        </figure>
        <?php
    }
}