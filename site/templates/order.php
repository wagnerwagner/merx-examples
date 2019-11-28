<h1>Order <?= $page->invoiceNumber() ?></h1>
<p>Name: <?= $page->name() ?></p>
<p>Email: <?= $page->email() ?></p>
<?php snippet('cart', ['cart' => $page->cart()]) ?>
