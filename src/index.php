<?php get_header(); ?>

<?php 
    $postShown = array();
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">

            <!-- LAST ARTICLE -->
            <?php
                $mainArticleArgs = array(
                    'posts_per_page'   => 1,
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                    'suppress_filters' => true 
                );
                $mainArticleQuery = new WP_Query( $mainArticleArgs );                  
            ?>
            <?php if ($mainArticleQuery ->have_posts()): while ($mainArticleQuery ->have_posts()) : $mainArticleQuery ->the_post(); ?>
            <?php 
                array_push($postShown, get_the_ID());
            ?>

                <h1><?php _e( 'LAST BREAKFAST', 'html5blank' ); ?></h1>

            <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <span class="categories-title"><?php the_category(', '); ?></span>
                        <div class="">
                            <!-- post thumbnail -->
                            <div class="post-image-container">
                                <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                    <a class="" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <!-- FINE LAST ARTICLE -->


            <!-- ALL THE REST -->
            <?php
                global $wp_query, $paged;

                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $restArticleArgs = array(
                    //'offset'           => 1,
                    'posts_per_page'   => 8,
                    'paged'          => $paged,
                    'post_type'        => 'post',
                    'post__not_in'     => $postShown,
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );
                $restArticleQuery = new WP_Query( $restArticleArgs );                  
            ?>

            <h1><?php _e( 'PUOI LEGGERE ANCHE', 'html5blank' ); ?></h1>

            <?php if ($restArticleQuery ->have_posts()): while ($restArticleQuery ->have_posts()) : $restArticleQuery ->the_post(); ?>

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
            <div class="mobile-fullscreen--half js-show-scroll">
                <div class="shadowed-box news-archive-pagination page-block">
                    <?php if($restArticleQuery ->found_posts > 5): ?>
                    <nav class="navigation pagination" role="navigation">
                        <div class="nav-links">
                            <?php
                            $big = 999999999;
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $restArticleQuery ->max_num_pages,
                                'prev_next' => false
                            ) );
                            ?>
                        </div>
                    </nav>
                    <?php endif; ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>

            <?php endif; ?>
            <!-- FINE all the rest -->

        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>    
</div>

<?php get_footer(); ?>