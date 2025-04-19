<?php declare(strict_types = 1);

namespace App\Core\Component\SimpleForm;

use App\Core\Factory\FormFactory;
use Contributte\FormsBootstrap\BootstrapForm;
use Nette\Application\UI\Control;
use Nette\Database\DateTime;
use Nette\Database\Explorer;
use Nette\Utils\ArrayHash;
use Throwable;

class SimpleForm extends Control
{

	public array $onDone = [];

	public array $onError = [];

	public function __construct(private readonly Explorer $database)
	{
	}

	public function createComponentForm(): BootstrapForm
	{
		$form = FormFactory::create();
		$form->getElementPrototype()->setAttribute('class', 'ajax');
		$form->addText('name', 'Jméno')
			->setRequired('Zadejte, prosím, své jméno.');
		$form->addText('email', 'E-mail')
			->setRequired('Zadejte, prosím, svůj e-mail.')
			->addRule($form::Email, 'Zadejte platný e-mail.');
		$form->addText('birthDate', 'Datum narození')
			->setRequired('Zadejte, prosím, datum narození.')
			->setHtmlAttribute('class', 'datepicker');
		$form->addSubmit('send', 'Odeslat');
		$form->onSuccess[] = [$this, 'processForm'];

		return $form;
	}

	public function processForm(BootstrapForm $form, ArrayHash $values): void
	{
		try {
			$birthDateDT = (new DateTime())::createFromFormat('j. n. Y', $values->birthDate);
			$now = new DateTime();
			$this->database->table('form_submission')->insert([
				'name' => $values->name,
				'email' => $values->email,
				'birthdate' => $birthDateDT->format('Y-m-d'),
			]);
			$values->isOlderThan20 = $now->diff($birthDateDT)->y >= 20;
			$this->onDone($values);
		} catch (Throwable $e) {
			$this->onError($e->getMessage());
		}
	}

	public function render(): void
	{
		$this->getTemplate()->setFile(__DIR__ . '/simpleForm.latte')->render();
	}

}
