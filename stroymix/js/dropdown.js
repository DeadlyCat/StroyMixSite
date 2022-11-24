export default class DropDown{

	constructor(dropdown) {
		this.dropdown = dropdown;
		var dropdownlist = dropdown.querySelector('.dropdown-list');
		var dropdownBtn = dropdown.querySelector('#dropdown-btn');
		window.onclick = function(elem) {
			if(elem.target.id !="dropdown-btn"){
				ActiveList(false,dropdownlist);
			}
		}
		dropdownBtn.onclick = function() {
			ActiveList(true,dropdownlist);
		}
		dropdownBtn.onmouseover = function() {
			ActiveList(true,dropdownlist);
		}
		function ActiveList(bool,list){
			if(bool ===true){
				list.style.display = "flex";
			}else{
				list.style.display = "none";
			}
		}
	}
	

	
}
