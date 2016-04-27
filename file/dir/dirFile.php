<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 10:02
 * Descriptions 遍历目录下的所有文件和文件夹
 */
class dirFile
{
    /**
     * 普通方法获取
     */
    public function &readDirFile($dir)
    {
        if (!is_dir($dir)) return false;
        $files = glob($dir .'/*');
        $tmp = Array();
        foreach($files as $file)
        {
            $tmp[] = $file;
            if(is_dir($file))
            {
                $tmp[] = $this->readDirFile($file);
            }
        }
        return $tmp;
    }

    /**
     * spl函数获取
     * @param $dir
     * @return array
     */
    public function &splReadDirFile($dir)
    {
        $it = new FilesystemIterator($dir);
        $tmp = Array();
        foreach ($it as $fileInfo) {
            $tmp[] = $fileInfo->getFilename();
            if(is_dir($fileInfo))
            {
                $tmp[] = $this->splReadDirFile($fileInfo);
            }
        }
        return $tmp;
    }
}

$objFile = new dirFile();

$result = $objFile->splReadDirFile(realpath('../'));
print_r($result);