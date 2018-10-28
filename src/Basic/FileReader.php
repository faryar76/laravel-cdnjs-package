<?php

namespace Faryar\Cdnjs\Basic;

class FileReader
{
    /**
     * path of cdnjs_lib.
     *
     * @var string
     */
    protected $path;
    /**
     * $path file after read will put here.
     *
     * @var json_decode data
     */
    protected $file;

    /**
     * constuctor.
     *
     * @param [type] $path
     */
    public function __construct($path = null)
    {
        $this->path = is_null($path) ? storage_path('cdnjs_lib.json') : $path;
    }

    /**
     * read $path file if exists and create if not.
     *
     * @param [type] $path
     *
     * @return void
     */
    public function open($path = null)
    {
        $this->fileExists($this->path) ? null : $this->create();
        $this->file = json_decode(file_get_contents($this->path));

        return $this;
    }

    /**
     * check for exists file in $path.
     *
     * @param [type] $path
     *
     * @return void
     */
    public function fileExists($path)
    {
        return file_exists($path);
    }

    /**
     * create new file.
     *
     * @param string $name
     *
     * @return void
     */
    public function create($name = 'cdnjs_lib.json')
    {
        return touch(storage_path($name));
    }

    /**
     * check record exists in $path.
     *
     * @param string $name
     *
     * @return void
     */
    public function exists(string $name)
    {
        if (is_null($this->file)) {
            return false;
        }
        foreach ($this->file as $key => $link) {
            if ($key == $name) {
                return $link;
            }
        }

        return false;
    }
}
