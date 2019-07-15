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
            $img = ' style="background-image: url(' . $imgurl . ');"';
        }
        ?>
        <div class="nhsuk-grid-column-<?php echo $size; ?> nhsuk-panel-group__item">
            <?php echo $starta; ?>

            <div class="<?php echo $class; ?>" <?php echo $img; ?>>
                <h3 class="<?php echo $label; ?>"><?php echo the_sub_field('title'); ?></h3>
                <?php // echo $img; ?>
                <img src="wp-content/themes/nightingale-2-0/assets/pixel_trans.png" width="100%" height="100%" />
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
