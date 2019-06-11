<?php
/**
* Block Name: Reveal
*
* This is the template that displays the Reveal block.
*/

$open = get_field('open');
if ($open != 0) {
    $open = ' open=""';
    $aria = 'true';
} else {
    $open = '';
    $aria = 'false';
}
$numeral = rand(0,10000); // give each box a unique id
$class = ' ' . the_field('style');
?>

<details class="nhsuk-details<?php echo $class; ?>" <?php echo $open; ?>>
    <summary class="nhsuk-details__summary" role="button" aria-controls="details-content-<?php echo $numeral; ?>"
    aria-expanded="<?php echo
$aria; ?>">
    <span class="nhsuk-details__summary-text">
     <?php the_field('title'); ?>
    </span>
    </summary>
    <div class="nhsuk-details__text" id="details-content-<?php echo $numeral; ?>" aria-hidden="true">
        <?php the_field('content'); ?>

    </div>
</details>
