<!--Whatta YOU lookin' at?-->
<!DOCTYPE html>
<html>
	<head>
		<title>Collab.Center</title>

		<link rel="icon" href="../../favicon.ico">
		<link rel="stylesheet" href="../../tools/style.css">

		<!--JQUERY-->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/flick/jquery-ui.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

		<!-- Firebase -->
		<script src="https://cdn.firebase.com/js/client/1.0.11/firebase.js"></script>

	    <!-- CODEMIRROR -->
	    <link rel="stylesheet" href="../../tools/CodeMirror/codemirror-4.0/lib/codemirror.css" />
	    <link rel="stylesheet" href="../../tools/CodeMirror/codemirror-4.0/lib/codemirror.css" />
	    <script src="../../tools/CodeMirror/codemirror-4.0/lib/codemirror.js"></script>

	    <!-- Firepad -->
	    <link rel="stylesheet" href="../../tools/firepad/firepad.css" />
	    <script src="../../tools/firepad/firepad.js"></script>

	    <!-- Include userlist. -->
		<script src="../../tools/firepad/firepad-userlist.js"></script>
		<link rel="stylesheet" href="../../tools/firepad/firepad-userlist.css" />

		<!--Load Mode-->
		<script src="../../mode/loadmode.js"></script>

		<!-- Pusher -->
		<script src="http://js.pusher.com/2.1/pusher.min.js"></script>
		<script src="../../tools/pusher-realtime-chat-widget/src/js/PusherChatWidget.js"></script>
		<link href="../../tools/pusher-realtime-chat-widget/src/pusher-chat-widget.css" rel="stylesheet" type="text/css" />

		<!-- CoOkies Tool -->
		<script src="../../tools/Cookies.js"></script>

		<!-- ToxBox Video -->
		<script src="../../tools/videoChatTokBox.js" type="text/javascript"></script>

		<style>
			
			.firepad {
				width: 100%;
			}

			.firepad-userlist {
				position: absolute; left: 0; top: 45px; bottom: 0; height: auto;
			}

			.firepad {
				position: absolute; left: 175px; top: 25px; bottom: 0; right: 0; height: auto;
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
				z-index: 1000000;
				position: absolute;
				width: 175px;
				left: 0;
				top: 25px;
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
		</style>
		<script>
		var language;

			function getParameterByName(name) {
				name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
				var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(location.search);
				return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}

			function l(lang) {
				window.location.replace("?lang=" + lang);
			}

		/**
		Checking if the user signed in, topbar stuff
		*/
		$(document).ready(function() {
			if (Cookies.get('name') != undefined) {
				$('#uname').text(Cookies.get('name'));
				$('#logintext').html(', Not you? <a href="../../signin/signin.php?mode=out" target="_new">Sign Out</a>');
				$('#settings').attr('class', '');
			} else {
				$('#settings').attr('class', 'disable');
			}
		});

		/**
		Onload for other
		*/
		$(document).ready(function() {
			if(getParameterByName("lang") != null) {
				var lang = getParameterByName("lang");
				language = lang;
				Cookies.set("lang", language, {expiry: new Date(2030, 0, 1)});
				

				var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
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
				var state = $(this).val();
				l(state);
			});

			CodeMirror.on('gutterClick', function(cm, line, gutter) {
				if (gutter === 'CodeMirror-linenumbers') {
					return CodeMirror.setSelection(CodeMirror.Pos(line, 0), CodeMirror.Pos(line + 1, 0));
				}
			});
		});

		$(function() {
			$( "#tabs" ).tabs();
		});

		function about() {
			var str = "Collab.center, by Liam O'FLynn.\nVersion 0.1\nCopyright (c) Liam O'Flynn, 2014. All rights reserved.\n Bowser Support:\n IE 8+ (Preferably 10+)\nSafari (Any Version)\n Firefox 3.6+\n Chrome (Any Version)\n Opera 11+";
			alert(str);
		}

		

	  	//Pusher
	  	$(function() {     
	  		var pusher = new Pusher('d6c74be9c50ecd50bf1e');
	  		var chatWidget = new PusherChatWidget(pusher, {
	  			chatEndPoint: '../../tools/pusher-realtime-chat-widget/src/php/chat.php',
	  			appendTo: '#pusher_chat_widget'
	  		});
	  		var channel = pusher.subscribe('test_channel');
	  		channel.bind('pusher:subscription_error', function(status) {alert(status)});
	  	});
		</script>
	</head>
	<body>
		<div id="top" style="vertical-align: middle;">
			<div id="topLeft" style="float: left;">
				Welcome Back, <strong id="uname">Anonymous</strong><span id="logintext">, please <a href="../../signin/signin.php" target="_new">Sign In</a></span>
			</div>
			<select id="language" style="padding: initial !important;">
				<option disabled selected>Language</option><option>Plain Text</option><option>apl</option><option>asterisk</option><option>c</option><option>c++</option><option>c#</option><option>clojure</option><option>cobol</option><option>coffeescript</option><option>commonlisp</option><option>css</option><option>d</option><option>diff</option><option>dtd</option><option>ecl</option><option>eiffel</option><option>erlang</option><option>fortran</option><option>gas</option><option>gfm</option><option>gherkin</option><option>go</option><option>groovy</option><option>haml</option><option>haskell</option><option>haxe</option><option>htmlembedded</option><option>htmlmixed</option><option>http</option><option>jade</option><option>java</option><option>javascript</option><option>jinja2</option><option>julia</option><option>livescript</option><option>lua</option><option>markdown</option><option>mirc</option><option>mllike</option><option>nginx</option><option>ntriples</option><option>octave</option><option>pascal</option><option>pegjs</option><option>perl</option><option>php</option><option>pig</option><option>properties</option><option>puppet</option><option>python</option><option>q</option><option>r</option><option>rpm</option><option>rst</option><option>ruby</option><option>rust</option><option>sass</option><option>scheme</option><option>shell</option><option>sieve</option><option>smalltalk</option><option>smarty</option><option>smartymixed</option><option>solr</option><option>sparql</option><option>sql</option><option>stex</option><option>tcl</option><option>tiddlywiki</option><option>tiki</option><option>toml</option><option>turtle</option><option>vb</option><option>vbscript</option><option>velocity</option><option>verilog</option><option>xml</option><option>xquery</option><option>yaml</option><option>z80</option>
			</select><span class="select-arrow" style="margin: 0.6em 0 0 -1.2em !important;"></span>

			<select id="lineNum" style="padding: initial !important;">
				<option disabled selected>Line Numbers</option>
				<option>Show Line Numbers</option>
				<option>Hide Line Numbers</option>
			</select><span class="select-arrow" style="margin: 0.6em 0 0 -1.2em !important;"></span>
			<div id="topRight" style="float: right;">
				<img src="../../download.png" onclick="download();" style="vertical-align: middle;" class="disabled" title="Download File" id="download">
				<img src="../../share.png" onclick="$('#shareDialog').dialog({width: 609});" style="vertical-align: middle;" title="Share">
				<img src="../../settings.png" onclick="settings();" style="vertical-align: middle;" class="disabled" title="Settings" id="settings">
				<img src="../../about.png" onclick="about();" style="vertical-align: middle;" title="About">
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
					<div class="pusher-chat-widget-footer"><a onclick="text()" href="javascript:void(0)">Text</a> - Video</div>
				</div>
			</div>
			<script>
			/**
			onload for sign in stuff
			*/
			$(document).ready(function() {
				$('.pusher-chat-widget-send-btn').attr('style', 'background: #0064CD !important;');

				if ($("#uname").text().toLowerCase() == "anonymous") {
					$("#tabs-2").text("Please sign in to use chat!");
					$(".firepad-userlist-name-input").ready(function () {
						$(".firepad-userlist-name-input").attr('readonly', 'readonly');
						$(".firepad-userlist-name-hint").html("<span style='color: red;'>PLEASE SIGN IN</span>");
					});
				} else {
					$(".firepad-userlist-name-input").ready(function () {
						$(".firepad-userlist-name-input").attr('readonly', 'readonly');
						$(".firepad-userlist-name-input").val(Cookies.get('name'));

						var press = jQuery.Event("keypress");
						press.ctrlKey = false;
						press.which = 13;
						$(".firepad-userlist-name-input").trigger(press);

						$(".firepad-userlist-name-hint").html("");
					});

					$(".pusher-chat-widget").ready(function () {
						$('[name="nickname"]').val(Cookies.get('name'));
						$('[name="email"]').val(Cookies.get('email'));
						$('[name="message"]').val(Cookies.get('name') + " has joined the chat!");
						$('[name="message"]').attr('style', 'width: 140px;');
						$('.pusher-chat-widget-send-btn').trigger("click");

						$('.pusher-chat-widget-footer').first().html('Text - <a onclick="video()" href="javascript:void(0);">Video</a> <br><br> <a href="http://pusher.com">Pusher</a> powered realtime chat');
					});

					$("")

					$("#tabs-2").attr('style', 'padding: 1em 0.5em;');
				}
			});

			

			//video()
			function video() {
				$("#pusher_chat_widget").attr("style", "display: none;");
				$("#vidchat").attr("style", "display: inherit;");

				a = new TBStart("44776242", "vidchat");
				a.startVideo();
			}

			//text()
			function text() {
				$("#pusher_chat_widget").attr('style', 'display: inherit;');
				$("#vidchat").attr('style', 'display: none;');
			}
			</script>
		</div>
		<div id="firepad"></div>
		<div id="shareDialog" style="display: none;" title="Share">
			To share this code with your peers, please give them the following link:<br>
			<input type="text" id="url" style="width: 100%; cursor: pointer;" onclick="$(this).select();" readonly><br>
			Alternatively, you can <a id="email" target="_new">send them the link via email</a>
		</div>
		<script>
		var codeMirrorInst;
			/**
			onload for Firepad & Codemirror related stuff
			*/
			$(document).ready(function () {
				CodeMirror.modeURL = "../../tools/CodeMirror/codemirror-4.0/mode/%N/%N.js";
				// Create a random ID to use as our user ID (we must give this to firepad and FirepadUserList).
	    		var userId = Math.floor(Math.random() * 9999999999).toString();

	    		//Gets the id of the pad
	    		var str = document.URL;
	    		var padId = str.slice(27, 37);

				var firepadRef = new Firebase('https://collaborative-coding.firebaseio.com').child(padId);
				var codeMirrorFirepad = CodeMirror(document.getElementById('firepad'), { lineWrapping: true, lineNumbers : true });
				codeMirrorInst = codeMirrorFirepad;
				var firepad = Firepad.fromCodeMirror(firepadRef, codeMirrorFirepad, {userId: userId});

				firepad.on('ready', function() {
					if (firepad.isHistoryEmpty()) {
	      				firepad.setHtml("Hello, and Welcome to Collab.center! This is how it works:<br> 1. Put some code here.<br> 2. Share the URL with your freinds so you can collaborate (Hint: Use the Mail icon in the top-left!).<br> 3. Toggle some options above.<br> That's all there is to it!");
	      			}

	      			if (Cookies.get('lang') != "c" && Cookies.get('lang') != "c++" && Cookies.get('lang') != "c#" && Cookies.get('lang') != "java") {
	      				codeMirrorFirepad.setOption("mode", Cookies.get('lang'));
	      				CodeMirror.autoLoadMode(codeMirrorFirepad, Cookies.get('lang'));
	      			} else {
	      				codeMirrorFirepad.setOption("mode", "clike");
		      			CodeMirror.autoLoadMode(codeMirrorFirepad, "clike");
	      				switch (Cookies.get('lang')) 
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
	      				}
	      			}
	    		});

				 //// Create FirepadUserList (with desired userId).
	    		var firepadUserList = FirepadUserList.fromDiv(firepadRef.child('users'),
	        	document.getElementById('userlist'), userId);
	        	$('#url').val(document.URL);
	        	$('#email').attr('href', 'mailto:?Subject=My%20Collaborative%20Coding%20Project!&Body=Hey!%20Check%20out%20my%20newest%20Collaborative%20Coding%20project%20at%20' + document.URL + '!');

	  		
			});
function download() {
			jQuery.ajax({
			    type: "POST",
			    url: '../../download/download.php',
			    dataType: 'json',
			    data: {functionname: 'download', arguments: [codeMirrorInst.getValue()]},

			    success: function (obj, textstatus) {
			            	alert('sucess!');
			            }
			});
		}
		</script>
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

