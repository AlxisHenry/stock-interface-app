
<?php
include '../templates/home.php';
?>

<section class="section entry-stock-section ">
    <form class="stock-action-form" action="stock_in.php">

        <div class="article-status">
            <label class="existing-article"> Article existant
                <input type="checkbox">
            </label>
            <label class="add-new-article"> Nouvel article
                <input type="checkbox">
            </label>
        </div>

        <div class="research-article">
            <label class="db-research-article"> Rechercher l'article ou entrer le nom
                <input type="text" class="research-article-input">
            </label>
        </div>

        <div class="action-on-article">
            <!-- Si article existant : Alors remplir les autres champs:  -->
            <label class="article-quantity-label"> Quantité à insérer
                <input type="number" class="article-quantity">
            </label>
                <br>
            <label class="article-commentary-label"> Commentaire sur l'article
                <input type="text" class="article-commentary">
            </label>
                <br>
            <label class="article-family-label"> Famille de l'article
                <input type="text" class="article-family">
            </label>

            <label>

            </label>

        </div>


    </form>
</section>


</body>
</html>