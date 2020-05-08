<div class="card">
    <table class="data-table">
        <thead>
            <th>ID</th>
            <th>Date du test</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php foreach($measures as $measure){ ?>
            <tr>
                <td><?= $measure->getId() ?></td>
                <td><?= $measure->getDate_measured() ?? "Non renseigné" ?></td>
                <td>
                    <a href="/measures/measure/<?= $measure->getId() ?>" class="view-btn">Consulter les résultats</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <a class="default-btn" href="/candidate/<?= $candidate_id ?>/newmeasure">
        Lancer un nouveau test
    </a>
</div>