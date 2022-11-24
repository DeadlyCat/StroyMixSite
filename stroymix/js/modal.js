export default  class Modal {
	constructor(modal){
		this.modal = modal;
		let ModalMenu = modal.getElementsByClassName('modal-menu')[0];
		let ModalBut = modal.getElementsByClassName('modal-btn')[0];
		let ModalBut_close = modal.getElementsByClassName('modal-btn-close')[0];
		let OpenModal = false;
		let body = document.getElementsByTagName('body')[0];
		ModalBut.onclick = function() {
			ActiveModal();

			return false;
		}
		var onscroll = window.onscroll;
		window.onscroll = function() {
			onscroll && onscroll();
			return !OpenModal;
		}
		document.addEventListener('keydown', function(e){
			if(e.code =="Escape" ||e.code =="Backspace"){
				CloseModal();
			}
		});
		ModalBut_close.onclick = function() {
			CloseModal();
			return false;
		}
		function ActiveModal(){
			body.style.overflow ="hidden";
			ModalMenu.style.display = "block";
			OpenModal = true;
		}
		function CloseModal(){
			body.style.overflow ="auto";
			ModalMenu.style.display = "none";
			OpenModal = false;
		}
	}
}