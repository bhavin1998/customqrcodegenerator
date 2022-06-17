<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Customqrcodegenerator
 * @subpackage Customqrcodegenerator/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="qr-code-generator">
    <input type="hidden" class="qr-url" value="<?php echo $order_id; ?>">
    <input type="hidden" class="qr-size" value="128" min="20" max="500">
    <div id="qrcode"></div>
    <img class="myimg" src="" style="display: none;">
</div>