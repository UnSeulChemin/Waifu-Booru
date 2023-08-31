<?php $title = "Waifu Modification"; ?>

<?php ob_start(); ?>

<h2>Modification</h2>

<form action="../waifu/<?= $waifu->identifier ?>" method="post">
   <div>
      <label for="name">Name</label><br />
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($waifu->name) ?>"/>
   </div>
   <div>
      <label for="type">Type</label><br />
      <textarea id="type" name="type"><?= htmlspecialchars($waifu->type) ?></textarea>
   </div>
   <div>
      <input type="submit" />
   </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
