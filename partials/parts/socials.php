<?php
$instagram_link = get_field('instagram_link', 'option');
$facebook_link = get_field('facebook_link', 'option');
$linkedin_link = get_field('linkedin_link', 'option');
$youtube_link = get_field('youtube_link', 'option');
$x_link = get_field('x_link', 'option');
$tiktok_link = get_field('tiktok_link', 'option');
$snapchat_link = get_field('snapchat_link', 'option');
if ($facebook_link || $tiktok_link || $instagram_link || $youtube_link || $linkedin_link || $snapchat_link || $x_link) { ?>
    <ul class="socials">
        <?php
        if ($instagram_link) { ?>
            <li><a href="<?= $instagram_link ?>" target="_blank"><?php partial('svg/socials/instagram') ?></a></li>
        <?php }
        if ($facebook_link) { ?>
            <li><a href="<?= $facebook_link ?>" target="_blank"><?php partial('svg/socials/facebook') ?></a></li>
        <?php }
        if ($linkedin_link) { ?>
            <li><a href="<?= $linkedin_link ?>" target="_blank"><?php partial('svg/socials/linkedin') ?></a></li>
        <?php }
        if ($youtube_link) { ?>
            <li><a href="<?= $youtube_link ?>" target="_blank"><?php partial('svg/socials/youtube') ?></a></li>
        <?php }
        if ($x_link) { ?>
            <li><a href="<?= $x_link ?>" target="_blank"><?php partial('svg/socials/x') ?></a></li>
        <?php } ?>
        <?php if ($tiktok_link) { ?>
            <li><a href="<?= $tiktok_link ?>" target="_blank"><?php partial('svg/socials/tiktok') ?></a></li>
        <?php }

        if ($snapchat_link) { ?>
            <li><a href="<?= $snapchat_link ?>" target="_blank"><?php partial('svg/socials/snapchat') ?></a></li>
        <?php } ?>

    </ul>
<?php } ?>
