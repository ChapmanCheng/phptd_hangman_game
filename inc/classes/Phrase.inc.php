<?php
class Phrase
{
	private $currentPhrase;
	private $selected = array();

	public function __construct(string $phrase = null, array $selected = array())
	{
		$this->currentPhrase = $phrase;
		$this->selected = $selected;

		if (!$phrase) {
			$this->currentPhrase  = $this->fetchRandomQuote();
		}
	}

	public function __get(string $name)
	{
		if (isset($this->$name))
			return $this->$name;
	}

	public function __set(string $name, $value)
	{
		if (isset($this->name))
			$this->$name = $value;
	}

	/**
	 * Append html code of phrase 
	 * @return {string} of html code block
	 */
	public function addPhraseToDisplay()
	{

		$html =  '';
		foreach (str_split($this->currentPhrase) as $letter)
			// $letter = H, e, l, l, o, , W, o, r, l, d
			if (trim($letter)) {
				// letter and punctuation
				$className = array($letter);
				$className[] = in_array(strtolower($letter), $this->selected) ? "" : 'hide';
				$className[] = ctype_punct($letter) ? 'punt' : 'letter';
				$className = implode(' ', $className);

				$html .= "<li class='$className'>$letter</li>";
			} else
				// space
				$html .= '<li class="hide space"> </li>';

		return $html;
	}

	/**
	 * checks to see if a letter matches a letter in the phrase
	 * @param {string} a single English letter
	 * @return boolean
	 */
	public function checkLetter($letter)
	{
		$letter = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
		if (!in_array($letter, $this->selected)) {
			$this->selected[] = $letter;
			sort($this->selected, SORT_STRING);
		}
		return stripos($this->currentPhrase, $letter) !== false ?  1 : 0;
	}
	public function checkLetters()
	{
		$result = array(
			'correct' => array(),
			'wrong' => array()
		);

		foreach ($this->selected as $letter)
			if ($this->checkLetter($letter))
				$result['correct'][] = $letter;
			else
				$result['wrong'][] = $letter;

		return $result;
	}


	/**
	 * filter $currentPhrase from punctuations, empty spaces, and duplicates
	 * @return {array} of letters from $currentPhrase
	 */
	public function getFilterPhrase()
	{
		// ? this takes alot of lines of codes, 
		// ? javascript could have done it in a few lines
		$phrase = str_replace(' ', '', $this->currentPhrase);
		$arr = str_split($phrase);
		$arr = array_unique($arr, SORT_STRING);
		$arr = array_map(function ($val) {
			return strtolower($val);
		}, $arr);
		$arr = array_filter($arr, function ($val) {
			if (!ctype_punct($val))
				return $val;
		});
		return $arr;
	}

	private function fetchRandomQuote()
	{
		// credits: lukePeavey
		// source: https://github.com/lukePeavey/quotable#get-random-quote
		$data = file_get_contents('https://api.quotable.io/random?maxLength=25');
		$data = json_decode($data);
		return $data->content;
	}
}
