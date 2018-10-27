<?php
namespace Faryar\Cdnjs\Basic;

class Library
{
    /**
     * extension of user requested name
     *
     * @var string
     */
    public $extension;
    /**
     * real name of user requested library
     *
     * @var string
     */
    public $RealPackageName;

    /**
     * library constructor
     */
    public function __construct()
    {
        $this->path=storage_path('cdnjs_lib.json');
    }
    /**
     * initialize function
     *
     * @param [type] $name
     * @return void
     */
    public function init($name)
    {
        $extension=explode('.',$name);
        $this->extension=end($extension);
        $this->userRequestName=$extension[0];
    }
    /**
     * get real package name from cdnjs ex "twitter-bootstrap"
     *
     * @param string $name
     * @return void
     */
    public function findRealPackageName($name)
    {
        $this->init($name);
        $data=json_decode(file_get_contents('https://api.cdnjs.com/libraries?search='.$this->userRequestName),TRUE);
        if($data['total'] > 0){
            $this->RealPackageName=$data['results'][0]['name'];
            return $this;
        }
        return false;
    }
    /**
     * get generated link for js or css 
     *
     * @param string $name
     * @return void
     */
    public function get(string $name)
    {
        $loadedLib=$this->loadLib($name);
        if($loadedLib==null)
            {
                return $this->notFound($name);
            }
      
            foreach($loadedLib['assets'][0]['files'] as $item)
            {
                if(strpos($item,$name)!==false)
                {
                    // $filename=$loadedLib['filename'];
                    $filename=$item;
                    $pname=$loadedLib['name'];
                    $version=$loadedLib['version'];

                    $extension=explode('.',$filename);
                    $extension=end($extension);

                    if($extension=='css')
                    {
                        $this->addToStorage($name,"<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/{$pname}/{$version}/".$filename."'/>");
                        return  "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/{$pname}/{$version}/".$filename."'/>";
                    }elseif($extension=='js'){
                        $this->addToStorage($name,"<script src='"."https://cdnjs.cloudflare.com/ajax/libs/{$pname}/{$version}/".$filename."'></script>");
                        return  "<script src='"."https://cdnjs.cloudflare.com/ajax/libs/{$pname}/{$version}/".$filename."'></script>";         
                    }
                }
            }
       
       return $this->notFound($name);//if not found results
    }
    /**
     * load page of curent library
     *
     * @param [type] $packageName
     * @return void
     */
    public function loadLib($packageName)
    {
        $packageName=$this->RealPackageName;
        return json_decode(file_get_contents('https://api.cdnjs.com/libraries/'.$packageName),TRUE);
    }
    /**
     * if library not found will return a console.error for user 
     * can disable it in config
     * @param [type] $name
     * @return void
     */
    public function notFound($name)
    {
        if(true)//check for dev mod
        {
            return '
            <script id="mustHide">
            console.error("your package '.$name.' not found check cdnjs sites for curect name \nyou can disable this message with disable dev mod from config")
            document.getElementById("mustHide").remove();
            </script>
            ';
        }
    }
    /**
     * add new library to $path for later use
     *
     * @param [type] $name
     * @param [type] $link
     * @return void
     */
    public function addToStorage($name,$link)
    {
        $data=json_decode(file_get_contents($this->path),TRUE);
        $data[$name]=$link;
        $myfile = fopen($this->path, "w");
        fwrite($myfile, json_encode($data));
        fclose($myfile);
        return ;
    }
}

