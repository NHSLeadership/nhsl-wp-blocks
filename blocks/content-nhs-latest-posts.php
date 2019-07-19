<?php
/**
 * Block Name: NHS Latest News
 *
 * Simple panel element to display latest news, if required this can be filtered by category.
 */

$columns = get_field('columns');
$total = get_field('posts');
if ($columns == 2) {
    $width = 'half';
} else {
    $width = 'third';
}
$args = array(
    'posts_per_page'   => $total,
    'post_status'      => 'publish',
    'post_type'        => 'post',
    'order'            => 'DESC',
    'orderby'          => 'date',
);
/*
 * removing for the moment as not defined in block. @todo
if ( isset( $attributes['categories'] ) ) {
    $category = $attributes['categories'];
} else {
    $category = '';
}
*/



// the query
$the_query = new WP_Query( $args);
echo '<div class="nhsuk-grid-row">


          <div class="nhsuk-panel-group">';
    $i = 1;
 if ( $the_query->have_posts() ) :
     while ( $the_query->have_posts() ) : $the_query->the_post();
            echo '<div class="nhsuk-grid-column-one-'.$width.' nhsuk-panel-group__item">
                     <div class="nhsuk-panel"><h3>';
            the_title();
            echo '</h3>';
            the_post_thumbnail();
            the_excerpt();
            echo nightingale_2_0_read_more();
            echo '   </div>
                  </div>';
            if ($i == $columns) {
                echo '</div><div class="nhsuk-panel-group">';
                $i = 0;
            }

         $i++;
     endwhile;
    wp_reset_postdata();
 else :
       echo '<p>'. __('No News').'</p>';
 endif;


?>
