<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SmsContact;
use Illuminate\Http\Request;
use Exception;

class SmsContactsController extends Controller
{

    /**
     * Display a listing of the sms contacts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $smsContacts = SmsContact::paginate(25);

        return view('sms_contacts.index', compact('smsContacts'));
    }

    /**
     * Show the form for creating a new sms contact.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('sms_contacts.create');
    }

    /**
     * Store a new sms contact in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            SmsContact::create($data);

            return redirect()->route('sms_contacts.sms_contact.index')
                ->with('success_message', 'Sms Contact was successfully added.');

    }

    /**
     * Display the specified sms contact.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $smsContact = SmsContact::findOrFail($id);

        return view('sms_contacts.show', compact('smsContact'));
    }

    /**
     * Show the form for editing the specified sms contact.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $smsContact = SmsContact::findOrFail($id);
        

        return view('sms_contacts.edit', compact('smsContact'));
    }

    /**
     * Update the specified sms contact in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $smsContact = SmsContact::findOrFail($id);
            $smsContact->update($data);

            return redirect()->route('sms_contacts.sms_contact.index')
                ->with('success_message', 'Sms Contact was successfully updated.');

    }

    /**
     * Remove the specified sms contact from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $smsContact = SmsContact::findOrFail($id);
            $smsContact->delete();

            return redirect()->route('sms_contacts.sms_contact.index')
                ->with('success_message', 'Sms Contact was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|nullable|string|min:1|max:255',
            'phone' => 'required|nullable|string|min:1',
            'address' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
