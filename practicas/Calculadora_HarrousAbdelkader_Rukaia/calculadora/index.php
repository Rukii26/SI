<?php 
// Con esta línea desactivamos el reporte de errores y warnings
error_reporting(0);
// Si no se ha pulsado ningún botón reseteamos las variables
if (!isset($_POST['resultado'])) {
    $resultado="";
    $operador="";
}
// Si hemos pulsado algun botón iniciamos la calculadora
if (isset($_POST['resultado'])) {
    // Si lo que se ha enviado es un número lo añadimos a nuestra operación
    if (isset($_POST['numero']) && $_POST['numero'] >= 0) {
        $numero = $_POST['numero'];
        $resultado = $_POST['resultado'] . "$numero"; 
        // con el . concatenamos el valor de $_POST['resultado'] (es decir, 
        // lo que tenemos en la pantalla de la calculadora) con el numero introducido
        $signo = $_POST['signo']; // Mantenemos el signo enviado
    } 
    // Si lo que se ha enviado es un operador lo añadimos a nuestra operación
    if (isset($_POST['operador'])) {
        $resultado = $_POST['resultado'] . $_POST['operador'];
        // con el . concatenamos el valor de $_POST['resultado'] (es decir, 
        // lo que tenemos en la pantalla de la calculadora) con el operador introducido
        $signo = $_POST['operador']; // Guardamos el signo para saber la operación a realizar
    } 
    // Si se ha pulsado = vamos a resolver la operacion
    if (isset($_POST['igual'])) {
        $signo = $_POST['signo']; // Mantenemos el signo enviado
        $resultado = $_POST['resultado']; // Recibimos la operación completa
        $numero = explode("$signo", $resultado); // Separamos los números de la operación
        // En función del signo aplicamos la operación que corresponda
        switch ($signo) {
            case "+":
                $resultado = $numero[0] + $numero[1];
                $signo = "";
                break;
            case "-":
                $resultado = $numero[0] - $numero[1];
                $signo = "";
                break;
            case "*":
                $resultado = $numero[0] * $numero[1];
                $signo = "";
                break;
            case "/":
                $resultado = $numero[0] / $numero[1];
                $signo = "";
                break; 
        }
    }
    // Si se ha pulsado la tecla C, reseteamos todas las variables
    if (isset($_POST['clear'])) {
        $resultado = "";
        $signo = "";
        $operador = "";
        $numero = "";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@1,500&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@1,500&display=swap'); </style>
</head>
<body>
    <header>
        <h1>Calculadora defectuosa &#128575; &#128520;</h1>
    </header>
    <p>Esta calculadora no funciona muy bien pero al menos va a ser bonita, sabe hacer lo básico y poco mas:( Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, pariatur. Quae maiores aliquid molestias aspernatur distinctio incidunt, culpa voluptas magni animi, aliquam soluta porro mollitia perferendis vero aperiam saepe nam!</p>
    <table>
        <form action="#" method="POST">
            <tr>
                <th class="pantalla" colspan="4"><input class="pantallita" name='resultado' type="text" value="<?php echo $resultado;?>">
                <input type="hidden" name="signo" value="<?php echo $signo;?>">
                </th>
                
            </tr>
            <tr>
                <td class="botones"><input class="num" type="submit" name="numero" value="1"></td>
                <td class="botones"><input class="num" type="submit" name="numero" value="2"></td>
                <td class="botones"><input class="num" type="submit" name="numero" value="3"></td>
                <td class="botones"><input class="op" type="submit" name="operador" value="+"></td>
            </tr>
            <tr>
                <td class="botones"><input class="num" type="submit" name="numero" value="4"></td>
                <td class="botones"><input class="num" type="submit" name="numero" value="5"></td>
                <td class="botones"><input class="num" type="submit" name="numero" value="6"></td>
                <td class="botones"><input class="op" type="submit" name="operador" value="-"></td>
            </tr>
            <tr>
                <td class="botones"><input class="num" type="submit" name="numero" value="7"></td>
                <td class="botones"><input class="num" type="submit" name="numero" value="8"></td>
                <td class="botones"><input class="num" type="submit" name="numero" value="9"></td>
                <td class="botones"><input class="op" type="submit" name="operador" value="*"></td>
            </tr>
            <tr>
                <td class="botones"><input class="num" type="submit" name="numero" value="0"></td>
                <td class="botones"><input class="op" type="submit" name="igual" value="="></td>
                <td class="botones"><input class="ac" type="submit" name="clear" value="AC"></td>
                <td class="botones"><input class="op" type="submit" name="operador" value="/"></td>
            </tr>
    </form>
    </table>
</body>
