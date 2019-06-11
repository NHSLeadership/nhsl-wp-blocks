<?php
/**
 * Block Name: Do and Dont list
 *
 * This is the template that displays a nightingale button.
 *
 */
$dodont = get_field('do_or_dont');
if ($dodont == 'cross') {
    $path = '<path d="M17 18.5c-.4 0-.8-.1-1.1-.4l-10-10c-.6-.6-.6-1.6 0-2.1.6-.6 1.5-.6 2.1 0l10 10c.6.6.6 1.5 0 2.1-.3.3-.6.4-1 .4z"></path><path d="M7 18.5c-.4 0-.8-.1-1.1-.4-.6-.6-.6-1.5 0-2.1l10-10c.6-.6 1.5-.6 2.1 0 .6.6.6 1.5 0 2.1l-10 10c-.3.3-.6.4-1 .4z"></path>';
} else {
    $path = '<path stroke-width="4" stroke-linecap="round" d="M18.4 7.8l-8.5 8.4L5.6 12"></path>';
}
?>
<div class="nhsuk-do-dont-list">
    <h3 class="nhsuk-do-dont-list__label"><?php the_field('title'); ?></h3>
    <ul class="nhsuk-list nhsuk-list--<?php echo $dodont; ?>">
        <?php
        if( have_rows('items') ):

            // loop through the rows of data
            while ( have_rows('items') ) : the_row();

                $text = get_sub_field('text');
                // display a sub field value
            echo '<li>
            <svg class="nhsuk-icon nhsuk-icon__'. $dodont.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
        fill="none" aria-hidden="true">
                '.$path.'
            </svg>
           ' . $text . '
        </li>';

            endwhile;

        else :

            // no rows found

        endif;

        ?>
    </ul>
</div>
