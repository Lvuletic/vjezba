{{ get_doctype() }}
<html>
	<head>
		<title>Phalcon PHP Framework</title>

	</head>
	<body>
	<div id ="navbar")
	{{ partial("partials/navbar") }}
    <div id="main">
	    <div id="body">
		{{ content() }}

		</div>
	</div>
	</div>

	</body>
</html>