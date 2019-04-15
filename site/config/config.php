<?php
use Kirby\Exception\Exception;

function checkStock($cart) {
  foreach($cart as $cartItem) {
    $cartItemPage = page($cartItem['id']);
    $availableStock = $cartItemPage->stock()->toInt();
    if ($availableStock < (int)$cartItem['quantity']) {
      throw new Exception([
        'httpCode' => 400,
        'fallback' => '“{productTitle}” is out of stock',
        'data' => [
          'productTitle' => $cartItemPage->title(),
        ],
      ]);
    }
  }
}

return [
  'debug' => true,
  'ww.merx.gateways' => [
    'empty-gateway' => [],
  ],
  'hooks' => [
    'ww.merx.initializePayment:before' => function ($data, $cart) {
      checkStock($cart);
    },
    'ww.merx.completePayment:before' => function ($virtualOrderPage) {
      checkStock($virtualOrderPage->cart());
    },
    'ww.merx.completePayment:after' => function ($orderPage) {
      foreach($orderPage->cart() as $cartItem) {
        $cartItemPage = page($cartItem['id']);
        $newStock = $cartItemPage->stock()->toInt() - (int)$cartItem['quantity'];
        $cartItemPage->update([
          'stock' => (int)$newStock,
        ]);
      }
    },
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
