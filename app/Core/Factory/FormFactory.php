<?php declare(strict_types = 1);

namespace App\Core\Factory;

use Contributte\FormsBootstrap\BootstrapForm;
use Contributte\FormsBootstrap\Enums\BootstrapVersion;

class FormFactory
{

	public static function create(): BootstrapForm
	{
		$form = new BootstrapForm();
		$form::switchBootstrapVersion(BootstrapVersion::V5);
		$form->getRenderer()->setGridBreakPoint('md');

		return $form;
	}

}
