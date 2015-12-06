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

function catchresponsive_entry_meta() {
    echo '<p class="entry-meta">';

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    printf( '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
        sprintf( _x( '<span class="screen-reader-text">Posted on</span>', 'Used before publish date.', 'catch-responsive' ) ),
        esc_url( get_permalink() ),
        $time_string
    );


    edit_post_link( esc_html__( 'Edit', 'catch-responsive' ), '<span class="edit-link">', '</span>' );

    echo '</p><!-- .entry-meta -->';
}