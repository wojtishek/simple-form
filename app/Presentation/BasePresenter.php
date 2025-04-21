<?php declare(strict_types = 1);

namespace App\Presentation;

use Nette\Application\UI\Presenter;
use Nette\DI\Attributes\Inject;
use WebLoader\Nette\LoaderFactory;

class BasePresenter extends Presenter
{

	#[Inject]
	public LoaderFactory $webLoader;

	protected function createComponentCss()
	{
		return $this->webLoader->createCssLoader('default');
	}

	protected function createComponentJs()
	{
		return $this->webLoader->createJavaScriptLoader('default');
	}

    protected function createComponentDatepickerjs()
    {
        return $this->webLoader->createJavaScriptLoader('datepicker');
    }

}
