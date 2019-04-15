<?php
if (kirby()->request()->method() === 'POST') {
  try {
    $data = array_merge($_POST, ['paymentMethod' => 'empty-gateway']);
    $redirect = shopkit()->initializePayment($data);
    go($redirect);
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}