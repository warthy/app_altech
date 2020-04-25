<?php use App\KernelFoundation\Security; ?>
<div class="ticket-header">
    <div class="h-left">
        <h5 class="timestamp">Ticket ouvert le <?= $ticket->getOpenAt()->format('d/m/Y à H:i') ?></h5>

        <div class="subject">
            <?= $ticket->getDescription() ?>
        </div>
    </div>
    <div class="h-right">
        <div class="state">
            <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-367-456319.png" /> <?= $ticket->getAdmin()->getName() ?>
        </div>
        <div class="state">
            <h2>Etat :</h2> <?= $ticket->getState() ?>
        </div>
        <div class="state-buttons">
            <?php if (is_null($ticket->getAdminId())) { ?>
                <button class="default-btn">
                    S'assigner le ticket
                </button>
            <?php } ?>
            <?php if (!$ticket->isClosed() && Security::hasPermission(Security::ROLE_ADMIN)) { ?>
            <button class="delete-btn">
                Fermer le ticket
            </button>
            <?php } ?>
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
    ?>

    <div>
        <form class="msg-form" method="post" onsubmit="alert('sending message...')">
            <textarea placeholder="Entrez votre message..." class="msg-input" name="message"></textarea>
            <button class="submit-msg">
                Envoyer <i class="far fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>
<script>
    // Start messages scroller at the bottom
    const element = document.getElementById("scroller");
    element.scrollTop = element.scrollHeight;
</script>