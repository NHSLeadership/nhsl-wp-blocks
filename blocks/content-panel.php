<?php
/**
 * Block Name: Panel
 *
 * Simple panel element to display generic content in a mildly highlighted manner.
 */
if ( get_field('white_box')) :
    $class = 'nhsuk-panel';
else:
    $class = 'nhsuk-panel--grey';
endif;
if ( get_field('label')) :
$label = 'nhsuk-panel-with-label__label';
$class = 'nhsuk-panel-with-label';
endif;

$size = get_field('size');
?>
<div class="nhsuk-grid-column-<?php echo $size; ?>">
    <div class="<?php echo $class; ?>">
        <h3 class="<?php echo $label; ?>"><?php echo the_field('title'); ?></h3>
        <?php the_field('content'); ?>
    </div>
</div>

