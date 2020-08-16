<section id="edit-article">
	<div class="container-fluid py-5">
		<!-- FORM -->
		<form action="index.php?controller=article&task=edit&id=<?php if(isset($draft)){ echo $draft['id']; } ?>" method="POST">
			<div class="row mx-auto">
				<div class="col-12 d-flex flex-wrap justify-responsive align-items-center">
					<h1 class="text-secondary mobile-center">
						<?= $pageTitle ?>
					</h1>
					<!-- BUTTONS -->
					<div class="d-flex mobile-column column-height justify-content-around">
						<button type="submit" name="answer" class="btn btn-outline-primary text-uppercase" value="preview" id="preview">Visualiser</button>
						<button type="submit" name="answer" class="btn btn-outline-primary text-uppercase mx-md-3 mx-lg-1 mx-xl-2" id="draft" value="draft">Brouillon</button>
						<button type="submit" name="answer" id="publish" class="btn btn-primary text-uppercase" value="publish">Publier</button>
					</div>
				</div>
			</div>
			<!-- SEPARATOR -->
			<div class="row mx-auto mb-2">
				<div class="col-12">
					<hr class="bg-secondary">
				</div>
			</div>
			<!-- TITLE -->
			<div class="row mx-auto form-group">
				<div class="col-12">
					<label for="title"><h3 class="m-0">Titre</h3></label>
					<input type="text" class="form-control bg-form border-0" name="title" id="title" placeholder="Inscrivez un titre pour votre chapitre" value='<?php if(isset($draft)){ echo htmlspecialchars($draft['title'], ENT_QUOTES); } ?>' required>
				</div>
			</div>
			<!-- DESCRIPTION -->
			<div class="row mx-auto form-group">
				<div class="col-12">
					<label for="introduction"><h3 class="m-0">Description</h3></label>
					<input type="text" class="form-control bg-form border-0" minlength="20" maxlength="240" name="introduction" id="introduction" placeholder="Décrivez le chapitre en quelques mots" value='<?php if(isset($draft)){ echo htmlspecialchars($draft['introduction'], ENT_QUOTES);} ?>' required>
					<small id="descriptionHelp" class="form-text text-muted">Vous êtes limités à 20 mots minimum et 240 mots maximum.</small>
				</div>
			</div>
			<!-- CHAPTER -->
			<div class="row mx-auto form-group">
				<div class="col-12">
					<label for="chapter"><h3 class="m-0">Chapitre</h3></label>
					<input type="text" class="form-control bg-form border-0" minlength="1" maxlength="3" name="chapter" id="chapter" placeholder="Entrez le numéro de chapitre" value='<?php if(isset($draft)){ echo $draft['chapters']; } else { echo $new; } ?>' required <?php if(isset($draft)){ ?> readonly <?php } ?>>
				</div>
			</div>
			<!-- IMAGES SELECTION -->
			<div class="row mx-auto form-group">
				<div class="col-12">
					<label for="chapter">
						<h3 class="m-0">Image de l'article</h3>
					</label>
					<!-- IF EDIT -->
					<?php if(isset($draft)){ ?>
						<small id="cardimgHelp" class="form-text text-muted">Image d'illustration pour votre article.</small>
						<figure id='cardimg'>
							<img class="cardimg" src="<?= $draft['img_url'] ?>" alt="Image d'illustration de l'article" >
						</figure>
						<input type="hidden" id="photo" name="photo" value="<?= $draft['img_url'] ?>">
					<!-- ELSE NEW -->
					<?php } else { ?>					
						<small id="cardimagesHelp" class="form-text text-muted">Veuillez sélectionner une vignette d'illustration pour votre chapitre.</small>
						<figure id='cardimages' class="d-flex flex-row flex-wrap align-items-center"></figure>
						<small id="imagesHelp" class="form-text text-muted">Autres mots-clés disponibles :</small>
						<div class="d-flex mobile-column flex-nowrap w-100">
							<span class="btn btn-secondary textJS">Dark</span>
							<span class="btn btn-secondary textJS">Northern Lights</span>
							<span class="btn btn-secondary textJS">Alaska</span>
							<span class="btn btn-secondary textJS">Forest</span>
						</div>
						<input type="hidden" id="photo" name="photo" value="<?php if(isset($draft)){ echo $draft['img_url']; } ?>">
					<?php } ?>
				</div>
			</div>
			<!-- CONTENT -->
			<div class="row mx-auto mt-2">
				<div class="col-12">
					<label for="content">
						<h3 class="m-0">Contenu</h3>
					</label>
					<textarea class="bg-form tinymce" name="content" id="content">
						<?php if(isset($draft)){ echo $draft['content']; } ?>
					</textarea>
					<script>
						tinymce.init(
						{
							language: 'fr_FR',
							selector: 'textarea#content',
							height: 500,
							plugins: 'table wordcount autosave',
							toolbar: 'restoredraft',
							skin:'naked',
							content_style: '.left { text-align: left; } ' +
								'img.left { float: left; } ' +
								'table.left { float: left; } ' +
								'.right { text-align: right; } ' +
								'img.right { float: right; } ' +
								'table.right { float: right; } ' +
								'.center { text-align: center; } ' +
								'img.center { display: block; margin: 0 auto; } ' +
								'table.center { display: block; margin: 0 auto; } ' +
								'.full { text-align: justify; } ' +
								'img.full { display: block; margin: 0 auto; } ' +
								'table.full { display: block; margin: 0 auto; } ' +
								'.bold { font-weight: bold; } ' +
								'.italic { font-style: italic; } ' +
								'.underline { text-decoration: underline; } ' +
								'.example1 {} ' +
								'.tablerow1 { background-color: #D3D3D3; }',
							formats: 
							{
								alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
								aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
								alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
								alignfull: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
								bold: { inline: 'span', classes: 'bold' },
								italic: { inline: 'span', classes: 'italic' },
								underline: { inline: 'span', classes: 'underline', exact: true },
								strikethrough: { inline: 'del' },
								customformat: { inline: 'span', styles: { color: '#00ff00', fontSize: '20px' }, attributes: { title: 'My custom format'} , classes: 'example1'}
							},
							style_formats: 
							[
								{ title: 'Custom format', format: 'customformat' },
								{ title: 'Align left', format: 'alignleft' },
								{ title: 'Align center', format: 'aligncenter' },
								{ title: 'Align right', format: 'alignright' },
								{ title: 'Align full', format: 'alignfull' },
								{ title: 'Bold text', inline: 'strong' },
								{ title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
								{ title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
								{ title: 'Badge', inline: 'span', styles: { display: 'inline-block', border: '1px solid #2276d2', 'border-radius': '5px', padding: '2px 5px', margin: '0 2px', color: '#2276d2' } },
								{ title: 'Table row 1', selector: 'tr', classes: 'tablerow1' },
								{ title: 'Image formats' },
								{ title: 'Image Left', selector: 'img', styles: { 'float': 'left', 'margin': '0 10px 0 10px' } },
								{ title: 'Image Right', selector: 'img', styles: { 'float': 'right', 'margin': '0 0 10px 10px' } },
							]
						});
					</script>
				</div>
			</div>
		</form>
	</div>
</section>