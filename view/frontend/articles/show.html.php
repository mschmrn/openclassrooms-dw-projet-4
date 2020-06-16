<h1><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['introduction'] ?></p>
<hr>
<?= $article['content'] ?>

<?php if (count($comments) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($comments) ?> réactions : </h2>
    <?php foreach ($comments as $comment) : ?>
        <h3>Commentaire de <?= $comment['author'] ?></h3>
        <small>Le <?= $comment['created_at'] ?></small>
        <blockquote>
            <em><?= $comment['content'] ?></em>
        </blockquote>
        <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
<?php endif ?>

<form action="index.php?controller=comment&task=insert" method="POST">
    <h3>Vous souhaitez réagir ?</h3>
    <input type="text" name="author" placeholder="Votre pseudo !">
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="article_id" value="<?= $article_id ?>">
    <button>Commenter !</button>
</form>