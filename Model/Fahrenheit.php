<?php

require_once "Temperature.php";
require_once "CelsiusConvertable.php";

final class Fahrenheit extends Temperature implements CelsiusConvertable {

    protected $unit = "F";

    public static function convertFromCelsius(Celsius $temperature): Temperature
    {
        return new Fahrenheit(($temperature->value / 1.8) + 32);
    }
    public function convertToCelsius(): Celsius
    {
        return new Celsius(($this->value - 32) / 1.8);
    }
}