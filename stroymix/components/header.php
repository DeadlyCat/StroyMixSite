<div id ="load-page">
	<p>Загрузка сайта</p>
	<p>Подождите пожалуйста</p>
	<div class="load-icon img"></div>
</div>
<div class="burger-menu">
	<div class ="burger-menu-container">
		<div class ="dropdown nav-item" >
			<a id="dropdown-btn"class ="nav-item" href="#">Услуги</a>
			<div class="dropdown-list">
				<a class ="dropdown-item" href="service-siding.php">Отделка фасадов</a>
				<a class ="dropdown-item" href="service-roof.php">Кровельные работы</a>
				<a class ="dropdown-item" href="service-window.php">Окна двери рольставни</a>
			</div>
		</div>
		<a class ="nav-item" href="index.php">О компании</a>
		<a class ="nav-item" href="reviews.php">Отзывы</a>
		<a class ="nav-item" href="contacts.php">Контакты</a>
	</div>
</div>
<header>
	<a href="#" class ="burger-btn">
		<div class ="img"></div>
	</a>
	
	<a href="index.php">
		<div class=" img logo"></div>
	</a>
	<div class ="nav-menu">
		<nav>
			<div class ="dropdown" >
				<a id="dropdown-btn"class ="nav-item" href="#">Услуги</a>
				<div class="dropdown-list">
					<a class ="dropdown-item" href="service-siding.php">Отделка фасадов</a>
					<a class ="dropdown-item" href="service-roof.php">Кровельные работы</a>
					<a class ="dropdown-item" href="service-window.php">Окна двери рольставни</a>
				</div>
			</div>
			<a class ="nav-item" href="index.php">О компании</a>
			<a class ="nav-item" href="reviews.php">Отзывы</a>
			<a class ="nav-item" href="contacts.php">Контакты</a>
			<a class ="nav-item" href="catalog.php">Каталог</a>
		</nav>
	</div>
	<div class="contacts">
		<div class ="contacts-item-container">
			<span class ="img"id="mail-icon"></span>
			<a class ="contacts-item" href="mailto:info@sc-tandem.ru">info@sc-tandem.ru</a>
		</div>
		<div class ="contacts-item-container"> 
			<span class ="img" id="tel-icon"></span>
			<a class ="contacts-item" href="tel:8(904)-504-2-504">8(904)-504-2-504</a>
		</div>
	</div>
	<a  class ="basket-menu"href="basket.php">
		<div class="img basket">
			<span id="basket-count">
				<?php BasketItemsCount(); ?>
			</span>
		</div>
	</a>
</header>
