<?php 
Session_Start();
?>
<html>
<head>
	<title>
		Hiragana Quiz
	</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
 	<script src="js/script.js"></script>
</head>
<body>
	
	<div class="row" id="formSection">
		<div id="message"></div>
		
	<div class="column">
	<label id="lblUser" for="user">Name: <?php echo $_SESSION['user']; ?></label>
	<label id="lblUserID" for="userId">ID: <?php echo $_SESSION['userId']; ?></label>
		<form method="POST"  id="loginForm">
			Username:<input type="text" id="txtName" class="textboxes">
			Password:<input type="text" id="txtPassword" class="textboxes">
			<input type="submit" name = 'submit' value="Login" class="btnSubmit" id="btnLogin">
		</form>
	</div>
	<div class="column">
		<form method="POST" id="signupForm">
			Username:<input type="text" name="txtSignupName" class="textboxes">
			Password:<input type="text" name="txtSignupPassword" class="textboxes">
			<input type="submit" name = 'submit' value="Signup" class="btnSubmit" id="btnSignup">
		</form>
	</div>
</form>
</div>
<div id="MainSection">
<div class="btnDiv">
	<input type="button" class="btnStartQuiz" id="btnStartQuiz" value="Start Quiz">
	</div>
	<div>
	<table id="abc">
		<thead>
			<tr>
				<th>All</th>
				<th>∅</th>
				<th>K</th>
				<th>S</th>
				<th>T</th>
				<th>N</th>
				<th>H</th>
				<th>M</th>
				<th>Y</th>
				<th>R</th>
				<th>W</th>
				<th>N</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>a</th>
				<td><img class="imgChange" data-alt-src="GIF/a.gif" src="Static/a.png"><br>あ<div>a</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ka.gif" src=" Static/ka.png"><br>か<div>ka</div></td>
				<td><img class="imgChange" data-alt-src="GIF/sa.gif" src=" Static/sa.png"><br>さ<div>sa</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ta.gif" src=" Static/ta.png"><br>た<div>ta</div></td>
				<td><img class="imgChange" data-alt-src="GIF/na.gif" src=" Static/na.png"><br>な<div>na</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ha.gif" src=" Static/ha.png"><br>は<div>ha</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ma.gif" src=" Static/ma.png"><br>ま<div>ma</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ya.gif" src=" Static/ya.png"><br>や<div>ya</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ra.gif" src=" Static/ra.png"><br>ら<div>ra</div></td>
				<td><img class="imgChange" data-alt-src="GIF/wa.gif" src=" Static/wa.png"><br>わ<div>wa</div></td>
				<td><img class="imgChange" data-alt-src="GIF/n.gif" src=" Static/n.png"><br>ん<div>n</div></td>
				
			</tr>
			<tr>
				<th>i</th>
				<td><img class="imgChange" data-alt-src="GIF/i.gif" src="Static/i.png"><br>い<div>i</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ki.gif" src=" Static/ki.png"><br>き<div>ki</div></td>
				<td><img class="imgChange" data-alt-src="GIF/shi.gif" src=" Static/shi.png"><br>し<div>shi</div></td>
				<td><img class="imgChange" data-alt-src="GIF/chi.gif" src=" Static/chi.png"><br>ち<div>chi</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ni.gif" src=" Static/ni.png"><br>に<div>ni</div></td>
				<td><img class="imgChange" data-alt-src="GIF/hi.gif" src=" Static/hi.png"><br>ひ<div>hi</div></td>
				<td><img class="imgChange" data-alt-src="GIF/mi.gif" src=" Static/mi.png"><br>み<div>mi</div></td>
				<td></td>
				<td><img class="imgChange" data-alt-src="GIF/ri.gif" src=" Static/ri.png"><br>り<div>ri</div></td>
				<td></td>
				<td></td>
				
			</tr>
			<tr>
				<th>u</th>
				<td><img class="imgChange" data-alt-src="GIF/u.gif" src=" Static/u.png"><br>う<div>u</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ku.gif" src=" Static/ku.png"><br>く<div>ku</div></td>
				<td><img class="imgChange" data-alt-src="GIF/su.gif" src=" Static/su.png"><br>す<div>su</div></td>
				<td><img class="imgChange" data-alt-src="GIF/tsu.gif" src=" Static/tsu.png"><br>つ<div>tsu</div></td>
				<td><img class="imgChange" data-alt-src="GIF/nu.gif" src=" Static/nu.png"><br>ぬ<div>nu</div></td>
				<td><img class="imgChange" data-alt-src="GIF/fu.gif" src=" Static/fu.png"><br>ふ<div>fu</div></td>
				<td><img class="imgChange" data-alt-src="GIF/mu.gif" src=" Static/mu.png"><br>む<div>mu</div></td>
				<td><img class="imgChange" data-alt-src="GIF/yu.gif" src=" Static/yu.png"><br>ゆ<div>yu</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ru.gif" src=" Static/ru.png"><br>る<div>ru</div></td>
				<td></td>
				<td></td>
				
			</tr>
			<tr>
				<th>e</th>
				<td><img class="imgChange" data-alt-src="GIF/e.gif" src=" Static/e.png"><br>え<div>e</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ke.gif" src=" Static/ke.png"><br>け<div>ke</div></td>
				<td><img class="imgChange" data-alt-src="GIF/se.gif" src=" Static/se.png"><br>せ<div>se</div></td>
				<td><img class="imgChange" data-alt-src="GIF/te.gif" src=" Static/te.png"><br>て<div>te</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ne.gif" src=" Static/ne.png"><br>ね<div>ne</div></td>
				<td><img class="imgChange" data-alt-src="GIF/he.gif" src=" Static/he.png"><br>へ<div>he</div></td>
				<td><img class="imgChange" data-alt-src="GIF/me.gif" src=" Static/me.png"><br>め<div>me</div></td>
				<td></td>
				<td><img class="imgChange" data-alt-src="GIF/re.gif" src=" Static/re.png"><br>れ<div>re</div></td>
				<td></td>
				<td></td>
				
			</tr>
			<tr>
				<th>o</th>
				<td><img class="imgChange" data-alt-src="GIF/o.gif" src=" Static/o.png"><br>お<div>o</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ko.gif" src=" Static/ko.png"><br>こ<div>ko</div></td>
				<td><img class="imgChange" data-alt-src="GIF/so.gif" src=" Static/so.png"><br>そ<div>so</div></td>
				<td><img class="imgChange" data-alt-src="GIF/to.gif" src=" Static/to.png"><br>と<div>to</div></td>
				<td><img class="imgChange" data-alt-src="GIF/no.gif" src=" Static/no.png"><br>の<div>no</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ho.gif" src=" Static/ho.png"><br>ほ<div>ho</div></td>
				<td><img class="imgChange" data-alt-src="GIF/mo.gif" src=" Static/mo.png"><br>も<div>mo</div></td>
				<td><img class="imgChange" data-alt-src="GIF/yo.gif" src=" Static/yo.png"><br>よ<div>yo</div></td>
				<td><img class="imgChange" data-alt-src="GIF/ro.gif" src=" Static/ro.png"><br>ろ<div>ro</div></td>
				<td><img class="imgChange" data-alt-src="GIF/wo.gif" src=" Static/wo.png"><br>を<div>wo</div></td>
				<td></td>
				
			</tr>
		</tbody>
	</table>
	</div>
		<div class="pDiv">
		<h3>Resources</h3>
		<p>
			Gif: <a href="https://commons.wikimedia.org/wiki/Category:Hiragana_stroke_order_(animated_image_set)" target="_blank();">https://commons.wikimedia.org/wiki/Category:Hiragana_stroke_order_(animated_image_set)</a>
		</p>
		<p>
			Sounds: <a href="http://www.guidetojapanese.org/audio/basic_sounds.zip" target="_blank();">http://www.guidetojapanese.org/audio/basic_sounds.zip</a>
		</p>
		<p>
			PNG: <a href="https://chrome.google.com/webstore/detail/gif-frames/khkbfocobajjjkojjgpmnhdgbmlnlnef?hl=en" target="_blank();">https://chrome.google.com/webstore/detail/gif-frames/khkbfocobajjjkojjgpmnhdgbmlnlnef?hl=en</a>
		</p>
		<p>
			W3Schools:<a href = "https://www.w3schools.com" target="_blank();">https://www.w3schools.com</a>
		</p>
		<p>
			Stockoverflow:<a href = "https://stackoverflow.com/" target="_blank();">https://stackoverflow.com</a>
		</p>
	</div>
</div>

<div id="QuizSection" style="display: none;"> 
</div>
<div id="End" style="display: none;">
	</div>
</body>
</html>