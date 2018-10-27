<?php 
namespace Faryar\Cdnjs;
use Faryar\Cdnjs\Basic\Library;

class Cdnjs 
{
    /**
     * constructor
     *
     * @param Library $downloader
     */
    public function __construct()
    {
    }

    public function directive()
    {
        require(__DIR__."/directive.php"); 
    }
    public function test($string)
    {
        $Library=new Library($string);
        if($file=$Library->exists($string))
        {
            return  $file;  
        }

        if($packageName=$Library->findPackageName())
        {
            
            return  $Library->getpackagePage()->get();  
        }
        return $Library->notFound();
    }
}