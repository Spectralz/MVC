<?php


class VarificationOfUsersInserts {

    public function typeName($inserts){

    }
    public function typeAge($inserts){
        $time = date('Y-m-d H:i:s');
        if(empty($inserts)) {
            $text_error = "Empty value ;".$time.";";
            error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
            throw new ExceptionIsEmpty();
        } if (!is_integer($inserts)){
            $text_error = "Not Number: ".$inserts." ; ".$time.";";
            error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
            throw new ExceptionIsNotANumber('Is not a number');
        }if ($inserts < 1 || $inserts > 102) {
            $text_error = "Age out of range: ".$inserts." ; ".$time.";";
            error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
            throw new ExceptionNotAge();
        }return $inserts;
    }
}



    function postVarification($post , $typeOfValue)
{
    $type = 'type'.$typeOfValue;
    $res = new VarificationOfUsersInserts();
    $a = $res->$type($post);
    echo $a;
}


try
{
    postVarification( '', 'Age');
}
catch (ExceptionIsEmpty $e)
{
    echo "Message: " . $e->getMessage();
}
catch (ExceptionIsEmpty $e)
{
    echo "Message: " . $e->getMessage();
}
catch (ExceptionNotAge $e)
{
    echo "Message: " . $e->getMessage();
}

