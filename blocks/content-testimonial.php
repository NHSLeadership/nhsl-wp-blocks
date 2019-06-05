<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial / quote block.
 */
$id = 'testimonial-' . $block['id'];
$invert = get_field('invert');
if ($invert == 1) { $class = 'c-quote c-quote--rev'; } else { $class = 'c-quote'; }
$role = get_field('role');
$org = get_field('organisation');
?>
<blockquote class="<?php echo $class; ?>">
    <p><?php the_field('quote'); ?></p>
    <span class="c-quote__meta">
            <b><?php the_field('name'); ?></b><br>
<?php if (!empty($role)) { echo $role; } ?><br>
            <?php if (!empty($org)) { echo $org; } ?>
            </span>
</blockquote>
