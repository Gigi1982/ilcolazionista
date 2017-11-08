<?php /* Template Name: Blog custom */ get_header(); ?>

<div class="container">
    
    <div class="col-md-8">
        
        <!-- LAST ARTICLE -->
        <?php
            $customArticleArgs = array(
                'posts_per_page'   => 1,
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );
            $customArticleQuery = new WP_Query( $customArticleArgs );                  
        ?>
        <?php if ($customArticleQuery ->have_posts()): while ($customArticleQuery ->have_posts()) : $customArticleQuery ->the_post(); ?>
            
            <h1><?php _e( 'LA NUOVA COLAZIONE', 'html5blank' ); ?></h1>
        
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
            //global $wp_query, $paged;
        
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $customArticleArgs = array(
                'offset'           => 1,
                'posts_per_page'   => 4,
                'paged'          => $paged,
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true,
            );
            $customArticleQuery = new WP_Query( $customArticleArgs );                  
        ?>
        
        <h1><?php _e( 'PUOI LEGGERE ANCHE', 'html5blank' ); ?></h1>
        
        <?php if ($customArticleQuery ->have_posts()): while ($customArticleQuery ->have_posts()) : $customArticleQuery ->the_post(); ?>
            
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
        
        <nav>
            <ul>
                <li><?php previous_posts_link( '&laquo; PREV', $cpt_query->max_num_pages) ?></li> 
                <li><?php next_posts_link( 'NEXT &raquo;', $cpt_query->max_num_pages) ?></li>
            </ul>
        </nav>
        
        <?php wp_reset_postdata(); ?>
        
        <?php endif; ?>
        <!-- FINE all the rest -->
        
    </div>
    
    <div class="col-md-3">
        <?php get_sidebar(); ?>
    </div>

</div>

<?php get_footer(); ?>