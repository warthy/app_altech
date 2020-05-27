<div class="card">
    <div class="search-bar">
        <label>Rechercher un client</label>
        <div>
            <input id="filter" value="<?= $filter ?>" data-default="<?= $filter ?>" type="text" placeholder="Entrez le nom du client..."/>
            <a id="submit-search" href="/client">
                <button class="edit-btn">Rechercher <i class="fas fa-search"></i></button>
            </a>
        </div>
    </div>


    <table class="data-table">
        <thead>
        <th>ID</th>
        <th>Nom de la compagnie</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach ($clients as $client) { ?>
            <tr>
                <td><?= $client->getId() ?></td>
                <td><?= $client->getName() ?></td>
                <td><?= $client->getEmail() ?></td>
                <td><?= $client->getPhone() ?></td>
                <td>
                    <a href="/client/<?= $client->getId() ?>" class="edit-btn">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="/client/<?= $client->getId() ?>/delete" class="delete-btn">
                        <i class="far fa-trash-alt"></i>
                    </a>
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
        <a id="change-page" href="/client?search=<?= $filter ?>&page=<?= $page ?>">Changer de page</a>
    </div>

    <a class="default-btn" href="/client/create">
        Ajouter un client
    </a>
</div>
<script>
    const submit = document.getElementById('submit-search');
    const input = document.getElementById('filter');
    const currentFilter = input.dataset.default;
    input.addEventListener("change", (e) => {
        submit.href = `/client?search=${encodeURIComponent(e.target.value)}`
    })

    const changePage = document.getElementById('change-page');
    const pageSelector = document.getElementById("select-page");
    pageSelector.addEventListener("change", (e) => {
        changePage.href = `/client?search=${encodeURIComponent(currentFilter)}&page=${encodeURIComponent(e.target.value)}`
    })

</script>
