<?php if($admin) { ?>
<a href="/admin/faq/new" class="faq-corner-link">
    Créer une nouvelle question +
</a>
<?php } ?>

<div class="frequent-questions">
    <?php
    foreach ($faqs as $index => $faq) {
        ?>
        <div class="faq">
            <div class="faq-question">
                <?= $faq->getQuestion() ?>
                <div>
                    <a onclick="toggleFAQ(<?= $index ?>)"><i id="ch-<?= $index ?>" class="fas fa-chevron-down"></i></a>
                    <?php
                    if ($admin) echo "<a href='admin/faq/" . $faq->getId() . "'><i class='far fa-edit'></i></a>"; ?>
                </div>
            </div>
            <div id="faq-<?= $index ?>" class="faq-answer hidden">
                <?= $faq->getAnswer() ?>
            </div>
        </div>
        <?php
    }
    ?>

    <?php if(!$admin) { ?>
    <a class="default-btn open-ticket" href="/client/ticket/new">
        <div>
            <span>Pas de réponse ?</span>
            <h2>Ouvrir un ticket +</h2>
        </div>
    </a>
    <?php } ?>
</div>