<?php 	
$basket = trim($_COOKIE["basket"]);

?>
<!DOCTYPE html>
<html>
<?php require_once './components/head.php' ?>
<body>
	<?php require_once './components/header.php' ?>
	<main>
		<article class ="welcome-article"id="basket">
			<h3>Корзина</h3>
			<div class="article-content">
				<div class="container-basket">
					<?php  if(empty($basket) || $basket =="[]"){
						echo '<p class ="empty-basket"> Корзина пустая, перейти в <a class ="btn"href ="catalog.php">каталог</a> </p>';
					} else{
						CreateBasketItem($connection);
					}
					?>
				</div>
			</div>
		</article>
	</main>
	<?php require_once './components/footer.php' ?>
	<script type="module" src="js/mainjs.js"></script>
</body>
</html>