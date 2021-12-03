<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $name = $_POST["excuse"];
    switch ($name) {
        case "illness":
          echo "Monsieur le principal

          Mon fils (ma fille), élève en classe de 4ième dans votre collège, ne pourra pas assister au cours aujourd’hui.
          Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.
          
          Notre enfant devrait reprendre la classe dans une semaine, soit le lundi 20 septembre 2018.
          Pour tout complément d’informations n’hésitez surtout pas à nous contacter.
          
          Nos plus sincères salutations
          Signature des parents (mère ou père).";
          break;
        case "death":
          echo "Monsieur le Directeur (madame la Directrice),

          Mon fils Mohamed devrait nous accompagner , mon épouse et moi, ce lundi à l’enterrement de sa grand-mère décédée inopinément samedi.
          
          Pouvez-vous donc lui accorder une autorisation de sortie pour cette matinée? Il devrait être de retour dans votre établissement scolaire avant la reprise des cours de l’après-midi, le même jour.
          
          En vous remerciant de votre compréhension, je vous prie de croire, Madame la Directrice (monsieur le Directeur), à mes sentiments distingués.
          
          Les parents de l’élève Mohamed Yacobi.";
          break;
        case "activity":
          echo "Madame la professeur (monsieur le professeur)

          Je viens vous demander de faire preuve d’indulgence à l’égard de ma fille que se présente ce matin en classe sans savoir sa récitation (avec sa leçon non-apprise, sans avoir fait ses devoirs ou appris ses cours.).
          
          La faute m’en incombe: notre enfant a participé à un événement familial (fête d’anniversaire de sa grand-mère). La réunion familiale qui eut lieu à cette occasion nous a tenus éveillés assez tard et j’ai pris la responsabilité de la dispenser d’un travail scolaire à une heure avancée.
          
          Elle m’a promis d’apprendre son texte (poésie, leçons) au plutôt.
          
          Je vous remercie par avance pour votre compréhension.
          
          Cordialement.
          La maman d’Eva.";
          break;
          
        default:
          echo "Please select an option";
      }
?>
</body>
</html>