<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		<?php echo $this->tag->stylesheetLink('css/stilovi.css'); ?>
	</head>
	<body>
		<?php echo $this->getContent(); ?>
		<?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/kosarica.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/tablica.js'); ?>
	</body>
</html>