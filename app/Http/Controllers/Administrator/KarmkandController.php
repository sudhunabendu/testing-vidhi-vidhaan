<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Karmkand;
use Illuminate\Http\Request;

class KarmkandController extends Controller
{
   /**
    * The index function returns a view for the Administrator.karmkand.index page in PHP.
    * 
    * @return A view named 'Administrator.karmkand.index' is being returned.
    */
    public function index(){
        $karmkands = Karmkand::all();
        return view('Administrator.karmkand.index',compact('karmkands'));
    }

    /**
     * The function `createKarmkand` returns a view for creating a new Karmkand in a PHP application.
     * 
     * @return A view for creating a "karmkand" in the Administrator section.
     */
    public function createKarmkand(){
        return view('Administrator.karmkand.create');
    }

}
