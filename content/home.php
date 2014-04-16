<header>
	<script type="text/javascript">
		function removeOverlay()
		{
			document.getElementById('overlay').style.display = 'none';
		}
	</script>

	<div id="overlay" style="display: block;">
		<div id="project-info">
			<h1 style="width: 75px; margin: 0 auto 0 auto;">OBS!</h1>
			<h3>English</h3>
			<p>Be aware that this page have no relations to Aalborg citybikes, but is a part of a group project made by INF4 and BAIT4 students from Aalborg University.</p>
			<h3>Dansk</h3>
			<p>Bemærk venligst at denne side ikke relaterer sig til Aalborg citybikes, men er en del af et gruppeprojekt, lavet af INF4 og BAIT4 studerende fra Aalborg universitet.</p>
			<input id="i_understand" type="button" onclick="removeOverlay()" value="I Understand">
		</div>
	</div>

	<div id="header-wrapper">
		<div id="slideshow">
			<div class="logo"></div>
		</div>
	</div>
</header>
<div id="content-wrapper">
	<div class="content-left_row">
		<div class="content-box">
			<div class="content-field">
				<div class="content-column_1">
					<img border="0" src="images/logo.png" alt="logo" width="129" height="48">
				</div>
				<div class="content-column_2">
					<p>
						In Aalborg you can reserve citybikes online for free
					</p>
				</div>
				<div class="content-column_3">
					<a class="button-link" style="float: right;" href="index.php?page=reserve">Reserve now</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="content-box" id="news-box">
			<div class="content-field">
				<div class="content-column_1" id="news-image">
					<img border="0" src="images/news.png" alt="logo" width="135" height="135">
				</div>
				<div class="content-column_2" id="news-short_text">
					<h2>Aalborg gets 20 new citybike...</h2>
					<p>
						I modsætning til hvad mange tror, er Lorem Ipsum ikke bare tilfældig tekst. Det stammer fra et stykke litteratur på latin fra år 45 f.kr., hvilket gør teksten over 2000 år gammel. Richard McClint...
					</p>
					<a class="button-link" id="news-read_more_button" href="#">Read more...</a>
				</div>
				<div class="content-column_3" id="news-toppics">
					<table>
						<tr>
							<td>Bycyklerne siger tak...</td>
						</tr>
						<tr>
							<td>Hærværk på cykler v...</td>
						</tr>
						<tr>
							<td>Borgmester stiller ny...</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="content-right_row">
		<div id="login-wrapper">
			<form name="login-form" class="login-form" action="" method="post">
				<div class="login-header">
					<h1>Login</h1>
				</div>
				<div class="login-content">
					<input name="username" type="text" id="login-username"  placeholder="Username" />
					<input name="password" type="password" id="login-password" placeholder="Password" />
				</div>
				<div class="login-footer">
					<input type="submit" name="submit" value="Register" id="login-register" class="button-input"/>
					<input type="submit" name="submit" value="Login" id="login-submit" class="button-input"/><br/>
					<input type="submit" name="submit" value="Forgot your account?" id="login-forgot_your_account" class="button-input"/>
				</div>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>