<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
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

}
