<?php get_header(); ?>

	<main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- search section -->
                    <section class="search-results">

                        <h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

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
		
	</main>



<?php get_footer(); ?>
