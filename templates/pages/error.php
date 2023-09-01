<?php $title = "Erreur"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

        <div>
            <h2>Une erreur est survenue.</h2>
            <p><?= $errorMessage ?></p>
        </div>

    </section>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
