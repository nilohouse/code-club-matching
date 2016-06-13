<?php

namespace App\Helpers\Contracts;

interface DistanceCalculatorContract
{
	public function pointA( $lat, $long );

	public function pointB( $lat, $long );

	public function calculate();
}