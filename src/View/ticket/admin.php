<div class="index-wrapper">
    <div class="card ticket-list">
        <table class="data-table">
            <thead>
            <th>ID</th>
            <th>Status</th>
            <th>Objet</th>
            <th>Date d'ouverture</th>
            <th>Actions</th>
            </thead>
            <tbody>
            <?php foreach ($opened as $ticket) { ?>
                <tr>
                    <td><?= $ticket->getId() ?></td>
                    <td>
                        <span class='state-on'>Ouvert</span>
                    </td>
                    <td><?= $ticket->getSubject() ?></td>
                    <td><?= $ticket->getOpenAt()->format('H:i, d/m/Y') ?></td>
                    <td>
                        <a href="/ticket/<?= $ticket->getId() ?>" class="edit-btn">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="card ticket-card">
        <h1>Tickets résolus</h1>
        <div class="rticket-list">
            <?php foreach ($closed as $ticket) { ?>
                <div class="ticket-resolved">
                    <h1><?= $ticket->getId() ?></h1>
                    <p><?= $ticket->getOpenAt()->format('H:i, d/m/Y') ?></p>
                    <a href="/ticket/<?= $ticket->getId() ?>" class="edit-btn">
                        <i class="far fa-eye"></i>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>