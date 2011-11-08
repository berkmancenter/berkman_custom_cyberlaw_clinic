<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
                        <?php
                            $post_type = get_post_meta($post->ID, 'post_type', true);
                            $contents = array();
                            if (!empty($post_type)) {
                                $args = array(
                                  'post_type' => $post_type,
                                  'post_status' => 'publish',
                                  'order' => 'ASC',
                                  'orderby' => 'menu_order'
                                );
                                $my_query = new WP_Query($args);
                                if ( $my_query->have_posts() ) { 
                                   while ( $my_query->have_posts() ) { 
                                       $my_query->the_post();
                                       $contents[] = get_the_content();
                                   }
                                }
                                echo implode('<hr />', $contents);
                                wp_reset_postdata();
                            }
                        ?>
						<?php $children = wp_list_pages(array('title_li' => '', 'child_of' => $post->ID, 'echo' => 0, 'sort_column' => 'post_title,menu_order'));
						if ($children) { ?>
						<ul>
						<?php echo $children; ?>
						</ul>
						<?php } ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
