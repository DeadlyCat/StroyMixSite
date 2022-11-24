<div class ="callBack">
	<div class ="callback-container">
		<p class="callBack-title">Форма заявки</p>
		<form name ="callback" >
			<div class ="callBack-item">
				<span>Имя</span>
				<input type="text" name="UserName">
			</div>
			<div class ="callBack-item">
				<span>Телефон</span>
				<input type="tel" name="UserTel">
			</div>
			<div class ="callBack-item">
				<span>Вид услуги</span>
				<select name="typeWork" size="1" class ="callBack-typeWork" >
					<option class ="select-item">	Фасадные работы</option>
					<option class ="select-item">Кровельные работы</option> 
					<option class ="select-item">Установка окон</option> 
					<option class ="select-item">Установка забора</option> 
				</select>
			</div>
			<div class ="callBack-item">
				<span>Площадь</span>
				<input type="number" name="Squre">
			</div>
			<div class ="callBack-item">
				<input class ="callBack-send"type="submit" name="SendRequest" value="Оставить заявку">
			</div>
			<div >
				<span class ="privacy-policy">
					нажимая кнопку "оставить заявку" вы принимаете <a href="privacy.php">Положение</a> и <a href="">Согласие </a> на обработку персональных данных 
				</span>
			</div>
		</form>
		<a class ="modal-btn-close" id="modal-btn-close"href="#">

			<div class="img"></div>
		</a>
	</div>

</div>