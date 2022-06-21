<?php


abstract class Temperature {
    protected $value;
    protected $unit;

    public function __construct(float $value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

    public function getUnit() {
        return $this->unit;
    }
}