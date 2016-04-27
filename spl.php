<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 11:39
 * Description SPL类库学习
 */
$array = array('koala', 'kangaroo', 'wombat', 'wallaby', 'emu', 'kiwi', 'kookaburra', 'platypus');

/*** create the array object ***/
$arrayObj = new ArrayObject($array);

/*** iterate over the array ***/
for($iterator = $arrayObj->getIterator(); $iterator->valid();$iterator->next())
{
    var_dump($iterator->valid());
    /*** output the key and current array value ***/
    echo $iterator->key() . ' => ' . $iterator->current() . '<br />';
}