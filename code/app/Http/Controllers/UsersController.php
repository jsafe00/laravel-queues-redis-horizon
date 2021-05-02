<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Mail\EmailsSent;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\SendUserEmail;
use Log;

class UsersController extends Controller 
{
    public function export() 
    {
        SendUserEmail::dispatch()->onQueue('email');

        return 'Dispatched';
    }
}