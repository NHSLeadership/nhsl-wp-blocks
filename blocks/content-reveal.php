<?php
/**
* Block Name: Reveal
*
* This is the template that displays the Reveal block.
*/

$open = get_field('open');
if ($open != 0) {
    $class = 'open=""';
} else {
    $class = '';
}

?>

<details <?php echo $class ?>>
    <summary><?php the_field('title'); ?></summary>

    <div>
        <p><?php the_field('content'); ?></p>
    </div>

</details>
