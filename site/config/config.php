<?php
use Kirby\Exception\Exception;

return [
  'debug' => true,
  'ww.merx.gateways' => [
    'empty-gateway' => [],
  ],
  'hooks' => [
    'ww.merx.cart' => function ($cart) {
      if ($cart->count() > 0) {
        $cart->remove('shipping');
        $cart->remove('discount');
        if ($cart->getSum() < 50) {
          $cart->add([
            'id' => 'shipping',
          ]);
        }
        if ($cart->get('knitted-socks')['quantity'] >= 5) {
          $cart->add([
            'id' => 'discount',
          ]);
        }
      }
    }
  ],
  'routes' => [
    [
      'pattern' => 'add',
      'method' => 'post',
      'action'  => function () {
        $id = get('id');
        $quantity = get('quantity');
        try {
          cart()->add([
            'id' => $id,
            'quantity' => $quantity,
          ]);
          go('/');
        } catch (Exception $ex) {
          return $ex->getMessage();
        }
      },
    ],
  ],
];
