<?php class Phrase
{
	private $currentPhrase;
	private $selected = array();

	public function __construct($phrase, $selected)
	{
		$this->currentPhrase = $phrase;
		$this->selected[] = $selected;
	}
	// handle the phrases

	public function addPhraseToDisplay()
	{
	}
	public function checkLetter()
	{
	}
}
