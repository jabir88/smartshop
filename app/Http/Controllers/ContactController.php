<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('editor');
    }

    public function contactmess()
    {
        $all_mess = Contact::where('conus_status', 1)->paginate(5);
        return view('admin.contact.contactmessage2', compact('all_mess'));
    }
    public function contactmark($conus_id)
    {
        Contact::findOrFail($conus_id)->update([
        'conus_status' => 2,
      ]);
        return back();
        // return back();
    }
}
