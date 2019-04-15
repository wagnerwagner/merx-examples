<?php
if (kirby()->request()->method() === 'POST') {
  try {
    $data = $_POST;
    $redirect = merx()->initializePayment($data);
    go($redirect);
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}
