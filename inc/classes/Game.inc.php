<?php class Game
{
	private $phrase;
	private $lives;

	public function __construct(Phrase $phrase)
	{
		$this->phrase = $phrase;
		$this->lives = 5;
	}
	public function __destruct()
	{
		// !Deprecate need to store info somewhere else
		// $_SESSION['phrase'] = $this->phrase->currentPhrase;
		// $_SESSION['selected'] = $this->phrase->selected;
	}
	public function __get($name)
	{
		if (isset($this->$name))
			return $this->$name;
	}
	public function __set($name, $value)
	{
		if (isset($this->name))
			$this->$name = $value;
	}


	public function checkForWin()
	{
		$result = $this->phrase->getResults();
		$total = count($this->phrase->getFilterPhrase());
		if (count($result['correct']) == $total)
			return true;
	}
	public function checkForLose()
	{
		$result = $this->phrase->getResults();
		$this->lives = $this->lives - count($result['wrong']);
		if ($this->lives == 0)
			return true;
	}

	public function gameOver()
	{
		if ($this->checkForLose())
			return 'The phrase was: "' . $this->phrase->currentPhrase . '". Better luck next time!';
		if ($this->checkForWin())
			return 'Congratulations on guessing: "' . $this->phrase->currentPhrase . '"';
		return false;
	}
	public function displayKeyboard()
	{
		$selectedString = implode('', $this->phrase->selected);

		$html = '';
		$keyboardRows = array('qwertyuiop', 'asdfghjkl', 'zxcvbnm');
		foreach ($keyboardRows as $row) {
			$html .= '<div class="keyrow">';
			foreach (str_split($row) as $key)

				if (is_int(strpos($selectedString, $key)))
					if ($this->phrase->checkLetter($key))
						$html .= '<input class="key" style="background-color:green;color:white;" type="submit" name="key" value="' . $key . '" disabled>';
					else
						$html .= '<input class="key" style="background-color:red;color:white;" type="submit" name="key" value="' . $key . '" disabled>';
				else
					$html .= '<input class="key" type="submit" name="key" value="' . $key . '">';

			$html .= '</div>';
		}
		return $html;
	}
	public function displayScore()
	{
		$html = '';
		for ($i = 0; $i < 5; $i++) {
			$imgName = $i < $this->lives ? 'liveHeart' : 'lostHeart';
			$html .= ' <li class="tries"><img src="images/' . $imgName . '.png" height="35px" widght="30px"></li>';
		}
		return $html;
	}
}
