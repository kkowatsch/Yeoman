<head>
	<meta charset="utf-8">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- The styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
	<?php include (TEMPLATEPATH . '/myGallery/gallery_header_include.php'); ?>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
					<div class="col-md-4 col-sm-3">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
						</div><!--.navbar-header-->
					</div>	
			<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="col-md-8 col-sm-9">
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><?php wp_list_pages(array('title_li' => '')); ?> <span class="sr-only">(current)</span></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!--.col-sm-6-->
		</nav><!--/.nav-collapse -->
	</header>
	
	<div class="container-fluid">
		<div class="row-fluid">
