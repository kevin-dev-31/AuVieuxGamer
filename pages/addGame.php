<?php
require '../inc/connexion.php';

// Les différente plateformes
$console = [
	// Clé  => Valeur
	'1'	=> 'Xbox',
	'2'	=> 'Playstation',
	'3'	=> 'Séga',
	'4'	=> 'Nintendo',
	'5'	=> 'Pc',
];

$errors = array();


if(!empty($_POST)){

	$safe = array_map('strip_tags', $_POST);

	if(!array_key_exists($safe['input_console'], $console)){
		$errors[] = 'Le type de console est invalide';
	}
	if(strlen($safe['input_model']) < 1){
		$errors[] = 'Le model doit comporter au moins 4 caractères';
	}
	if(strlen($safe['input_name']) < 3){
		$errors[] = 'Le nom du jeux doit comporter au moins 3 caractères';
	}	
	if(!is_numeric($safe['input_year'])){
		$errors[] = 'La date de sortie n\'est pas un nombre valide';
	}


	if(count($errors) === 0){

		// Préparation de la requete
		$request = $pdo->prepare('INSERT INTO game_list (console, model, name, year) VALUES (:param_console, :param_model, :param_name, :param_year)');


		// Association des paramètres avec les valeurs
		$paramsInsert = [
			':param_console' => $safe['input_console'],
			':param_model'	 => $safe['input_model'],
			':param_name'	 => $safe['input_name'],
			':param_year' 	 => $safe['input_year'],
		];

		// Let's go
		if($request->execute($paramsInsert)){
			$success = true;
		}
	}


}


?>

<?php include '../php/header.php'; ?>
<body>
	<header>
		<a href="../index.html"><img src="../img/AVG_pa.png" class="lienAccueil" alt="logo du site, dirige vers la page d'accueil"></a>
	</header>

	<section>
	<section>
        <video autoplay="autoplay" muted="muted" loop="loop">
            <source src="../img/video/jeux.mp4" type="video/mp4">
        </video>
	</section>
	</section>
        <h1>Mes jeux !</h1>

	<section class="container">
			<?php if(isset($success)):?>
		<p style="color:green;">Ton jeux a bien été ajouté</p>

	<?php elseif (count($errors) > 0): // Si j'ai des erreurs, je les affiche ?>		
		<p style="color:red"><?=implode('<br>', $errors);?></p>
	<?php endif;?>

		<form method="post">

			<div class="form-group">
				<label for="console">Console</label>
				<select id="console" name="input_console" class="form-control">
					<option value="0" selected>-- Sélectionnez --</option>
					<?php foreach ($console as $key => $value):?>
						<option value="<?=$key;?>"><?=$value;?></option>
					<?php endforeach;?>
				</select>
			</div>

			<div class="form-group">
				<label for="model">Modèle</label>
				<input type="text" id="model" name="input_model" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">Nom du jeux</label>
				<input type="text" id="type" name="input_name" class="form-control">
			</div>

			<div class="form-group">
				<label for="year">Année de sortie</label>
				<input type="number" id="year" name="input_year" class="form-control">
			</div>

			<div class="text-center">
				<input type="submit" value="Enregistrer" class="btn btn-outline-primary">				
			</div>


		</form>
	</section>





<?php include "../php/footer.php"; ?>
	</body>
</html>







