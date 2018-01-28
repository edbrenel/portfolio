<?php
session_start();
date_default_timezone_set('Europe/London');

if(isset($_SESSION['Success'])) {
	$toastClass = '';
	$toast = '<h4>Your message has been sent</h4>';
	$toast .= '<p>SUCCESSFULLY !</p>';
	$toast .= '<p>We\'ll get back to You shortly.</p>';
} else {
	$toastClass = ' hidden';
	$toast = '<h4>No celebration</h4>';
}
$alert_message = (isset($_SESSION['alert']))? $_SESSION['alert'] : ' class="hidden">No alerts';
$name_inp = (isset($_SESSION['name_val']))? 'value="'.$_SESSION['name_val'].'" ' : '';
$name_inp .= (isset($_SESSION['name_err']))? 'class="alert" ' : '';
$email_inp = (isset($_SESSION['email_val']))? 'value="'.$_SESSION['email_val'].'" ' : '';
$email_inp .= (isset($_SESSION['email_err']))? 'class="alert" ' : '';
$mess_val = (isset($_SESSION['message_val']))? $_SESSION['message_val'] : '';
$mess_class = (isset($_SESSION['message_err']))? 'class="alert" ' : '';
foreach ($_SESSION as $key => $value) {	unset($_SESSION[$key]); }

$siteTitle = "AppSeek.site";
$sub_link = "";
//$sub_link = "appseek/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="robots" content="index,nofollow">
	<title><?= $siteTitle; ?></title>
	<!--<base href="http://appseek.site/"/>-->
	<base href="http://localhost/html/appseek/"/>
<!--[if lt IE 9]>
	<script src="js/html5/dist/html5shiv.js"></script>
<![endif]-->
	<link rel="stylesheet" href="<?= $sub_link; ?>css/styles.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src="<?= $sub_link; ?>js/jquery.min.js"></script>
	<script src="<?= $sub_link; ?>js/jquery-ui.min.js"></script>
	<script src="<?= $sub_link; ?>js/jquery.flip.min.js"></script>
	<script src="<?= $sub_link; ?>js/main.js"></script>
</head>
<body id="Home">
<header>
	<a href="#Home">AppSeek.site</a>
</header>
<nav>
	<ul>
		<li class='front'><a href="#Contact" title="Contact">Contact</a></li>
		<li class='back'><a href="#Contact" title="Contact">Contact</a></li>
	</ul>
	
</nav>
<main>
	<div id="curtain"></div>
<script type="text/javascript">
	$("div#curtain").css("z-index", 2);
</script>

	<!-- Div 1 Section -->

	<div id="Intro">
		<h1>Welcome to</h1>
		<h2 id="siteTitle"><?php
			$arr_string = str_split($siteTitle);
			foreach ($arr_string as $value) {
				echo "<font>" . $value , "</font>";
			}
		?></h2>
		<section>
			<p>We design and develop Android apps.</p>
			<img src="<?= $sub_link; ?>images/compatibility.png" alt="Compatibility" />
			<p>Describe what type of application you need and we'll give you a free quotation.</p>
		</section>
	</div>

<script type="text/javascript">
	$("div#Intro h1").css("font-size", 0);
	$("div#Intro h2").css("font-size", 0);
	$("div#Intro h3").css("font-size", 0);
	$("div#Intro section").css({width: 0, "margin-top": "160px", padding: 0});
	$("div#Intro section p").css({color: "#138700", "font-size": 0});
	$("div#Intro section img").css("width", 0);
</script>

	<!-- Contact Section -->

	<div id="Contact">
		<h1>Contact</h1>
		<p>
			<img src="<?= $sub_link; ?>images/envelope.png" alt="Envelope">
			Email: contact@AppSeek.site
		</p>
		<form method="post" action="contact.php">
			<section>
				<h3 id="alerts"<?= $alert_message; ?></h3>
			</section>
			<input id="name" name="name" <?= $name_inp; ?>placeholder="Name">
			<input id="email" name="email" <?= $email_inp; ?>placeholder="Email">
			<textarea id="message" name="message" <?= $mess_class; ?>placeholder="Message"><?=
				$mess_val; ?></textarea>
			<input class="submit" type="submit" value="Send">
		</form>
	</div>
	<!-- END Contact Section -->

	<section class="toast<?= $toastClass; ?>">
		<?= $toast; ?>
	</section>
</main>
<footer>
	<p>&copy; AppSeek.site <?= date("Y"); ?></p>
</footer>
</body>
</html>
