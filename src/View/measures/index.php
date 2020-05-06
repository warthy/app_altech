<div class="card">
    <table class="data-table">
        <thead>
            <th>ID</th>
            <th>Candidat</th>
            <th>Date du test</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php foreach($measures as $measure){ ?>
            <tr>
                <td><?= $measure->getId() ?></td>
                <td><?= $candidateRepo->findById($measure->getCandidate_id())->getFirstName() . ' ' . $candidateRepo->findById($measure->getCandidate_id())->getLastName() ?></td>
                <td><?= $measure->getDate_measured() ?? "Non renseigné" ?></td>
                <td>
                    <a href="/measures/measure/<?= $measure->getId() ?>" class="submit-btn">Consulter les résultats</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>