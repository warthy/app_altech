<form method='post' enctype="multipart/form-data" action='measure.php'>
    
    <fieldset>
    <legend><h2>Sélectionnez le candidat :</h2></legend>
    <select name="candidate" id="candidate">
        <?php foreach($candidates as $candidate){ ?>
            <option value="<?=$candidate->getId(); ?>">
            <?= $candidate->getLastName() . ' '. $candidate->getFirstName() ?>
            </option>
       <?php } ?>
    </select>
    </fieldset>
    
    <fieldset>
    
        <legend>
            <h2>Tests à effectuer :</h2>
        </legend>
    
    <div class="wrapper-firsthalf">
        <div class="wrapper">
        <input id="heartbeat" name="set" type="checkbox" value="heartbeat">
        <label for="heartbeat">Fréquence cardiaque</label>
        </div>
        
        <div class="wrapper">
        <input id="temperature" name="set" type="checkbox" value="temperature">
        <label for="temperature">Température</label>
        </div>

        <div class="wrapper">
        <input id="conductivity" name="set" type="checkbox" value="conductivity">
        <label for="conductivity">Conductivité de la peau</label>
        </div>

        <div class="wrapper">
        <input id="visual_unexpected_reflex" name="set" type="checkbox" value="visual_unexpected_reflex">
        <label for="visual_unexpected_reflex">Temps de réaction à une lumière inattendue</label>
        </div>
    </div>
    
    <div class="wrapper-secondhalf">
        <div class="wrapper">
        <input id="visual_expected_reflex" name="set" type="checkbox" value="visual_expected_reflex">
        <label for="visual_expected_reflex">Temps de réaction à une lumière attendue</label>
        </div>

        <div class="wrapper">
        <input id="sound_unexpected_reflex" name="set" type="checkbox" value="sound_unexpected_reflex">
        <label for="sound_unexpected_reflex">Temps de réaction à un son inattendu</label>
        </div>

        <div class="wrapper">
        <input id="sound_expected_reflex" name="set" type="checkbox" value="sound_expected_reflex">
        <label for="sound_expected_reflex">Temps de réaction à un son attendu</label>
        </div>

        <div class="wrapper">
        <input id="tonality_recognition" name="set" type="checkbox" value="tonality_recognition">
        <label for="tonality_recognition">Reconnaissance de tonalité</label>
        </div>
    </div>

  </fieldset>

  <button class="submit-btn">
      Lancer le test
  </button>

</form>