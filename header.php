<?php
	$domain = $_SERVER['HTTP_HOST'];
	//echo "<br/>domain = $domain";
	$url_blogname_position = 1;
	if($domain == "localhost")
		$url_blogname_position = 2;
	$uri = $_SERVER['REQUEST_URI'];
	//echo "<br/>uri = ".$uri;
	$tokens = explode('/', $uri);
	$page_url = $tokens[$url_blogname_position];
	//echo "<br/>page_url = $page_url";
	$nav_item = substr($page_url, 0, -4);
	if($nav_item == "") $nav_item = "index";
	//echo "<br/>nav_item = $nav_item";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame. Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Language" content="en" />
<meta name="description" content="Hyalual - Breathe youth into your skin with the special daily-use spray"/>
<!--meta name="keywords" content=""/-->
<!--meta name="author" content="Hyalual"/-->
<meta charset="UTF-8">
<title>Hyalual</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<!--link type="text/css" href="style/jquery.jscrollpane.css" rel="stylesheet" media="all" /-->
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-41801301-1']);
	_gaq.push(['_trackPageview']);
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<script type="text/javascript">
	var nav_item = "<?php echo $nav_item; ?>";
</script>
<script type="text/javascript" src="hyalual.js"></script>
</head>
<body>
<div id="container" style="border:0px solid;">
	<header style="border:0px solid;">
		<div style="border:0px solid;">
			<img src="images/hyalual-logo.jpg" style="float:left;border:0px solid;" alt="hyalual" title="hyalual">
			<div style="border:0px solid;display:table;">
				<div class="quotes">
					<i><b>Anti-Age</b></i> spray <b>Hyalual<sup>®</sup> Daily Delux</b> -<br/>maginficent skin and shining look every day
				</div>
				<div style="font-size:1.1em;margin:12px 0 0 0;text-align:right;">
					<a href="mailto:info@hyalual.ca">info@hyalual.ca</a> &nbsp;&nbsp;&nbsp;&nbsp; tel. +1 (416) 729-7370
				</div>
				<div style="font-size:1.1em;margin:12px 0 0 0;text-align:right;">
					 tel. +1 (604) 771-9166
				</div>
				<div style="font-size:1.1em;margin:12px 0 0 0;text-align:right;">
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div style="border:0px solid;">
			<nav>
				<ul>
					<li id="index"><a href="index.php">Home</a></li>
					<li id="why_hyalual"><a href="why_hyalual.php">Why Hyalual</a></li>
					<li id="your_skin"><a href="your_skin.php">Your Skin</a></li>
					<!--li><a href="http://dailydelux.hyalual.com/what-the-skin-look-depends-on" target="_blank">Your Skin</a></li-->
					<li id="new_formula"><a href="new_formula.php">New Formula</a></li>
					<!--li><a href="http://dailydelux.hyalual.com/the-innovative-formula" target="_blank">New Formula</a></li-->
					<li id="redermalization"><a href="redermalization.php">Redermalization</a></li>
					<!--li><a href="images/redermalization.pdf" target="_blank">Redermalization</a></li-->
					<li id="how_to_use"><a href="how_to_use.php">How to Use</a></li>
					<!--li><a href="http://dailydelux.hyalual.com/use" target="_blank">How to Use</a></li-->
					<li id="institute_hyalual"><a href="institute_hyalual.php">Institute Hyalual</a></li>
					<!--li><a href="http://dailydelux.hyalual.com/use" target="_blank">Institute Hyalual</a></li-->
					<li id="science"><a href="science.php">Scientific Background</a></li>
					<!--li><a href="http://www.uf.ua/int/post.php?id=93" target="_blank">Scientific Background</a></li-->
					<!--li id="email"><a onclick="email_open()" style="cursor:pointer;">Contact Us</a></li-->
				</ul>
			</nav>
		</div>
		<div class="clear"></div>
		<!--img src="images/hyalual-banner.jpg" style="margin:10px 0 0 0;border:0px solid;" alt="hyalual" title="hyalual"-->
	</header>
	<div class="clear"></div>
