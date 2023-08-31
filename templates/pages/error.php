<?php $title = "Erreur"; ?>

<?php ob_start(); ?>
<h2>Page d'Erreur</h2>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
