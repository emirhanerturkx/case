<!DOCTYPE html>
<html lang="en">
<?php require_once 'app/partials/head.php'; ?>

<?php 
$getArticle=$Articles->getArticleId(strip_tags(trim(htmlspecialchars($_GET['article_id']))));

foreach($getArticle as $dataAritlce);
?>

<body class="layout-page">
	<!-- Begin Menu Navigation
================================================== -->
	<?php require_once 'app/partials/header.php'; ?>
	<!-- End Menu Navigation
================================================== -->
	<div class="site-content">
		<div class="container">
			<!-- Content
    ================================================== -->
			<div class="main-content">
				<!-- Begin Article
            ================================================== -->
				<div class="row">
					<!-- Post -->
					<div class="col-sm-12">
						<div class="mainheading">
							<!-- Post Categories -->
							<!-- End Categories -->
							<!-- Post Title -->
							<h1 class="posttitle"><?= $dataAritlce['title'] ?></h1>
						</div>
						<!-- Post Featured Image -->
						<!-- End Featured Image -->
						<!-- Post Content -->
						<div class="article-post">
							<!-- post alanı -->
							<?= $dataAritlce['articleText'] ?>
							<div class="clearfix">
							</div>
						</div>
						<!-- Post Date -->
						<!-- Prev/Next -->
						<!-- End Prev/Next -->
						<!-- Author Box -->
					</div>
					<!-- End Post -->
				</div>
				<!-- End Article
            ================================================== -->
			</div>
		</div>
		<!-- /.container -->
		<!-- Before Footer
    ================================================== -->
		<div class="beforefooter">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<h3>This is your final call to action area. Shine like a star, make them want you, tell 'em to push that button!</h3>
						<p>
							We offer a <span>30 Day Money Back Guarantee</span>, so joining is Risk-Free!
						</p>
						<a class="btn btn-primary btn-lg" href="#">Join us yesterday</a>
					</div>
					<div class="col-md-4 text-right footersocial">
						<h5>Connect with Us</h5>
						<i class="fa fa-facebook"></i>
						<i class="fa fa-twitter"></i>
						<i class="fa fa-google"></i>
						<i class="fa fa-pinterest"></i>
						<i class="fa fa-github"></i>
					</div>
				</div>
			</div>
		</div>
		<!-- Begin Footer
    ================================================== -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="footer-widget">
							<a href="contact.html">
								<img src="assets/images/logo-footer.png" alt="logo footer">
							</a>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="footer-widget">
							<h5 class="title">Resources</h5>
							<ul>
								<li><a target="_blank" href="https://m.do.co/c/84c9b45d0c47">Digital Ocean</a></li>
								<li><a target="blank" href="https://www.cloudways.com/en/pricing.php?id=153986&amp;a_bid=005da123">Cloudways</a></li>
								<li><a target="blank" href="https://shareasale.com/r.cfm?b=875645&amp;u=1087935&amp;m=41388&amp;urllink=&amp;afftrack=">Page Speed Test</a></li>
								<li><a target="blank" href="https://elementor.com/?ref=1556">Elementor Page Builder</a></li>
								<li><a target="blank" href="https://www.wowthemes.net/category/freebies/">Our Free Themes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="footer-widget">
							<h5 class="title">Author</h5>
							<ul>
								<li><a href="https://www.wowthemes.net/premium-themes-templates/">About Us</a></li>
								<li><a target="_blank" href="https://www.wowthemes.net/affiliate-area/">Affiliates</a></li>
								<li><a href="https://www.wowthemes.net/terms-and-conditions/">License</a></li>
								<li><a href="https://www.wowthemes.net/blog/">Blog</a></li>
								<li><a href="https://www.wowthemes.net/support/">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="footer-widget textwidget">
							<h5 class="title">Download</h5>
							<p>
								Download "Affiliates" template and use it for your next project. If you have a question, a bug report, or if you simply want to say hi, <a href="https://www.wowthemes.net/support/">contact us here</a>.
							</p>
							<a href="https://gum.co/affiliates-html-template" target="_blank">Download</a>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer
    ================================================== -->
	</div>
	<!-- JavaScript
================================================== -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/theme.js"></script>
</body>

</html>