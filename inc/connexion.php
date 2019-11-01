<?php
$pdo = new PDO('mysql:host=localhost;dbname=game;charset=utf8','root', '');

// on force le tableau associatif par défaut pour les fetch et les fetchAll

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
				   PDO::FETCH_ASSOC);

// affichage des erreur SQL (débeug en phase de dev)

$pdo->setAttribute(PDO::ATTR_ERRMODE,
				   PDO::ERRMODE_WARNING);				   
?>