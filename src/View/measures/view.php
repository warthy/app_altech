<div class="card">
    <div class="infos_results">
        <h1>Candidat testé : <?= $candidate->getFirstName() . ' ' . $candidate->getLastName() ?></h1>
        <h2>Mesure effectuée le : <?= $measure->getDate_measured() ?></h2>
        <br/>
        <div class="card">
            <h1 class="content-title" >Résultats de la mesure : </h1>
            <table class="data-table" id="results_table">
                <thead>
                    <th>Test</th>
                    <th>Valeur mesurée</th>
                </thead>
                <tr>
                    <td>Fréquence cardiaque</td>
                    <td><?= null !== $measure->getHeartBeat() ? $measure->getHeartBeat() . ' bpm' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Température</td>
                    <td><?= null !== $measure->getTemperature() ? $measure->getTemperature() . ' °C' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Conductivité de la peau</td>
                    <td><?= null !== $measure->getConductivity() ? $measure->getConductivity() . ' ' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Temps de réaction à une lumière inattendue</td>
                    <td><?= null !== $measure->getVisualUnexpectedReflex() ? $measure->getVisualUnexpectedReflex() . ' ms' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Temps de réaction à une lumière attendue</td>
                    <td><?= null !== $measure->getVisualExpectedReflex() ? $measure->getVisualExpectedReflex() . ' ms' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Temps de réaction à un son inattendu</td>
                    <td><?= null !== $measure->getSoundUnexpectedReflex() ? $measure->getSoundUnexpectedReflex() . ' ms' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Temps de réaction à un son attendu</td>
                    <td><?= null !== $measure->getSoundExpectedReflex() ? $measure->getSoundExpectedReflex() . ' ms' : 'Non effectué' ?> </td>
                </tr>
                <tr>
                    <td>Reconnaissance de tonalité</td>
                    <td><?= null !== $measure->getTonalityRecognition() ? $measure->getTonalityRecognition() . ' ' : 'Non effectué' ?> </td>
                </tr>
            </table>
        </div>
        
    </div>

    
</div>