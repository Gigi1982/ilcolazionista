<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <main role="main">
                    <!-- section -->
                    <section>

                        <h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                        <?php 
                        //$category = get_the_category(); 
                        //echo $category[0]->name;

                        $postImage = get_the_post_thumbnail_url();
                        ?>


                            <!-- article -->
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <span class="categories-title"><?php the_category(', '); ?></span>
                                    <div class="post-content">
                                        <!-- post thumbnail -->
                                        <div class="post-image-container">
                                            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                                <a class="visible-md visible-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php the_post_thumbnail(array(150,150)); // Declare pixel size you need inside the array ?>
                                                </a>
                                                <a class="visible-xs visible-sm" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php the_post_thumbnail(array(740,740)); // Declare pixel size you need inside the array ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /post thumbnail -->

                                        <!-- post title -->
                                        <div class="post-text-container">
                                            <h2>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            <!-- /post title -->

                                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
                                        </div>
                                    </div>

                            </article>
                            <!-- /article -->

                        <?php endwhile; ?>
                        
                        <a href="<?php echo esc_url( get_page_link( 611 ) ); ?>" class="btn btn-default read-more blog">Read more articles</a>
                        <?php ?>

                        <?php else: ?>

                            <!-- article -->
                            <article>
                                <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
                            </article>
                            <!-- /article -->

                        <?php endif; ?>

                        <?php // get_template_part('pagination'); ?>

                    </section>
                    <!-- /section -->
                </main>
            </div>
            <div class="col-md-4 visible-md visible-lg">
                <?php get_sidebar(); ?>
            </div>
        </div>
        
        
    </div>


<?php get_footer(); ?>