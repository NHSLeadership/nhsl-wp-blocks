<?php
/**
 * Block Name: Button
 *
 * This is the template that displays a nightingale button.
 *
 */
?>
<a href="<?php the_field('link'); ?>" class="c-btn  c-btn--<?php the_field('colour'); ?> c-btn--<?php the_field('width'); ?>"><?php the_field
('text');?></a>
