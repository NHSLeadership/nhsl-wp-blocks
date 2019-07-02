<?php
/**
 * Block Name: Dashboard Group
 *
 * Simple panel element to display generic content in a mildly highlighted manner.
 */
if (have_rows('panels')):
    echo '<div class="nhsuk-grid-row nhsuk-panel-group nhsuk-dashboard">';
    while (have_rows('panels')) : the_row();

        $label = 'nhsuk-panel-with-label__label';
        $class = 'nhsuk-panel-with-label';

        $size = get_sub_field('size');
        $link = get_sub_field('link');
        if (!empty($link)) {
            $url = $link['url'];
            //$link_target = $link['target'] ? $link['target'] : '_self';
            $starta = '<a class="nhsuk-promo__link-wrapper" href="' . $url . '">';
            $enda = '</a>';
        } else {
            $starta = '';
            $enda = '';
        }
        $imageone = get_sub_field('image');
        if (!empty($imageone)) {
            $imgurl = $imageone['url'];
            $imgalt = $imageone['alt'];
            $img = '<img class="nhsuk-promo__img" src="' . $imgurl . '" alt="' . $imgalt . '">';
        }
        ?>
        <div class="nhsuk-grid-column-<?php echo $size; ?> nhsuk-panel-group__item">
            <?php echo $starta; ?>

            <div class="<?php echo $class; ?>">
                <h3 class="<?php echo $label; ?>"><?php echo the_sub_field('title'); ?></h3>
                <?php echo $img; ?>
            </div>
            <?php echo $enda; ?>
        </div>

    <?php
    endwhile;
    echo '</div>';
else :

    // no rows found

endif;
?>
