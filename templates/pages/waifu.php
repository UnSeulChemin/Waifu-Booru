<?php $title = "Waifu"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

        <div>
            <h2>Page Waifu</h2>
            <p>Bienvenue sur la page waifu.</p>
        </div>

        <form action="wcreate" method="post">

            <div>
                <label for="name">Name</label><br />
                <input type="text" id="name" name="name" />
            </div>
            <div>
                <label for="type">Type</label><br />
                <textarea id="type" name="type"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>

        <div class="array-show">

            <?php
            foreach ($waifus as $waifu)
            {   ?>
                <div class="array-show-within">
                    <p><span class="bold">Nom :</span> <?= htmlspecialchars($waifu->name); ?></p>
                    <p><span class="bold">Type :</span> <?= htmlspecialchars($waifu->type); ?></p>
                    <a href="wupdate/<?= urlencode($waifu->identifier) ?>">modifier</a>
                    <a href="wdelete/<?= urlencode($waifu->identifier) ?>">del</a>
                </div>
                <?php
            }
            ?>

        </div>

    </section>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
