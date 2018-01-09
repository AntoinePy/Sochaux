<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <link href="../css/tableauDeBord.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<?php
include_once('../traitementPHP/connection.php'); // connection base de données
?>

<div class="navigation col-lg-2">
    <?php include 'navigation.html' ?>
</div>

<div class="tabBord col-lg-10">

    <div class="barreTitre">
        <h1>Tableau de bord</h1>
    </div>

    <div class="starter-template">

        <div class="row">
            <div class="col-sm-6" style="background-color: #0D0E29; margin-top: 20px; margin-left: 20px; border-radius: 20px; width: 550px; height: 350px; position: relative;">
                <h5 style="color: #868e96">Calendrier</h5>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=fra2_7390_Ajaccio%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7403_Amiens%23sports%40group.v.calendar.google.com&amp;color=%23875509&amp;src=fra2_8721_Angers%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_12797_Arles%23sports%40group.v.calendar.google.com&amp;color=%23333333&amp;src=fra2_6413_Auxerre%23sports%40group.v.calendar.google.com&amp;color=%23853104&amp;src=fra2_24537_Bourg-en-Bresse%2BPeronnas%23sports%40group.v.calendar.google.com&amp;color=%23182C57&amp;src=fra2_7396_Brest%23sports%40group.v.calendar.google.com&amp;color=%235F6B02&amp;src=fra2_26691_CA%2BBastia%23sports%40group.v.calendar.google.com&amp;color=%232F6309&amp;src=fra2_7392_Caen%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7397_Chateauroux%23sports%40group.v.calendar.google.com&amp;color=%232952A3&amp;src=fra2_7562_Clermont%2BFoot%23sports%40group.v.calendar.google.com&amp;color=%235229A3&amp;src=fra2_20480_Creteil%23sports%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=fra2_8723_Dijon%23sports%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=fra2_24538_Gazelec%2BAjaccio%23sports%40group.v.calendar.google.com&amp;color=%23711616&amp;src=fra2_7393_Istres%23sports%40group.v.calendar.google.com&amp;color=%238C500B&amp;src=fra2_7398_Laval%23sports%40group.v.calendar.google.com&amp;color=%23B1440E&amp;src=fra2_7391_Le%2BHavre%23sports%40group.v.calendar.google.com&amp;color=%23333333&amp;src=fra2_6411_Lens%23sports%40group.v.calendar.google.com&amp;color=%23B1365F&amp;src=fra2_20455_Luzenac%23sports%40group.v.calendar.google.com&amp;color=%23AB8B00&amp;src=fra2_7383_Metz%23sports%40group.v.calendar.google.com&amp;color=%23875509&amp;src=fra2_6427_Nancy%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7399_Nimes%23sports%40group.v.calendar.google.com&amp;color=%232F6309&amp;src=fra2_7401_Niort%23sports%40group.v.calendar.google.com&amp;color=%232F6309&amp;src=fra2_20551_Orleans%23sports%40group.v.calendar.google.com&amp;color=%23182C57&amp;src=fra2_28382_Red%2BStar%2BFC%23sports%40group.v.calendar.google.com&amp;color=%235F6B02&amp;src=fra2_8724_Reims%23sports%40group.v.calendar.google.com&amp;color=%238C500B&amp;src=fra2_6417_Sochaux%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7388_Strasbourg%23sports%40group.v.calendar.google.com&amp;color=%23333333&amp;src=fra2_9824_Tours%23sports%40group.v.calendar.google.com&amp;color=%23691426&amp;src=fra2_6414_Troyes%23sports%40group.v.calendar.google.com&amp;color=%2323164E&amp;src=fra2_6428_Valenciennes%23sports%40group.v.calendar.google.com&amp;color=%23865A5A&amp;ctz=Europe%2FParis" id="calendrier" style="border: 0;margin-left: 5px;" width="500" height="300" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="col-sm-6" style="background-color: #0D0E29; margin-top: 20px; margin-left: 20px; border-radius: 20px; width: 550px; height: 350px; position: relative;">
                <h5 style="color: #868e96">Calendrier</h5>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=fra2_7390_Ajaccio%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7403_Amiens%23sports%40group.v.calendar.google.com&amp;color=%23875509&amp;src=fra2_8721_Angers%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_12797_Arles%23sports%40group.v.calendar.google.com&amp;color=%23333333&amp;src=fra2_6413_Auxerre%23sports%40group.v.calendar.google.com&amp;color=%23853104&amp;src=fra2_24537_Bourg-en-Bresse%2BPeronnas%23sports%40group.v.calendar.google.com&amp;color=%23182C57&amp;src=fra2_7396_Brest%23sports%40group.v.calendar.google.com&amp;color=%235F6B02&amp;src=fra2_26691_CA%2BBastia%23sports%40group.v.calendar.google.com&amp;color=%232F6309&amp;src=fra2_7392_Caen%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7397_Chateauroux%23sports%40group.v.calendar.google.com&amp;color=%232952A3&amp;src=fra2_7562_Clermont%2BFoot%23sports%40group.v.calendar.google.com&amp;color=%235229A3&amp;src=fra2_20480_Creteil%23sports%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=fra2_8723_Dijon%23sports%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=fra2_24538_Gazelec%2BAjaccio%23sports%40group.v.calendar.google.com&amp;color=%23711616&amp;src=fra2_7393_Istres%23sports%40group.v.calendar.google.com&amp;color=%238C500B&amp;src=fra2_7398_Laval%23sports%40group.v.calendar.google.com&amp;color=%23B1440E&amp;src=fra2_7391_Le%2BHavre%23sports%40group.v.calendar.google.com&amp;color=%23333333&amp;src=fra2_6411_Lens%23sports%40group.v.calendar.google.com&amp;color=%23B1365F&amp;src=fra2_20455_Luzenac%23sports%40group.v.calendar.google.com&amp;color=%23AB8B00&amp;src=fra2_7383_Metz%23sports%40group.v.calendar.google.com&amp;color=%23875509&amp;src=fra2_6427_Nancy%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7399_Nimes%23sports%40group.v.calendar.google.com&amp;color=%232F6309&amp;src=fra2_7401_Niort%23sports%40group.v.calendar.google.com&amp;color=%232F6309&amp;src=fra2_20551_Orleans%23sports%40group.v.calendar.google.com&amp;color=%23182C57&amp;src=fra2_28382_Red%2BStar%2BFC%23sports%40group.v.calendar.google.com&amp;color=%235F6B02&amp;src=fra2_8724_Reims%23sports%40group.v.calendar.google.com&amp;color=%238C500B&amp;src=fra2_6417_Sochaux%23sports%40group.v.calendar.google.com&amp;color=%2342104A&amp;src=fra2_7388_Strasbourg%23sports%40group.v.calendar.google.com&amp;color=%23333333&amp;src=fra2_9824_Tours%23sports%40group.v.calendar.google.com&amp;color=%23691426&amp;src=fra2_6414_Troyes%23sports%40group.v.calendar.google.com&amp;color=%2323164E&amp;src=fra2_6428_Valenciennes%23sports%40group.v.calendar.google.com&amp;color=%23865A5A&amp;ctz=Europe%2FParis" id="calendrier2" style="border: 0;margin-left: 5px;" width="500" height="300" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>

