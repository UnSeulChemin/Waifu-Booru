<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<main>

<h1>Le super blog de l'AVBN !</h1>
<p><a href="../">Retour à la liste des billetsss</a></p>

<h2>Commentaires</h2>

<form action="../addComment/<?= $post->identifier ?>" method="post">
   <div>
      <label for="author">Auteur</label><br />
      <input type="text" id="author" name="author" />
   </div>
   <div>
      <label for="comment">Commentaire</label><br />
      <textarea id="comment" name="comment"></textarea>
   </div>
   <div>
      <input type="submit" />
   </div>
</form>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->frenchCreationDate ?>
    (<a href="../updateComment/<?= $comment->identifier ?>">modifier</a>)</p>

    <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
<?php
}
?>

<main>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php') ?>
