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
            <?php foreach($tickets as $ticket){ ?>
                <tr>
                    <td><?= $ticket->getId() ?></td>
                    <td>
                        <?= $ticket->isClosed() ?
                           "<span class='state-off'>Résolu</span>":
                            "<span class='state-on'>Ouvert</span>"
                        ?>
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
    <div class="card ticket-form">
        <h1>Ouvrir un nouveau ticket</h1>
        <form method="post" action="/ticket/open">
            <div class="form-group">
                <div>
                    <label for="subject">Objet</label>
                    <input id="subject" name="subject" placeholder="Objet du ticket..."/>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="description">Description: </label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Pensez à décrire précisemment le problème rencontré..."
                    ></textarea>
                </div>
            </div>

            <button class="submit-btn">
                Ouvrir ticket
            </button>
        </form>
    </div>
</div>