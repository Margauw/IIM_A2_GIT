<body>
	<?php include '_topbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="musicfeed">
					<h1><i class="fa fa-pencil"></i> Editer la musique</h1>
					<div class="block animated fadeInDown">
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
								<b class="title"><?php echo $music['title']; ?></b>

									
									<?php
								if(isset($error) && !empty($error)){
									echo '
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										'.$error.'
									</div>';
								}
								?>
								<form action="edit.php?id=<?php echo $_GET["id"];?>" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="title">Titre</label>
										<input type="text" name="title" class="form-control">
									</div>
									<div class="form-group">
										<label for="file">Musique</label>
										<input type="file" name="music">
										<p>
											Extensions autorisées : .mp3, .ogg
										</p>
									</div>
									<p class="clearfix"><button type="submit" class="valid pull-right"><i class="fa fa-check"></i>Envoyer</button></p>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
