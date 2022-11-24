import CatalogItem from './CatalogElem.js';
export default class findManager{
	constructor(manager){
		this.manager = manager;
		let Form_TypeWork = document.forms.typeWork;
		let Form_Type = document.forms.type;
		let BtnFormSend = manager.getElementsByClassName('send-find-btn')[0];
		let Catolog = document.getElementsByClassName('container-catalog')[0];
		let FiltherActive = false;
		for (var i = 0; i < Form_TypeWork.length; i++) {
			Form_TypeWork[i].oninput = function() {
			}
		}
		for (var i = 0; i < Form_Type.length; i++) {
			Form_Type[i].oninput = function() {
			}
		}
		function SendForm(){
			let request = new XMLHttpRequest();
			let empty = true;
			let url ="./components/db/HandlerFindRequesr.php?";
			for (var i = 0; i < Form_TypeWork.length; i++) {
				if(Form_TypeWork[i].checked == true){
					url +=Form_TypeWork[i].name +"=typeWork"+"&";
					empty = false;
				}	
				
			}
			for (var i = 0; i < Form_Type.length; i++) {
				if(Form_Type[i].checked == true){
					url +=Form_Type[i].name +"=type"+"&";
					empty = false;
				}	
				
			}
			request.open("Get", url);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.addEventListener("readystatechange", () => {
				if(request.readyState === 4 && request.status === 200) {  
					if(request.responseText !=null || request.responseText !='' ) {
						Catolog.innerHTML = request.responseText;
						CatalogUpdate();
					}    

				}
			});
			if(empty == false){
				request.send();
				FiltherActive = true;
			}
			if(empty == true && FiltherActive == true){
				location.reload();
			}

		}
		function CatalogUpdate() {
			if(document.getElementsByClassName('catalog-item').length > 0){
			let _CatalogItem = document.getElementsByClassName('catalog-item');

			let _catalog = Array();
			for (var i = 0; i < _CatalogItem.length; i++) {
				_catalog.push(new CatalogItem(_CatalogItem[i]));
			}
			
		}
		}
		var catalUpdateHelper = CatalogUpdate();
		BtnFormSend.onclick = function() {
			SendForm();
		}
	}
	  CatalogItemUpdate(){
		this.catalUpdateHelper;
	}


}
