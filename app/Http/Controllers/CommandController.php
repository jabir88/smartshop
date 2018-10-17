<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class CommandController extends Controller
{
    public function backup()
    {
        Artisan::call('config:cache');
        Artisan::call('backup:run');
        // return redirect('/admin')->with('success', 'Database Backup Successfully Completed!');
        echo "Done bro";
    }
}
