<head lang="en">
	<?php

	require_once('app/controller/categoryController.php');
	require_once('app/controller/articlesController.php');
	require_once('app/controller/usersController.php');

	$Categories = new categoryController;
	$Articles = new articlesController;
	$Users = new usersController;
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>EECP - ERTURK Control Panel</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/lib/lobipanel/lobipanel.min.css">
	<link rel="stylesheet" href="css/separate/vendor/lobipanel.min.css">
	<link rel="stylesheet" href="css/lib/jqueryui/jquery-ui.min.css">
	<link rel="stylesheet" href="css/separate/pages/widgets.min.css">
	<link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/separate/elements/cards.min.css">
	<link rel="stylesheet" href="css/lib/summernote/summernote.css" />
	<link rel="stylesheet" href="css/separate/pages/editor.min.css">

</head>