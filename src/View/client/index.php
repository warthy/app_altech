<div class="card">
    <table class="data-table">
        <thead>
        <th>ID</th>
        <th>Nom de la compagnie</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach($clients as $client){ ?>
            <tr>
                <td><?= $client->getId() ?></td>
                <td><?= $client->getName() ?></td>
                <td><?= $client->getEmail() ?></td>
                <td><?= $client->getPhone() ?></td>
                <td>
                    <a href="/admin/client/<?= $client->getId() ?>" class="action-btn edit-btn">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="/admin/client/<?= $client->getId() ?>/delete" class="action-btn delete-btn">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <a class="default-btn" href="/admin/client/create">
        Ajouter un client
    </a>
</div>
