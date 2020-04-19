<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        
    </head>

    <body>

    <?php
    if (isset($_FILES['CGU']) AND $_FILES['CGU']['error'] == 0){
        //test pour la taille du fichier
        if ($_FILES['CGU']['size'] <= 1000000){

            $infosfichier = pathinfo($_FILES['CGU']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_allowed = array('pdf', 'doc', 'docx', 'jpeg', 'png');

            if(in_array($extension_upload, $extensions_allowed)){
                move_uploaded_file($_FILES['CGU']['tmp_name'], 'uploads/' . basename($_FILES['CGU']['name']));
                echo "L'envoi a bien été effectué.";                
            }
            else{
                echo "Non extension." ;
            }
        }
        else{
            echo "Non size.";
        }
    }
    else{
        echo "Non."; 
    }

    ?>
        
        <p>Client <?php echo htmlspecialchars($_POST['nom_entreprise']); ?> </p>
    </body>
<html\>