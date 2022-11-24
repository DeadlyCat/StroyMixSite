<?php 	
$countBasket = trim($_COOKIE["countBasket"]);
if(empty($countBasket)){
	$countBasket = 0;
	setcookie("countBasket",$countBasket,time()+1209600);
}
?>
<!DOCTYPE html>
<html>
<?php require_once './components/head.php' ?>
<body>
	<?php require_once './components/header.php' ?>
	<main>
		<?php require_once './components/callBack.php' ?>
		<article class ="welcome-article"id="contacts">
			<h3>Контакты</h3>
			<div class="article-content">
				<div class="container-contacts">
					<div class ="container-contacts-info">
						<h4>Проконсультироваться</h4>
						<ul class ="contacts-info-list">
							<li class ="contacts-info-list-item">Артур: 8(904)-504-2-504 </li>
						</ul>
					</div>
					<div class ="container-contacts-info">
						<h4>Сотрудничество</h4>
						<ul class ="contacts-info-list">
							<li class ="contacts-info-list-item">Артур: 8(904)-504-2-504 </li>
						</ul>
					</div>
				</div>
			</div>
		</article>
		<article id="social-web">
			<h3>Мы в соц. сетях</h3>
			<div class="article-content">
				<div class="container-contacts">
					<div class ="social-container">
						<img class ="social-img" src="../source/icons/Inst.svg">
						<a class ="social-link" href="https://www.instagram.com/sc_tandem.ru">instagram.com/sc_tandem.ru</a>
					</div>
					<div class ="social-container">
						<img class ="social-img" src="../source/icons/Vk.svg">
						<a class ="social-link" href="https://vk.com/sc_tandem">vk.com/sc_tandem</a>
					</div>
				</div>
			</div>
		</article>
		<article  id="map">
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
		<article  id="requisites">
			<h3>Реквизиты</h3>
			<div class="article-content">
				<ul class="requisites-list">
					<li class ="requisites-list-item">ИП Цыганкова Татьяна Васильевна</li>
					<li class ="requisites-list-item">ИНН:615004730120</li>
					<li class ="requisites-list-item">ОГРНИП:321619600109600</li>
					<li class ="requisites-list-item">Адрес: г. Новочеркасск ул. Им. Генерала A.И. Лебедя, д.28</li>
				</ul>

				
				

			</div>
		</article>
	</main>
	<?php require_once './components/footer.php' ?>

	<script type="module" src="js/mainjs.js"></script>
	<script type="module" src="js/dropdown.js"></script>
	<script type="module" src="js/modal.js"></script>
</body>
</html>