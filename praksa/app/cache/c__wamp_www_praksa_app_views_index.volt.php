<!DOCTYPE html>
       <html>
       	<head>
       		<title>Phalcon PHP Framework</title>
       		<?php echo $this->tag->stylesheetLink('css/stilovi.css'); ?>
       	</head>
       	<body>
           <div id="main">
       	    <div id="links">
       	        <ul>
       	            <li><?php echo $this->tag->linkTo(array('index/', 'Glavna stranica')); ?></li>
       	            <li><?php echo $this->tag->linkTo(array('pregled/', 'Pregled narudzbi')); ?></li>
       	            <li><?php echo $this->tag->linkTo(array('kosarica/', 'Web kupovina')); ?></li>
       	        </ul>
       	    </div>
       	    <div id="body">
       		<?php echo $this->getContent(); ?>
       		<?php echo $this->elements->getMenu(); ?>
       		</div>
       	</div>
       		<?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
       		<?php echo $this->tag->javascriptInclude('js/kosarica.js'); ?>
       		<?php echo $this->tag->javascriptInclude('js/tablica.js'); ?>
       	</body>
       </html>