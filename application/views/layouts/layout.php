<!DOCTYPE html>

<html>

	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	    <title><?php echo $this->layout->getTitle(); ?></title>
	    
		<meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
		<meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
	    <!--*************auxiliares*****************-->

		<?php echo $this->layout->css; ?>

		<?php echo $this->layout->js; ?>

		<!--**********fin auxiliares*****************-->		

    	 

	</head>

	<body>

		<?php echo $content_for_layout; ?>

	</body>
</html>