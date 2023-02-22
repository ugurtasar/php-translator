<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
function translate($q,$from="en",$to="tr"){
	$url = 'https://libretranslate.de/translate';
	$ch = curl_init( $url );
	$payload = json_encode( array( "q"=>$q, "source"=>$from, "target"=>$to, "format"=>"text" ) );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true)['translatedText'];
}
if(isset($_POST['submit'])){
	$result = translate($_POST['text'],$_POST['from'],$_POST['to']);
}
?>
<!doctype html>
<html lang="tr" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>PHP Translator</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">PHP Translator</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link active" href="./">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<main class="flex-shrink-0">
	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<form action="" method="post">
					<div class="mb-3">
						<label for="from" class="form-label">Lang from:</label>
						<select class="form-select" name="from">
						<option value="auto">Auto</option>
						<option value="en">English</option>
						<option value="ar">Arabic</option>
						<option value="az">Azerbaijani</option>
						<option value="ca">Catalan</option>
						<option value="zh">Chinese</option>
						<option value="cs">Czech</option>
						<option value="da">Danish</option>
						<option value="nl">Dutch</option>
						<option value="eo">Esperanto</option>
						<option value="fi">Finnish</option>
						<option value="fr">French</option>
						<option value="de">German</option>
						<option value="el">Greek</option>
						<option value="he">Hebrew</option>
						<option value="hi">Hindi</option>
						<option value="hu">Hungarian</option>
						<option value="id">Indonesian</option>
						<option value="ga">Irish</option>
						<option value="it">Italian</option>
						<option value="ja">Japanese</option>
						<option value="ko">Korean</option>
						<option value="fa">Persian</option>
						<option value="pl">Polish</option>
						<option value="pt">Portuguese</option>
						<option value="ru">Russian</option>
						<option value="sk">Slovak</option>
						<option value="es">Spanish</option>
						<option value="sv">Swedish</option>
						<option value="tr">Turkish</option>
						<option value="uk">Ukranian</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="to" class="form-label">Lang to:</label>
						<select class="form-select" name="to">
						<option value="en">English</option>
						<option value="ar">Arabic</option>
						<option value="az">Azerbaijani</option>
						<option value="ca">Catalan</option>
						<option value="zh">Chinese</option>
						<option value="cs">Czech</option>
						<option value="da">Danish</option>
						<option value="nl">Dutch</option>
						<option value="eo">Esperanto</option>
						<option value="fi">Finnish</option>
						<option value="fr">French</option>
						<option value="de">German</option>
						<option value="el">Greek</option>
						<option value="he">Hebrew</option>
						<option value="hi">Hindi</option>
						<option value="hu">Hungarian</option>
						<option value="id">Indonesian</option>
						<option value="ga">Irish</option>
						<option value="it">Italian</option>
						<option value="ja">Japanese</option>
						<option value="ko">Korean</option>
						<option value="fa">Persian</option>
						<option value="pl">Polish</option>
						<option value="pt">Portuguese</option>
						<option value="ru">Russian</option>
						<option value="sk">Slovak</option>
						<option value="es">Spanish</option>
						<option value="sv">Swedish</option>
						<option value="tr">Turkish</option>
						<option value="uk">Ukranian</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="text" class="form-label">Text:</label>
						<textarea class="form-control" id="text" name="text" placeholder="enter text" rows="7"></textarea>
					</div>
					<div class="mb-3">
						<?php if(isset($_POST['submit'])): ?>
						<?php if($result): ?>
						<div class="alert alert-success" role="alert">
							<?php echo $result; ?>
						</div>
						<?php else: ?>
						<div class="alert alert-danger" role="alert">
							<b>no result</b>
						</div>
						<?php endif; ?>
						<?php endif; ?>
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<footer class="footer mt-auto py-3 bg-light">
	<div class="container">
		<span class="text-muted small"><a href="https://phphunt.com" target="_blank" class="link-dark">php scripts</a></span>
	</div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
