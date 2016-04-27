<?php

class readDir
{

    /**
     * 循环读取文件和文件夹
     * @params $dir 路径
     */
    public function read($dir)
    {
        if(!is_dir($dir)) return array();
        $files = glob($dir . '\*');
        $tmp = Array();
        foreach ($files as $file)
        {
            $tmp[] = $file;
            if(is_dir($file))
            {
                $this->read($file);
            }

        }
        print_r($tmp);
    }

}

echo '<pre>';
(new readDir())->read('D:\WWW\shop\ecstore');
