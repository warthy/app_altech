<div class="card">
    <div class="search-bar">
        <label>Rechercher un client</label>
        <div>
            <input id="filter" value="<?= $filter ?>" data-default="<?= $filter ?>" type="text" placeholder="Entrez le nom du client..."/>
            <a id="submit-search" href="/candidate">
                <button class="edit-btn">Rechercher <i class="fas fa-search"></i></button>
            </a>
        </div>
    </div>
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
                    <a href="/newmeasure" class="submit-btn">Lancer un test</a>
                    <a href="/measures/candidate/<?= $candidate->getId() ?>" class="view-btn">Consulter les mesures</a>
                    <a href="/candidate/<?= $candidate->getId() ?>" class="edit-btn"><i class="far fa-edit"></i></a>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="pagination">
        <div>
            <select id="select-page"">
            <?php
            for ($i = 1; $i <= 20; $i++) {
                if ($i === $count) { ?>
                    <option selected value="<?= $i ?>"><?= $i ?></option>
                <?php } else { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php }
            } ?>
            </select>
            page
        </div>
        <a id="change-page" href="/candidate?search=<?= $filter ?>&page=<?= $page ?>">Changer de page</a>
    </div>

    <a class="default-btn" href="/candidate/create">
        Ajouter un candidat
    </a>
</div>
<script>
    const submit = document.getElementById('submit-search');
    const input = document.getElementById('filter');
    const currentFilter = input.dataset.default;
    input.addEventListener("change", (e) => {
        submit.href = `/candidate?search=${encodeURIComponent(e.target.value)}`
    })

    const changePage = document.getElementById('change-page');
    const pageSelector = document.getElementById("select-page");
    pageSelector.addEventListener("change", (e) => {
        changePage.href = `/candidate?search=${encodeURIComponent(currentFilter)}&page=$encodeURI${encodeURIComponent(e.target.value)}`
    })

</script>

