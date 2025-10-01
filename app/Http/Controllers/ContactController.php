<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Industry;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index(ContactRepository $contactRepo)
    {
        $contacts = $contactRepo->getAll();
        return view('contacts.contacts', [
            'lista' => $contacts,
            'title' => 'kontakty'
        ]);
    }

    public function create()
    {
        ///$industries = Industry::all();
        $industries = Industry::query()->orderBy('industry_name')->pluck('industry_name', 'id');

        return view('contacts.create', [
            'title' => 'kontakty',
            'industries' => $industries
        ]);
    }

    public function store(Request $request)
    {


        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'company' => 'required',
            'business_email' => 'bail|required|email|unique:contacts,business_email',
            'phone_number'   => 'required|digits_between:7,15',
            'industry_id'    => 'nullable|exists:industries,id',
            'company_size'   => 'nullable|string|max:50',
            'comments'       => 'nullable|string|max:1000',


        ], [
            'first_name.required'     => 'Uzupełnij imię.',
            'first_name.max'          => 'Maksymalna długość tekstu to 255 znaków.',
            'last_name.required'      => 'Uzupełnij nazwisko.',
            'company.required'        => 'Uzupełnij nazwę firmy.',
            'business_email.required' => 'Uzupełnij pole email.',
            'business_email.email'    => 'Podaj poprawny adres email.',
            'business_email.unique'   => 'Taki adres email już istnieje.',
            'phone_number.required'   => 'Podaj numer telefonu.',
            'phone_number.digits_between' => 'Numer powinien mieć od 7 do 15 cyfr.',
            'industry_id.exists'      => 'Wybrana branża nie istnieje.',
        ]);


        $contact = new Contact();
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->company = $request->input('company');
        $contact->business_email = $request->input('business_email');
        $contact->phone_number = $request->input('phone_number');
        $contact->industry_id = $request->input('industry_id');
        $contact->company_size = $request->input('company_size');
        $contact->comments = $request->input('comments');
        $contact->save();


        return redirect()->route('contacts.index')
            ->with('success', 'dodano nowy kontakt');

    }

    //public function delete(ContactRepository $contactRepo, $id)
    public function destroy(Contact $contact)
    {
        Gate::authorize('delete',$contact);
        $contact->delete();
        return redirect()
            ->route('contacts.index')
            ->with('success', 'usunięto');
    }

    //public function edit(ContactRepository $contactRepo, $id)
    public function edit(Contact $contact)
    {
        Gate::authorize('update', $contact);
        //$user = $contactRepo->find($id);
        $industries = Industry::query()
            ->orderBy('industry_name')
            ->pluck('industry_name', 'id');

        return view('contacts.edit', [
            'title' => 'kontakty',
            //'contact' => $user,
            'contact' => $contact,
            'industries' => $industries
        ]);
    }

    public function update(Request $request, Contact $contact)
    {
        Gate::authorize('update',$contact);

        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required',
            'company' => 'required',
            'business_email'
            => ['required', 'email' , Rule::unique('contacts', 'business_email')
                ->ignore($contact->id) ],
            'phone_number' => 'required|digits_between:7,15',
            'industry_id'  => 'nullable|exists:industries,id',
            'company_size' => 'nullable|string|max:50',
            'comments'     => 'nullable|string|max:1000',
        ]);

        //$id = $request->input('id');
        //$contact = Contact::find($id);
        //$contact->first_name = $request->input('first_name');
        //$contact->last_name = $request->input('last_name');
        //$contact->company = $request->input('company');
        //$contact->business_email = $request->input('business_mail');
        //$contact->phone_number = $request->input('phone_number');
        //$contact->industry_id = $request->input('industry_id');
        //$contact->company_size = $request->input('company_size');
        //$contact->comments = $request->input('comments');
        //$contact->save();

        $contact->update($validated);


        return redirect()
            ->route('contacts.index')
            ->with('success', 'Zaktualizowano pomyślnie');
    }


}
