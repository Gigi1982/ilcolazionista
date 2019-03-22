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

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
