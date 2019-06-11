<?php
/**
 * Block Name: Promo
 *
 * This is the template that displays promo items, it is very flexible and can be used in a lot of different ways.
 */
if (have_rows('promos')):
    echo '<div class="nhsuk-grid-row nhsuk-promo-group">';
    while (have_rows('promos')) : the_row();
        $imageone = get_sub_field('image');
        if (!empty($imageone)) {
            $imgurl = $imageone['url'];
            $imgalt = $imageone['alt'];
            $img = '<img class="nhsuk-promo__img" src="' . $imgurl . '" alt="' . $imgalt . '">';
        }
        $heading = get_sub_field('heading');
        if (!empty($heading)) {
            $hdg = '<h3 class="nhsuk-promo__heading">' . $heading . '</h3>';
        }
        $content = get_sub_field('content');
        if (!empty($content)) {
            $cnt = '<p class="nhsuk-promo__description">' . $content . '</p>';
        }
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
        $size = get_sub_field('size');
        ?>
        <div class="nhsuk-grid-column-<?php echo $size; ?> nhsuk-promo-group__item">
            <div class="nhsuk-promo">
                <?php echo $starta; ?>
                <?php echo $img; ?>
                <div class="nhsuk-promo__content">
                    <?php echo $hdg; ?>
                    <?php echo $cnt; ?>
                </div>
                <?php echo $enda; ?>
            </div>
        </div>
    <?php
    endwhile;
    echo '</div>';
else :

    // no rows found

endif;
?>
