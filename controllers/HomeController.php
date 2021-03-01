<?php

namespace controllers;

class HomeController extends Controller {

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$classLoader === null) {
            self::$classLoader = new self();
        }

        return self::$classLoader;
    }

    public function home(){
        echo "IT IS HOME";
    }

    public function section(){
        echo "IT IS SECTION";
    }

    public function sum($firstParametr , $secondParametr){

        $this->data('firstPar' , $firstParametr);
        $this->data("secondPar" , $secondParametr);
        $this->data("template" , "sum");
        $this->display('index');
    }

    public function register(){
        $this->data('template' , 'register');
        $this->display('index');
    }
    public function administrator(){
        $this->data('template' , 'administrator');
        $this->display('index');
    }
}