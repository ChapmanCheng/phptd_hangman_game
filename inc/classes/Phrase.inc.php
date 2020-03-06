<?php
class Phrase
{
	private $currentPhrase;
	private $selected = array();

	public function __construct($phrase)
	{
		$this->currentPhrase = $phrase;
		$this->selected = $_SESSION['selected'];
	}

	public function addPhraseToDisplay()
	{
		$html =  '';
		foreach (str_split($this->currentPhrase) as $letter)
			// $letter = H, e, l, l, o, , W, o, r, l, d
			if (trim($letter)) {
				// letter and punctuation
				$className = array($letter);
				$className[] = $this->checkLetter($letter) ? "" : 'hide';
				$className[] = ctype_punct($letter) ? 'punt' : 'letter';
				$className = implode(' ', $className);

				$html .= "<li class='$className'>$letter</li>";
			} else
				// space
				$html .= '<li class="hide space"> </li>';

		return $html;
	}

	/**
	 * check if $letter is selected by user already
	 * @param {string} a single English letter
	 * @return boolean
	 */
	public function checkLetter(string $letter)
	{
		$letter = strtolower($letter);
		return in_array($letter, $this->selected);
	}

	public function checkLetters()
	{
		$result = array('correct' => 0, 'wrong' => 0);
		foreach ($this->selected as $letter) {
			# code...
		}
		// foreach (str_split($this->currentPhrase) as $letter) 
		// 	if ($this->checkLetter($letter))
		// 		$result['correct']++;
		// 	else
		// 		$result['wrong']++;

		// print_r($result);
	}
}
