import Cookies from './Cookies.js';
import basketCounter from './BasketCounter.js';
let cookies = new Cookies();
let counter = new basketCounter();
export default class CatalogItem{
	constructor(catalogElem){
		this.catalogElem = catalogElem;
		let btnInBasket = catalogElem.getElementsByClassName('inBasket-btn')[0];
		let Id = catalogElem.id;
		let Count = 0;
		let Check = true;
		GetCount();
		btnInBasket.onclick = function() {
			let basket_json = cookies.getCookie("basket");
			let basket_array = Array();
			let AllCount = 0;
			Count++;
			let elemParams = {
				id: Id,
				count: Count,
				check: Check
			};
			if(basket_json != undefined){
				basket_array = JSON.parse(basket_json);
			}else{
				basket_array.push(elemParams);
			}
			let Found = false;
			for (var i = 0; i < basket_array.length; i++) {
				
				if(basket_array[i].id == Id){
					Found = true;
					break;
				}
			}
			if(Found == true){
				basket_array[i].count++;
			} else{
				basket_array.push(elemParams);
			}
			for (var i = 0; i < basket_array.length; i++) {
				AllCount +=basket_array[i].count;
			}
			counter.UpdateCount(AllCount);
			basket_json = JSON.stringify(basket_array);
			cookies.setCookie("basket",basket_json);
			return false;
		}
		function GetCount(){
			let json = cookies.getCookie("basket");
			if(json != undefined){
				let params = JSON.parse(json);
				for (var i = 0; i < params.length; i++) {
					if(params[i].id == Id){
						Count = params[i].count;
						Check = params[i].check;
					}
				}
			} else{
				Count = 0;
				Check = true;
			}

		}
		
	}
}