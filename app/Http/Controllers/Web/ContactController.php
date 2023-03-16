<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;

use Symfony\Component\HttpFoundation\Request;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;






class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    

    public function index()
    {
        return view('web.contact.index');
    }
    public function create(ContactRequest $request){
        $validate=$request->validated();
        $data=$request->all();
        $newContact=Contact::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'subject'=>$data['subject']
        ]);
        return redirect()->to('');
    }
}
