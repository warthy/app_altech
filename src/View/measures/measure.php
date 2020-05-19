<div class="boite">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="candidate" value="<?= $candidate->getId()?>" />
        
        <?php if(in_array('heartbeat', $_POST['set'])){ ?>
            <input type="hidden" name="set[]" value='heartbeat' />
            
            <div class="card">
                <h1>Fréquence cardiaque</h1>
                <?php $testType="heartbeat"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'heartbeat' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
                
            </div>
        <?php } ?>


        <?php if(in_array('temperature', $_POST['set'])){ ?>
            <div class="card">
                <h1>Température</h1>
                <?php $testType="temperature"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'temperature' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>


        <?php if(in_array('conductivity', $_POST['set'])){ ?>
            <div class="card">
                <h1>Conductivité de la peau</h1>
                <?php $testType="conductivity"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'conductivity' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>


        <?php if(in_array('visual_unexpected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à une lumière inattendue</h1>
                <?php $testType="visual_unexpected_reflex"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'visual_unexpected_reflex' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>


        <?php if(in_array('visual_expected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à une lumière attendue</h1>
                <?php $testType="visual_expected_reflex"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'visual_expected_reflex' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>


        <?php if(in_array('sound_unexpected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à un son inattendu</h1>
                <?php $testType="sound_unexpected_reflex"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'sound_unexpected_reflex' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>


        <?php if(in_array('sound_expected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à un son attendu</h1>
                <?php $testType="sound_expected_reflex"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'sound_expected_reflex' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>


        <?php if(in_array('tonality_recognition', $_POST['set'])){ ?>
            <div class="card">
                <h1>Reconnaissance de tonalité</h1>
                <?php $testType="tonality_recognition"; ?>
                <button class="make-test" id="<?= $testType ?>-test" onclick="makeMeasure(<?= 'tonality_recognition' ?>)">Lancer la mesure</button>

                <label for="<?= $testType ?>-results-value">Résultat : <span id="<?= $testType ?>-results-value"></span></label>
                <input type="text" name="<?= $testType ?>-results-value" required/>
            </div>
        <?php } ?>

        <button class="next-test" style="vertical-align:middle"><span>Valider les mesures</span></button>
    </form>
</div>
