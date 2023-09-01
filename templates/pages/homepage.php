<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

        <div>
            <h2>Page d'Accueil</h2>
            <p>Bienvenue sur la page d'accueil.</p>
        </div>

    </section>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
