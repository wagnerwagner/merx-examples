<h1>Order <?= $page->invoiceNumber() ?></h1>
Name: <?= $page->name() ?>
<?php snippet('cart', ['cart' => $page->cart()]) ?>
