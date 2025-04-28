<?php
require_once __DIR__ . '/../login/isConnect.php';
?>
<?php require_once __DIR__ . '/../../../View/header/header_template.php'; ?>
<form action="/View/Pages/Commentaires/comments_post_create.php" method="POST">
    <div class="mb-3 visually-hidden">
        <input class="form-control" type="text" name="recipe_id" value="<?php echo $recipe['recipe_id']; ?>" />
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Evaluez la recette (de 1 à 5)</label>
        <input type="number" class="form-control" id="review" name="review" min="1" max="5" step="1" />
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Postez un commentaire</label>
        <textarea class="form-control"
                  placeholder="Soyez respectueux/se, nous sommes humain(e)s."
                  id="comment"
                  name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <script src="/View/Pages/Commentaires/validation_commentaire.js"></script>
</form>
