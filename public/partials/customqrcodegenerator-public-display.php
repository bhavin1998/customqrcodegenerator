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

<?php
    $order = wc_get_order( $order_id );
    $order_data = $order->get_data();

    $order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
    $order_billing_first_name = $order_data['billing']['first_name'];
    $order_billing_last_name = $order_data['billing']['last_name'];
    $order_total = $order_data['total'];
?>

<div class="woocommerce-order-data">
    <input type="hidden" class="orderid" value="<?php echo $order_id; ?>">
    <input type="hidden" class="ordercreated" value="<?php echo $order_date_created; ?>">
    <input type="hidden" class="orderbillingfname" value="<?php echo $order_billing_first_name; ?>">
    <input type="hidden" class="orderbillinglname" value="<?php echo $order_billing_last_name;?>">
    <input type="hidden" class="orderbillingtotal" value="<?php echo $order_total; ?>">
</div>