<?php

require_once "Controller/TemperatureConversionController.php";

$controller = new TemperatureConversionController();


try {
    echo $controller->index();
} catch(InvalidArgumentException $e) {
    echo $e->getMessage();
}

?>

<form method="post">
    <input name="from">
    <input name="to">
    <input type="submit">
</form>

