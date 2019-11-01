<?php
require '../inc/connexion.php';

$console = [
	// Clé  => Valeur
	'1'	=> 'Xbox',
	'2'	=> 'Playstation',
	'3'	=> 'Séga',
	'4'	=> 'Nintendo',
	'5'	=> 'Pc',
];
//requete
$rq = "SELECT * FROM game_list";
$listegame = $pdo->query($rq)->fetchAll();

include '../php/header.php'; ?>
<body>
	<header>
		<a href="../index.html"><img src="../img/AVG_pa.png" class="lienAccueil" alt="logo du site, dirige vers la page d'accueil"></a>
	</header>

	<section>
        <video autoplay="autoplay" muted="muted" loop="loop">
            <source src="../img/video/jeux.mp4" type="video/mp4">
        </video>
	</section>

        <section class="container">
        	<h1>Mes jeux !</h1>
        	
        	<div>
        		<h2><a href="addGame.php">Ajouter des jeux !</a></h2>
        	</div>


			<div>
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th scope="col">Titre</th>
							<th scope="col">Description</th>
							<th scope="col">Description</th>
							<th scope="col">Photo</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listegame as $game) :?>
						<tr>
							
							<td><?= $console[$game['console']]?></td>
							<td><?= $game['model']?></td>
							<td><?= $game['name']?></td>
							<td><?= $game['year']?></td>

						</tr>		
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

        </section>




<?php include "../php/footer.php"; ?>
	</body>
</html>







