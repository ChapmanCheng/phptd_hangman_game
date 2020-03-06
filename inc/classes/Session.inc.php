<?php
class Session
{
    private $sessionsPartition = array('quote', 'selected', 'lives');

    public function __construct()
    {
        if (!isset($_SESSION['quote']))
            $_SESSION['quote'] = 'Hello World.';

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

    public function getQuote()
    {
        return $_SESSION['quote'];
    }

    public function getSelected()
    {
        return $_SESSION['selected'];
    }

    public static function unsetAll()
    {
        if (count($_SESSION))
            foreach (array_keys($_SESSION) as $key)
                unset($_SESSION[$key]);
    }
}
