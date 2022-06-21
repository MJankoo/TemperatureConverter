<?php

require_once "./Service/TemperatureConverter.php";

class TemperatureConversionController
{
    private $converter;

    public function __construct() {
        $this->converter = new TemperatureConverter();
    }

    public function index() {
        if(isset($_POST['from']) && $_POST['to']) {
            $from = $_POST['from'];
            $to = $_POST['to'];
        } else {
            throw new InvalidArgumentException('No Data');
        }

        $targetTemperatureScale = $this->converter->convert($from, $to);

        return $from." = ".$targetTemperatureScale->getValue().$targetTemperatureScale->getUnit();
    }
}