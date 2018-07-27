<?php get_header(); ?>
    <div class="single-book-detail">
        <div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-4 col-md-5">
                    <div class="book-thumnbnail">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
                    <?php
                        $book_isbn = get_post_meta( get_the_ID(), 'book_info_isbn', true );
                        $book_authors = wp_get_post_terms( get_the_ID(), 'book_author' );
                        $book_publisher = wp_get_post_terms( get_the_ID(), 'book_publisher' )[0];
                    ?>
                    <ul class="book-details-list">
                        <li><strong><?php _e('ISBN', 'books' ); ?>:   </strong><?php echo $book_isbn;?></li>
                        <li>
                            <strong><?php _e('Author(s)', 'books' ); ?>:   </strong>
                            <?php
                            $list = [];
                            foreach ( $book_authors as $author ) {
	                            $author_link = get_term_link( $author );
	                            if ( ! is_wp_error( $author_link ) )
		                            $list[] = '<a href="'. $author_link . '">' . $author->name . '</a>';
                            }
                            echo implode( ', ', $list );
                            ?>
                        </li>
                        <li>
                            <strong><?php _e('Publisher', 'books' ); ?>:   </strong>
		                    <?php
			                    $publisher_link = get_term_link( $book_publisher );
			                    if ( ! is_wp_error( $publisher_link ) )
				                    echo '<a href="'. $publisher_link . '">' . $book_publisher->name . '</a>';
		                    ?>
                        </li>
                    </ul>
                </div>
			<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>