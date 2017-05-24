<?php
// initialisation de mes regex et de mon setup pour afficher le formulaire ou pas
$setUp = 0;
$regex_Letter = '~^[^-][A-z- \\áàâäãçéèêëíìîïñóòôöõúùûüÁÀÂÄÇÉÈÊËÍÌÎÏÓÒÔÖÚÙÛÜ\s]{1,99}$~i';
$regex_codecademy = '~^(https?://|www.|codecademy.com\/fr\/)+[A-z0-9- \\.áàâäãçéèêëíìîïñóòôöõúùûüÁÀÂÄÇÉÈÊËÍÌÎÏÓÒÔÖÚÙÛÜ\s]{1,99}$~';
$regex_phone = '~^(0|(\+33)|(0033))[1-9][0-9]{8}$~i';
$regex_LetterNumber = '~^[A-z0-9- \\áàâäãçéèêëíìîïñóòôöõúùûüÁÀÂÄÇÉÈÊËÍÌÎÏÓÒÔÖÚÙÛÜ\s]{1,99}$~i';
$regex_number = '~^[0-9 \d]{1,15}$~';
$regex_date = '~^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19\d{2}|200[01])$~';
$regex_mail = '~^[\w\-\.]+[a-z0-9]@[\w\-\.]+[a-z0-9]\.[a-z]{2,}$~';
// Vérification que les données du formulaire sont vide ou pas
if (!empty($_POST['secondName']) && !empty($_POST['firstName']) && !empty($_POST['birthDate']) && !empty($_POST['birthCountry']) && !empty($_POST['nationality']) && !empty($_POST['adress']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['degree']) && !empty($_POST['employmentNumber']) && !empty($_POST['codecademyBadge']) && !empty($_POST['codecademyProfile']) && !empty($_POST['whichHero']) && !empty($_POST['whatHack']) && !empty($_POST['expBefore'])) {
    $secondName = $_POST['secondName'];
    $firstName = $_POST['firstName'];
    $birthDate = $_POST['birthDate'];
    $birthCountry = $_POST['birthCountry'];
    $nationality = $_POST['nationality'];
    $adress = $_POST['adress'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $degree = $_POST['degree'];
    $employmentNumber = $_POST['employmentNumber'];
    $codecademyBadge = $_POST['codecademyBadge'];
    $codecademyProfile = $_POST['codecademyProfile'];
    $whichHero = $_POST['whichHero'];
    $whatHack = $_POST['whatHack'];
    $expBefore = $_POST['expBefore'];
} else {
    // Initialisation des variables vides si if non validé et setUp à 0
    $secondName = '';
    $firstName = '';
    $birthDate = '';
    $birthCountry = '';
    $nationality = '';
    $adress = '';
    $email = '';
    $phone = '';
    $degree = '';
    $employmentNumber = '';
    $codecademyBadge = '';
    $codecademyProfile = '';
    $whichHero = '';
    $whatHack = '';
    $expBefore = '';
    $setUp = 0;
}
// Vérification des variables avec mes regex
if (preg_match($regex_Letter, $firstName . $secondName . $birthCountry . $nationality . $degree) && preg_match($regex_LetterNumber, $adress . $employmentNumber) && preg_match($regex_phone, $phone) && preg_match($regex_codecademy, $codecademyProfile) && preg_match($regex_date, $birthDate) && preg_match($regex_mail, $email) && preg_match($regex_number, $codecademyBadge)) {
    $setUp = 1;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <title>TP 1</title>
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
                <legend><em>Formulaire d'inscription à E2N</em></legend>
                <fieldset>
                    <label for="secondName">Nom: </label><input type="text" name="secondName" id="secondName"/><br/>
                    <label for="firstName">Prénom: </label><input type="text" name="firstName" id="firstName"/><br/>
                    <label for="birthDate">Date de naissance: </label><input type="date" name="birthDate" id="birthDate"/><br/>
                    <label for="birthCountry">Pays de naissance: </label><input type="text" name="birthCountry" id="birthCountry"/><br/>
                    <label for="nationality">Nationalité: </label><input type="text" name="nationality" id="nationality"/><br/>
                    <label for="adress">Adresse: </label><input type="text" name="adress" id="adress"/><br/>
                    <label for="email">Email: </label><input type="email" name="email" id="email"/><br/>
                    <label for="phone">Téléphone: </label><input type="text" name="phone" id="phone"/><br/>
                    <label for="degree">Diplôme(s): </label><input type="text" name="degree" id="degree"/><br/>
                    <label for="employmentNumber">Numéro pôle emploi: </label><input type="text" name="employmentNumber" id="employmentNumber"/><br/>
                    <label for="codecademyBadge">Nombre de badge: </label><input type="text" name="codecademyBadge" id="codecademyBadge"/><br/>
                    <label for="codecademyProfile">Profil codecademy: </label><input type="text" name="codecademyProfile" id="codecademyProfile"/><br/>
                    <label class="labelTextarea" for="whichHero">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ? </label><br/><textarea rows="7" cols="100" type="text" name="whichHero" id="whichHero"></textarea><br/>
                    <label class="labelTextarea" for="whatHack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique): </label><br/><textarea rows="7" cols="100" type="text" name="whatHack" id="whatHack"></textarea><br/>
                    <label class="labelTextarea" for="expBefore">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ? </label><br/><textarea rows="7" cols="100" type="text" name="expBefore" id="expBefore"></textarea><br/>              
                    <input class="buttonEndForm" type="reset" value="Supprimer"/><input class="buttonEndForm" type="submit" value="Envoyer"/>
                </fieldset>
            </form>
            <?php
        } else {
            // Si toutes les conditions réunis affichage du résultat
            ?>
            <p>
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
                Votre date de naissance:
                <?php
                echo $birthDate;
                ?>
                <br/>
                Votre pays de naissance:
                <?php
                echo $birthCountry;
                ?>
                <br/>
                Votre nationalité:
                <?php
                echo $nationality;
                ?>
                <br/>
                Votre adresse:
                <?php
                echo $adress;
                ?>
                <br/>
                Votre Email:
                <?php
                echo $email;
                ?>
                <br/>
                Votre Téléphone:
                <?php
                echo $phone;
                ?>
                <br/>
                Votre Diplôme:
                <?php
                echo $degree;
                ?>
                <br/>
                Votre Numéro Pôle emploi:
                <?php
                echo $employmentNumber;
                ?>
                <br/>
                Vos Badges codecademy:
                <?php
                echo $codecademyBadge;
                ?>
                <br/>
                Votre Profil codecademy:
                <?php
                echo $codecademyProfile;
                ?>
                <br/>
                Votre Héro:
                <?php
                echo $whichHero;
                ?>
                <br/>
                Votre Hack:
                <?php
                echo $whatHack;
                ?>
                <br/>
                Votre Expérience:
                <?php
                echo $expBefore;
                ?>
                <br/>
            </p>
            <?php
        }
        ?>
    </body>
</html>