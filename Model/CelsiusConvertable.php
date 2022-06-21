<?php


interface CelsiusConvertable {
    public function convertToCelsius() : Celsius;
    public static function convertFromCelsius(Celsius $temperature) : Temperature;
}