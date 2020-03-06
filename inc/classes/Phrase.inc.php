<?php class Phrase
{
	private $currentPhrase;
	private $selected = array();

	public function __construct($phrase)
	{
		$this->currentPhrase = $phrase;
		if (isset($_SESSION['selected']))
			$this->selected = $_SESSION['selected'];
	}

	public function addPhraseToDisplay()
	{
		$html =  '';
		foreach (str_split($this->currentPhrase) as $letter)

			if (trim($letter)) {
				// letter
				if ($this->checkLetter($letter))
					$html .= "<li class='letter $letter'>$letter</li>";
				else
					$html .= "<li class='hide letter $letter'>$letter</li>";
			} else
				// space
				$html .= '<li class="hide space"> </li>';


		return $html;
	}

	private function checkLetter($letter)
	{
		return in_array(strtolower($letter), $this->selected);
	}
}
