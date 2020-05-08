<div class="card">
    <table class="data-table">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach($candidates as $candidate){ ?>
            <tr>
                <td><?= $candidate->getId() ?></td>
                <td><?= $candidate->getLastname() ?></td>
                <td><?= $candidate->getFirstname() ?></td>
                <td><?= $candidate->getEmail() ?></td>
                <td><?= $candidate->getBirthdate() ?? "Non renseigné" ?></td>
                <td>
                    <a href="/candidate/<?= $candidate->getId() ?>/test" class="submit-btn">Lancer un test</a>
                    <a href="/measures/candidate/<?= $candidate->getId() ?>" class="view-btn">Consulter les mesures</a>
                    <a href="/candidate/<?= $candidate->getId() ?>" class="edit-btn"><i class="far fa-edit"></i></a>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <a class="default-btn" href="/candidate/create">
        Ajouter un candidat
    </a>
</div>
