<?php
use Kirby\Exception\Exception;

return [
  'debug' => true,
  'ww.merx.gateways' => [
    'empty-gateway' => [],
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
