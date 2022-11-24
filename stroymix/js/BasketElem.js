import Cookies from './Cookies.js';
import basketCounter from './BasketCounter.js';
let cookies = new Cookies();
let counter = new basketCounter();
export default class BasketElem{
	constructor(basket){
		this.basket = basket;
		let Id = basket.id;
		let btnMinusELem  = basket.getElementsByClassName('basketMinus')[0];
		let btnPlusELem =  basket.getElementsByClassName('basketPlus')[0];
		let btnDelELem = basket.getElementsByClassName('item-del')[0];
		let CountElem = basket.getElementsByClassName('count-product')[0];
		let PriceElems = basket.getElementsByClassName('basket-item-price')[0];
		let ElemCheck = basket.getElementsByClassName('basket-toggle')[0];
		let BasketContainer = document.getElementsByClassName('container-basket')[0];
		ElemCheck.oninput  = function() {
			Checked();
		}
		btnMinusELem.onclick = function(){
			MinusElem();
		}
		btnPlusELem.onclick = function(){
			PlusElem();
		}
		btnDelELem.onclick  = function() {
			DelElem();
		}
		function MinusElem(){
			let json = cookies.getCookie("basket");
			let AllCount = -1;
			if(json != undefined){
				let params = JSON.parse(json);
				for (var i = 0; i < params.length; i++) { 
					AllCount += params[i].count;
					
					if(params[i].id == Id){
						if(params[i].count >1){
							params[i].count--;
							CountElem.textContent = params[i].count;
						}else{
							DelElem();
						}
					}
				}
				counter.UpdateCount(AllCount);
				json = JSON.stringify(params);
				cookies.setCookie("basket",json);
			}
		}
		function Checked(){
			let json = cookies.getCookie("basket");
			let AllCount = 0;
			if(json != undefined){
				let params = JSON.parse(json);
				for (var i = 0; i < params.length; i++) {
					if(params[i].id == Id){
						params[i].check = !params[i].check;
						json = JSON.stringify(params);
						cookies.setCookie("basket",json);
					}
				}
			}
		}
		function PlusElem(){
			let AllCount = 0;
			let json = cookies.getCookie("basket");
			if(json != undefined){
				let params = JSON.parse(json);
				for (var i = 0; i < params.length; i++) {
					if(params[i].id == Id){
						params[i].count++;
						json = JSON.stringify(params);
						cookies.setCookie("basket",json);
						CountElem.textContent = params[i].count;
					}
					AllCount += params[i].count;
					counter.UpdateCount(AllCount);
				}
			}
		}
		function DelElem(){
			let AllCount = 0;
			basket.remove();
			let json = cookies.getCookie("basket");
			if(json != undefined){
				let params = JSON.parse(json);
				for (var i = 0; i < params.length; i++) {
					if(params[i].id == Id){
						params.splice(i,1);
						if(params.length == 0){
							BasketContainer.innerHTML ='<p class ="empty-basket"> Корзина пустая, перейти в <a class ="btn" href ="catalog.php">каталог</a> </p>';
							AllCount = 0;
						} else{				
						}						
					}else{
						AllCount += params[i].count;
					}
				}
				json = JSON.stringify(params);
				cookies.setCookie("basket",json);
				counter.UpdateCount(AllCount);
			}
			
		}
	}
}