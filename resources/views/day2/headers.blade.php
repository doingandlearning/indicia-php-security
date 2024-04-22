<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Header Testing Workshop</title>
	<link rel="stylesheet" href="/css/headers.css">
	<script src="/script.js"></script>
</head>

<body>
	<h1>Welcome to the HTTP Headers Workshop</h1>
	<p id="demo">If you see this, JavaScript works!</p>
	<p id="inline">JavaScript incline script did not execute.</p>
	<p id="external">External JavaScript did not execute.</p>
	<iframe src="https://example.com" width="300" height="200"></iframe>
	<!-- Inline script for CSP demonstration -->
	<script>
		document.getElementById('inline').innerText = 'JavaScript inline script executed!';
	</script>
</body>

</html>