
<!DOCTYPE html>
<html>
<?php require_once './components/head.php' ?>
<body>
	<?php require_once './components/header.php' ?>
	<main>
		<article class ="welcome-article"id="catalog">
			<div class ="header-article">
				<h3>Каталог</h3>
				<!--
				<div class ="find-container">
					<form>
						<input class ="input-find" type="search" name="serch">
						<input class ="img input-send" type="submit" name="send" value="">
					</form>
				</div>
			-->
			</div>
			<div class="article-content">
				<div class="container-catalog">
					<?php CreateCatalogItem($connection); ?>
				</div>
				<div class ="filter-menu">
					<div class ="filter-cotegory-container">
						<p class ="title-cotegory">Категория</p>
						<div class ="filter-cotegory-container-items">
							<form name ="typeWork">
								<?php CreateSearchCategoriesInputItem($connection); ?>
							</form>
						</div>
					</div>
					<div class ="filter-cotegory-container">
						<p class ="title-cotegory">Тип материала</p>
						<div class ="filter-cotegory-container-items">
							<form name ="type"  >
								<?php CreateSearchBrandInputItem($connection) ?>
								
							</form>
						</div>
					</div>
					<!--
					<div class ="filter-cotegory-container">
						<p class ="title-cotegory">Цена</p>
						<div class ="filter-cotegory-container-items">
							<div class ="price-filter">
								<div class ="price-item">
									<span>От</span>
									<input type="number" name="startPrice">
								</div>
								<div class ="price-item">
									<span>До</span>
									<input type="number" name="finishPrice">
								</div>
							</div>
						</div>
					</div> -->
					<input class ="btn send-find-btn"type="submit" name="Search" value="Применить">
				</div>
			</div>
		</article>
	</main>
	<?php require_once './components/footer.php' ?>
	<script type="module" src="js/mainjs.js"></script>
</body>
</html>