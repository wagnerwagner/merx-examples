<h2>Cart</h2>
<table>
<thead>
  <tr>
    <th>Title</th>
    <th>Tax</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Sum Tax</th>
    <th>Sum</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($cart as $item): ?>
    <tr>
      <th><?= $item['title'] ?></th>
      <td><?= formatPrice($item['tax']) ?></td>
      <td><?= formatPrice($item['price']) ?></td>
      <td><?= $item['quantity'] ?></td>
      <td><?= formatPrice($item['sumTax']) ?></td>
      <td><?= formatPrice($item['sum']) ?></td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
<p>
<strong>Tax:</strong> <?= formatPrice($cart->getTax()) ?><br>
<strong>Sum:</strong> <?= formatPrice($cart->getSum()) ?>
</p>
