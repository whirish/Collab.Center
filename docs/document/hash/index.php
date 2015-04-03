<!--The fish is real, laddies-->
<!DOCTYPE html>
<html>
<head>
	<title>Collab.Center</title>

	<link rel="icon" href="../../favicon.ico" type="image/x-icon" class="favicon">
	<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" class="favicon">
	<link rel="stylesheet" href="../../tools/style.css">

	<!--JQUERY-->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/flick/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	<!-- Firebase -->
	<script src="https://cdn.firebase.com/js/client/2.0.2/firebase.js"></script>

	<!-- CODEMIRROR -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/4.3.0/codemirror.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/4.3.0/codemirror.css" />
	<link rel="stylesheet" href="../../tools/CodeMirror/theme/mdn-like.css" />

	<!-- Firepad -->
	<link rel="stylesheet" href="https://cdn.firebase.com/libs/firepad/1.1.0/firepad.css" />
	<script src="https://cdn.firebase.com/libs/firepad/1.1.0/firepad.min.js"></script>

	<!-- Include userlist. -->
	<script src="../../tools/firepad/firepad-userlist.js"></script>
	<link rel="stylesheet" href="../../tools/firepad/firepad-userlist.css" />

	<!--Addons-->
	<script src="../../tools/CodeMirror/addon/mode/loadmode.js"></script>
	<script src="../../tools/CodeMirror/addon/edit/matchbrackets.js"></script>
	<script src="../../tools/CodeMirror/addon/edit/closebrackets.js"></script>
	<script src="../../tools/CodeMirror/addon/search/search.js"></script>
	<script src="../../tools/CodeMirror/addon/search/searchcursor.js"></script>
	<script src="../../tools/CodeMirror/addon/dialog/dialog.js"></script>
	<link rel="stylesheet" href="../../tools/CodeMirror/addon/dialog/dialog.css" />
	<script src="../../tools/CodeMirror/keymap/sublime.js"></script>

	<!-- Pusher -->
	<script src="http://js.pusher.com/2.1/pusher.min.js"></script>
	<script src="../../tools/pusher-realtime-chat-widget/src/js/PusherChatWidget.js"></script>
	<link href="../../tools/pusher-realtime-chat-widget/src/pusher-chat-widget.css" rel="stylesheet" type="text/css" />

	<!-- Cookies Tool -->
	<script src="../../tools/Cookies.js"></script>

	<!-- ToxBox Video -->
	<script src="../../tools/videoChatTokBox.js" type="text/javascript"></script>

	<script>
	function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	var padId = getParameterByName('padid');
	if (padId == undefined || padId== null) {
		$("body").html("<h1>ERR: No ?padid query was specfied</h1>")
	}
	</script>
	<style>
	#change_docname {
		position: absolute; top: 1px; z-index: 1000;
		left: 0px;
		font-size: 1.5em;
		font-weight: bold;
		color: black;
		text-decoration: none;
		width: 470px;
		text-align: center;
		font-family: Arial;
	}

	#change_docname:hover {
		background-color: lightgray;
		text-decoration: underline;
	}

	@font-face {
		font-family: actionman;
		src: url(../../actionman.ttf);
	}

	.firepad-userlist {
		position: absolute; left: 0; top: 45px; bottom: 0; height: auto;
	}

	.firepad {
		position: absolute; left: 175px; top: 56px; bottom: 0; right: 0; height: auto;
	}

	.powered-by-firepad {
		display: none !important;
	}

	#top {
		z-index: 100;
		position: absolute;
		top: 0px;
		left: 0px;
		bottom: 0;
		right: 0;
		height: 25px;
		background-color: lightgray;
		vertical-align: middle !important;
		text-align: center;

		background: #ebebeb; /* Old browsers */
		background: -moz-linear-gradient(bottom, #ebebeb 0%, #eaeaea 50%, #d9d9d9 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, bottom top, bottom top, color-stop(0%,#ebebeb), color-stop(50%,#eaeaea), color-stop(100%,#d9d9d9)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(bottom, #ebebeb 0%,#eaeaea 50%,#d9d9d9 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(bottom, #ebebeb 0%,#eaeaea 50%,#d9d9d9 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(bottom, #ebebeb 0%,#eaeaea 50%,#d9d9d9 100%); /* IE10+ */
		background: linear-gradient(to bottom, #ebebeb 0%,#eaeaea 50%,#d9d9d9 100%); /* W3C */
		color: #404040;
	}

	#shareDialog {
		overflow: hidden;
	}

	img {
		cursor: pointer;
	}

	.ui-tabs {
		z-index: 99;
		position: absolute;
		width: 175px;
		left: 0;
		top: 56px;
		bottom: 0;
		height: auto;
		line-height: normal;
		padding: 0;
	}

	.ui-tabs-nav {
		padding: 0 !important;
		cursor: pointer;
	}

	.ui-state-active {
		cursor: default !important;
		background: #ebebeb !important;
	}

	.ui-state-default[aria-selected=false] {
		background: white !important;
	}

	.ui-state-hover[aria-selected=false] .ui-tabs-anchor, .ui-state-focus[aria-selected=false] .ui-tabs-anchor {
		color: #0073ea !important;
	}

	#tabs-2 {
		/* Background */
		background: #ebebeb; /* Old browsers */
		background: -moz-linear-gradient(left, #ebebeb 0%, #eaeaea 93%, #d9d9d9 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, right top, color-stop(0%,#ebebeb), color-stop(93%,#eaeaea), color-stop(100%,#d9d9d9)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(left, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(left, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(left, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* IE10+ */
		background: linear-gradient(to right, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* W3C */
		color: #404040;
	}

	.pusher-chat-widget {
		position: absolute; left: 0; top: 45px; bottom: 0; height: auto; width: 165px; border: 0; border-radius: 0; -webkitjavaborder-radius: 0;
		/* Background */
		background: #ebebeb; /* Old browsers */
		background: -moz-linear-gradient(left, #ebebeb 0%, #eaeaea 93%, #d9d9d9 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, right top, color-stop(0%,#ebebeb), color-stop(93%,#eaeaea), color-stop(100%,#d9d9d9)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(left, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(left, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(left, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* IE10+ */
		background: linear-gradient(to right, #ebebeb 0%,#eaeaea 93%,#d9d9d9 100%); /* W3C */
		color: #404040;
	}

	body {
		overflow: hidden;
	}

	.ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor, .ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor, .ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor {
		cursor: default;
	}

	.disabled {
		background-color: gray;
		cursor: default;
	}

	.pusher-chat-widget-footer {
		font-size: 13px;
		font-family: Helvetica,Arial,sans-serif;
	}

	.CodeMirror-gutters {
		border-left: 6px solid rgba(0, 83, 159, 0) !important;
	}

	fieldset {
		border: 2px solid #ADADAD;
		text-align: center;
	}

	.cm-string {
		color: #a11 !important;
	}

	#downloadDialog {
		text-align: center;
	}

	#loadingTitle {
		font-family: actionman;
		text-align: center;
		font-size: 5em;
	}

	#status {
		font-size: 0.9em;
		text-align: center;
		background-color: rgba(144, 238, 144, 0.51);
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		cursor: pointer;
	}
	</style>
	<script>
	var language;

	function escapeHtml(text) {
		return text
		.replace(/&/g, "&amp;")
		.replace(/</g, "&lt;")
		.replace(/>/g, "&gt;")
		.replace(/"/g, "&quot;")
		.replace(/'/g, "&#039;")
		.replace(/-/g, "&#045;")
		.replace(/\./g, "&#046;");
	}

	function l(lang) {
		window.location.replace("?lang=" + lang + "&changeext=" + escapeHtml($("#docname").val() + $("#fileext").text()));
	}
	/**
	Keybind Ctrl + S to download
	*/
	$(window).keydown(function(event) {
		if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19)) return true;
		alert("Ctrl-S pressed");
		event.preventDefault();
		return false;
	});
	/**
	Checking if the user signed in, topbar stuff
	*/
	$(document).ready(function() {
		if (Cookies.get('name') != undefined) {
			//not you? sign out
			$('#logintext').html(', Not you? <a href="../../signin/signin.php?mode=out">Sign Out</a>');

			//enable doc settings
			$('#settings').attr('class', '');

			//set username
			$(".firepad-userlist-name-input").val(Cookies.get('name'));

			//validate pusher chat
			$(".pusher-chat-widget").ready(function () {
				$('[name="nickname"]').val(Cookies.get('name'));
				$('[name="email"]').val(Cookies.get('email'));
				$('[name="message"]').val(Cookies.get('name') + " has joined the chat!");
				$('[name="message"]').attr('style', 'width: 140px;');
				$('.pusher-chat-widget-send-btn').trigger("click");

				$('.pusher-chat-widget-footer').first().html('Text - <a onclick="video()" href="javascript:void(0);">Video</a>');
			});

			//tabs-2 styles
			$("#tabs-2").attr('style', 'padding: 1em 0.5em; display: none;');
		} else {
			//disable doc settings
			$('#settings').attr('class', 'disabled');
			$('#account').attr('class', 'disabled');
			$('#settings').attr('onclick', '');
			$('#account').attr('onclick', '');

			//sign in to use chat
			$("#tabs-2").text("Please sign in to use chat!");

			//Firepad sign in
			$(".firepad-userlist-name-input").ready(function () {
				$(".firepad-userlist-name-hint").html("<span style='color: red;'>PLEASE SIGN IN</span>");
			});


		}
	});

	/*$(document).ready(function() {
	//$('.pusher-chat-widget-send-btn').attr('style', 'background: #0064CD !important;');
	//$('#langOption').text('Language (' + langBaseVal + ')');

	if (Cookies.get('name') != undefined) {

} else {
$(".firepad-userlist-name-input").ready(function () {
$(".firepad-userlist-name-input").attr('readonly', 'readonly');
$(".firepad-userlist-name-input").focus();
$(".firepad-userlist-name-input").val(Cookies.get('name'));
$(".firepad-userlist-name-input").blur();

$(".firepad-userlist-name-hint").html("");
});



$("#tabs-2").attr('style', 'padding: 1em 0.5em; display: none;');
}
});*/


//language firebase ref global var
var langBaseRef = new Firebase("https://collab-coding-docs.firebaseio.com").child(padId);

/**
Onload for other
*/
$(document).ready(function() {
	//checking if doc name should be changed
	if (getParameterByName("docname") != "") {
		var dname = getParameterByName("docname");

		if (dname != null) {
			langBaseRef.set({name : dname});
		}

		/*var uri = window.location.toString();
		if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			window.history.replaceState({}, document.title, clean_uri);
		}*/
	}
	//language stuff
	if (getParameterByName("lang") != "") {

		var language = getParameterByName("lang");

		if (language != null) {
			langBaseRef.set({lang : language});

		}

		if (getParameterByName('template') == "") {
			var uri = window.location.toString();
			if (uri.indexOf("?") > 0) {
				var clean_uri = uri.substring(0, uri.indexOf("?"));
				window.history.replaceState({}, document.title, clean_uri);
				//window.location.replace("?changeext=" + $("#docname").val() + $("#fileext").text());
			}
		}

	}

	if (getParameterByName("rename") == "rename") {
		$('#downloadDialog').dialog();
		$('#docname').attr('autofocus', 'autofocus');
	}

	if (getParameterByName("edit") == "edit") {
		$('#settingsDialog').dialog();
	}

	var myFirebase = new Firebase("https://collab-coding-privacy.firebaseio.com/" + padId);

	var isPrivate = false;
	var owner = "";
	var allowedEmail = "";
	var langBaseVal = "";


	/**
	Getting firebase values for later
	*/
	myFirebase.child("private").once('value', function(snapshot) {
		if (snapshot.val() != undefined && snapshot.val() != false) {
			isPrivate = true;
			$("#private").trigger('click');
			$("#shareDialog").html("<h1 style='text-align: center;'>To invite people in private documents, click on the settings/gear icon!</h1>");
		}
	});


	myFirebase.child("privateEmail").once('value', function(snapshot) {
		if (snapshot.val() != undefined) {
			allowedEmail = snapshot.val().toString();
			$("#private").attr('value', snapshot.val());
		}
	});

	myFirebase.child("owner").once('value', function(snapshot) {
		if (snapshot.val() != undefined) {
			owner = snapshot.val().toString();
		}
	});

	langBaseRef.child("lang").once('value', function(snapshot) {
		if (snapshot.val() != undefined) {
			langBaseVal = snapshot.val().toString();
		} /*else {
			window.location.replace(document.URL);
			alert('hey');
		}*/

	});

	myFirebase.once('value', function(snapshot) {
		if (snapshot.val() != undefined) {
			if (isPrivate == true) {
				$(".favicon").attr('href', '../../faviconlocked.ico')
				if (allowedEmail == Cookies.get('email') || owner == Cookies.get('email')) {
					//Nothing, user is allowed into the document
				} else {
					$("html").html("<body style='text-align: center;'><h1 class='permission'>Sorry, but You Need Permission to Edit this Document</h1><h3>If you believe this is an error, please contact the owner of the document</h3><h4>Wanna switch accounts? <a href='../../signin/signin.php?mode=out'>Click here</a></h4><img src='../../logo.png' style='position: absolute; right: 0px; bottom: 0px;'></body>");
				}
			}
		}
	});

	langBaseRef.on('child_changed', function(childSnapshot, prevChildName) {
		window.location.href = document.URL;
	});


	if(getParameterByName("reload") == "reload") {
		var uri = window.location.toString();
		if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			//window.history.replaceState({}, document.title, clean_uri);
			window.location.replace(clean_uri);
		}
	}
});

/**
onload for topbar stuff
*/
$(document).ready(function() {

	$('#lineNum').change(function () {
		var state = $(this).val();

		if (state == "Show Line Numbers") {
			$(".CodeMirror-gutters").attr("style", "height: 531px;");
			$(".CodeMirror-gutter-wrapper").attr("style", "position: absolute; left: -29px;");
		} else {
			$(".CodeMirror-gutters").attr("style", "display: none;");
			$(".CodeMirror-gutter-wrapper").attr("style", "display: none;");
		}
	});

	$('#language').change(function() {
		var propbase = new Firebase("https://collab-doc-props.firebaseio.com/").child(padId);
		propbase.set({lang: $('#language').val()});
		window.location.replace(document.URL);
	});


});

$(function() {
	$( "#tabs" ).tabs();
});

function about() {
	var str = "Collab.center, by Liam O'FLynn.\nVersion 0.4\nCopyright (c) Liam O'Flynn, 2014. All rights reserved.\n Bowser Support:\n IE 10+\nSafari (Any Version)\n Firefox 3.6+\n Chrome (Any Version)\n Opera 11+";
	alert(str);
}

//text()
function text() {
	$("#pusher_chat_widget").attr('style', 'display: inherit;');
	//$("#vidchat").html('<div class="pusher-chat-widget-footer"><a href="javascript:text()">Text</a> - Video<br><br>Note: Video chat only works in Chrome, Firefox, and Opera</div>');
	$("#vidchat").attr('style', 'display: none;');

}

function settings() {
	$("#settingsDialog").dialog();
}

//Pusher
$(function() {
	var pusher = new Pusher('d6c74be9c50ecd50bf1e');
	var chatWidget = new PusherChatWidget(pusher, {
		chatEndPoint: '../../tools/pusher-realtime-chat-widget/src/php/chat.php',
		appendTo: '#pusher_chat_widget'
	});
	/*var channel = pusher.subscribe('test_channel');
	channel.bind('pusher:subscription_error', function(status) {alert(status)});*/
	Pusher.log = function(message) {};
});
</script>
</head>
<body>
	<?php
	function DeleteFolder($path)
	{
		if (is_dir($path) === true)
		{
			$files = array_diff(scandir($path), array('.', '..'));

			foreach ($files as $file)
			{
				DeleteFolder(realpath($path) . '/' . $file);
			}

			return rmdir($path);
		}

		else if (is_file($path) === true)
		{
			return unlink($path);
		}

		return false;
	}

	if (!empty($_GET["delete"])) {
		DeleteFolder("./");
		echo "<script>alert('Deleted Succesfully');</script>";
		echo "<script>window.location.replace('../../../');</script>";
	}

	if (!empty($_GET["renameto"])) {
		//rename("./", "../" . $_GET["renameto"]);
		$padId = str_replace(".", "˙", $_GET["renameto"]);
		file_put_contents("name.php", '<?php $padName = "' . $padId .'";?>', FILE_APPEND);
		echo "<script>";
		echo 'var uri = window.location.toString();if (uri.indexOf("?") > 0) {var clean_uri = uri.substring(0, uri.indexOf("?"));window.history.replaceState({}, document.title, clean_uri);}';
		echo "alert('Renamed Succesfully');";

		echo "</script>";

		//echo "<script>window.location.replace('../" . $_GET["renameto"] . "')</script>";
	}

	if (!empty($_GET["changeext"])) {

		$extPadId = str_replace(".", "˙", $_GET["changeext"]);
		file_put_contents("name.php", '<?php $padName = "' . $extPadId .'";?>', FILE_APPEND);
		echo "<script>";
		//echo 'var uri = window.location.toString();if (uri.indexOf("?") > 0) {var clean_uri = uri.substring(0, uri.indexOf("?"));window.history.replaceState({}, document.title, clean_uri);}';
		echo $extPadId;
		echo "</script>";


	}

	if (file_exists('name.php')) {
		INCLUDE 'name.php';
		if (!empty($template)) {
			if ($template == true) {
				echo '<script>';
				echo '$(".favicon").attr("href", "../../template.ico");';
				echo '$("#template").ready(function() {$("#template").attr("checked", "checked");});';
				echo '</script>';
			}
		}

	}
	?>
	<a href="javascript:void(0)" id="change_docname">Err: Docname Value == Undefined/Null</a>
	<script>
		//#change_docname functions
		$('#change_docname').click(function () {
			var new_name = prompt('Type a new name for the document:');
			window.location.replace(document.URL + '?docname=' + new_name);
		});

		var fbprop = new Firebase("https://collab-doc-props.firebaseio.com/").child(padId);
		fbprop.child('name').once('value', function snapshot() {
			$('#change_docname').html(snapshot.val());
		});
	</script>
	<div id="top" style="vertical-align: middle; top: 30px;">
		<div id="topLeft" style="float: left;">
			Welcome Back, <strong id="uname">Anonymous</strong><span id="logintext">, please <a href="../../signin/signin.php">Sign In</a></span>
		</div>
		<select id="language" style="padding: 1px 30px 1px 15px;">
			<option disabled selected id="langOption">Language</option><option>Plain Text</option><option>apl</option><option>asterisk</option><option>c</option><option>c++</option><option>c#</option><option>clojure</option><option>cobol</option><option>coffeescript</option><option>commonlisp</option><option>css</option><option>d</option><option>diff</option><option>dtd</option><option>ecl</option><option>eiffel</option><option>erlang</option><option>f#</option><option>fortran</option><option>gas</option><option>gfm</option><option>gherkin</option><option>go</option><option>groovy</option><option>haml</option><option>haskell</option><option>haxe</option><option>htmlembedded</option><option>htmlmixed</option><option>http</option><option>jade</option><option>java</option><option>javascript</option><option>jinja2</option><option>julia</option><option>livescript</option><option>lua</option><option>markdown</option><option>mirc</option><option>nginx</option><option>ntriples</option><option>ocaml</option><option>octave</option><option>pascal</option><option>pegjs</option><option>perl</option><option>php</option><option>pig</option><option>properties</option><option>puppet</option><option>python</option><option>q</option><option>r</option><option>rpm</option><option>rst</option><option>ruby</option><option>rust</option><option>sass</option><option>scheme</option><option>shell</option><option>sieve</option><option>smalltalk</option><option>smarty</option><option>smartymixed</option><option>solr</option><option>sparql</option><option>sql</option><option>stex</option><option>tcl</option><option>tiddlywiki</option><option>tikiwiki</option><option>toml</option><option>turtle</option><option>vb</option><option>vbscript</option><option>velocity</option><option>verilog</option><option>xml</option><option>xquery</option><option>yaml</option><option>z80</option>
		</select><span class="select-arrow" style="margin: 0.6em 0 0 -1.2em !important;"></span>

		<select id="lineNum" style="padding: 1px 30px 1px 15px;">
			<option disabled selected>Line Numbers</option>
			<option>Show Line Numbers</option>
			<option>Hide Line Numbers</option>
		</select><span class="select-arrow" style="margin: 0.6em 0 0 -1.2em !important;"></span>
		<div id="topRight" style="float: right;">
			<img src="../../home.png" title="Home" onclick="window.location.href = '../../../'" style="vertical-align: middle;">
			<img src="../../download.png" title="Download" onclick="$('#downloadDialog').dialog();" style="vertical-align: middle;" id="download">
			<img src="../../share.png" title="Share Your Document" onclick="$('#shareDialog').dialog({width: 609});" style="vertical-align: middle;">
			<img src="../../settings.png" title="Document Settings" onclick="$('#settingsDialog').dialog();" style="vertical-align: middle;" class="disabled" id="settings">
			<img src="../../account.png" title="Account Settings" onclick="window.location.href = '../../manage/manage.php';" style="vertical-align: middle;" id="account">
			<img src="../../about.png" title="About Collab Center" onclick="about();" style="vertical-align: middle;">

		</div>

	</div>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Users</a></li>
			<li><a href="#tabs-2">Chat</a></li>
		</ul>
		<div id="tabs-1"><div id="userlist"></div></div>
		<div id="tabs-2">
			<div class="span5" id='pusher_chat_widget'></div>
			<div id="vidchat" style="overflow-y: scroll; visibility: hidden;">
				<div class="pusher-chat-widget-footer"><a href="javascript:text();">Text</a> - Video</div>
			</div>
		</div>
		<script>
		var langBaseRef = new Firebase("https://collab-coding-lang.firebaseio.com").child(padId);
		var docprop = new Firebase("https://collab-doc-props.firebaseio.com/").child(padId);
		var langBaseVal = "";

		docprop.child("lang").once('value', function(snapshot) {
			if (snapshot.val() != null) {
				langBaseVal = snapshot.val();
			}
		});

		$(document).ready(function() {
			//defaults
			$(".firepad-userlist-name-input").ready(function () {
				$(".firepad-userlist-name-input").attr('readonly', 'readonly');
			});

			$(".firepad-userlist-name-hint").ready(function () {
				$(".firepad-userlist-name-hint").html("");
			});

			$('.pusher-chat-widget-send-btn').ready(function () {
				$('.pusher-chat-widget-send-btn').attr('style', 'background: #0064CD !important;');
			});

		});
		//video()
		function video() {
			$("#pusher_chat_widget").attr("style", "display: none;");
			$("#vidchat").attr("style", "display: inherit;");

			//alert($(".OT_video-container").length);
			if ($(".OT_video-container").length == false) {
				a = new TBStart("44776242", "vidchat");
				a.startVideo();
			}
		}
		</script>
	</div>
	<div id="firepad"></div>
	<div id="loading" class="firepad">
	<style>#fadingBarsG{position:relative;width:1000px;height:121px}.fadingBarsG{position:absolute;top:0;background-color:#000000;width:121px;height:121px;-moz-animation-name:bounce_fadingBarsG;-moz-animation-duration:1.1s;-moz-animation-iteration-count:infinite;-moz-animation-direction:linear;-moz-transform:scale(.3);-webkit-animation-name:bounce_fadingBarsG;-webkit-animation-duration:1.1s;-webkit-animation-iteration-count:infinite;-webkit-animation-direction:linear;-webkit-transform:scale(.3);-ms-animation-name:bounce_fadingBarsG;-ms-animation-duration:1.1s;-ms-animation-iteration-count:infinite;-ms-animation-direction:linear;-ms-transform:scale(.3);-o-animation-name:bounce_fadingBarsG;-o-animation-duration:1.1s;-o-animation-iteration-count:infinite;-o-animation-direction:linear;-o-transform:scale(.3);animation-name:bounce_fadingBarsG;animation-duration:1.1s;animation-iteration-count:infinite;animation-direction:linear;transform:scale(.3);}#fadingBarsG_1{left:0;-moz-animation-delay:0.44s;-webkit-animation-delay:0.44s;-ms-animation-delay:0.44s;-o-animation-delay:0.44s;animation-delay:0.44s;}#fadingBarsG_2{left:125px;-moz-animation-delay:0.55s;-webkit-animation-delay:0.55s;-ms-animation-delay:0.55s;-o-animation-delay:0.55s;animation-delay:0.55s;}#fadingBarsG_3{left:250px;-moz-animation-delay:0.66s;-webkit-animation-delay:0.66s;-ms-animation-delay:0.66s;-o-animation-delay:0.66s;animation-delay:0.66s;}#fadingBarsG_4{left:375px;-moz-animation-delay:0.77s;-webkit-animation-delay:0.77s;-ms-animation-delay:0.77s;-o-animation-delay:0.77s;animation-delay:0.77s;}#fadingBarsG_5{left:500px;-moz-animation-delay:0.88s;-webkit-animation-delay:0.88s;-ms-animation-delay:0.88s;-o-animation-delay:0.88s;animation-delay:0.88s;}#fadingBarsG_6{left:625px;-moz-animation-delay:0.99s;-webkit-animation-delay:0.99s;-ms-animation-delay:0.99s;-o-animation-delay:0.99s;animation-delay:0.99s;}#fadingBarsG_7{left:750px;-moz-animation-delay:1.1s;-webkit-animation-delay:1.1s;-ms-animation-delay:1.1s;-o-animation-delay:1.1s;animation-delay:1.1s;}#fadingBarsG_8{left:875px;-moz-animation-delay:1.21s;-webkit-animation-delay:1.21s;-ms-animation-delay:1.21s;-o-animation-delay:1.21s;animation-delay:1.21s;}@-moz-keyframes bounce_fadingBarsG{0%{-moz-transform:scale(1);background-color:#000000;}100%{-moz-transform:scale(.3);background-color:#FFFFFF;}}@-webkit-keyframes bounce_fadingBarsG{0%{-webkit-transform:scale(1);background-color:#000000;}100%{-webkit-transform:scale(.3);background-color:#FFFFFF;}}@-ms-keyframes bounce_fadingBarsG{0%{-ms-transform:scale(1);background-color:#000000;}100%{-ms-transform:scale(.3);background-color:#FFFFFF;}}@-o-keyframes bounce_fadingBarsG{0%{-o-transform:scale(1);background-color:#000000;}100%{-o-transform:scale(.3);background-color:#FFFFFF;}}@keyframes bounce_fadingBarsG{0%{transform:scale(1);background-color:#000000;}100%{transform:scale(.3);background-color:#FFFFFF;}}</style>
	<div id="fadingBarsG" style="margin: auto;">
		<div id="fadingBarsG_1" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_2" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_3" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_4" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_5" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_6" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_7" class="fadingBarsG">
		</div>
		<div id="fadingBarsG_8" class="fadingBarsG">
		</div>
	</div>
	<h1 id="loadingTitle">Loading...</h1>
</div>
<div id="shareDialog" style="display: none;" title="Share">
	To share this code with your peers, please give them the following link:<br>
	<input type="text" id="url" style="width: 100%; cursor: pointer;" onclick="$(this).select();" readonly><br>
	Alternatively, you can <a id="email" target="_blank">send them the link via email</a>
</div>
<div id="settingsDialog" style="display: none;" title="Document Settings">
	<div id="status"></div>
	<form name="privacy" method="post">
		<fieldset>
			<legend>Privacy</legend>
			<label for="private"><input type="checkbox" name="private[]" id="private" style="margin-bottom: 7px;">&nbsp;Private</label>
			<hr>
			<div id="invite">
				<h3>Invite People</h3>
				Enter their email here: <input type="text" width="400" id="pEmail" name="pEmail" disabled> <br><strong>Note: They must be registered with this email address to view your document!</strong><br>
				<label for="sendEmail"><input type="checkbox" id="sendEmail" name="sendEmail" disabled>&nbsp;Send an email invitation</label>
			</div>
			<input type="submit" value="Update" id="sInvite" name="sInvite">
			<?php
			if (isset($_POST["sInvite"])) {
				if (isset($_POST["private"])) {
					echo "<script>$('#status').text('Document is Now Private!');</script>";
					$email = "";

					if (isset($_POST["pEmail"])) {
						$email = $_POST["pEmail"];
					}

					echo "<script>var myBase = new Firebase('https://collab-coding-privacy.firebaseio.com').child(padId); myBase.child('private').set(true); myBase.child('owner').set(Cookies.get('email')); myBase.child('privateEmail').set('". $email ."');</script>";

					if (isset($_POST["sendEmail"])) {
						echo "<script>window.location.href = 'mailto:". $email ."?Subject=I%20have%20shared%20a%20Collab.Center%20document%20with%20you&Body=I%20have%20created%20a%20private%20collab.center%20document%20and%20I%20have%20invited%20you%20to%20use%20it%20with%20me.%20The%20link%20is%20below%3A%20' + document.URL;</script>";
					}
				} else {
					echo "<script>$('#status').text('Document is No Longer Private!');</script>";
					echo "<script>var myBase = new Firebase('https://collab-coding-privacy.firebaseio.com').child(padId); myBase.child('private').set(false); myBase.child('owner').remove(); myBase.child('privateEmail').remove();</script>";
				}

			}
			?>
		</fieldset>
	</form>
	<script>
	$(document).ready(function () {
		//$("[name=privacy]").attr('action', document.URL + '?reload=reload');
	});

	(function($) {
		$.fn.toggleDisabled = function(){
			return this.each(function(){
				this.disabled = !this.disabled;
			});
		};
	})(jQuery);

	//Settings script
	$('#private').click(function() {
		$("#pEmail").toggleDisabled(this.checked);
		$("#sendEmail").toggleDisabled(this.checked);
		//$("#sInvite").toggleDisabled(this.checked);
	});
	</script><br>
	<div id="docsettings">
		<fieldset>
			<legend>Document-Specific</legend>
			Name: <br>
			<input type="text" value="UntitledDoc" id="docname" maxlength="30" style="width: 50%;"><span id="fileext">Loading...</span>
			<button id="updateDocname">Update</button>
			<hr>
			<form name="templateForm" id="templateForm" method="post">
				<label for="template"><input type="checkbox" name="templateCheck" id="template">Template Document</label>
				<input type="hidden" name="padId[0]" id="padId">
				<input type="submit" value="Update" name="sTemplate" style="display: none;" id="sTemplate">
				<script>
				$('#template').change(function () {
					$('#sTemplate').trigger('click');
				});

				$('#padId').attr('value', padId);
				</script>
			</form>
			<?php
			if (isset($_POST['sTemplate'])) {
				if (isset($_POST['templateCheck'])) {
					file_put_contents('name.php', '<?php $template = true; $id = "' . $_POST['padId'][0] . '";?>', FILE_APPEND);
					echo '<script>$("#template").attr("checked", "checked");</script>';
				} else {
					file_put_contents('name.php', '<?php $template = false; $id = "' . $_POST['padId'][0] . '";?>', FILE_APPEND);
					echo '<script>$("#template").attr("checked", false);</script>';
				}
			}
			?>
			<script>
			var langBase = new Firebase("https://collab-coding-lang.firebaseio.com").child(padId);
			var langBaseValue = "";

			langBase.child("lang").once('value', function(snapshot) {
				if (snapshot.val() != undefined) {
					//alert(snapshot.val());
					langBaseValue = snapshot.val();
					var fileext = {"Plain Text" : "txt", "apl" : "apl", "asterisk" : "conf", "c" : "c", "c++" : "cc", "c#" : "cs", "clojure" : "clj", "cobol" : "cob", "coffeescript" : "coffee", "commonlisp" : "lisp", "css" : "css", "d" : "d", "diff" : "diff", "dtd" : "dtd", "ecl" : "ecl", "eiffel" : "e", "erlang" : "erl", "fortran" : "f", "gas" : "s", "gfm" : "gfm", "gherkin" : "feature", "go" : "go", "groovy" : "groovy", "haml" : "haml", "haskell" : "hs", "haxe" : "hx", "htmlembedded" : "html", "htmlmixed" : "html", "http" : "none", "jade" : "jade", "java" : "java", "javascript" : "js", "jinja2" : "py", "julia" : "jl", "livescript" : "ls", "lua" : "lua", "markdown" : "md", "mirc" : "mrc", "f#" : "fs", "ocaml" : "ml", "nginx" : "conf", "ntriples" : "nt", "octave" : "m", "pascal" : "pas", "pegjs" : "pegjs", "perl" : "pl", "php" : "php", "pig" : "pig", "properties" : "properties", "puppet" : "pp", "python" : "py", "q" : "q", "r" : "r", "rpm" : "rpm", "rst" : "rst", "ruby" : "rb", "rust" : "rs", "sass" : "scss", "scheme" : "scm", "shell" : "none", "sieve" : "none", "smalltalk" : "st", "smarty" : "tpl", "smartymixed" : "tpl", "solr" : "none", "sparql" : "sparql", "sql" : "sql", "stex" : "tex", "tcl" : "tcl", "tiddlywiki" : "none", "tikiwiki" : "none", "toml" : "toml", "turtle" : "ttl", "vb" : "vb", "vbscript" : "vbs", "velocity" : "vm", "verilog" : "v", "xml" : "xml", "xquery" : "xq", "yaml" : "yaml", "z80" : "z80"};

					$("#fileext").text('.' + fileext[snapshot.val()]);
				}
			});

			$("#status").click(function () {
				$(this).hide();
			});

			//var docnameBase = new Firebase('https://collab-coding-lang.firebaseio.com').child(padId);
			$("#updateDocname").click(function () {
				langBase.child('name').set($("#docname").val() + $("#fileext").text());
				//$("#status").text("Renamed Document!");*/
				window.location.replace("?renameto=" + $("#docname").val() + $("#fileext").text());
			});

			langBase.child('name').once('value', function(snapshot) {
				if (snapshot.val() != undefined) {
					$("#docname").val(snapshot.val().split(".")[0]);
				}
			});
			</script>
		</fieldset>
	</div>
</div>
<div id="downloadDialog" style="display: none;" title="Download as">
	<form name="codeFile" method="post">
		<input type="hidden" name="filename[0]" value="Collab_Center_Document">
		<input type="hidden" name="filecontents[0]" id="filecontents">
		<input type="hidden" name="filelang[0]" id="filelang">
		<input type="submit" id="codeFileSubmit" name="codeSubmit">
	</form>
	<form name="pdfFile" method="post">
		<input type="hidden" name="filename[0]" value="Collab_Center_Document">
		<input type="hidden" name="pdfcontents[0]" id="pdfcontents">
		<input type="submit" id="pdfFileSubmit" name="pdfSubmit" value="PDF File (*.pdf)" disabled>
	</form>
	<?php
	//Code file
	$fileext = array("Plain Text" => "txt", "apl" => "apl", "asterisk" => "conf", "c" => "c", "c++" => "cc", "c#" => "cs", "clojure" => "clj", "cobol" => "cob", "coffeescript" => "coffee", "commonlisp" => "lisp", "css" => "css", "d" => "d", "diff" => "diff", "dtd" => "dtd", "ecl" => "ecl", "eiffel" => "e", "erlang" => "erl", "fortran" => "f", "gas" => "s", "gfm" => "gfm", "gherkin" => "feature", "go" => "go", "groovy" => "groovy", "haml" => "haml", "haskell" => "hs", "haxe" => "hx", "htmlembedded" => "html", "htmlmixed" => "html", "http" => "none", "jade" => "jade", "java" => "java", "javascript" => "js", "jinja2" => "py", "julia" => "jl", "livescript" => "ls", "lua" => "lua", "markdown" => "md", "mirc" => "mrc", "f#" => "fs", "ocaml" => "ml", "nginx" => "conf", "ntriples" => "nt", "octave" => "m", "pascal" => "pas", "pegjs" => "pegjs", "perl" => "pl", "php" => "php", "pig" => "pig", "properties" => "properties", "puppet" => "pp", "python" => "py", "q" => "q", "r" => "r", "rpm" => "rpm", "rst" => "rst", "ruby" => "rb", "rust" => "rs", "sass" => "scss", "scheme" => "scm", "shell" => "none", "sieve" => "none", "smalltalk" => "st", "smarty" => "tpl", "smartymixed" => "tpl", "solr" => "none", "sparql" => "sparql", "sql" => "sql", "stex" => "tex", "tcl" => "tcl", "tiddlywiki" => "none", "tikiwiki" => "none", "toml" => "toml", "turtle" => "ttl", "vb" => "vb", "vbscript" => "vbs", "velocity" => "vm", "verilog" => "v", "xml" => "xml", "xquery" => "xq", "yaml" => "yaml", "z80" => "z80");

	if (isset($_POST['codeSubmit'])) {
		$filename = $_POST['filename'][0].".".$fileext[$_POST["filelang"][0]];

		file_put_contents($filename, $_POST["filecontents"][0]);

		echo "<script>window.location.href = '".$filename."';</script>";
	}

	//Pdf file


	/*if (isset($_POST['pdfSubmit'])) {
	try {
	require_once('../../tools/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P', 'A4', 'en');
	$html2pdf->writeHTML('<p>This is your first PDF File</p>');
	$html2pdf->Output('my_doc.pdf', 'D');
} catch(HTML2PDF_exception $e) {
echo $e;
exit;
}
}*/
?>
</div>
<script>
var codeMirrorInst;
var firepadInst;
/**
onload for Firepad & Codemirror related stuff
*/
$(document).ready(function () {
	CodeMirror.modeURL = "../../tools/CodeMirror/mode/%N/%N.js";
	// Create a random ID to use as our user ID (we must give this to firepad and FirepadUserList).
	var userId = Math.floor(Math.random() * 9999999999).toString();

	var firepadRef = new Firebase('https://collaborative-coding.firebaseio.com').child(padId);
	var codeMirrorFirepad = CodeMirror(document.getElementById('firepad'), { lineWrapping: true, lineNumbers : true, theme : 'mdn-like', matchBrackets : true, autoCloseBrackets : true, keyMap : "sublime"});
	codeMirrorInst = codeMirrorFirepad;
	var firepad = Firepad.fromCodeMirror(firepadRef, codeMirrorFirepad, {userId: userId});
	firepadInst = firepad;

	$("#loading").show();
	$("#firepad").hide();
	$("body").attr('style', 'cursor: wait;');

	firepad.on('ready', function() {
		codeMirrorInst.on("change", function(cm, change) {
			//$('#templateForm').attr('action', document.URL + '?tempTxt=' + firepadInst.getText());
			var docTxt = new Firebase('https://collab-coding-docs.firebaseio.com/');
			docTxt.child(padId).set(firepad.getText());
		});

		//200-line code limit
		codeMirrorInst.on("beforeChange", function(cm, change) {
			console.log(change.text);
			if (change.text && change.text.length > 1) {
				if (parseInt($('.CodeMirror-linenumber').last().text()) >= 200) {
					alert('You have reached the maximum line count (200) for anonymous users. Please log in to continue editing this document (Among other benefits).');
					change.cancel();
				}
			}
		});

		if (getParameterByName('template') != "") {
			var template = new Firebase('https://collab-coding-docs.firebaseio.com/').child(getParameterByName('template'));
			template.once('value', function (snapshot) {
				firepad.setText(snapshot.val());
			});

			var uri = window.location.toString();
			if (uri.indexOf("?") > 0) {
				var clean_uri = uri.substring(0, uri.indexOf("?"));
				window.history.replaceState({}, document.title, clean_uri);
				//window.location.replace("?changeext=" + $("#docname").val() + $("#fileext").text());
			}
		}

		$("#loading").hide();
		$("#firepad").show();
		$("body").attr('style', '');

		if (firepad.isHistoryEmpty()) {
			firepad.setHtml("Hello, and Welcome to Collab.Center! This is how it works:<br> 1. Put some code here.<br> 2. Share the URL with your friends so you can collaborate (Hint: Use the Mail icon in the top-right!).<br> 3. Toggle some options above.<br> That's all there is to it!");
		}

		if (langBaseVal != "c" && langBaseVal != "c++" && langBaseVal != "c#" && langBaseVal != "java" && langBaseVal != "f#" && langBaseVal != "ocaml") {
			$('#langOption').text('Language (' + langBaseVal + ')');

			codeMirrorFirepad.setOption("mode", langBaseVal);
			CodeMirror.autoLoadMode(codeMirrorFirepad, langBaseVal);
		} else {
			$('#langOption').text('Language (' + langBaseVal + ')');

			codeMirrorFirepad.setOption("mode", "mllike");
			CodeMirror.autoLoadMode(codeMirrorFirepad, "mllike");

			codeMirrorFirepad.setOption("mode", "clike");
			CodeMirror.autoLoadMode(codeMirrorFirepad, "clike");
			switch (langBaseVal)
			{
				case "c":
					codeMirrorFirepad.setOption("mode", "text/x-csrc");
					CodeMirror.autoLoadMode(codeMirrorFirepad, "text/x-csrc");
					break;
					case "c++":
						codeMirrorFirepad.setOption("mode", "text/x-c++src");
						CodeMirror.autoLoadMode(codeMirrorFirepad, "text/x-c++src");
						break;
						case "c#":
							codeMirrorFirepad.setOption("mode", "text/x-csharp");
							CodeMirror.autoLoadMode(codeMirrorFirepad, "text/x-csharp");
							break;
							case "java":
								codeMirrorFirepad.setOption("mode", "text/x-java");
								CodeMirror.autoLoadMode(codeMirrorFirepad, "text/x-java");
								break;
								case "f#":
									codeMirrorFirepad.setOption("mode", "text/x-fsharp");
									CodeMirror.autoLoadMode(codeMirrorFirepad, "text/x-fsharp");
									case "ocaml":
										codeMirrorFirepad.setOption("mode", "text/x-ocaml");
										CodeMirror.autoLoadMode(codeMirrorFirepad, "text/x-ocaml");
									}
								}
							});

							//// Create FirepadUserList (with desired userId).
							var firepadUserList = FirepadUserList.fromDiv(firepadRef.child('users'), document.getElementById('userlist'), userId);
							$('#url').val(document.URL);
							$('#email').attr('href', 'mailto:?Subject=My%20Collaborative%20Coding%20Project!&Body=Hey!%20Check%20out%20my%20newest%20Collaborative%20Coding%20project%20at%20' + document.URL + '!');

							//// Set firepadUserList names and textbox value

							var firebaseUserName = new Firebase("https://collaborative-coding.firebaseio.com/" + padId + "/users/" + userId);
							firebaseUserName.child('name').set(Cookies.get('name'));

							firebaseUserName.child('name').once('value', function (snapshot) {
								$('#uname').text(snapshot.val());
								$('.firepad-userlist-name-input').val(snapshot.val());
							});

						});

						var fileext = {"Plain Text" : "txt", "apl" : "apl", "asterisk" : "conf", "c" : "c", "c++" : "cc", "c#" : "cs", "clojure" : "clj", "cobol" : "cob", "coffeescript" : "coffee", "commonlisp" : "lisp", "css" : "css", "d" : "d", "diff" : "diff", "dtd" : "dtd", "ecl" : "ecl", "eiffel" : "e", "erlang" : "erl", "fortran" : "f", "gas" : "s", "gfm" : "gfm", "gherkin" : "feature", "go" : "go", "groovy" : "groovy", "haml" : "haml", "haskell" : "hs", "haxe" : "hx", "htmlembedded" : "html", "htmlmixed" : "html", "http" : "none", "jade" : "jade", "java" : "java", "javascript" : "js", "jinja2" : "py", "julia" : "jl", "livescript" : "ls", "lua" : "lua", "markdown" : "md", "mirc" : "mrc", "f#" : "fs", "ocaml" : "ml", "nginx" : "conf", "ntriples" : "nt", "octave" : "m", "pascal" : "pas", "pegjs" : "pegjs", "perl" : "pl", "php" : "php", "pig" : "pig", "properties" : "properties", "puppet" : "pp", "python" : "py", "q" : "q", "r" : "r", "rpm" : "rpm", "rst" : "rst", "ruby" : "rb", "rust" : "rs", "sass" : "scss", "scheme" : "scm", "shell" : "none", "sieve" : "none", "smalltalk" : "st", "smarty" : "tpl", "smartymixed" : "tpl", "solr" : "none", "sparql" : "sparql", "sql" : "sql", "stex" : "tex", "tcl" : "tcl", "tiddlywiki" : "none", "tikiwiki" : "none", "toml" : "toml", "turtle" : "ttl", "vb" : "vb", "vbscript" : "vbs", "velocity" : "vm", "verilog" : "v", "xml" : "xml", "xquery" : "xq", "yaml" : "yaml", "z80" : "z80"};

						$("#download").click(function() {
							//Code file
							$("#filecontents").attr('value', firepadInst.getText());
							$("#filelang").attr('value', langBaseVal);
							$("#codeFileSubmit").attr('value', 'Code File (*.' + fileext[$("#filelang").val()] + ')');

							//Pdf file
							$("#pdfcontents").attr('value', firepadInst.getHtml());
						});

						var current = false;
						var myFirebase = new Firebase("https://collab-coding-privacy.firebaseio.com").child(padId);
						myFirebase.child("private").once('value', function(snapshot) {
							if (snapshot.val() != undefined && snapshot.val() != false) {
								current = true;
							}
						});

						//check every 15 sec
						setInterval(function(){
							//check if private in firebase
							myFirebase.child("private").once('value', function(snapshot) {
								if (snapshot.val() != undefined) {
									if (current != null && current != undefined && snapshot.val() != current && snapshot.val() == true) {
										window.location.replace(document.URL);
									}
								}
							});

						}, 15000);
						</script>
						<?php
						if (empty($_GET['padid'])) {
							echo "<script>$('body').html('<h1>ERR: No ?padid query was specified</h1>')</script>";
						}
						?>
					</body>
					</html>
					<!--
					Permission is hereby granted, free of charge, to any person obtaining a copy
					of this software and associated documentation files (the “Software”), to deal
					in the Software without restriction, including without limitation the rights
					to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
					copies of the Software, and to permit persons to whom the Software is
					furnished to do so, subject to the following conditions:

					The above copyright notice and this permission notice shall be included in
					all copies or substantial portions of the Software.

					THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
					IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
					FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
					AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
					LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
					OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
					THE SOFTWARE.
				-->