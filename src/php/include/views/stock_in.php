
<?php
include '../templates/home.php';
?>

<section class="section entry-stock-section ">
    <form class="stock-action-form" action="stock_in.php">

        <div class="research-article">
            <label class="db-research-article"> Rechercher l'article ou entrer le nom
                <input type="text" class="research-article-input" <?= InitializeStockEntry() === '' ? '' : "value=" . InitializeStockEntry()->getNom() . " disabled" ?>>
            </label>
        </div>

        <div class="action-on-article">
            <label class="article-quantity-label"> Quantité à insérer
                <input type="number" class="article-quantity">
            </label>
            <br>
        </div>

        <div class="about-article">

            <label class="article-commentary-label"> Commentaire sur l'article
                <input type="text" class="article-commentary" <?= InitializeStockEntry() === '' ? '' : " value=" . InitializeStockEntry()->getNom() . " disabled" ?>>
            </label>
            <br>
            <label class="article-family-label"> Famille de l'article
                <input type="text" class="article-family" <?= InitializeStockEntry() === '' ? '' : " value=" . Familles_OBJECT_(InitializeStockEntry()->getFamille(), 'id')->getNom() . " disabled" ?>>
            </label>
            <label class="article-code-label"> Code de l'article
                <input type="text" class="article-code" <?= InitializeStockEntry() === '' ? '' : " value=" . InitializeStockEntry()->getCode() . " disabled" ?>>
            </label>
            <label class="article-localisation-label"> Localisation de l'article
                <input type="text" class="article-localisation" <?= InitializeStockEntry() === '' ? '' : " value=" . InitializeStockEntry()->getLocalisation() . " disabled" ?>>
            </label>

        </div>

        <input type="submit">

    </form>
</section>

</body>
</html>