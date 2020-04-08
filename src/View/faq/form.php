<a href="/faq" class="faq-corner-link">
    Retour aux questions >
</a>


<form method="post">

    <div class="form-group">
        <label for="question">Question:</label>
        <input class="input-question" name="question" value="<?= $faq->getQuestion() ?>"/>
    </div>

    <div class="form-group">
        <label for="answer">Réponse:</label>
        <textarea class="input-answer" name="answer"><?= $faq->getAnswer() ?></textarea>
    </div>

    <div class="button-list">
       <button class="faq-button">
           Enregistrer
       </button>

        <?php
        if ($faq->getId()) {
            ?>
            <a type="button" class="faq-delete-button" href="/faq/<?= $faq->getId() ?>/delete">
                Supprimer
            </a>
            <?php
        }
        ?>
    </div>
</form>
