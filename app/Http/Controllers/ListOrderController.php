<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Menu;
use App\MenuOrder;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return view('listorder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


}
