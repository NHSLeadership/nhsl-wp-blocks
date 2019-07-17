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
//    'order'            => $attributes['order'],
//    'orderby'          => $attributes['orderBy'],
    'suppress_filters' => false,
);
/*
 * removing for the moment as not defined in block. @todo
if ( isset( $attributes['categories'] ) ) {
    $args['category'] = $attributes['categories'];
}
*/

$recent_posts = wp_get_recent_posts( $args );



$list_items_markup = '<div class="nhsuk-grid-row">

          <div class="nhsuk-panel-group">';
$i = 0;
foreach ( $recent_posts as $post ) {
    $i++;
    $post_id = $post['ID'];

    $title = get_the_title( $post_id );
    if ( ! $title ) {
        $title = __( '(Untitled)' );
    }

    $post_url = get_permalink( $post_id );

    $text = get_post( $post_id );
    $text = $text->post_content;

    $text = wp_trim_words( $text, 25, '' );
    $excerpt = $text;

    $list_items_markup .= sprintf(
        '<div class="nhsuk-grid-column-one-'.$width.' nhsuk-panel-group__item">
              
<div class="nhsuk-panel"><h3>
			<a href="%2$s">%1$s%3$s</a></h3><p>%4$s</p>',
        get_the_post_thumbnail( $post_id ),
        esc_url( get_permalink( $post_id ) ),
        esc_html( $title ),
        $excerpt
    );

    $list_items_markup .= pretext('read&nbsp;more', $post_url) . "</div>

            </div>";
    if ($i == $columns) {
        $list_items_markup .= '</div><div class="nhsuk-panel-group">';
        $i = 0;
    }
}
$list_items_markup .= '</div></div>';
echo $list_items_markup;


function pretext($text, $link){
    return '<div class="nhsuk-action-link">
  <a class="nhsuk-action-link__link" href="'.$link.'">
    <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
    </svg>
    <span class="nhsuk-action-link__text">'.$text.'</span></a></div>';
}
?>
