<?php

require_once "Temperature.php";
require_once "CelsiusConvertable.php";

final class Kelvin extends Temperature implements CelsiusConvertable {

    protected $unit = "°K";

    public const KELVIN_CELSIUS_OFFSET = 273.15;

    public static function convertFromCelsius(Celsius $teperature): Temperature
    {
        return new Kelvin($teperature->getValue() + self::KELVIN_CELSIUS_OFFSET);
    }
    public function convertToCelsius(): Celsius
    {
        return new Celsius($this->value - self::KELVIN_CELSIUS_OFFSET);
    }
}
