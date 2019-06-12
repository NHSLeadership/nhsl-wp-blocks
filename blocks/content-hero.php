<?php
/**
 * Block Name: Hero Banner
 *
 * This is the template that displays the testimonial / quote block.
 */
if ($image = get_field('image')) {
    $imgurl = $image['url'];
    $sectionclass = 'nhsuk-hero--image nhsuk-hero--image-description';
    $style = 'background-image: url(' . $imgurl . ')';
    $overlay = array('<div class="nhsuk-hero__overlay">', '</div>');
    $wrapper = 'nhsuk-hero-content';
    $hero_arrow = '<span class="nhsuk-hero__arrow" aria-hidden="true"></span>';
} else {
    $sectionclass = '';
    $style = '';
    $overlay = '';
    $wrapper = 'nhsuk-hero__wrapper';
    $hero_arrow = '';
}
$title = get_field('title');
$content = get_field('content');
if ((!empty($title)) || (!empty($content))) {
    $flag = 1;
    $widthstyle = ' nhsuk-hero--border';
} else {
    $flag = 0;
    $widthstyle = '';
}
if ((!empty($image)) || ($flag > 0)) {
    ?>
    <section class="nhsuk-hero nhsuk-hero--image nhsuk-hero--image-description" style="<?php echo $style; ?>">
        <?php echo $overlay[0]; ?>
        <?php if ($flag > 0) { ?>
            <div class="nhsuk-width-container<?php echo $widthstyle; ?>">
                <div class="nhsuk-grid-row">
                    <div class="nhsuk-grid-column-two-thirds">
                        <div class="<?php echo $wrapper; ?>">
                            <h1 class="nhsuk-u-margin-bottom-3"><?php echo $title; ?></h1>
                            <p class="nhsuk-body-l nhsuk-u-margin-bottom-0"><?php echo $content; ?></p>
                            <?php echo $hero_arrow; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } // end if flag is 1 ?>

        <?php echo $overlay[1]; ?>
    </section><p></p>
    <?php
}
?>

