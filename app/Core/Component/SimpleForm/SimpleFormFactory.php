<?php declare(strict_types = 1);

namespace App\Core\Component\SimpleForm;

interface SimpleFormFactory
{

	public function create(): SimpleForm;

}
