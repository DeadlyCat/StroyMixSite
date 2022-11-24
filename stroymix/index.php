
<!DOCTYPE html>
<html>
<?php require_once './components/head.php' ?>
<body>
	
	<?php require_once './components/header.php' ?>
	<main>
		<?php require_once './components/callBack.php' ?>
		<div class=" welcome ">
			<div class ="slider">
				<div class ="slider-but-controller">
					<button id="slider-prev" class ="slider-arrow img"></button>
					<button id="slider-next" class ="slider-arrow img"></button>
				</div>
				<div class="slider-container">	
					<div class ="slider-track">
						<div class =" slider-item">
							<img class ="slider-bg"src="../source/image/welcome-1.png">
							<div class ="welcome-text-container">
								<p class ="welcome-text">Тандем - строительная компания специализирующаяся на фасадных, кровельных и оконный работах(Монтаж окон, рольставни,балконы)
									<br>
									<br>
									Мы на рынке более 5 лет, и за это время наши специалисты произвели сотни монтажных работ,  мы подберем для вас качественные материалы подходящие вашим требованиям, а также произведем качественный монтаж
								</p>
							</div>
							<a  id="make-request" class ="btn welcome-btn" href="#">Оставить заявку</a>
							
						</div>
						<div class ="img slider-item">
							<img class ="slider-bg"src="../source/image/welcome-siding.png">
							<div class ="welcome-text-container">
								<p class ="welcome-text">Отделка фасадов<br><br>Огромный ассортимент высококачественных фасадных материалов, мы подберем подходящий для вас вариант. Наши специалисты имеют опыт более 10 лет, что гарантирует качественные монтажные работы.</p>
							</div>
							<a  id="make-request" class ="btn welcome-btn" href="#">Оставить заявку</a>
						</div>
						<div class ="img slider-item">
							<img class ="slider-bg"src="../source/image/welcome-roof.png">
							<div class ="welcome-text-container">
								<p class ="welcome-text">Кровельные работы<br><br>Постелим кровлю, утемплим крышу, большой ассортимент качественных кровельных материалов.
								Большой опыт наших  специалистов гарантирует качественные монтажные работы.</p>
							</div>
							<a  id="make-request" class ="btn welcome-btn" href="#">Оставить заявку</a>
						</div>
						<div class ="img slider-item">
							<img class ="slider-bg"src="../source/image/welcome-window.png">
							<div class ="welcome-text-container">
								<p class ="welcome-text">Установка окон и рольставни <br><br>У нас вы можете подобрать оконный профиль известных производителей, а также заказать рольставни, большой опыт специалистов гарантирует качественные монтажные работы</p>
							</div>
							<a  id="make-request" class ="btn welcome-btn" href="#">Оставить заявку</a>
						</div>
					</div>
				</div>
				<div class="slider-dot-controller">
				</div>
			</div>
		</div>
		<article id="works"> 
			<h3> Наши проекты</h3>
			<div class ="example-works">
				<div class ="slider">
					<div class ="slider-but-controller">
						<button id="slider-prev" class ="slider-arrow img"></button>
						<button id="slider-next" class ="slider-arrow img"></button>
					</div>
					<div class="slider-container">	
						<div class ="slider-track">
							<div class =" slider-item">
								<div class ="wokr-example-container">
									<div class ="work-example-img img" style ="background-image: url(/source/image/ExampleWorks/example-wokk-1.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-2.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-3.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-4.jpg)">	</div>	
								</div>
								
							</div>
							<div class =" slider-item">
								<div class ="wokr-example-container">
									<div class ="work-example-img img" style ="background-image: url(/source/image/ExampleWorks/example-wokk-5.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-6.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-7.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-8.jpg)">	</div>	
								</div>
								
							</div>
							<div class =" slider-item">
								<div class ="wokr-example-container">
									<div class ="work-example-img img" style ="background-image: url(/source/image/ExampleWorks/example-wokk-9.jpg)">	</div>	
									<div class ="work-example-img img"style ="background-image: url(/source/image/ExampleWorks/example-wokk-10.jpg)">	</div>	
								</div>
								
							</div>
						</div>
					</div>
					<div class="slider-dot-controller">
					</div>
				</div>
			</div>
			<div class="container-btn-calcPrice">
				<a href="#" class ="btn "> расчитать стоимость </a>
			</div>
		</article>
		<article id="about-company">
			<h3>О компании</h3>
			<div class="article-content">
				<div class ="img about-company-img"></div>
				<div class="right-content">
					<p class ="article-title">СК Тандем</p>
					<p class ="article-text" id="about-company-text">Мы более 5 лет специализируемся на фасадных, кровельных и оконных работах. Мы проанализировали потребности потребителей и с 95% уверенностью можем подобрать подходящие под ваши потребности качественные материалы, по доступным ценам.
					В нашем каталоге вы можете ознакомиться с ассортиментом  материалов, подобрать для себя интересующие варианты, заказать доставку, а также монтажные работы</p>
					<div class="bottom-content">
						<a  class ="btn gray"href="catalog.php">Перейти в каталог</a>
						<a class ="btn gray" href="service-siding.php">Перейти к услугам</a>
					</div>
				</div>
			</div>
		</article>
		<article id="advantages">
			<h3>Наши приемущества</h3>
			<div class="article-content">
				<div class="conteiner-advantages">
					<div class ="advantages-item" id="advantages-1">
						<img class ="advantages-img img" src="source/icons/advantages1.svg">
						<div class ="advantages-text">Работаем по договору с фиксированной ценой</div>
					</div>
					<div class ="advantages-item " id="advantages-2">
						<img class ="advantages-img img" src="source/icons/advantages2.svg">
						<div class ="advantages-text">Качественно выполняем свою работу</div>
					</div>
					<div class ="advantages-item" id="advantages-3">
						<img class ="advantages-img img" src="source/icons/advantages3.svg">
						<div class ="advantages-text">Письменная гарантия на свою работу</div>
					</div>
					<div class ="advantages-item" id="advantages-4">
						<img class ="advantages-img img" src="source/icons/advantages4.svg">					
						<div class ="advantages-text">Лучшие поставщики</div>
					</div>
					<div class ="advantages-item"id="advantages-5">
						<img class ="advantages-img img" src="source/icons/advantages5.svg">
						<div class ="advantages-text">Наличие необходимого оборудования</div>
					</div>
					<div class ="advantages-item" id="advantages-6">
						<img class ="advantages-img img" src="source/icons/advantages6.svg">
						<div class ="advantages-text">Материалы высокого качества</div>
					</div>
				</div>
			</div>
		</article>
		<article id="team">
			<h3>Наша команда</h3>
			<div class="article-content">
				<div class="team-container">
					<?php  CreateWorkerItem($connection) ?>		
				</div>
			</div>
		</article>
		<article id="map">
			<h3>Мы на карте</h3>
			<div class="article-content">
				<div class ="modal map-container">
					<a class ="map-btn modal-btn" id="modal-btn"href="#" >
						<div class ="map-img img"><span>Открыть карту</span></div>
					</a>
					<div class ="modal-menu map-active">
						<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1ade848bb033b903cc25b7997aeead5950b7a25697ae55708765a33f9759b591&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
						<a class ="modal-btn-close" id="modal-btn-close"href="#">
							<div class="img">

							</div>
						</a>
					</div>
				</div>
			</div>
		</article>

	</main>
	<?php require_once './components/footer.php' ?>
	
	<script type="module" src="js/mainjs.js"></script>
</body>
</html>