<?php class Game
{
	private $phrase;
	private $lives;

	public function __construct(string $phrase)
	{
		$this->phrase = new Phrase($phrase);
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
	}
	public function checkForLose()
	{
	}
	public function gameOver()
	{
	}
	public function displayKeyboard()
	{
		$html = '';
		$keyboardRows = array('qwertyuiop', 'asdfghjkl', 'zxcvbnm');
		foreach ($keyboardRows as $row) {
			$html .= '<div class="keyrow">';
			foreach (str_split($row) as $key) {
				if ($this->phrase->checkLetter($key))
					$html .= '<input class="key selected" type="submit" name="key" value="' . $key . '" disabled>';
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

		$html .= ' <li class="tries"><img src="images/loseHeart.png" height="35px" widght="30px"></li>';
	}
}
