<?php
get_header();
$author = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
    <div class="single-author-detail">
        <h3><?php echo $author->name; ?></h3>
        <p><?php echo $author->description; ?></p>
        <hr>
        <h4><?php _e( 'Books by the author', 'books' ); ?></h4>
		<?php
		// Get all books by current Author
		$args  = array(
			'post_type' => 'book',
			'tax_query' => array(
				array(
					'taxonomy' => 'book_author',
					'field'    => 'slug',
					'terms'    => $author->slug
				)
			)
		);
		$query = new WP_Query( $args );
		?>
        <div class="row mb-2">
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h5 class="mb-0">
                                <a class="text-dark"
                                   href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p class="card-text mb-auto"><?php echo get_the_excerpt( get_the_ID() ); ?></p>
                            <a href="<?php the_permalink(); ?>">Continue reading</a>
                        </div>
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'medium' );
						}
						?>
                    </div>
                </div>
			<?php
			endwhile;
			endif;
			wp_reset_postdata();
			?>
        </div>
    </div>
<?php get_footer(); ?>