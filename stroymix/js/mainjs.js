import DropDown from './dropdown.js';
import Slider from './Slider.js';
import Modal from './modal.js';
import CallBack from './CallBack.js';
import BasketElem from './BasketElem.js';
import findManager from './FindManager.js';
window.onload = function () {
	let DropDownElem = document.getElementsByClassName('dropdown');
	let footer = document.getElementsByTagName('footer')[0];
	let body = document.getElementsByTagName('body')[0]; 
	let header = document.getElementsByTagName('header')[0]; 
	let CallBackElem = document.getElementsByClassName('callBack')[0];
	let main = document.getElementsByTagName('main')[0];
	let findManager_elem  = document.getElementsByClassName('filter-menu')[0];
	let scrollText = document.getElementsByClassName('welcome-text');
	let BurgerBtn = document.getElementsByClassName('burger-btn')[0];
	let BurgerMenu = document.getElementsByClassName('burger-menu')[0];
	let OpenBurger = false;
	let LoadPanel = document.getElementById('load-page');
	if(findManager_elem != null){
		var _findManager = new findManager(findManager_elem);
		_findManager.CatalogItemUpdate();
	}
	
	LoadPanel.remove();
	BurgerMenu.style.display = "none";
	BurgerBtn.onclick = function() {
		if(OpenBurger == true){
			BurgerMenu.style.display ="none";
			header.style.position = "relative";
			OpenBurger = false;
			EnableScroll();
		} else{
			BurgerMenu.style.display ="flex";
			header.style.position = "fixed";
			OpenBurger = true;
			DisableScroll();
		}
	}
	function EnableScroll() {

		window.onscroll = function() {
			onscroll && onscroll();
		};
	}
	function DisableScroll() {
		scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
		window.onscroll = function() {
			window.scrollTo(scrollLeft, scrollTop);
			onscroll && onscroll();
		};
	}
	if(scrollText != null){
		for (var i = 0; i < scrollText.length; i++) {
			CheckScrollElem(scrollText[i]);
		}
	}

	function CheckScrollElem(elem){
		if(elem.scrollHeight > elem.clientHeight ){
			elem.style.overflowY = "scroll";

		} else{
			elem.style.overflowY = "hidden";
		}
	}

	main.style.minHeight = "calc(100vh - " + header.offsetHeight +"px)";
	
	if(document.getElementsByClassName('basket-item').length > 0){

		let _BasketElem = document.getElementsByClassName('basket-item');
		let _basket = Array();
		for (var i = 0; i < _BasketElem.length; i++) {
			_basket.push(new BasketElem(_BasketElem[i]));
		}
	}
	if(CallBackElem !=null){
		let _callBack = new CallBack(CallBackElem);
	}
	UpdatePosFooter();
	if(DropDownElem != null){
		let _dropdown = Array();
		for(let i =0; i< DropDownElem.length; i++ ){
			_dropdown.push(new DropDown(DropDownElem[i]));
		}
	}
	let SliderElem = document.getElementsByClassName('slider');
	if(SliderElem != null){
		let _slider = Array();
		for(let i =0; i< SliderElem.length; i++ ){
			_slider.push(new Slider(SliderElem[i]));
		}
	}
	let ModalElem = document.getElementsByClassName('modal');
	if(ModalElem != null){
		let _modal = new Array();
		for(let i =0; i< ModalElem.length; i++ ){
			_modal.push(new Modal(ModalElem[i]));
		}
	}
	
	let WelcomeBtns = document.getElementsByClassName('welcome-btn');

	for(let i =0; i< WelcomeBtns.length; i++ ){
		Centering(WelcomeBtns[i],true);
	}
	function Centering(elem,absol) {
		if(absol == true){
			elem.style.left = "calc(50% - " + (elem.offsetWidth /2) +"px)";
		}else{
			elem.style.marginLeft = "calc(50% - " + (elem.offsetWidth/2) +"px)";
		}
	}
	var onresize = window.onresize;
	window.onresize = function() {
		for(let i =0; i< WelcomeBtns.length; i++ ){
			Centering(WelcomeBtns[i],true);
		}
		if(scrollText != null){
			for (var i = 0; i < scrollText.length; i++) {
				CheckScrollElem(scrollText[i]);
			}
		}
		UpdatePosFooter();
		onresize && onresize();
	}
	var onscroll = window.onscroll;
	function UpdatePosFooter(){
		if(body.offsetHeight < (window.innerHeight + footer.offsetHeight)){
			footer.style.margin = "0px";
			footer.style.top = (window.innerHeight - body.offsetHeight + footer.offsetHeight) + "px";
		}
	}
}