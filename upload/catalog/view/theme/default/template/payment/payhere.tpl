<?php if ($testmode) { ?>
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $text_testmode; ?></div>
<?php } ?>
<form action="<?php echo $action; ?>" method="post">
    <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>" />
    <input type="hidden" name="return_url" value="<?php echo $return_url; ?>" />
    <input type="hidden" name="cancel_url" value="<?php echo $cancel_url; ?>" />
    <input type="hidden" name="notify_url" value="<?php echo $status_url; ?>" />
    <input type="hidden" name="language" value="<?php echo $language; ?>" />
 
    <input type="hidden" name="first_name" value="<?php echo $firstname; ?>" />
    <input type="hidden" name="last_name" value="<?php echo $lastname; ?>" />
    <input type="hidden" name="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="phone" value="<?php echo $phone_number; ?>" />
    <input type="hidden" name="address" value="<?php echo $address; ?>" />
    <input type="hidden" name="address1" value="<?php echo $address1; ?>" />
    <input type="hidden" name="address2" value="<?php echo $address2; ?>" />
    <input type="hidden" name="zip" value="<?php echo $postal_code; ?>" />
    <input type="hidden" name="city" value="<?php echo $city; ?>" />
    <input type="hidden" name="state" value="<?php echo $state; ?>" />
    <input type="hidden" name="country" value="<?php echo $country; ?>" />
    
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
    <input type="hidden" name="items" value="<?php echo $items_text; ?>" />
    <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
    
    <?php $i = 1; ?>
    <?php foreach ($products as $product) { ?>
    <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product['name']; ?>" />
    <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $product['model']; ?>" />
    <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $product['price']; ?>" />
    <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $product['quantity']; ?>" />
    <input type="hidden" name="weight_<?php echo $i; ?>" value="<?php echo $product['weight']; ?>" />
    <?php $j = 0; ?>
    <?php foreach ($product['option'] as $option) { ?>
    <input type="hidden" name="on<?php echo $j; ?>_<?php echo $i; ?>" value="<?php echo $option['name']; ?>" />
    <input type="hidden" name="os<?php echo $j; ?>_<?php echo $i; ?>" value="<?php echo $option['value']; ?>" />
    <?php $j++; ?>
    <?php } ?>
    <?php $i++; ?>
    <?php } ?>
    <?php if ($discount_amount_cart) { ?>
    <input type="hidden" name="discount_amount_cart" value="<?php echo $discount_amount_cart; ?>" />
    <?php } ?>

    <input type="hidden" name="site_title" value="<?php echo $description; ?>" />
    <input type="hidden" name="logo_url" value="<?php echo $logo; ?>" />
    <input type="hidden" name="platform" value="<?php echo $platform; ?>" />
    
    <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>
