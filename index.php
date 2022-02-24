<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>THOMAS CURIGER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
			.mappar {
			    position: relative;
			    text-align: center;
			    color: white;
			}

			.mapitself {
				opacity:0.3;
			}
			/*
			.bottom-left {
			    position: absolute;
			    bottom: 8px;
			    left: 16px;
			}

			.top-left {
			    position: absolute;
			    top: 8px;
			    left: 16px;
			}

			.top-right {
			    position: absolute;
			    top: 8px;
			    right: 16px;
			}

			.bottom-right {
			    position: absolute;
			    bottom: 8px;
			    right: 16px;
			}
			*/
			/* Centered text */
			.centered {
			    position: absolute;
			    top: 50%;
			    left: 50%;
			    transform: translate(-50%, -50%);
			}




		</style>

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="#me" class="icon fa-home active"><span>Home</span></a>
						<a href="#strava" class="icon fa-location-arrow"><span>Strava</span></a>
						<!--<a href="#instagram" class="icon fa-instagram"><span>Instagram</span></a>-->
						<a href="#maps" class="icon fa-compass"><span>Maps</span></a>
						<a href="#termine" class="icon fa-calendar"><span>Program</span></a>
						<!--<a href="#history" class="icon fa-compass"><span>History - coming later</span></a>-->
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Home -->
							<article id="me" class="panel">
								<header>
									<h1>Thomas Curiger</h1>
									<p>Swiss Orienteer & Distance Runner</p>
								</header>
								<a href="#strava" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img src="images/portrait.jpg" alt="" />
								</a>
							</article>

						<!-- Strava -->
							<article id="strava" class="panel">
								<header>
									<h2>Latest Activities</h2>
								</header>
								<p>
									<iframe  width='100%' height="450px" frameborder='0' allowtransparency='true' scrolling='no' src='https://www.strava.com/athletes/2754669/latest-rides/8de66fcbce3bcfdbf2a920fd596ac579699b75db'></iframe>
								</p>
								
							</article>

						<!-- INSTAGRAM
							<article id="instagram" class="panel">
								<header>
									<h2>Latest Photos</h2>
								</header>
								<section>
									<div class="row">
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic03.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic04.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic05.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic06.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic07.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic08.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic09.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic10.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic11.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic12.jpg" alt=""></a>
										</div>
									</div>
								</section>
							</article> -->
						<!-- DOMA -->
							<article id="maps" class="panel">
								<header>
									<h2>Latest Maps</h2>
								</header>
								<?php
									$rss = new DOMDocument();
									$rss->load('http://doma.thomascuriger.ch/rss.php?user=thomascu');
									$feed = array();
									foreach ($rss->getElementsByTagName('item') as $node) {
										$item = array ( 
											'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
											'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
											'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
											'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
											);
										array_push($feed, $item);
									}
									$limit = 3;
									for($x=0;$x<$limit;$x++) {
										$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
										$link = $feed[$x]['link'];
										$description = $feed[$x]['desc'];
										$date = date('l F d, Y', strtotime($feed[$x]['date']));
										
										$parts = parse_url($link);

										$str = $parts['scheme'].'://'.$parts['host'].$parts['path'];
										// sth like http://domain.ch/.../
										$strtwo = $parts['scheme'].'://'.$parts['host'];
										// sth like http://domain.ch
										$numbers_array = extract_numbers($link);
										// in numbers_array[0], we got the map number
										echo '<div class="mappar">';
										echo '<a href="'.$link.'" target="_blank"><img class="mapitself" src="'.$strtwo.'/map_images/'.$numbers_array[0].'.thumbnail.jpg" width="100%"/><div class="centered"><a style="font-weight:800;color:black;font-size:20pt;text-decoration:none;" href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></div></a><br/><br/></div>';
										
										// echo '<em>Posted on '.$date.'</em></p>';
										// echo '<p>'.$description.'</p>';
									}

									function extract_numbers($string)
										{
										preg_match_all('/([\d]+)/', $string, $match);
										return $match[0];
										};
								?>
								<!--
								<form action="#" method="post">
									<div>
										<div class="row">
											<div class="6u 12u$(mobile)">
												<input type="text" name="name" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(mobile)">
												<input type="text" name="email" placeholder="Email" />
											</div>
											<div class="12u$">
												<input type="text" name="subject" placeholder="Subject" />
											</div>
											<div class="12u$">
												<textarea name="message" placeholder="Message" rows="8"></textarea>
											</div>
											<div class="12u$">
												<input type="submit" value="Send Message" />
											</div>
										</div>
									</div>
								</form>-->
							</article>
							<!-- Agenda -->
							<article id="termine" class="panel">
								<header>
									<h2>Program</h2>
								</header>
								<div>
									<div class="row">
										<ul>
											<li><h3>March</h3>
												<ul>
													<li>24.03: Swiss O Champs Night, Gelterkinderberg</li>
													<li>25.03: 2nd Swiss National Event, Grossholz</li>
												</ul>
											</li>
											<li><h3>April</h3>
												<ul>
													<li>02.04: Selection race 5000m, Aarau</li>
													<li>06.04: Selection race Sprint, Novaggio</li>
													<li>07.04: Selection race Middle, Sonvico</li>
													<li>08.04: Selection race Long, Cima de Medeglia</li>
													<li>14.04: 4th Swiss National Event, Junkholz</li>
													<li>15.04: Swiss O Champs Relay, Wannental</li>
													<li>17.04: EOC Preperation, Ticino</li>
												</ul>
											</li>
											<li><h3>May</h3>
												<ul>
													<li>05.05: EOC Switzerland</li>
													<li>10.05: Swiss O Champs Sprint</li>
													<li>12.05: 5th Swiss National Event</li>
													<li>13.05: 6th Swiss National Event</li>
												</ul>
											</li>
											<li><h3>June</h3>
												<ul>
													<li>02.06: Training Camp Prag</li>
													<li>05.06: Training Camp Latvia</li>
													<li>16.06: Jukola, Lahti</li>
													<li>24.06: 5er-Staffel, ?</li>
												</ul>
											</li>
											<li><h3>Juli</h3>
												<ul>
													<li>16.07: University-Champs, Finland</li>
												</ul>
											</li>
											<li><h3>August</h3>
												<ul>
													<li>18.08: 7th Swiss National Event, Tarasp</li>
													<li>19.08: Swiss O Champs Long, Ftan</li>
													<li>26.08: Swiss O Champs Middle, Brandhöchi</li>
													<li>29.08: World Cup Norway</li>
												</ul>
											</li>
											<li><h3>September</h3>
												<ul>
													<li>04.09: Training Camp Norway</li>
													<li>09.09: 8th Swiss National Event, Stäfa</li>
													<li>18.08: Selection race Sprint, Lenzburg</li>
													<li>19.08: Selection race 5000m, Aarau</li>
												</ul>
											</li>
											<li><h3>October</h3>
												<ul>
													<li>03.10: World Cup Czech Republic</li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
								<!--
								<form action="#" method="post">
									<div>
										<div class="row">
											<div class="6u 12u$(mobile)">
												<input type="text" name="name" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(mobile)">
												<input type="text" name="email" placeholder="Email" />
											</div>
											<div class="12u$">
												<input type="text" name="subject" placeholder="Subject" />
											</div>
											<div class="12u$">
												<textarea name="message" placeholder="Message" rows="8"></textarea>
											</div>
											<div class="12u$">
												<input type="submit" value="Send Message" />
											</div>
										</div>
									</div>
								</form>-->
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; THOMAS</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>