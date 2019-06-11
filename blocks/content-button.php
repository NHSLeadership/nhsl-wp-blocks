<?php
/**
 * Block Name: Button
 *
 * This is the template that displays a nightingale button.
 *
 */
$colour = get_field('colour');
if ($colour == 'primary') {
    $class = '';
} else {
    $class = ' nhsuk-button--' . $colour;
}
?>
<p>
<a href="<?php the_field('link'); ?>" class="nhsuk-button <?php echo $class; ?> c-btn--<?php
the_field('width'); ?>" draggable="false"><?php the_field
('text');?></a>
</p>
