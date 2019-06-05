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

<div class="o-layout__item  u-<?php echo $width; ?>/12@lg" style="float: left;">
        <div class="c-card  c-card--<?php the_field('box_type'); ?>">
            <h4><?php the_field('title'); ?></h4>
            <?php the_field('body'); ?>
            <? if ((!empty($btn)) && (!empty($link))) { ?>
                <p><a href="<?= $link; ?>" class="c-btn c-btn--primary c-btn--full"><?= $btn;?></a></p>
            <? } ?>
        </div><!-- c-card -->
      </div>
