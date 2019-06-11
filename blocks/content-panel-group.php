<?php
/**
 * Block Name: Panel
 *
 * Simple panel element to display generic content in a mildly highlighted manner.
 */
if (have_rows('panels')):
    echo '<div class="nhsuk-grid-row nhsuk-panel-group">';
    while (have_rows('panels')) : the_row();
        if (get_sub_field('white_box')) :
            $class = 'nhsuk-panel';
        else:
            $class = 'nhsuk-panel--grey';
        endif;
        if (get_sub_field('label')) :
            $label = 'nhsuk-panel-with-label__label';
            $class = 'nhsuk-panel-with-label';
        else:
            $label = '';
        endif;

        $size = get_sub_field('size');
        ?>
        <div class="nhsuk-grid-column-<?php echo $size; ?> nhsuk-panel-group__item">
            <div class="<?php echo $class; ?>">
                <h3 class="<?php echo $label; ?>"><?php echo the_sub_field('title'); ?></h3>
                <?php the_sub_field('content'); ?>
            </div>
        </div>

    <?php
    endwhile;
    echo '</div>';
else :

    // no rows found

endif;
?>
