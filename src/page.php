<?php get_header(); ?>

	<main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- section -->
                    <section class="internal-pages">

                        <h1><?php the_title(); ?></h1>

                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php the_content(); ?>


                            <br class="clear">

                        </article>
                        <!-- /article -->

                    <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>

                    </section>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            
        </div>
		<!-- /section -->
	</main>



<?php get_footer(); ?>
