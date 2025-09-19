<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Industry;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index(ContactRepository $contactRepo)
    {
        $contacts = $contactRepo->getAll();
        return view('contacts.contacts', [
            'lista'=>$contacts,
            'title'=>'kontakty'
        ]);
    }

    public function create()
    {
        ///$industries = Industry::all();
        $industries = Industry::query()->orderBy('industry_name')->pluck('industry_name','id');

        return view('contacts.create',[
            'title'=>'kontakty',
            'industries' => $industries
        ]);
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->company = $request->input('company');
        $contact->business_email = $request->input('business_mail');
        $contact->phone_number = $request->input('phone_number');
        $contact->industry_id = $request->input('industry_id');
        $contact->company_size = $request->input('company_size');
        $contact->comments = $request->input('comments');
        $contact->save();

        return redirect()->route('contacts.index');

    }

    public function delete(ContactRepository $contactRepo, $id)
    {
        $contactRepo->delete($id);
        return redirect('contacts');
    }


    public function edit(ContactRepository $contactRepo, $id)
    {
        $user = $contactRepo->find($id);
        $industries = Industry::query()
            ->orderBy('industry_name')
            ->pluck('industry_name','id');

        return view('contacts.edit',[
            'title'=>'kontakty',
            'contact' => $user,
            'industries' => $industries
        ]);
    }

    public function editStore(Request $request)
    {
        $id = $request->input('id');
        $contact = Contact::find($id);
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->company = $request->input('company');
        $contact->business_email = $request->input('business_mail');
        $contact->phone_number = $request->input('phone_number');
        $contact->industry_id = $request->input('industry_id');
        $contact->company_size = $request->input('company_size');
        $contact->comments = $request->input('comments');
        $contact->save();
        return redirect()->route('contacts.index');
    }


















}
