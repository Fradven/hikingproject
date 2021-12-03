<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiking Project</title>
</head>
<body>
    <h1>Générateur d'Excuses</h1>
    
<form method="POST" >
    <label for="fname">Nom du parent:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="fname">Nom de l'enfant:</label><br>
    <input type="text" id="ename" name="ename"><br>

    Raison d'absence: </br>
    <input type="radio" id="illness" name="excuse" value="illness">
    <label for="illness">illness</label><br>

    <input type="radio" id="death" name="excuse" value="death">
    <label for="death">death of a love one</label><br>

    <input type="radio" id="activity" name="excuse" value="activity">
    <label for="activity">significant extra-curricular activity</label>
</br>
    <input type="submit" value="Result" name="Result">
</form>
<?php
    $name = $_POST["excuse"];
    $fname = $_POST["fname"];
    $ename = $_POST["ename"];

    switch ($name) {
        case "illness":
          echo "<p>Monsieur le principal
</br>
          Mon fils $ename, élève en classe de 4ième dans votre collège, ne pourra pas assister au cours aujourd’hui.
          Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.
</br>          
          Notre enfant devrait reprendre la classe dans une semaine, soit le lundi 20 septembre 2018.
          Pour tout complément d’informations n’hésitez surtout pas à nous contacter.
</br>         
          Nos plus sincères salutations </br>
          $fname.</p>";
          break;
        case "death":
          echo "<p>Monsieur le Directeur (madame la Directrice),
</br>
          Mon fils $ename devrait nous accompagner , mon épouse et moi, ce lundi à l’enterrement de sa grand-mère décédée inopinément samedi.
</br>          
          Pouvez-vous donc lui accorder une autorisation de sortie pour cette matinée? Il devrait être de retour dans votre établissement scolaire avant la reprise des cours de l’après-midi, le même jour.
 </br>         
          En vous remerciant de votre compréhension, je vous prie de croire, Madame la Directrice (monsieur le Directeur), à mes sentiments distingués.
</br>          
          $fname.</p>";
          break;
        case "activity":
          echo "<p>Madame la professeur (monsieur le professeur)
</br>
          Je viens vous demander de faire preuve d’indulgence à l’égard de ma fille $ename que se présente ce matin en classe sans savoir sa récitation (avec sa leçon non-apprise, sans avoir fait ses devoirs ou appris ses cours.).
 </br>         
          La faute m’en incombe: notre enfant a participé à un événement familial (fête d’anniversaire de sa grand-mère). La réunion familiale qui eut lieu à cette occasion nous a tenus éveillés assez tard et j’ai pris la responsabilité de la dispenser d’un travail scolaire à une heure avancée.
 </br>         
          Elle m’a promis d’apprendre son texte (poésie, leçons) au plutôt.
 </br>         
          Je vous remercie par avance pour votre compréhension.
 </br>         
          Cordialement.</br>
          $fname.</p>";
          break;
          
        default:
          echo "Please select an option";
      }
?>

</body>
</html>