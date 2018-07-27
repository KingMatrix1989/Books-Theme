<?php
/*
Template Name: Books Search Form
Template Post Type: page
*/

get_header();
?>
    <div class="text-center">
        <h3><?php _e('Search books by ISBN', 'books'); ?></h3>
        <form role="search" action="<?php echo site_url( '/books' ); ?>" method="get" id="books-search-form">
            <input type="text" name="isbn" placeholder="Search by ISBN"/>
            <input type="submit" alt="Search" value="<?= _e('Search', 'books'); ?>"/>
        </form>
    </div>
<?php get_footer(); ?>