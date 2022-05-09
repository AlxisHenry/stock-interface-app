
<?php
include '../templates/home.php';
?>

<section class="section form-section entry-stock-section ">
    <form class="stock-action-form" method="POST" action="stock_out.php">

        <div class="research-article">
            <select>
                <?= GetArticlesList() ?>
            </select>
            <label class="db-research-article hidden">
                <input type="text" class="research-article-input" <?= InitializeStockEntry() === '' ? '' : "value=" . InitializeStockEntry()->getNom() . " disabled" ?>>
            </label>
        </div>

        <div class="action-on-article">
            <label class="article-quantity-label"> Quantité à sortir
                <input type="number" class="article-quantity" required>
            </label>
            <br>
        </div>

        <div class="about-article">

            <label class="article-commentary-label"> Commentaire
                <input type="text" class="article-commentary" <?= InitializeStockEntry() === '' ? '' : " value=" . InitializeStockEntry()->getNom() . " disabled" ?>>
            </label>
            <br>
            <label class="article-family-label"> Famille
                <input type="text" class="article-family" <?= InitializeStockEntry() === '' ? '' : " value=" . Familles_OBJECT_(InitializeStockEntry()->getFamille(), 'id')->getNom() . " disabled" ?>>
            </label>
            <label class="article-code-label"> Code
                <input type="text" class="article-code" <?= InitializeStockEntry() === '' ? '' : " value=" . InitializeStockEntry()->getCode() . " disabled" ?>>
            </label>
            <label class="article-localisation-label"> Localisation
                <input type="text" class="article-localisation" <?= InitializeStockEntry() === '' ? '' : " value=" . InitializeStockEntry()->getLocalisation() . " disabled" ?>>
            </label>

        </div>

        <input type="submit">

    </form>
</section>

<script type="module" src="../../../js/main/stock_out.js"></script>

</body>
</html>