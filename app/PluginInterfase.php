<?php
/*Интерфейс для всех плагинов*/
/*каждый плагин, написанный позже, долже быть наследником даннного интерфейса*/
/*пример использования:*/
/*
 Плагин:
 class Foo implement PluginInterfase {
    public finction Run() {
        echo 'Hello World'
    }
}

 Использование:

    $plugin = new Foo;
    $plugin->Run();


class <Название_класса_плагина> implement PluginInterfase {
    //Метод описанный в интерфейсе
    public finction Run() {
        echo 'Hello World'
    }
}


*/
namespace App;


use App\Http\Requests\Request;

interface PluginInterfase
{
    public function Run($data);
    public function addJob($data);
    public function Config($token,$script);
}

