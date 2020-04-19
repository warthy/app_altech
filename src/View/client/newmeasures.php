<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/newmeasures.css" />
        
    </head>

    <body>
        <p class="name"><strong>Candidat : </strong>Nom Prénom</p>
        <p class="date"><strong>Date : </strong><?= date("d/m/Y") ?></p>

        <div id="heart-box">
            <div class="values">
            <h1>Historique des résultats</h1>
                <h3>Valeur moyenne : </h3>
                <h3>Valeur min : </h3>
                <h3>Valeur max : </h3>
                <br>
                

                <h3>Graphique de l'évolution :</h3>
                
            </div>

        
            <button class="make-test" id="heart-test">Mesurer la fréquence cardiaque</button>

            <button class="next-test" style="vertical-align:middle" onclick="window.location.href = '#temperature-box'"><span>Passer au test suivant</span></button>
            
        </div>

        <div id="temperature-box">
            <div class="values">
            <h1>Historique des résultats</h1>
                <h3>Valeur moyenne : </h3>
                <h3>Valeur min : </h3>
                <h3>Valeur max : </h3>
                <br>
                

                <h3>Graphique de l'évolution :</h3>
                
            </div>

        
            <button class="make-test" id="temperature-test" >Mesurer la température de la peau</button>

            <button class="next-test" style="vertical-align:middle" onclick="window.location.href = '#reflex-box'"><span>Passer au test suivant</span></button>
            
        </div>
        
        <div id="reflex-box">
            <div class="values">
            <h1>Historique des résultats</h1>
                <h3>Valeur moyenne : </h3>
                <h3>Valeur min : </h3>
                <h3>Valeur max : </h3>
                <br>
                

                <h3>Graphique de l'évolution :</h3>
                
            </div>

        
            <button class="make-test" id="reflex-test" >Mesurer le temps de réactivité</button>

            <button class="next-test" style="vertical-align:middle" onclick="window.location.href = '#conductivity-box'"><span>Passer au test suivant</span></button>
            
        </div>

        <div id="conductivity-box">
            <div class="values">
            <h1>Historique des résultats</h1>
                <h3>Valeur moyenne : </h3>
                <h3>Valeur min : </h3>
                <h3>Valeur max : </h3>
                <br>
                

                <h3>Graphique de l'évolution :</h3>
                
            </div>

        
            <button class="make-test" id="conductivity-test" >Mesurer la conductivité de la peau</button>

            <button class="next-test" style="vertical-align:middle" onclick="window.location.href = '#tonality-box'"><span>Passer au test suivant</span></button>
            
        </div>

        <div id="tonality-box">
            <div class="values">
            <h1>Historique des résultats</h1>
                <h3>Valeur moyenne : </h3>
                <h3>Valeur min : </h3>
                <h3>Valeur max : </h3>
                <br>
                

                <h3>Graphique de l'évolution :</h3>
                
            </div>

        
            <button class="make-test" id="tonality-test" >Tester la tonalité</button>

            <button class="next-test" style="vertical-align:middle" onclick="window.location.href = '#finish-box'"><span>Passer au test suivant</span></button>
            
        </div>

        <div id="finish-box">
            <div id="fin">
            <h1>Fin des tests</h1>                
            </div>

            <button class="next-test" id="finish" style="vertical-align:middle"><span>Enregistrer les tests</span></button>
            
        </div>
    </body>
</html>