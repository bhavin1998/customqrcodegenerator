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

<form method="post">
    <input type="hidden" name="mark_as_received" value="true">
    <input type="hidden" name="order_id" value="220">
    <?php wp_nonce_field( 'so_38792085_nonce_action', '_so_38792085_nonce_field' ); ?> 
    <input type="submit" name="changeorder" value="I Got It!">
</form>