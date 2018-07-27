<?php get_header(); ?>
<?php
if ( isset($_GET['isbn']) ) {
	$args  = array(
		'post_type' => 'book',
		'meta_query' => array(
			array(
				'key' => 'book_info_isbn',
				'value' => $_GET['isbn'],
				'compare' => '=',
			)
		)
	);
	$query = new WP_Query( $args );
}
else {
    global $wp_query;
    $query = $wp_query;
}
?>
    <h2><?php _e('Books', 'books'); ?></h2>
    <div class="row mt-4 mb-2">
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="card-text mb-auto"><?php echo get_the_excerpt( get_the_ID() ); ?></p>
                        <a href="<?php the_permalink(); ?>"><?php _e('Continue reading', 'books'); ?></a>
                    </div>
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'medium' );
					}
					?>
                </div>
            </div>
		<?php endwhile; ?>
		<?php endif; ?>
    </div>

<?php get_footer(); ?>