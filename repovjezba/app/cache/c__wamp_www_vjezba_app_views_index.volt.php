<?php echo $this->tag->getDoctype(); ?>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		<?php echo $this->tag->stylesheetLink('css/stilovi.css'); ?>
	</head>
	<body>
	<?php echo $this->partial('partials/navbar'); ?>
    <div id="main">
	    <div id="body">
		<?php echo $this->getContent(); ?>

		</div>
	</div>
		<?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/webcart.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/tablica.js'); ?>
	</body>
</html>