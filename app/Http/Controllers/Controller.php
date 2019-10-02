<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Kreait\Firebase\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    public function index(){
//        $firebase=(new Factory)->withServiceAccount(__DIR__.'firebase.json')->create();
//        $database=$firebase->getDatabase();
//        $database->getReference('');
//    }

}
