<h2>Products</h2>
<?php foreach ($site->find('products')->children()->listed() as $item): ?>
<form action="<?= url('add') ?>" method="post">
  <h3><?= $item->title() ?></h3>
  Price: <?= formatPrice($item->price()->toFloat()) ?><br>
  Tax: <?= formatPrice(calculateTax($item->price()->toFloat(), $item->tax()->toFloat())) ?><br>
  <input type="hidden" name="id" value="<?= $item->id() ?>">
  <input type="number" name="quantity" value="1" min="1">
  <button>add to cart</button>
</form>
<?php endforeach; ?>

<?php snippet('cart', ['cart' => merx()->cart()]) ?>
<a href="<?= url('checkout') ?>">Checkout</a>
