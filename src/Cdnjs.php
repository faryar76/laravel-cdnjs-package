<?php

namespace Faryar\Cdnjs;

<<<<<<< HEAD
use Faryar\Cdnjs\Basic\Library;
=======
>>>>>>> 2861a97a8195bfef7a11457eb9bc90891b708287
use Faryar\Cdnjs\Basic\FileReader as File;
use Faryar\Cdnjs\Basic\Library;

class Cdnjs
{
    /**
     * instans of Library class.
     *
     * @var object
     */
    protected $library;
    /**
     * instans of FileReader class.
     *
     * @var object
     */
    protected $file;

    /**
     * construct.
     */
    public function __construct()
    {
        $this->library = new Library();
        $this->file = new File();
    }

    /**
     * requre directive to provider.
     *
     * @return void
     */
    public function directive()
    {
<<<<<<< HEAD
        require(__DIR__ . "/directive.php");
=======
        require __DIR__.'/directive.php';
>>>>>>> 2861a97a8195bfef7a11457eb9bc90891b708287
    }

    /**
     * handle genarate.
     *
     * @param [type] $name
     * @param [type] $version
     *
     * @return void
     */
    public function generate($input, $version = null)
    {
<<<<<<< HEAD
        $results = "";
        if (!is_array($input)) {
            return $this->get($input);
        }
        foreach ($input as $item) {
            $results .= $this->get($item);
        }
        return $results;
=======
        if (is_array($input)) {
            $results = '';
            foreach ($input as $item) {
                $results .= $this->get($item);
            }

            return $results;
        }
>>>>>>> 2861a97a8195bfef7a11457eb9bc90891b708287

        return $this->get($input);
    }

    /**
     * get links from Library class.
     *
     * @param string $name
     *
     * @return void
     */
    public function get(string $name)
    {
<<<<<<< HEAD
        $results = "";
        if ($name == "") {
=======
        $results = '';
        if ($name == '') {
>>>>>>> 2861a97a8195bfef7a11457eb9bc90891b708287
            return $this->library->notFound("' no name '");
        }
        if ($link = $this->file->open()->exists($name)) {
            $results = $link;
        } elseif ($this->library->findRealPackageName($name)) {
            $results = $this->library->get($name);
<<<<<<< HEAD

=======
>>>>>>> 2861a97a8195bfef7a11457eb9bc90891b708287
        } else {
            $results = $this->library->notFound($name);
        }

        return $results;
    }
}
