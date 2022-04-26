<?php
    include '../templates/home.php';
?>

<section class="section entry-stock-section">

    <form method="POST">
        <div class="form-config-article">

            <div class="select-action-type">

                <div class="new-article">
                    Nouvel article
                </div>

                <div class="existing-article">
                    Article existant
                </div>

            </div>

            <div class="form-config-article-inputs">

            <div class="research-article">

                <label class="db-research-article"> Nom de l'article

                 <input name="name" type="text" class="article-nom" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getNom() .'"' ?> required >

                    <select name="name" class="article-nom-select hidden" <?= InitializeStockEntry() === '' ? '' : ' data-art="' . InitializeStockEntry()->getId() . '"'?>>
                        <?= GetArticlesList(); ?>
                    </select>

                </label>

            </div>

            <div class="action-on-article">

                <label class="article-quantity-label"> Quantité assignée

                    <input name="quantity" type="number" class="article-default-quantity" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getQuantityStock() . '" disabled' ?>>

                </label>

            </div>

            <div class="about-article">

                <label class="article-commentary-label"> Commentaire
                    <input name="commentary" type="text" class="article-commentary" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getCommentaire() .'"'?>>
                </label>

                <label class="article-family-label"> Famille de l'article
                    <select name="family" class="article-family-select" <?= InitializeStockEntry() === '' ? '' : ' data-family="' . InitializeStockEntry()->getFamille() . '"'?>>
                        <?= GetFamilyList(); ?>
                    </select>
                </label>

                <label class="article-code-label"> Code correspondant
                    <input name="code" type="text" class="article-code" <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getCode() . '"' ?>>
                </label>

                <label class="article-localisation-label"> Localisation dans le stock
                    <input name="localisation" type="text" class="article-localisation"  <?= InitializeStockEntry() === '' ? '' : ' value="' . InitializeStockEntry()->getLocalisation() .'"' ?>>
                </label>

            </div>

            <input type="submit" data-target="" value="Enregistrer" class="submit-form-config-article-values">

            </div>

        </div>
    </form>

</section>

<script type="module" src="../../../js/main/c_article.js"></script>

</body>
</html>