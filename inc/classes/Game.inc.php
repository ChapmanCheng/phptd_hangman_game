<?php class Game
{
	private $phrase;
	private $lives;

	public function __construct(string $phrase)
	{
		$this->phrase = new Phrase($phrase, $_SESSION['selected']);
		$this->lives = 5;
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
		$result = $this->phrase->checkLetters();
		$total = count($this->phrase->getFilterPhrase());
		if (count($result['correct']) == $total)
			return true;
	}
	public function checkForLose()
	{
		$result = $this->phrase->checkLetters();
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
		$html = '';
		$keyboardRows = array('qwertyuiop', 'asdfghjkl', 'zxcvbnm');
		foreach ($keyboardRows as $row) {
			$html .= '<div class="keyrow">';
			foreach (str_split($row) as $key) {
				if (in_array($key, $this->phrase->selected))
					$html .= '<input class="key" style="background-color:red;" type="submit" name="key" value="' . $key . '" disabled>';
				else
					$html .= '<input class="key" type="submit" name="key" value="' . $key . '">';
			}
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
