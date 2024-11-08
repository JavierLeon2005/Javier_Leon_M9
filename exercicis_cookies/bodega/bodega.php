<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecció d'Informació</title>
</head>
<body>
    <h1>Benvingut a la nostra botiga de vins</h1>
    <form action="infobodega.php" method="POST">
        <label>Ets major d'edat?</label><br>
        <input type="radio" name="edat" value="sí" required> Sí<br>
        <input type="radio" name="edat" value="no"> No<br><br>

        <label>Idioma:</label><br>
        <select name="idioma">
            <option value="catala">Català</option>
            <option value="espanol">Español</option>
            <option value="ingles">English</option>
        </select><br><br>

        <label>Moneda:</label><br>
        <select name="moneda">
            <option value="euro">Euros</option>
            <option value="libra">Lliures</option>
            <option value="dolar">Dòlars</option>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
