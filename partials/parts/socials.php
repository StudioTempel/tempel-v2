<?php
$socials = get_field('socials', 'option');

$instagram_link = $socials['instagram'];
$facebook_link = $socials['facebook'];
$linkedin_link = $socials['linkedin'];
$youtube_link = $socials['youtube'];
$x_link = $socials['x'];
$tiktok_link = $socials['tiktok'];
$snapchat_link = $socials['snapchat'];
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
