<?php

/**
 * Block Name: Action Card
 *
 * This is the template that displays the action cards.
 *
 */


$width = get_field('width');
$link = get_field('call_to_action_link');
$btn = get_field('button_text');
?>


<div class="nhsuk-grid-column-<?php echo $width; ?> nhsuk-care-card nhsuk-care-card--<?php the_field('box_type'); ?>">
    <div class="nhsuk-care-card__heading-container">
        <h3 class="nhsuk-care-card__heading"><span role="text"><span class="nhsuk-u-visually-hidden">Non-urgent advice: </span><?php the_field('title'); ?></span></h3>
        <span class="nhsuk-care-card__arrow" aria-hidden="true"></span>
    </div>
    <div class="nhsuk-care-card__content">

        <?php the_field('body'); ?>
        <? if ((!empty($btn)) && (!empty($link))) { ?>
            <p><a href="<?= $link; ?>" class="nhsuk-button" draggable="false"><?= $btn;?></a></p>
        <? } ?>

    </div>
</div>
