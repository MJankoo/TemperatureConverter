<?php

require_once "Temperature.php";
require_once "CelsiusConvertable.php";

final class Celsius extends Temperature implements CelsiusConvertable {

    protected $unit = "°C";

    public static function convertFromCelsius(Celsius $temperature): Temperature
    {
        return $temperature;
    }
    public function convertToCelsius(): Celsius
    {
        return new Celsius($this->value);
    }
}