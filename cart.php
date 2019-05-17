<?php

require_once 'parts/header.php';

if (isset($_SESSION['order'])) { ?>
  <h2 class="cart-title">Ваш заказ по номером <?php echo $_SESSION['order']; ?> принят</h2>
  <a href="index.php" class="back">На главную</a>
<? }
elseif (count($_SESSION['cart']) == 0 ) { ?>
  <h2 class="cart-title">Ваша корзина пуста : (</h2>
  <a href="index.php" class="back">На главную</a>
<? } else {

foreach ($_SESSION['cart'] as $key => $product) {
?>
<div class="cart">
  <a href="product.php?product=<? echo $product['title']; ?>">
    <img src="img/<? echo $product['img'];?>" alt="<? echo $product['rus_name'];?>" title="<? echo $product['rus_name'];?>">
  </a>

  <div class="cart-descr">
    <? echo $product['rus_name']; ?> в количестве <? echo $product['quantity']; ?> шт на сумму <? echo $product['quantity'] * $product['price']; ?> рублей
  </div>
  <form action="actions/delete.php" method="post">
    <input type="hidden" name="delete" value="<? echo $key;?>">
    <input type="submit" value="Удалить">
  </form>
</div>

<? } ?>
<hr>
<form action="actions/mail.php" method="post" class="order">
  <input type="text" name="username" required="required" placeholder="Ваше имя">
  <input type="phone" name="phone" required="required" placeholder="Ваш телефон">
  <input type="email" name="email" required="required" placeholder="Ваш email">
  <input type="submit" name="order" value="отправить заказ">
</form>


<? } ?>

<hr>

</body>
</html>
