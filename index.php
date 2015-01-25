<?php
/*
	Thumbnail and rapid image service for rapid prototyping.
	Specify the height, width, text and style in the url.
	url.es/widthxheight?text#color
 */

	$url=$_SERVER["REQUEST_URI"];
/*
	$width=substr($url,strpos($url,"php")+4,strpos($url,"x")-strpos($url,"php")-4);
	$height=substr($url,strpos($url,"x")+1,strpos($url,"/",strpos($url,"x"))-strpos($url,"x")-1);
	$color=substr($url,strpos($url,"/",strpos($url,"x"))+1,strpos($url,"?")-strpos($url,"/",strpos($url,"x"))-1);
	$text=(isset($_GET['text'])?$_GET['text']:"");
	*/
	$width=(isset($_GET['width'])?$_GET['width']:"");
	$height=(isset($_GET['height'])?$_GET['height']:"");
	$text=(isset($_GET['text'])?$_GET['text']:"");
	$color=(isset($_GET['color'])?$_GET['color']:"");
	$return=null;
	if(!empty($width)&&!empty($height)){

		$return = imagecreate($width,$height);
		$color=(!empty($color)?(preg_match('/^[a-f0-9]{6}$/i', $color)?$color:"e4e4e4"):"efefef");
		$bg_color=imagecolorallocate($return, hexdec(substr($color,0,2)), hexdec(substr($color,2,2)), hexdec(substr($color,4,2)));
		if(!empty($text)){
			$x=($width-imagefontwidth( 4 ) * strlen( $text ))/2;
			$y=($height/2)-(imagefontheight(4)/2);
			$text_color=null;
			if(hexdec(substr($color,0,2))<100 || hexdec(substr($color,2,2))<100 || hexdec(substr($color,4,2))<100){
				$text_color=imagecolorallocate( $return, 255, 255, 255 );
				//echo "255";
			}
			else{
				$text_color=imagecolorallocate( $return, 0, 0, 0 );
				//echo "0";
			}
			imagestring( $return, 4, $x, $y, $text, $text_color );
		}
		header( "Content-type: image/png" );
		imagepng( $return );
		imagecolordeallocate( $line_color );
		imagecolordeallocate( $text_color );
		imagecolordeallocate( $bg_color );
		imagedestroy( $return );
	}
	else{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Place Holder images</title>
			<meta name="description" content="Place holder image service for rapid prototyping">
			<meta name="keywords" content="Placeholder, image, prototype">
			<meta name="author" content="Jacint Melero">
			<!-- Mobile viewport optimized: j.mp/bplateviewport -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href="css/style.css" rel="stylesheet" media="screen">  <!-- CSS: implied media=all -->
			<!-- CSS concatenated and minified via ant build script-->
			<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,800,900,500,600,300,200' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Average+Sans' rel='stylesheet' type='text/css'>
			<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
			<script src="http://code.jquery.com/jquery.js"></script>
			<script src="js/jquery.plugins.js" type="text/javascript"></script>
			<script src="js/bootstrap.min.js"></script>
		</head>
		<body>
			<header>
				<div class="container">
					<div id="sample" class="visible-desktop">
						<img src="http://ph.jacintomelero.es/300x200/Place+holder/455363" alt="Place holder image service" />

					</div>
					<section class="notify">
						<h1>Place Holder Images</h1>
						<h2>Quick and simple image place holder service.</h2>
						<h3>How it works?</h3>
						<p>
							Just put the width and height after the url and put that in the src attribute of an img html tag.<br/>Like this.<br/>
							<div class="code">
								&lt;img src="http://ph.jacintomelero.es/300x200" &#47;&gt;
							</div>
							<br/>
							<b>Happy prototyping!</b>
						</p>

					</section><!-- end notify section -->
				</div><!-- end container -->
			</header> <!-- end header -->

			<section class="intro">
				<div class="container">
					<article>
						<div class="feature-number"><span class="one">1</span></div>
						<h3>Size</h3>
						<p>
							Just after the url put the size with this format: /widthxheight. Don't forget the "x"!<br/> Example:<br/>
							<div class="code-desc">
								&lt;img src="http://ph.jacintomelero.es/300x200" &#47;&gt;
							</div>
						</p>
					</article>
					<article>
						<div class="feature-number"><span class="two">2</span></div>
						<h3>Text</h3>
						<p>
							If you want text in your image put after the size: / and the desired text,it will appear centered.<br/>Example:<br/>
							<div class="code-desc">
								&lt;img src="http://ph.jacintomelero.es/30x20/text" &#47;&gt;
							</div>
						</p>
					</article>
					<article>
						<div class="feature-number"><span class="three">3</span></div>
						<h3>Color</h3>
						<p>
							And if you want a differente background color put another / after the text(required) with the hex color code. Example:<br/>
							<div class="code-desc">
								&lt;img src="http://ph.jacintomelero.es/20x20/text/fefefe" &#47;&gt;
							</div>
						</p>
					</article>
				</div><!-- end container -->
			</section><!-- end intro section -->

			<footer>
				<ul>
					<li><a href="http://www.jacintomelero.co">About Me</a></li>
					<li><a href="mailto:correo@jacintomelero.es">Contact</a></li>
				</ul>

			</footer><!-- end footer -->

			<!-- Google Analytics -->
			<script type="text/javascript">

				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-0000000-0']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();

			</script>


			<script>

				$("#slideshow > div:gt(0)").hide();

				setInterval(function() {
					$('#slideshow > div:first')
					.fadeOut(800)
					.next()
					.fadeIn(800)
					.end()
					.appendTo('#slideshow');
				},  3000);

			</script>


		</body>
		</html>

		<?
		//$return=imagecreate( 100, 100 );
		//$background = imagecolorallocate( $return, 238, 238, 238 );
		//$text_colour = imagecolorallocate( $return, 200, 200,200  );
		//imagestring( $return, 4, 50, 50, "sin tamaño", $text_colour );
	}


?>
