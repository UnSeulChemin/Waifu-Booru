<?php $title = "Waifu"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

        <div>
            <h2>Page Waifu</h2>
            <p>Bienvenue sur la page waifu.</p>
        </div>

        <div class="array-show">

            <?php
            foreach ($waifus as $waifu)
            {   ?>
                <div class="array-show-within">
                    <p><span class="bold">Nom :</span> <?= htmlspecialchars($waifu->name); ?></p>
                    <p><span class="bold">Type :</span> <?= htmlspecialchars($waifu->type); ?></p>
                    <a href="waifu/<?= $waifu->identifier ?>">modifier</a>
                </div>
                <?php
            }
            ?>

        </div>

    </section>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>