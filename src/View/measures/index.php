<div class="card">
    <div class="searchwrap">
            <div class="search">
                <form name="search-measure" method="POST">
                    <input type="text" name="name" class="searchTerm" placeholder="Chercher un candidat">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
                
            </div>
    </div>

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
                    <a href="/measures/measure/<?= $measure->getId() ?>" class="view-btn">Consulter les résultats</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>