<?php snippet('cart', ['cart' => shopkit()->cart()]) ?>
<form method="post">
  <label>
    Name
    <input type="text" name="name" required>
  </label><br>
  <button>buy</button>
</form>
