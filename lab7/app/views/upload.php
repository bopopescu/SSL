<? include 'header.php' ?>
			<main class="upload">
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
				<h2>Upload Your Images</h2>
				<form action="./" method="POST" enctype="multipart/form-data">
					<input name="userfile" type="file" required="required" />
					<input name="title" type="text" placeholder="Title">
					<textarea name="description" placeholder="Image description"></textarea>
					<input type="submit">
				</form>
			</main>
<? include 'footer.php' ?>