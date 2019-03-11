<?php
return [
  'debug' => true,
  'ww.shopkit.gateways' => [
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
