<?php 
require('function.php');
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>山一的相册</title>

	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<script src="js/modernizr-custom.js"></script>

</head>

<body class="demo-1">
	<div style="text-align:center;clear:both;">
	</div>
	<div class="container">
		<div class="content">
			<div class="grid">
			       <?php
			    foreach (getall("SELECT * FROM album_pic") as $one){
			        $name=$one['1'];
			        $des=$one['2'];
			        $url=$one['3'];
			        
			        echo "<div class='grid__item' data-size='1280x850'> <a href='${url}' class='img-wrap'><img src='${url}' alt='${name}' /><div class='description description--grid'>${name}<br/><p style='font-weight:200;'>${des}</p></div></a></div>";
			    }
				
					
				?>

					
			</div>
			<!-- /grid -->
			<div class="preview">
				<button class="action action--close"><i class="fa fa-times">x</i><span
						class="text-hidden">Close</span></button>
				<div class="description description--preview"></div>

			</div>
			<!-- /preview -->
		</div>
	</div>
	<!-- /container -->

	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/main.js"></script>
	<script>
		(function () {
			// create SVG circle overlay and append it to the preview element
			function createCircleOverlay(previewEl) {
				var dummy = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
				dummy.setAttributeNS(null, 'version', '1.1');
				dummy.setAttributeNS(null, 'width', '100%');
				dummy.setAttributeNS(null, 'height', '100%');
				dummy.setAttributeNS(null, 'class', 'overlay');
				var g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
				var circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
				circle.setAttributeNS(null, 'cx', 0);
				circle.setAttributeNS(null, 'cy', 0);
				circle.setAttributeNS(null, 'r', Math.sqrt(Math.pow(previewEl.offsetWidth, 2) + Math.pow(previewEl.offsetHeight, 2)));
				dummy.appendChild(g);
				g.appendChild(circle);
				previewEl.appendChild(dummy);
			}

			new GridFx(document.querySelector('.grid'), {
				onInit: function (instance) {
					createCircleOverlay(instance.previewEl);
				},
				onResize: function (instance) {
					instance.previewEl.querySelector('svg circle').setAttributeNS(null, 'r', Math.sqrt(Math.pow(instance.previewEl.offsetWidth, 2) + Math.pow(instance.previewEl.offsetHeight, 2)));
				},
				onOpenItem: function (instance, item) {
					// item's image
					var gridImg = item.querySelector('img'),
						gridImgOffset = gridImg.getBoundingClientRect(),
						win = { width: document.documentElement.clientWidth, height: window.innerHeight },
						SVGCircleGroupEl = instance.previewEl.querySelector('svg > g'),
						SVGCircleEl = SVGCircleGroupEl.querySelector('circle');

					SVGCircleEl.setAttributeNS(null, 'r', Math.sqrt(Math.pow(instance.previewEl.offsetWidth, 2) + Math.pow(instance.previewEl.offsetHeight, 2)));
					// set the transform for the SVG g node. This will animate the circle overlay. The origin of the circle depends on the position of the clicked item.
					if (gridImgOffset.left + gridImg.offsetWidth / 2 < win.width / 2) {
						SVGCircleGroupEl.setAttributeNS(null, 'transform', 'translate(' + win.width + ', ' + (gridImgOffset.top + gridImg.offsetHeight / 2 < win.height / 2 ? win.height : 0) + ')');
					}
					else {
						SVGCircleGroupEl.setAttributeNS(null, 'transform', 'translate(0, ' + (gridImgOffset.top + gridImg.offsetHeight / 2 < win.height / 2 ? win.height : 0) + ')');
					}
				}
			});
		})();
	</script>

</body>

</html>