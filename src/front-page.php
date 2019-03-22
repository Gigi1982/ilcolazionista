<?php /* Template Name: Home */ get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            
            
            <h2><?php _e( 'IL COLAZIONISTA', 'html5blank' ); ?></h2>
            
            <?php 
                //if(have_rows('slideshow_home')): 
            ?>
            
            <!-- <section class="slide-home">
                <ul class="slideColazionista">
                    <?php 
                        //while (have_rows('slideshow_home')) : the_row(); 
                    ?>
                    <li><img class="img-responsive" src="<?php //echo get_sub_field('immagine_slideshow'); ?>"></li>
                    <?php //endwhile; ?>
                </ul>
            </section> -->
            <?php //endif; ?>
            
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


            <?php if ($restArticleQuery ->have_posts()): while ($restArticleQuery ->have_posts()) : $restArticleQuery ->the_post(); ?>

            <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <span class="categories-title"><?php the_category(', '); ?></span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-image-container">
                                <?php if ( has_post_thumbnail()) : ?>
                                    <a class="visible-md visible-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url();?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <div class="post-text-container">
                                    <h2>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                    </h2>

                                    <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- /article -->
            <?php endwhile; ?> 
            <div class="pagination-container">
                <div class="page-block">
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