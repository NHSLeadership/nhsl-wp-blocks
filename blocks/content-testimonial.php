<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial / quote block.
 */
$id = 'testimonial-' . $block['id'];
$invert = get_field('invert');
if ($invert == 1) { $class = ' nhsuk-inset-text--rev'; } else { $class = ''; }
$role = get_field('role');
$org = get_field('organisation');
$size = get_field('size');
?>
<div class="nhsuk-grid-column-<?php echo $size; ?> nhsuk-promo-group__item">
<div class="nhsuk-inset-text<?php echo $class; ?>">
    <span class="nhsuk-u-visually-hidden">Quote / Testimonial: </span>
    <p><?php the_field('quote'); ?></p>
    <span class="quote-attribution">
            <b><?php the_field('name'); ?></b><br>
<?php if (!empty($role)) { echo $role; } ?><br>
            <?php if (!empty($org)) { echo $org; } ?>
            </span>
</div>
</div>
