<?php
foreach ($faqs as $faq) {
    ?>
    <div>
        <div>
            <?= $faq->getQuestion() ?>
        </div>
        <div>
            <?= $faq->getAnswer() ?>
        </div>
    </div>
    <?php
}

?>
