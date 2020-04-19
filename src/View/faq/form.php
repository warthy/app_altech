<form method="post">

    <div class="form-group">
        <div>
            <label for="question">Question:</label>
            <input class="input-question" name="question" value="<?= $faq->getQuestion() ?>"/>
        </div>
    </div>

    <div class="form-group">
        <div>
            <label for="answer">Réponse:</label>
            <textarea class="input-answer" name="answer"><?= $faq->getAnswer() ?></textarea>
        </div>
    </div>

    <div class="button-list">
        <button class="submit-btn">
            Enregistrer
        </button>

        <?php
        if ($faq->getId()) {
            ?>
            <a type="button" class="delete-button" href="/faq/<?= $faq->getId() ?>/delete">
                Supprimer
            </a>
            <?php
        }
        ?>
    </div>
</form>
