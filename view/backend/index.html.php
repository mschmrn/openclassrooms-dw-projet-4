<section id="admin-home" class="bg-info vh-100 col-10">

	<div class="container-fluid py-5">
		<div class="row mx-auto">
			<div class="d-flex col-12">
				<div class="container">
					<h1 class="text-secondary">Bienvenue Jean !</h1>
					<p>Vous êtes actuellement connecté comme <i><?php echo $_SESSION['username']; ?></i> à votre espace administrateur.</p>
				</div>
			</div>
		</div>					
		
		<div class="row mx-auto mt-2">
			<div class="d-flex col-12">
				<div class="container">
					<h2 class="last-articles my-2">Les derniers articles</h2>
				</div>
			</div>
		</div>

		<div class="row mx-auto mt-2">
			<div class="d-flex col-7">
				<div class="container-fluid" >							
					<div class="row mx-auto border-bottom border-grey bg-form">
						<img src="../public/images/example-admin.jpg" class="logo w-25" alt="">
					
						<div class="card w-75 border-0 bg-white">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="d-flex col-5">	
				<div class="container-fluid" >							
					<div class="row mx-auto">
						<button class="btn btn-primary py-3 w-75">+ Écrire un article</button>
					</div>
					<div class="row mx-auto">
						<h2 class="last-articles my-3">Les derniers commentaires</h2>
					</div>
					<div class="row mx-auto border-bottom border-grey bg-form">
						<div class="card border-0">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>

				</div>
			</div>

				
			</div>
		</div>
	</div>

</section>


