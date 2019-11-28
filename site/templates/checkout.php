<?php snippet('cart', ['cart' => merx()->cart()]) ?>
<form method="post">
  <h3>Customer Data</h3>
  <p>
    <label>
      Name<br>
      <input type="text" autocomplete="name" name="name" required>
    </label>
  </p>
  <p>
    <label>
      Email<br>
      <input type="text" autocomplete="email" name="email" required>
    </label>
  </p>
  <h3>Payment Methods</h3>
  <p>
    <label>
      <input type="radio" name="paymentMethod" value="empty-gateway">
      Example Payment Method
    </label>
  </p>
  <p>
    <label>
      <input type="radio" name="paymentMethod" value="paypal">
      PayPal
    </label>
  </p>
  <p>
    <button>buy</button>
  </p>
</form>
