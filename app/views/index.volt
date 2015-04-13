{{ get_doctype() }}
<html>
	<head>
		<title>Phalcon PHP Framework</title>
	</head>
	<body>
	{{ partial("partials/navbar") }}
    <div id="main">
	    <div id="body">
		{{ content() }}
		</div>
	</div>
	{{ assets.outputJs() }}
    {{ assets.outputCss() }}
	</body>
</html>