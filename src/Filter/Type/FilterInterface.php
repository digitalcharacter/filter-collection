<?php

namespace dc\Filter\Type;


interface FilterInterface
{
    public function getKey();
    public function getValue();
    public function getComparison();
}