<?php


namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function index($id, $name) {
        return "index id:".$id." , name:".$name;
    }
}
