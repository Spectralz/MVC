<?php

namespace classes;

use Throwable;

class Logger extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function loggerTrace(){
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }
    public function loggerDebug(){
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }
    public function loggerInfo($message){
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }
    public function loggerWarn(){
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }
    public function loggerError(){
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }
    public function loggerFatal(){
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }
}





class DivisionException extends Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

function div($a, $b){
    if($b === 0){
        throw new Exception("Division by zero");
    }
    return $a / $b;
}

function f(){

    $res = div(3, 0);

    return $res;
}

function f2()
{
    try {
        $res = f();
        echo $res;
    } catch (DivisionException $e) {
        echo "dddd: " . $e->getMessage();
    } catch (Exception $e) {
        echo "eee: " . $e->getMessage();
    }
}