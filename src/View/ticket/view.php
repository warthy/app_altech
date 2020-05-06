<?php use App\KernelFoundation\Security; ?>
<div class="ticket-header">
    <div class="h-left">
        <h5 class="timestamp">Ticket ouvert le <?= $ticket->getOpenAt()->format('d/m/Y à H:i') ?></h5>

        <div class="subject">
            <?= $ticket->getDescription() ?>
        </div>
    </div>
    <div class="h-right">
        <?php if ($ticket->getAdmin()) { ?>
            <div class="state">
                <img src="<?= $ticket->getAdmin()->getPicture() ?>"/> <?= $ticket->getAdmin()->getName() ?>
            </div>
        <?php } ?>
        <div class="state">
            <h2>Etat :</h2> <?= $ticket->getState() ?>
        </div>
        <div class="state-buttons">
            <?php
            if (Security::hasPermission(Security::ROLE_ADMIN)) {
                if (is_null($ticket->getAdminId())) { ?>
                    <a href="/ticket/<?= $ticket->getId() ?>/assign" class="default-btn">
                        S'assigner le ticket
                    </a>
                <?php } ?>
                <?php if (!$ticket->isClosed()) { ?>
                    <a href="/ticket/<?= $ticket->getId() ?>/close" class="delete-btn">
                        Fermer le ticket
                    </a>
                <?php }
            }
            ?>
        </div>
    </div>
</div>
<hr>
<div id="scroller" class="ticket-messages">
    <?php
    foreach ($messages as $message) {
        if ($message->getAuthorId() === $user->getId()) { ?>
            <div class="message-box from-author">
                <?= $message->getMessage() ?>
                <span class="msg-date"> <?= $message->getSentAt()->format('H:i, d/m/Y') ?></span>
            </div>
        <?php } else { ?>
            <div class="message-box from-other">
                <?= $message->getMessage() ?>
                <span class="msg-date"><?= $message->getSentAt()->format('H:i, d/m/Y') ?></span>
            </div>
        <?php }
    }
    if (!$ticket->isClosed() && ($user->getId() == $ticket->getClientId() || $user->getId() == $ticket->getAdminId())) { ?>
        <div>
            <form class="msg-form" method="post" action="/ticket/<?= $ticket->getId() ?>/send">
                <textarea placeholder="Entrez votre message..." class="msg-input" name="message"></textarea>
                <button class="submit-msg">
                    Envoyer <i class="far fa-paper-plane"></i>
                </button>
            </form>
        </div>
    <?php } ?>
</div>
<script>
    // Start messages scroller at the bottom
    const element = document.getElementById("scroller");
    element.scrollTop = element.scrollHeight;
</script>