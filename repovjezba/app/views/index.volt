{{ get_doctype() }}
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		{{ stylesheet_link('css/stilovi.css') }}
	</head>
	<body>
    <div id="main">
    {{ elements.getMenu() }}
	    <div id="body">
		{{ content() }}
		</div>
	</div>
		{{ javascript_include('js/jquery.min.js') }}
		{{ javascript_include('js/kosarica.js') }}
		{{ javascript_include('js/tablica.js') }}
	</body>
</html>