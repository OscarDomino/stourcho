<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang= "en"><html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Stour Choral Society</title>
<link href="stourchoralsoc.css" rel="StyleSheet" type="text/css" />
<link rel="shortcut icon" type="image/png" href="favicon.png" />

</head>

<body>

<div id="wrapper">

<div id="header">
<h1></h1>

<div id="navigation">
<ul>
<li style="margin-left: 14px;"><a class="noncurrent" href="index.htm">Home</a></li>

<li><a class="noncurrent" href="about.htm">About</a></li>

<li><a class="noncurrent" href="concerts.htm">Concerts</a></li>

<li><a class="noncurrent" href="join.htm">Join Us</a></li>

<li><a class="noncurrent" href="support.htm">Support Us</a></li>

<li><a class="noncurrent" href="members.htm">Members</a></li>

<li><a class="current" href="contact.php">Contact</a></li>
</ul>

</div> <!--navigation-->
</div> <!--header-->

<div id="content">

<div id="breadcrumbs">
<p><a style="font-size:16px;" href="index.htm">&#8656 </a> / <a href="index.htm">Home</a> / Contacts</p>
</div>

<p>Apologies, this page is currently undergoing maintenance.</p>
<p>We can be reached via our Facebook page (icon below) or by emailing us at <img src="e-add-gif.gif" alt="">.</p>
<p>Many thanks.</p>
<p></p>
<!--TEMPORARILY COMMENT OUT CONTACT FORM
<h3 style="color:#CD1076;">Contact form</h3>

<p>Please fill in this form, to contact us on any matter. We will get back to you as soon as we are able.</p>

<div id="mail_form">
<?php
// OPTIONS - PLEASE CONFIGURE THESE BEFORE USE!
$contactOption = ($_POST['contact']);
if($contactOption == "Chairman") {
    $yourEmail = "chairman@stourchoralsociety.co.uk";
} elseif ($contactOption == "Musical Director") {
		$yourEmail = "conductor@stourchoralsociety.co.uk";
} elseif ($contactOption == "Secretary") {
		$yourEmail = "secretary@stourchoralsociety.co.uk";
}	elseif ($contactOption == "Patrons Secretary") {
		$yourEmail = "patrons@stourchoralsociety.co.uk";
}	elseif ($contactOption == "Webmaster") {
		$yourEmail = "webmaster@stourchoralsociety.co.uk";
} else {$yourEmail = "enquiries@stourchoralsociety.co.uk";
}
//$yourEmail = ""; // the email address you wish to receive these mails through
$yourWebsite = "Stour Choral Society"; // the name of your website
$thanksPage = ""; // URL to 'thanks for sending mail' page; leave empty to keep message on the same page 
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4
$requiredFields = "name,email,comments"; // names of the fields you'd like to be required as a minimum, separate each field with a comma


// DO NOT EDIT BELOW HERE
$error_msg = array();
$result = null;

$requiredFields = explode(",", $requiredFields);

function clean($data) {
	$data = trim(stripslashes(strip_tags($data)));
	return $data;
}
function isBot() {
	$bots = array("Indy", "Blaiz", "Java", "libwww-perl", "Python", "OutfoxBot", "User-Agent", "PycURL", "AlphaServer", "T8Abot", "Syntryx", "WinHttp", "WebBandit", "nicebot", "Teoma", "alexa", "froogle", "inktomi", "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory", "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot", "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz");

	foreach ($bots as $bot)
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
			return true;

	if (empty($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_USER_AGENT'] == " ")
		return true;
	
	return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isBot() !== false)
		$error_msg[] = "No bots please! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];
		
	// lets check a few things - not enough to trigger an error on their own, but worth assigning a spam score.. 
	// score quickly adds up therefore allowing genuine users with 'accidental' score through but cutting out real spam :)
	$points = (int)0;
	
	$badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

	foreach ($badwords as $word)
		if (
			strpos(strtolower($_POST['comments']), $word) !== false || 
			strpos(strtolower($_POST['name']), $word) !== false
		)
			$points += 2;
	
	if (strpos($_POST['comments'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
		$points += 2;
	if (isset($_POST['nojs']))
		$points += 1;
	if (preg_match("/(<.*>)/i", $_POST['comments']))
		$points += 2;
	if (strlen($_POST['name']) < 3)
		$points += 1;
	if (strlen($_POST['comments']) < 15 || strlen($_POST['comments'] > 1500))
		$points += 2;
	if (preg_match("/[bcdfghjklmnpqrstvwxyz]{7,}/i", $_POST['comments']))
		$points += 1;
	// end score assignments

	foreach($requiredFields as $field) {
		trim($_POST[$field]);
		
		if (!isset($_POST[$field]) || empty($_POST[$field]) && array_pop($error_msg) != "Please fill in all the required fields and submit again.\r\n")
			$error_msg[] = "Please fill in all the required fields and submit again.";
	}

	if (!empty($_POST['name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['name'])))
		$error_msg[] = "The name field must not contain special characters.\r\n";
	if (!empty($_POST['email']) && !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
		$error_msg[] = "That is not a valid e-mail address.\r\n";
	if (!empty($_POST['url']) && !preg_match('/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i', $_POST['url']))
		$error_msg[] = "Invalid website url.\r\n";
	
	if ($error_msg == NULL && $points <= $maxPoints) {
		$subject = "Automatic Form Email";
		
		$message = "You received this e-mail message through your website: \n\n";
		foreach ($_POST as $key => $val) {
			if (is_array($val)) {
				foreach ($val as $subval) {
					$message .= ucwords($key) . ": " . clean($subval) . "\r\n";
				}
			} else {
				$message .= ucwords($key) . ": " . clean($val) . "\r\n";
			}
		}
		$message .= "\r\n";
		$message .= 'IP: '.$_SERVER['REMOTE_ADDR']."\r\n";
		$message .= 'Browser: '.$_SERVER['HTTP_USER_AGENT']."\r\n";
		$message .= 'Points: '.$points;

		if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
			$headers   = "From: $yourEmail\r\n";
		} else {
			$headers   = "From: $yourWebsite <$yourEmail>\r\n";	
		}
		$headers  .= "Reply-To: {$_POST['email']}\r\n";

		if (mail($yourEmail,$subject,$message,$headers)) {
			if (!empty($thanksPage)) {
				header("Location: $thanksPage");
				exit;
			} else {
				$result = 'Your mail was successfully sent.';
				$disable = true;
			}
		} else {
			$error_msg[] = 'Your mail could not be sent this time. ['.$points.']';
		}
	} else {
		if (empty($error_msg))
			$error_msg[] = 'Your mail looks too much like spam, and could not be sent this time. ['.$points.']';
	}
}
function get_data($var) {
	if (isset($_POST[$var]))
		echo htmlspecialchars($_POST[$var]);
}
?>
<?php
if (!empty($error_msg)) {
	echo '<p class="error">ERROR: '. implode("<br />", $error_msg) . "</p>";
}
if ($result != NULL) {
	echo '<p class="success">'. $result . "</p>";
}
?>
<form action="<?php echo basename(__FILE__); ?>" method="post">
<noscript>
		<p><input type="hidden" name="nojs" id="nojs" /></p>
</noscript>
<p>
	<label for="contact">Who would you like to contact? *</label>
		<select name="contact">
			<option value="General">Please select</option>
			<option value="Chairman">Chairman</option>
			<option value="Musical Director">Musical Director</option>
			<option value="Secretary">Secretary</option>
			<option value="Patrons Secretary">Patrons Secretary</option>
			<option value="Webmaster">Webmaster</option></select></br></br>

	<label for="name">Name: *</label> 
		<input type="text" name="name" id="name" value="<?php get_data("name"); ?>" /><br />
	
	<label for="email">E-mail: *</label> 
		<input type="text" name="email" id="email" value="<?php get_data("email"); ?>" /><br />
	
	<label for="subject">Subject:</label> 
		<select name="subject" id="subject">
			<option>Concerts</option>
			<option>Ticket Sales</option>
			<option>Joining the Choir</option>
			<option>Music Hire</option>
			<option>Support our Choir</option>
			<option>Advertising in our Programme</option>
			<option>Website Comment</option>
			<option>Other</option></select><br />		

	<label for="comments">Comments: *</label>
		<textarea name="comments" id="comments" rows="8" cols="40"><?php get_data("comments"); ?></textarea><br />
</p>
<p>
	<input type="submit" name="submit" id="submit" value="Send" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?> />
</p>
</form>
TEMPORARILY COMMENT OUT CONTACT FORM-->
</div>

<FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
</div> <!--content-->

<div id="footer">

<div id="footer_text">
<div id="footer_credits">
<p>Website designed and maintained by <a target="blank" href="https://uk.linkedin.com/in/katherine-wilde-8363bbb6">Katherine Wilde</a> &#169 2015</p>
<p>Registered Charity Number 1171954.</p>
</div>
<ul>
<li><a href="index.htm">Home</a></li>
<li><a href="about.htm">About</a></li>
<li><a href="concerts.htm">Concerts</a></li>
<li><a href="join.htm">Join Us</a></li>
<li><a href="support.htm">Support Us</a></li>
<li><a href="members.htm">Members</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
</div>

<div id="footer_icons">
<div id="fblogo">
<a target="blank" href="https://www.facebook.com/pages/Stour-Choral-Society/498538700291828"><img border="0" src="fbicon.gif" height="63" title="Visit our Facebook page" alt="Facebook"/></a>
</div>

<div id="mmlogo">
<a target="blank" href="http://www.makingmusic.org.uk/inyourarea/east"><img border="0" src="MM_SOLO_LOGO_RGB.gif" style="float:left;" title="Making Music East" alt="Making Music website" width="118" height="63"/></a>
<div id="mmlogotext">Stour Choral Society is a member of Making Music - The National Federation of Music Societies</div> <!--mmlogotext-->
</div> <!--mmlogo-->
</div> <!--footer_icons-->
</div> <!--footer-->

</div> <!--wrapper-->
</body>

</html>
