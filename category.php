<?php get_header(); ?>

	<main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="category-listing">

                        <h1><?php _e( 'Post sotto la categoria:', 'html5blank' ); ?> <?php single_cat_title(); ?></h1>

                        <?php get_template_part('loop'); ?>

                        <?php get_template_part('pagination'); ?>

                    </section>
                    <!-- /section -->
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
		<!-- section -->
		
	</main>

<?php get_footer(); ?>
