<?php

/**
 * DUMP variable
 * @param  mixed $object variable apa yang akan dilihat nilainya
 * @return mixed         object
 */
function dd($object)
{
    return die(var_dump($object));
}
