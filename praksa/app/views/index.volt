<!DOCTYPE html>
       <html>
       	<head>
       		<title>Phalcon PHP Framework</title>
       		{{ stylesheet_link('css/stilovi.css') }}
       	</head>
       	<body>
           <div id="main">
       	    <div id="links">
       	        <ul>
       	            <li>{{ link_to("index/", "Glavna stranica") }}</li>
       	            <li>{{ link_to("pregled/", "Pregled narudzbi") }}</li>
       	            <li>{{ link_to("kosarica/", "Web kupovina") }}</li>
       	        </ul>
       	    </div>
       	    <div id="body">
       		{{ content() }}
       		{{ elements.getMenu() }}
       		</div>
       	</div>
       		{{ javascript_include('js/jquery.min.js') }}
       		{{ javascript_include('js/kosarica.js') }}
       		{{ javascript_include('js/tablica.js') }}
       	</body>
       </html>