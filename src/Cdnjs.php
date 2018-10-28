<?php

namespace Faryar\Cdnjs;

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
        require __DIR__.'/directive.php';
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
        if (is_array($input)) {
            $results = '';
            foreach ($input as $item) {
                $results .= $this->get($item);
            }

            return $results;
        }

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
        $results = '';
        if ($name == '') {
            return $this->library->notFound("' no name '");
        }
        if ($link = $this->file->open()->exists($name)) {
            $results = $link;
        } elseif ($this->library->findRealPackageName($name)) {
            $results = $this->library->get($name);
        } else {
            $results = $this->library->notFound($name);
        }

        return $results;
    }
}
