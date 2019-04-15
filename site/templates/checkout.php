<?php snippet('cart', ['cart' => merx()->cart()]) ?>
<form method="post">
  <label>
    Name
    <input type="text" name="name" required>
  </label><br>
  <label><input type="radio" name="paymentMethod" value="empty-gateway"> Example Payment Method</label><br>
  <button>buy</button>
</form>
