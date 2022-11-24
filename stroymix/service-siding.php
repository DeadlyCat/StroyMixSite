<!DOCTYPE html>
<html>
<?php require_once './components/head.php' ?>
<body>
	<?php require_once './components/header.php' ?>
	<main>
		<?php require_once './components/callBack.php' ?>
		<div class="welcome">
			<div class ="welcome-container">
				<div class ="img slider-item">
					<img class ="slider-bg"src="../source/image/welcome-siding.png">
					<div class="welcome-text-container">
						<p class ="welcome-text">
							Отделка фасадов
							<br>
							<br>
							Огромный ассортимент высококачественных фасадных материалов, мы подберем подходящий для вас вариант. Наши специалисты имеют опыт более 10 лет, что гарантирует качественные монтажные работы
						</p>
					</div>
					<a  id="make-request" class ="btn welcome-btn" href="#">Оставить заявку</a>
				</div>
			</div>
		</div>
		<article id="application-siding">
			<h3>Применение фасадных панелей</h3>
			<div class="article-content">
				<div class ="type-service-container">
					<div class="type-service">
						<div class="img type-service-img-container" style ="background-image: url(/source/image/siding-house.jpg);"></div>

						<h4>Отделка частных домов</h4>
						<p class ="type-service-text article-text">Новый фасад освежит внешний вид вашего дома, укрепит и утеплит его</p>
					</div>
					<div class="type-service">
						<div class="img type-service-img-container" style ="background-image: url(/source/image/siding-shops.jpg);"></div>
						<h4>Отделка комерческих помещений</h4>
						<p class ="type-service-text article-text" article-text>Фасадная отделка комерческий зданий способствует привлечению новых клиентов</p>
					</div>
					<div class="type-service">
						<div class="img type-service-img-container"style ="background-image: url(/source/image/siding-other.jpg);"></div>
						<h4>Отделка цокольных помещений,забора, тд.</h4>
						<p class ="type-service-text article-text">Фасадная отделка забора или цоколя, придаст дому красочности </p>
					</div>
				</div>
			</div>
		</div>
	</article>
	<article id="example-work-siding">
		<h3>Примеры материалов</h3>
		<div class="article-content ">
			<div class ="slider">
				<div class ="slider-but-controller">
					<button id="slider-prev" class ="slider-arrow img"></button>
					<button id="slider-next" class ="slider-arrow img"></button>
				</div>
				<div class="slider-container">
					<div class ="slider-track">
						<?php  CreateExpampleMaterialItem($connection,"Siding");?>
					</div>	
				</div>
				<div class="slider-dot-controller dark">

				</div>
			</div>
		</div>
	</div>
</article>
<article class ="example-works-article" id="example-material-siding">
	<h3>Наши работы</h3>
	<div class="article-content ">
		<div class ="slider">
			<div class ="slider-but-controller">
				<button id="slider-prev" class ="slider-arrow img"></button>
				<button id="slider-next" class ="slider-arrow img"></button>
			</div>
			<div class="slider-container">
				<div class ="slider-track">
					<?php CreateWorkItem($connection,"Siding"); ?>
				</div>	
			</div>
			<div class="slider-dot-controller dark"></div>
		</div>
	</div>
</div>
</article>
</main>

 

<?php require_once './components/footer.php' ?>
<script type="module" src="../js/mainjs.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" referrerpolicy="no-referrer"></script>
<script src ="https://cdn.rawgit.com/mrdoob/three.js/master/examples/js/loaders/GLTFLoader.js"></script>
<script >
	
	class Menager3D{
		constructor(parent){
			this.parent = parent;
			let convas = parent.getElementsByClassName('material-img')[0];
			let pach = convas.dataset.pach;
			let otherMaterials = parent.getElementsByClassName('type-material-item');
			var obj =null;
			let startRot = 3.3;

			const gltfLoader = new THREE.GLTFLoader();
			const scene = new THREE.Scene();
			const camera = new THREE.PerspectiveCamera( 45, 4 / 3, 0.1, 1000 );
			camera.position.z = 15;
			const renderer = new THREE.WebGLRenderer({alpha:true,antialias:true});
			renderer.setClearColor(0x000000,0);
			var resize = window.onresize;
			renderer.setSize(650, 550);
			renderer.domElement.setAttribute("id", "HouseModelConvas");
			convas.appendChild( renderer.domElement );
			let ConvasRender = renderer.domElement;
			let AnimateModel = false;
			const aLigth = new THREE.AmbientLight(0x404040,1);
			scene.add(aLigth);
			const pLight = new THREE.PointLight(0xFFFFFF,1);
			pLight.position.set(-4, -2,7);
			scene.add(pLight);
			const pLight2 = new THREE.PointLight(0xFFFFFF,1);
			pLight2.position.set(4, 2,7);
			scene.add(pLight2);		
			LoadModel(pach);

			let UseMat = otherMaterials[0];
			for (var i = 0; i < otherMaterials.length; i++) {

				otherMaterials[i].onclick = function(){

					if(this !== UseMat){
						ChangeMaterial(this);
						UseMat = this;
					}
				}

			}

			function ChangeMaterial(elem) {
				convas.dataset.pach = elem.dataset.pach;
				for (var i = 0; i < otherMaterials.length; i++) {
					otherMaterials[i].style.borderWidth = "2px";
				}
				elem.style.borderWidth = "3px";
				LoadModel(convas.dataset.pach);
			}
			const animate = function () {
				requestAnimationFrame( animate );
				if(AnimateModel == true){
					
					if(obj != null){
						obj.rotation.y += 0.002;
						renderer.render( scene, camera );

					}
				}
				

			};
			function LoadModel(url) {
				if(obj !=null){
					scene.remove(obj);
					startRot = obj.rotation.y;
					obj = null;
				}
				gltfLoader.load(url, (gltf) => {
					obj = gltf.scene;

					obj.position.y = -1.8;
					obj.rotation.x = 0.15;
					obj.position.x = -0.25;
					obj.rotation.y = startRot;
					obj.scale.set(0.018,0.018,0.018);
					scene.add(obj);
					renderer.render( scene, camera );

				});
			}
			CheckAnim();
			let ZoomOn = true;
			function CheckAnim(){
				if(window.innerWidth > 800){
					AnimateModel = true;
				}
				else{
					AnimateModel = false;
				}
			}
			animate();
			let onresize = window.onresize;
			window.onresize = function() {
				CheckAnim();
				onresize && onresize();
			}

		}
	}
</script>
<script >
	let Container3D = document.getElementsByClassName('example-material-box');
	let ArrayConvas = Array();
	for (var i = 0; i < Container3D.length; i++) {
		ArrayConvas.push(new Menager3D(Container3D[i]));
	}
	
	
</script>
</body>
</html>