<?php
include '../templates/home.php';
?>

<section class="section form-section article-section">

    <div class="form-section-card">

        <div class="card-action">

            <div class="new">
                Créer un article
            </div>

            <div class="exist config-active-action">
                Entrée de stock
            </div>

        </div>

        <i class="exit-article-focus fa-solid fa-xmark invisible"></i>

        <div class="card-form-article">

            <div class="form-primary-article">

                <label class="form-label"> Nom de l'article

                    <select name="article-list" class="form-select article-name-select" <?= InitializeStockEntry() === '' ? '' : ' data-art="' . InitializeStockEntry()->getId() . '"'?>>
                        <?= GetArticlesList(); ?>
                    </select>

                    <input name="article" type="text" class="form-input article-name hidden" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getNom() .'"' ?> disabled>

                </label>

                <label class="form-label""> Centre de coût

                    <select name="ccout" class="form-select ccout-target">
                        <?= GetUsersList(); ?>
                    </select>

                </label>

                <label class="form-label""> Quantité à ajouter

                    <input name="quantity-to-add" type="text" class="form-input article-quantity-to-add">

                </label>

                <label class="form-label""> Numéro de commande

                    <input name="command-order" type="text" class="form-input command-order">

                </label>

                <label class="form-label"> À propos de l'entrée

                    <input name="about-entry" type="text" class="form-input about-entry">

                </label>

            </div>

            <div class="form-about-article">

                <label class="form-label"> Famille de l'article
                    <input name="family" type="text" class="form-input article-family"  <?= InitializeStockEntry() === '' ? '' : ' value="' . Familles_OBJECT_(InitializeStockEntry()->getFamille(), 'id')->getNom() .'"' ?> disabled>
                </label>

                <label class="form-label"> Localisation dans le stock
                    <input name="localisation" type="text" class="form-input article-localisation"  <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getLocalisation() .'"' ?> disabled>
                </label>

                <label class="form-label"> À propos de l'article
                    <input name="commentary" type="text" class="form-input article-commentary" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getCommentaire() .'"'?> disabled>
                </label>

                <label class="form-label"> Code correspondant
                    <input name="code" type="text" class="form-input article-code" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getCode() . '"' ?> disabled>
                </label>

                <label class="form-label"> Quantité minimale attribuée
                    <input name="localisation" type="text" class="form-input article-localisation"  <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getQuantityMin() .'"' ?> disabled>
                </label>

            </div>

        </div>

        <div class="submit-actions">
            <input type="submit" data-target="" value="Validation" class="form-submit card-form-article-submit">
        </div>

    </div>

</section>

<script type="module" src="../../../js/main/stock_in.js"></script>

</body>
</html>