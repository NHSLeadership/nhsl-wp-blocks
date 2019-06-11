<?php
/**
* Block Name: Reveal
*
* This is the template that displays the Reveal block.
*/
$style = get_field('style');
$open = get_field('open');
if ($open != 0) {
    $open = ' open=""';
    $aria = 'true';
    $ariahidden = 'false';
} else {
    $open = '';
    $aria = 'false';
    $ariahidden = 'false';
}
$numeral = $block['id']; // give each box a unique id

?>

<details class="nhsuk-details <?php echo $style; ?>" <?php echo $open; ?>>
    <summary class="nhsuk-details__summary" role="button" aria-controls="details-content-<?php echo $numeral; ?>"
    aria-expanded="<?php echo
$aria; ?>">
    <span class="nhsuk-details__summary-text">
     <?php the_field('title'); ?>
    </span>
    </summary>
    <div class="nhsuk-details__text" id="details-content-<?php echo $numeral; ?>" aria-hidden="<?php echo
$ariahidden; ?>">
        <?php the_field('content'); ?>

    </div>
</details>
