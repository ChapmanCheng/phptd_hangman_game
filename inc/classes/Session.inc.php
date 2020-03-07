<?php
class Session
{
    public function __construct()
    {
        if (!isset($_SESSION['phrase']))
            $_SESSION['phrase'] = '';

        if (!isset($_SESSION['selected']))
            $_SESSION['selected'] = array();

        if ($_POST) {
            $key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
            if (!in_array($key, $_SESSION['selected'])) {
                $_SESSION['selected'][] = $key;
                sort($_SESSION['selected'], SORT_STRING);
            }
        }
    }
    public function __get($name)
    {
        if (isset($_SESSION[$name]))
            return $_SESSION[$name];
    }

    public function __set($name, $value)
    {
        if (isset($_SESSION[$name]))
            $_SESSION[$name] = $value;
    }

    public function getPhrase()
    {
        return $_SESSION['phrase'];
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
