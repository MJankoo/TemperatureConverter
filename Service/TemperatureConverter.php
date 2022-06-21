<?php

require_once "DataParser.php";
require_once "./Model/Celsius.php";
require_once "./Model/Fahrenheit.php";
require_once "./Model/Kelvin.php";
require_once "./Model/Temperature.php";

final class TemperatureConverter {

    private const SCALE_NORM_PATTERN = '/^°?(F|C|K)$/u';

    public function convert(string $currentScale, string $targetScaleSymbol) : Temperature {

        try {
            $parsedFrom = DataParser::parse($currentScale);
            $currentScaleClass = $this->convertSymbolToClass($parsedFrom[1]);
            $currentScaleObject = new $currentScaleClass($parsedFrom[0]);

            $celsius = $currentScaleObject->convertToCelsius();
            $normalizedTargetScaleSymbol = $this->normalizeTargetScale($targetScaleSymbol);
            $targetScaleClass = $this->convertSymbolToClass($normalizedTargetScaleSymbol);

            return $targetScaleClass::convertFromCelsius($celsius);
        } catch(InvalidArgumentException $e) {
            echo $e->getMessage();
            die;
        }

    }

    private function convertSymbolToClass(string $symbol): string {
        switch ($symbol) {
            case 'K':
                return Kelvin::class;
            case 'F':
                return Fahrenheit::class;
            case 'C':
                return Celsius::class;
            default:
                throw new InvalidArgumentException('Could not determine temperature scale: '.$symbol);
        }
    }

    private function normalizeTargetScale(string $value): string {

        $isMatched = preg_match(self::SCALE_NORM_PATTERN, $value, $matches);
        if($isMatched) {
            $scaleSymbol = strtoupper($matches[1]);
            return $scaleSymbol;
        } else {
            throw new InvalidArgumentException('Could not determine temperature scale: '.$value);
        }

    }

}