<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

        <div>
            <h2>Page d'Accueil</h2>
            <p>Bienvenue sur la page d'accueil.</p>
        </div>

    </section>

<?php
foreach ($posts as $post)
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->frenchCreationDate; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <em><a href="post/<?= urlencode($post->identifier) ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
    }
    ?>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
