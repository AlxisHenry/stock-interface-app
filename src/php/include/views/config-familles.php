<?php
include '../templates/home.php';
?>

<section class="section form-section family_section">

    <div class="form-section-card">

        <div class="card-action">

            <div class="new config-active-action">
                Nouvelle famille
            </div>

            <div class="exist">
                Famille existante
            </div>

        </div>

        <i class="exit-article-focus fa-solid fa-xmark invisible"></i>

        <div class="card-form-family">

            <div class="form-new-family">

                <label class="form-label"> Nom de la famille
                    <input name="family-name" class="new-family-name" <?= InitializeFamily() === '' ? '' : ' value="' . InitializeFamily()->getNom() . '"'?>">
                </label>

                <label class="form-label"> À propos de la famille
                    <input name="family-comment" class="new-family-comment" <?= InitializeFamily() === '' ? '' : ' value="' . InitializeFamily()->getCommentaire() . '"'?>>
                </label>

            </div>

            <div class="form-edit-family hidden">

                <label class="form-label"> Nom de la famille
                    <select name="name" class="form-select family-name-select" <?= InitializeFamily() === '' ? '' : ' data-family="' . InitializeFamily()->getId() . '"'?>>
                        <?= GetFamilyList(); ?>
                    </select>
                </label>

                <label class="form-label"> À propos de la famille
                    <input name="family-comment" class="new-family-comment" <?= InitializeFamily() === '' ? '' : ' value="' . InitializeFamily()->getCommentaire() . '"'?>>
                </label>

            </div>

        </div>

        <div class="submit-actions">

            <input type="submit" data-target="" value="Enregistrer" class="form-submit card-form-family-submit">
            <button class="exist-family-deleted delete-family hidden" data-target="delete">Supprimer</button>

        </div>

    </div>

</section>

<script type="module" src="../../../js/main/c_family.js"></script>

</body>
</html>