<div class="boite">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="candidate" value="<?= $candidate->getId()?>" />
        
        <?php if(in_array('heartbeat', $_POST['set'])){ ?>
            <input type="hidden" name="set[]" value='heartbeat' />
            
            <div class="card">
                <h1>Fréquence cardiaque</h1>
                <button class="make-test" id="heart-test" onclick="makeMeasure()">Lancer la mesure</button>

                <label for="results-value">Résultat : <span id="results-value"></span></label>
                <input type="text" name="heartbeat-results-value" required/>
                
            </div>
        <?php } ?>

        <?php if(in_array('temperature', $_POST['set'])){ ?>
            <div class="card">
                <h1>Température</h1>
                <button class="make-test" id="temperature-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <?php if(in_array('conductivity', $_POST['set'])){ ?>
            <div class="card">
                <h1>Conductivité de la peau</h1>
                <button class="make-test" id="conductivity-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <?php if(in_array('visual_unexpected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à une lumière inattendue</h1>
                <button class="make-test" id="reflex-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <?php if(in_array('visual_expected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à une lumière attendue</h1>
                <button class="make-test" id="reflex-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <?php if(in_array('sound_unexpected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à un son inattendu</h1>
                <button class="make-test" id="reflex-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <?php if(in_array('sound_expected_reflex', $_POST['set'])){ ?>
            <div class="card">
                <h1>Temps de réaction à un son attendu</h1>
                <button class="make-test" id="reflex-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <?php if(in_array('tonality_recognition', $_POST['set'])){ ?>
            <div class="card">
                <h1>Reconnaissance de tonalité</h1>
                <button class="make-test" id="tonality-test">Lancer la mesure</button>

                <h2>Résultat : </h2>
            </div>
        <?php } ?>

        <button class="next-test" style="vertical-align:middle"><span>Valider les mesures</span></button>
    </form>
</div>
