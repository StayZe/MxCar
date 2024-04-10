<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MxCar | Uplaod a Car</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php require("./views/headerConnected.php") ?><br><br>
    <form action="./index.php?action=uploadCarProcess" method="post" enctype="multipart/form-data">
        <label for="carBrand">Marque de la voiture : </label>
        <input type="text" id="carBrand" name="carBrand" required><br>
        <label for="carModel">Modèle de la voiture : </label>
        <input type="text" id="carModel" name="carModel" required><br>
        <label for="carDesc">Description de la voiture : </label>
        <input type="text" id="carDesc" name="carDesc"><br>
        <label for="carYear">Année de la voiture : </label>
        <input type="text" id="carYear" name="carYear" required><br>
        <label for="carHP">Nombre de chevaux de la voiture : </label>
        <input type="text" id="carHP" name="carHP" required><br>
        <label for="carChassis">Type de châssis de la voiture : </label>
        <input type="text" id="carChassis" name="carChassis" required><br>
        <label for="carKM">Nombre de kilomètres de la voiture : </label>
        <input type="text" id="carKM" name="carKM" required><br>
        <label for="carImg">Image de la voiture : </label>
        <input type="file" name="image" accept="image/jpeg, image/png"><br>
        <div class="button">
            <button type="submit" class="uploadCar" name="submit">Upload the car</button>
            <input type="hidden" name="form_type" value="uploadCar">
        </div>
    </form>
</body>

</html>