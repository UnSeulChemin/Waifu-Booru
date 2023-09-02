<?php $title = "Waifu"; ?>

<?php ob_start(); ?>
<main>

    <section class="section-default">

      <div>
         <h2>Modification</h2>
         <p>Modification de votre Waifu.</p>
      </div>

      <form action="../wupdate/<?= $waifu->identifier ?>" method="post">

         <div>
            <input type="text" name="name" minlength="1" maxlength="30" required value="<?= htmlspecialchars($waifu->name) ?>">
         </div>

         <div>
            <input type="text" name="type" minlength="1" maxlength="30" required value="<?= htmlspecialchars($waifu->type) ?>">
         </div>

         <div>
            <input type="submit" value="Modifier">
         </div>

      </form>

</section>

</main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
