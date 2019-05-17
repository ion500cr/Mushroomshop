<?php

require_once 'parts/header.php';

if (isset($_GET['cat'])) {
  $currentCat = $_GET['cat'];
  $products = $connect->query("SELECT * FROM products WHERE cat='$currentCat'");
  $products = $products->fetchAll(PDO::FETCH_ASSOC);

  if (!$products) {
    die("Такой категории не найдено");
  }

} else {
  $products = $connect->query("SELECT * FROM products");
  $products = $products->fetchAll(PDO::FETCH_ASSOC);
} ?>

<div class="main">

  <? foreach ($products as $product) { ?>
  <div class="card">
    <a href="product.php?product=<? echo $product['title']; ?>">
        <img src="img/<? echo $product['img'];?>" alt="<? echo $product['rus_name'];?>" title="<? echo $product['rus_name'];?>">
    </a>
    <div class="label"><? echo $product['rus_name'];?> (<? echo $product['price'];?> рублей)</div>
    <?php require 'parts/add-form.php'; ?>
  </div>
  <? } ?>

</div>

</body>
</html>
