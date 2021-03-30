<?php

namespace App\Http\Controllers;

use App\DataTables\RoomDataTable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(RoomDataTable $dataTable)
    {
        
        return $dataTable->render('home');
    }
}
