<?php $title = "Waifu"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

        <div>
            <h2>Page Waifu</h2>
            <p>Créer ici votre Waifu.</p>
        </div>

        <form action="wcreate" method="post">

            <div>
                <input type="text" name="name" minlength="1" maxlength="30" placeholder="Nom*" required>
            </div>

            <div>
                <input type="text" name="type" minlength="1" maxlength="30" placeholder="Type*" required>
            </div>

            <div>
                <input type="submit" value="Ajouter">
            </div>

        </form>

        <div class="array-show">

            <?php
            foreach ($waifus as $waifu)
            {   ?>
                <div class="array-show-within">

                    <div>
                        <p><span class="bold">Nom :</span> <?= htmlspecialchars($waifu->name); ?></p>
                        <p><span class="bold">Type :</span> <?= htmlspecialchars($waifu->type); ?></p>
                    </div>

                    <div>
                        <a href="wupdate/<?= urlencode($waifu->identifier) ?>">Modifier</a>
                        <a href="wdelete/<?= urlencode($waifu->identifier) ?>">Supprimer</a>
                    </div>

                </div>
                <?php
            }
            ?>

        </div>

    </section>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
