<?php declare(strict_types = 1);

namespace App\Presentation\Home;

use App\Core\Component\SimpleForm\SimpleForm;
use App\Core\Component\SimpleForm\SimpleFormFactory;
use App\Presentation\BasePresenter;
use Nette;
use Tracy\Debugger;

final class HomePresenter extends BasePresenter
{

	public function __construct(
		private readonly SimpleFormFactory $simpleFormFactory,
	)
	{
		parent::__construct();
	}

	protected function createComponentSimpleForm(): SimpleForm
	{
		$simpleForm = $this->simpleFormFactory->create();
		$simpleForm->onDone[] = function (Nette\Utils\ArrayHash $values): void {
			$this->getTemplate()->result = $values;
			$this->flashMessage('Formulář byl úspěšně odeslán.', 'success');
			if ($this->isAjax()) {
                $this['simpleForm']->redrawControl();
				$this->redrawControl('flashes');
				$this->redrawControl('simpleFormResult');
			} else {
				$this->redirect('this');
			}
		};
		$simpleForm->onError[] = function (string $message): void {
			$this->flashMessage('Nastala chyba při odesílání formuláře.', 'danger');
			if ($this->isAjax()) {
				$this->redrawControl('flashes');
			} else {
				$this->redirect('this');
			}

			Debugger::log($message, 'error');
		};

		return $simpleForm;
	}

}
