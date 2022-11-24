
<!DOCTYPE html>
<html>
<?php require_once './components/head.php' ?>
<body>
	<?php require_once './components/header.php' ?>
	<main>
		<div class="welcome">
			<div class ="welcome-container">
				<div class ="img slider-item">
					<img class ="slider-bg"src="../source/image/welcome-reviews.png">
					<div class ="welcome-text-container">
						<div class="welcome-text-container">
							<p class ="welcome-text">
								Отзывы о проделанных работах 
								<br>
								<br>
								В этом раздели наши клиенты оставляют отзывы о проделанной работе, вы можете ознокомиться с ними, а также оставить свой отзыв
							</p>
						</div>
					</div>
					<a  id="make-request" class ="btn welcome-btn" href="#">Оставить отзыв</a>
				</div>
			</div>
		</div>
		<article >
			<h3>Отзывы о фасадных работах</h3>
			<div class="article-content ">
				<div class ="slider">
					<div class ="slider-but-controller">
						<button id="slider-prev" class ="slider-arrow img"></button>
						<button id="slider-next" class ="slider-arrow img"></button>
					</div>
					<div class="slider-container">
						<div class ="slider-track">
							<?php  CreateReviewsItemSiding($connection); ?>
						</div>
						<div class="slider-dot-controller dark"></div>
					</div>
				</div>
			</div>
		</article>
		<article >
			<h3>Отзывы о кровельных работах</h3>
			<div class="article-content ">
				<div class ="slider">
					<div class ="slider-but-controller">
						<button id="slider-prev" class ="slider-arrow img"></button>
						<button id="slider-next" class ="slider-arrow img"></button>
					</div>
					<div class="slider-container">
						<div class ="slider-track">
							<?php  CreateReviewsItemRoof($connection); ?>
						</div>
						<div class="slider-dot-controller dark"></div>
					</div>
				</div>
			</div>
		</article>
		<article >
			<h3>Отзывы об оконных  работах</h3>
			<div class="article-content ">
				<div class ="slider">
					<div class ="slider-but-controller">
						<button id="slider-prev" class ="slider-arrow img"></button>
						<button id="slider-next" class ="slider-arrow img"></button>
					</div>
					<div class="slider-container">
						<div class ="slider-track">
							<?php  CreateReviewsItemWindow($connection); ?>
							
						</div>
						<div class="slider-dot-controller dark"></div>
					</div>
				</div>
			</div>
		</article>
	</main>
	<?php require_once './components/footer.php' ?>
	<script type="module" src="../js/mainjs.js"></script>
</body>
</html>