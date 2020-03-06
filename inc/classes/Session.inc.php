<?php
class Session
{
    public function __construct()
    {
        if (!isset($_SESSION['quote'])) {
            // credits: lukePeavey
            // source: https://github.com/lukePeavey/quotable#get-random-quote
            $data = file_get_contents('https://api.quotable.io/random?maxLength=25');
            $data = json_decode($data);
            $_SESSION['quote'] = $data->content;
            $_SESSION['author'] = $data->author;
        }

        if (!isset($_SESSION['selected']))
            $_SESSION['selected'] = array();

        if (!isset($_SESSION['lives']))
            $_SESSION['lives'] = 5;

        if ($_POST) {
            $key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
            if (!in_array($key, $_SESSION['selected'])) {
                $_SESSION['selected'][] = $key;
                sort($_SESSION['selected'], SORT_STRING);
            }
        }

        // ! DEBUG
        // print_r($_SESSION);
    }
    public function __get($name)
    {
        if (isset($_SESSION[$name]))
            return $_SESSION[$name];
    }

    public function getQuote()
    {
        return $_SESSION['quote'];
    }

    public function getSelected()
    {
        return $_SESSION['selected'];
    }

    public function getAuthor()
    {
        return $_SESSION['author'];
    }

    /**
     * unset everthing $_SESSION has
     */
    public static function unsetAll()
    {
        if (count($_SESSION))
            foreach (array_keys($_SESSION) as $key)
                unset($_SESSION[$key]);
    }
}
