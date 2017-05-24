<?php
$portrait1 = array('name' => 'Victor', 'firstname' => 'Hugo', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
$portrait2 = array('name' => 'Jean', 'firstname' => 'de La Fontaine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
$portrait3 = array('name' => 'Pierre', 'firstname' => 'Corneille', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
$portrait4 = array('name' => 'Jean', 'firstname' => 'Racine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');

//la fonction showDataArray prend en paramètre une variable générique qui retourne les différents éléments du tableau
function showDataArray($genericVariable) {
    $name = $genericVariable['name'];
    $firstName = $genericVariable['firstname'];
    $portrait = '<img class="col-lg-offset-5" src="' . $genericVariable['portrait'] . '" title="' . $name . ' ' . $firstName . '" alt="' . $name . ' ' . $firstName . '"/>';
    return '<h2>' . $name . ' ' . $firstName . ' </h2> ' . $portrait;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>TP3</title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav>
            <h2>Liens des TP</h2>
            <ul>
                <li><a href="http://partie10/TP1/">TP 1</a></li>
                <li><a href="http://partie10/TP2/">TP 2</a></li>
                <li><a href="http://partie10/TP3/">TP 3</a></li>
            </ul>
        </nav>
        <div><?php echo showDataArray($portrait1); ?></div>
        <div><?php echo showDataArray($portrait2); ?></div>
        <div><?php echo showDataArray($portrait3); ?></div>
        <div><?php echo showDataArray($portrait4); ?></div> 
    </body>
</html>