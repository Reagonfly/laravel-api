<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use App\Mail\ContactFromAdmin;

use App\Models\ContactLead;

class ContactLeadController extends Controller
{
    public function index()
    {
        return view('admin.contact');
    }

    public function send_email(Request $request)
    {
        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name'      => 'requied',
            'surname'   => 'requied',
            'email'     => 'requied',
            'phone'     => 'requied',
            'content'   => 'requied'
        ]);


        $newContactLead = new ContactLead();

        $newContactLead->fill($form_data);
        $newContactLead->save();

        Mail::to($form_data['email'])->send(new ContactFromAdmin($newContactLead));

        return redirect()->route('admin.contact')->with('message', 'Message sended Correctly');
    }
}
