<?php get_header(); ?>

	<main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- 404 page -->
                    <section class="404-page">

                        <!-- article -->
                        <article id="post-404">

                            <h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
                            <h2>
                                <a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
                            </h2>

                        </article>
                        <!-- /article -->

                    </section>
                    <!-- /section -->
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
		
	</main>

<?php get_footer(); ?>
