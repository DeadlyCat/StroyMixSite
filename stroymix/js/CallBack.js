export default  class CallBack {
	constructor(callback){
		this.callback = callback;
		let OpenForm = document.getElementsByClassName('welcome-btn');
		let CallBackForm = document.forms.callback;
		let UserNameForm = CallBackForm.elements.UserName;
		let TypeWorkForm = CallBackForm.elements.typeWork;
		let UserTelForm = CallBackForm.elements.UserTel;
		let SendFormBut = CallBackForm.elements.SendRequest;
		let UserSqureForm = CallBackForm.elements.Squre;
		let ModalBut_close = callback.getElementsByClassName('modal-btn-close')[0];
		let body = document.getElementsByTagName('body')[0];
		let OpenModal = false;
		for (var i = 0; i < OpenForm.length; i++) {
			OpenForm[i].onclick = function() {
				ActiveModal();
				return false;
			}
		}
		var onscroll = window.onscroll;
		window.onscroll = function() {
			onscroll && onscroll();
			return !OpenModal;
		}
		document.addEventListener('keydown', function(e){
			if(e.code =="Escape"){
				CloseModal();
			}
		});
		ModalBut_close.onclick = function() {
			CloseModal();
			return false;
		}
		function ActiveModal(){
			callback.style.display ="block";
			OpenModal = true;
		}
		function CloseModal(){
			callback.style.display ="none";
			OpenModal = false;
		}
		function SendForm(){
			let request = new XMLHttpRequest();
			let url = "./components/db/HandlerRequest.php";
			if((UserNameForm.value !== null && UserNameForm.value !== '' ) && (TypeWorkForm.value !== null && TypeWorkForm.value !== '' )  && (UserTelForm.value !== null && UserTelForm.value !== '' )){
				let params = "UserName=" + UserNameForm.value + "&TypeWork=" + TypeWorkForm.value + "&UserTel=" + UserTelForm.value + "&Squre=" + UserSqureForm.value;
				request.open("POST", url, true);
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				request.addEventListener("readystatechange", () => {

					if(request.readyState === 4 && request.status === 200) {   
						alert("Ваша заявка принята!");
						CloseModal();
					}
				});
				request.send(params);
			} else{
				alert("Заполните поля!");
			}
			
		}
		SendFormBut.onclick = function() {
			SendForm();
			return false;
		}

	}
}