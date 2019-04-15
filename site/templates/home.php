<h2>Products</h2>
<?php foreach ($pages->filterBy('intendedTemplate', 'product') as $item): ?>
<form action="add" method="post">
  <h2><?= $item->title() ?></h2>
  Price: <?= formatPrice($item->price()->toFloat()) ?><br>
  Tax: <?= formatPrice(calculateTax($item->price()->toFloat(), $item->tax()->toFloat())) ?><br>
  Stock: <?= $item->stock() ?><br>
  <input type="hidden" name="id" value="<?= $item->id() ?>">
  <input type="number" name="quantity" value="1" min="1">
  <button>add to cart</button>
</form>
<?php endforeach; ?>

<?php snippet('cart', ['cart' => merx()->cart()]) ?>
<a href="<?= url('checkout') ?>">Checkout</a>
