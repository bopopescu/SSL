<? include 'header.php' ?>
			<main>
				<ul id="userNav">
					<div class="width">
						<div class="l-u-nav">
							<li class="stream">
								<a id="stream" href="./?photostream">Photostream</a>
							</li>
							<li class="upload">
								<a id="upload" href="./?upload">Upload</a>
							</li>
						</div>
						<li class="logout">
							<a id="logout" href="./?logout">Logout</a>
						</li>
					</div>
				</ul>
				<div class="effect-parent gallery">
					<? foreach($images as $obj){ ?>
						<a href="<?=$obj['imgPath']?>" class="Collage gallery">
							<img src="<?=$obj['imgPath']?>" alt="<?=$obj['title']?>" height=240>
							<h3><?=$obj['title']?></h3>
							<p><?=$obj['description']?></p>
						</a>
					<? } ?>
				</div>
			</main>
<? include 'footer.php' ?>