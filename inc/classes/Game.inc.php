<?php class Game
{
	private $phrase;
	private $lives;

	public function __construct(Phrase $phrase)
	{
		$this->phrase = $phrase;
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
				// TODO
				// if (in_array($key, $_SESSION['selected']))
				// 	$html .= '<input class="key selected" type="submit" name="key" value="' . $key . '" disabled>';
				// else
				$html .= '<input class="key" type="submit" name="key" value="' . $key . '">';
			}
			$html .= '</div>';
		}
		return $html;
	}
	public function displayScore()
	{
	}
}
