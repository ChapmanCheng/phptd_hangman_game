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
	}
	public function displayScore()
	{
	}
}
