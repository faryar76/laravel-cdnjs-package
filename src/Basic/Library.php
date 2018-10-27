<?php
namespace Faryar\Cdnjs\Basic;

class Library
{
    public $fullname;
    public $tmpname;
    public $extension;
    public $PackageName;
    public $PackagePage;
    /**
     * constructor
     */
    public function __construct($name)
    {
        $this->fullname=$name;
        $name=explode('.',$name);
        $this->tmpname=$name[0];
        $this->extension=end($name);
    }
    /**
     * get package name
     *
     * @param [type] $name
     * @return void
     */
    public function findPackageName()
    {
        $data=json_decode(file_get_contents('https://api.cdnjs.com/libraries?search='.$this->tmpname),TRUE);
        if(isset($data['results'][0]['name'])){
            $this->PackageName=$data['results'][0]['name'];
            return $this;
        }
        return false;
    }
    /**
     * Undocumented function
     *
     * @param [type] $name
     * @return void
     */
    public function getpackagePage()
    {
        $this->PackagePage=json_decode(file_get_contents('https://api.cdnjs.com/libraries/'.$this->PackageName),TRUE);
        return $this;
    }
    /**
     * get result
     *
     * @return void
     */ 
    public function get()
    {
        foreach($this->PackagePage['assets'][0]['files'] as $p)
        {
            if(strpos($p,$this->fullname)!==false)
            {
                if($this->extension=='js')
                {
                    $this->addToStorage("<script src='"."https://cdnjs.cloudflare.com/ajax/libs/{$this->PackageName}/{$this->PackagePage['assets'][0]['version']}/".$p."'></script>");
                    return  "<script src='"."https://cdnjs.cloudflare.com/ajax/libs/{$this->PackageName}/{$this->PackagePage['assets'][0]['version']}/".$p."'></script>";
                }else{

                    $this->addToStorage("<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/{$this->PackageName}/{$this->PackagePage['assets'][0]['version']}/".$p."'/>");
                    return  "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/{$this->PackageName}/{$this->PackagePage['assets'][0]['version']}/".$p."'/>";
                     
                }
            }
        }
       
    }
    public function addToStorage($link)
    {
            $data=json_decode(file_get_contents(storage_path('cdnjs_lib.json')),TRUE);
            $data[$this->extension][$this->fullname]=$link;
            $myfile = fopen(storage_path('cdnjs_lib.json'), "w");
            fwrite($myfile, json_encode($data));
            fclose($myfile);
            return ;
    }
    public function notFound()
    {
        if(true)//check for dev mod
        {
            return '
            <script>
            console.error("your package '.$this->fullname.' not found check cdnjs sites for curect name \nyou can disable this message with disable dev mod from config")
            </script>
            ';
        }
    }
    public function exists($name)
    {
        if(!file_exists(storage_path('cdnjs_lib.json')))
        {
            $myfile = fopen(storage_path('cdnjs_lib.json'), "w");
            fwrite($myfile, '{
                "css": {},
                "js": {}
            }');
            fclose($myfile);
            @chmod(storage_path('cdnjs_lib.json'), 0777); 
        }
        $data=json_decode(file_get_contents(storage_path('cdnjs_lib.json')),true);
        foreach ($data[$this->extension] as $key => $value)
        {
            if($key==$name)
            {
                return $value;
            }
        }
        return false;

    }
}
