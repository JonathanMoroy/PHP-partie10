<?php
// initialisation de mes regex et de mon setup pour afficher le formulaire ou pas
$setUp = 0;
$regex_Letter = '~^[^-][A-z- \\áàâäãçéèêëíìîïñóòôöõúùûüÁÀÂÄÇÉÈÊËÍÌÎÏÓÒÔÖÚÙÛÜ\s]{1,99}$~i';
$regex_LetterNumber = '~^[A-z0-9- \\áàâäãçéèêëíìîïñóòôöõúùûüÁÀÂÄÇÉÈÊËÍÌÎÏÓÒÔÖÚÙÛÜ\s]{1,99}$~i';
$secondName = '';
$firstName = '';
$age = 18;
$civility = 'Monsieur';
$firm = '';
$alert = '';
// Vérification que les données du formulaire sont vide ou pas
if (!empty($_POST['secondName']) && !empty($_POST['firstName']) && !empty($_POST['age']) && !empty($_POST['firm']) && !empty($_POST['civility'])) {
    $secondName = $_POST['secondName'];
    $firstName = $_POST['firstName'];
    $age = $_POST['age'];
    $civility = $_POST['civility'];
    $firm = $_POST['firm'];
} else { // Initialisation de mon setUp à 0            
    $setUp = 0;
    $alert = 'Attention un des champs est vide, merci de vérifier.';
}
// Vérification des variables avec mes regex
if (preg_match($regex_LetterNumber, $firm) && preg_match($regex_Letter, $firstName.$secondName) && $age > 0 && is_numeric($age) && $age % 1 == 0 && preg_match('~(Monsieur|Madame)~i', $civility)) {
    $setUp = 1;
} else {
    $alert="Attention un des champs du formulaire est mal rempli. Veuillez vérifier.";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <title>TP 2</title>
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
        <?php
        // Affichage du formulaire en fonction de mon setUp
        if ($setUp == 0) {
            ?>
            <form name="registration" method="POST" action="index.php">
                <legend><em>Formulaire d'identification</em></legend>
                <fieldset>
                    <label for="civility">Civilité: </label><select name="civility" id="civility">
                        <option value="Monsieur" <?php if ($civility == 'Monsieur'){ echo 'selected'; }?>>Monsieur</option>
                        <option value="Madame" <?php if ($civility == 'Madame'){ echo 'selected'; }?>>Madame</option>
                    </select><br/>
                    <label for="secondName">Nom: </label><input type="text" name="secondName" id="secondName" value="<?php echo $secondName; ?>"/><br/>
                    <label for="firstName">Prénom: </label><input type="text" name="firstName" id="firstName" value="<?php echo $firstName; ?>"/><br/>
                    <label for="age">Âge: </label><input type="text" name="age" id="age" value="<?php echo $age; ?>"/><br/>
                    <label for="firm">Société: </label><input type="text" name="firm" id="firm" value="<?php echo $firm; ?>"/><br/>             
                    <input class="buttonEndForm" type="reset" value="Supprimer"/><input class="buttonEndForm" type="submit" value="Envoyer"/>
                </fieldset>
            </form>
        <p>
            <?php
            echo $alert;
            ?>
        </p>
            <?php
        } else {
            // Si toutes les conditions réunis affichage du résultat
            ?>
            <form name="registration" method="POST" action="index.php">
                <legend><em>Formulaire d'identification</em></legend>
                <fieldset>
                    <label for="civility">Civilité: </label><select name="civility" id="civility">
                        <option value="Monsieur" <?php if ($civility == 'Monsieur'){ echo 'selected'; }?>>Monsieur</option>
                        <option value="Madame" <?php if ($civility == 'Madame'){ echo 'selected'; }?>>Madame</option>
                    </select><br/>
                    <label for="secondName">Nom: </label><input type="text" name="secondName" id="secondName" value="<?php echo $secondName; ?>"/><br/>
                    <label for="firstName">Prénom: </label><input type="text" name="firstName" id="firstName" value="<?php echo $firstName; ?>"/><br/>
                    <label for="age">Âge: </label><input type="text" name="age" id="age" value="<?php echo $age; ?>"/><br/>
                    <label for="firm">Société: </label><input type="text" name="firm" id="firm" value="<?php echo $firm; ?>"/><br/>             
                    <input class="buttonEndForm" type="reset" value="Supprimer"/><input class="buttonEndForm" type="submit" value="Envoyer"/>
                </fieldset>
            </form>
            <p>
                Votre civilité:
                <?php
                echo $civility;
                ?>
                <br/>
                Votre nom:
                <?php
                echo $secondName;
                ?>
                <br/>
                Votre prénom:
                <?php
                echo $firstName;
                ?>
                <br/>
                Votre âge:
                <?php
                echo $age;
                ?>
                <br/>
                Votre nom de société:
                <?php
                echo $firm;
                ?>
            </p>
            <?php
        }
        ?>
    </body>
</html>