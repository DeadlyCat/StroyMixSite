export default class Slider {

	constructor(slider){
		this.slider = slider;
		var sliderContainer = slider.querySelector(".slider-track");
		var ButNext = slider.querySelector("#slider-next");
		var ButPrev = slider.querySelector("#slider-prev");
		var Slider_dot_Container = slider.querySelector('.slider-dot-controller');
		var DotButs = Array(); 
		var Pos = 0;
		var IndexElem = 0;
		var widthSliderElem;
		var CountElems ;
		var sliderWidth = CountElems * widthSliderElem;
		var timeSliding = "0.5s";
		var DotExample = document.createElement('button');
		var StepSwipe = 100;
		
		DotExample.classList.add('slider-dots');
		DotExample.classList.add('img');
		if(sliderContainer.getElementsByClassName('slider-item').length >0){
			CountElems = sliderContainer.getElementsByClassName('slider-item').length;
			AddDots(CountElems);
			SelectDot(IndexElem);
		} 
		var originPos;
		var clientX;
		var CanSwipe = false;
		var Dir = 0;
		if(sliderContainer.getElementsByClassName('slider-item')[0] != null){
			widthSliderElem = sliderContainer.getElementsByClassName('slider-item')[0].offsetWidth;
		}
		sliderContainer.addEventListener('touchstart',e =>{
			originPos = e.changedTouches[0].clientX;
			
		},{passive:false});
		sliderContainer.addEventListener('touchmove',e =>{
			clientX = e.changedTouches[0].clientX;
			
			if(Math.abs(originPos - clientX) > StepSwipe ){
				CanSwipe = true;
				if(originPos > clientX ){
					Dir = 1;
				}
				if(originPos < clientX ){
					Dir = -1;
				}
				originPos = clientX;
			}
		},{passive:false});
		sliderContainer.addEventListener('touchend',e =>{
			if(CanSwipe == true){
				IndexElem += 1 * Dir;
				if(Dir>0){
					if(IndexElem >(CountElems - 1)){
						IndexElem = 0;
						Pos = 0;
					}
				}
				if(Dir<0){
					if(IndexElem < 0){
						IndexElem = (CountElems - 1);
						Pos = (sliderWidth  - widthSliderElem);
					}
				}
				Pos = Pos + widthSliderElem * Dir;
				MoveSlide(Pos,timeSliding);
				SelectDot(IndexElem);
				CanSwipe = false;
				Dir =0;
			}
		});
		function SelectPos(){
			originPos = window.clientX;
		}
		function AddDots(count){
			for(let i=0; i < count;i++){
				let CloneDot = DotExample.cloneNode(true);
				Slider_dot_Container.append(CloneDot);
				DotButs.push(CloneDot);
			}
		}
		var onresize = window.onresize;
		window.onresize = function(){
			if(CountElems >0){
				widthSliderElem = sliderContainer.getElementsByClassName('slider-item')[0].offsetWidth;
				sliderWidth =  CountElems * widthSliderElem;
				Pos = widthSliderElem * IndexElem;
				MoveSlide(Pos,"0s");
			}
			onresize && onresize();
		}
		if(CountElems >0){
			for(let i =0; i < DotButs.length;i++){
				DotButs[i].onclick = function() {
					SelectDot(i);
				}
			}
		}
		
		function MoveSlide(pos,transition){
			sliderContainer.style.transition = transition;
			sliderContainer.style.transform = "translateX(" + -pos + "px)";	

		}
		function SelectDot(index){
			deactiveDots();
			IndexElem = index
			DotButs[IndexElem].classList.add('select-img');
			Pos = widthSliderElem * IndexElem;
			MoveSlide(Pos,timeSliding);
		}
		function deactiveDots(){
			for(let i =0; i < DotButs.length;i++){
				DotButs[i].classList.remove('select-img');
			}
		}
		ButNext.onclick = function() {
			if(CountElems >0){
				MovingRight();
			}
		}
		function MovingLeft(){
			IndexElem -= 1;
			Pos -= widthSliderElem;
			if(IndexElem < 0){
				IndexElem = (CountElems - 1);
				Pos = (sliderWidth  - widthSliderElem);
			}
			MoveSlide(Pos,timeSliding);
			SelectDot(IndexElem);
		}
		function MovingRight(){
			IndexElem += 1;
			Pos += widthSliderElem;
			if(IndexElem >(CountElems - 1)){
				IndexElem = 0;
				Pos = 0;
			}
			MoveSlide(Pos,timeSliding);
			SelectDot(IndexElem);
		}
		ButPrev.onclick = function() {
			if(CountElems >0){
				MovingLeft();
			}	
		}
	}

}
