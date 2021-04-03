<?php

namespace App\Http\Controllers;

use App\DataTables\ApprovedClientsDataTable;
use App\DataTables\ClientsReservationsDataTable;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(ApprovedClientsDataTable $dataTable){
        return $dataTable->render('receptionist.approvedClients');
    }
    public function getReservations(ClientsReservationsDataTable $dataTable){
        return $dataTable->render('reservations.clientsReservations');
    }
}
