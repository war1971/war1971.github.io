
<html>
<head>
<?php include 'meta.php';?>
	<link rel="stylesheet" href="css/engine/magnet.css">
	<link rel="stylesheet" href="css/engine/extra.css">
	<link rel="stylesheet" href="css/engine/img.css">
	<link rel="stylesheet" href="css/engine/magnet_0.css">
</head>
	<?php include 'header.php';?>
<body>
	<div class="content">
		<div class="top-head"></div>
			<div class="full_page_details">		
			 	<div class="engine-cointainer">	
				<?php

				/**********get main data except ads**************/
				$link_for_magnet = $_GET["link"];
				$url = 'https://1337x.to/torrent/'.$link_for_magnet;
				$raw = file_get_contents($url);     

				$re = '/<div class="tab-content">(.*?)<div role="tabpanel" class="tab-pane" id="comments">/ms';
				preg_match_all($re, $raw, $matches);
				$matched_data = $matches[1][0];
				
				/***************magnet link data get and display *********************/
				
						$re2 = $re = '/magnet:\?xt=urn:btih:(.*?)"/sm';
						preg_match_all($re2, $raw, $magnet);
						$magnet_link = "".$magnet[1][0];
									//echo $magnet_link;
						echo '


<div class="all_things">
	<div class="type_1">
		<div class="container_3">
			<div class="row_3">
				<a href="#" Class="stream_q magnet_3" ><i class="fa fa-magnet" style="font-size:15px"></i>&nbsp;Magnet Download</a>
				<a href="#" Class="stream_q torrent_3" id="drop_btn"><i class="fa fa-download" style="font-size:15px"></i>&nbsp;Torrent Download</a>
			</div>
			<div class="row_3">
			<div class="list-group" id="drop_view">
				<a href="#" Class="stream_q itorrent_3"><i class="fa fa-envira" style="font-size:15px"></i>&nbsp;Itorrents Mirror</a>
				<a href="#" Class="stream_q t_3"><i class="fa fa-envira" style="font-size:15px"></i>&nbsp;Torrage Mirror</a>
				<a href="#" Class="stream_q b_3"><i class="fa fa-envira" style="font-size:15px"></i>&nbsp;Btcache Mirror</a>
			</div>
			<div class="row_3">
				<a href="#" Class="stream_q stream_3" ><i class="fa fa-play-circle" style="font-size:15px"></i>&nbsp;Streaming Online</a>
			</div>
			</div>
		</div>
	</div>
	<div class="type_2">

	</div>
	<div class="type_3">

	</div>
</div>

						
							<br>
						'.$link_for_magnet.'
							<br>
						'.$magnet_link.'
							<br>
							

						';
				/*************** img section work repalce relative tags with absolute tags********************/
				$re3 = '/data-original="(.*?)"/sm';
				$count3 = preg_match_all($re3, $raw, $images);
				$re4 = '/<img src=\"\/(.*)\"/mU';
				for ($y = 0; $y < $count3; $y++) {
					echo '
				<section class="img-gallery-magnific">
					<div class="magnific-img">
						<a class="image-popup-vertical-fit" href="'.$images[1][$y].'" title="'.$images[1][$y].'">
							<img src="'.$images[1][$y].'" alt="loading" >
						</a>
					</div>
				</section>
						';
					$matched_data = preg_replace($re4, '<img class="responsive" style="display:none;" src="get_img.php?images='.$images[1][$y].'" alt="loading"', $matched_data, 1);
												}
				echo '
				<div class="match_data_all">
					<div class="torrent_details_0">Description</div>							
					'.$matched_data.'
				</div>';
				
			?> </div>
			</div>
	</div>

<!---------image popup -------->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script>
<script  src="./js/engine/img.js"></script>
<!---------image popup END-------->