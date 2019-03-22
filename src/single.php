<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <!-- post title -->
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <!-- /post title -->
                            
                            <!-- details -->
                            
                            <span class="category-label"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
                            <span class="date"><?php _e( 'Pubblicato il', 'html5blank' ); ?> <?php the_time('j F, Y'); ?> | <?php _e( 'da', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>

                            <!-- /post details -->

                            <!-- post thumbnail -->
                            <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                                </div>
                            <?php endif; ?>
                            <!-- /post thumbnail -->

                            <?php the_content(); // Dynamic Content ?>

                            <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

                            

                            <p><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p>

                            <?php comments_template(); ?>

                        </article>
                        <!-- /article -->

                    <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            
        </div>
	</section>
	<!-- /section -->
	</main>
<?php get_footer(); ?>
