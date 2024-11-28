<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <h2>Masukkan Surname</h2>
    <form action="processData.php" method="POST">
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname"> <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" /><br /><br />
        <button type="submit">Submit</button>
    </form>
</body>
</html>
