<?php

class DataParser {
    private const TEMP_PATTERN = '/^(-?\d+) *°?(F|C|K)$/u';
    private const VALUE_IDX = 1;
    private const SCALE_UNIT_IDX = 2;

    public static function parse($input) {
        preg_match(self::TEMP_PATTERN, $input, $matches);

        if(count($matches) === 3) {
            return [$matches[self::VALUE_IDX], $matches[self::SCALE_UNIT_IDX]];
        } else {
            throw new InvalidArgumentException('Could not parse entry input: '.$input);
        }
    }
}