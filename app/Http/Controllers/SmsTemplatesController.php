<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SmsTemplate;
use Illuminate\Http\Request;
use Exception;

class SmsTemplatesController extends Controller
{

    /**
     * Display a listing of the sms templates.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $smsTemplates = SmsTemplate::paginate(25);

        return view('sms_templates.index', compact('smsTemplates'));
    }

    /**
     * Show the form for creating a new sms template.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('sms_templates.create');
    }

    /**
     * Store a new sms template in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            SmsTemplate::create($data);

            return redirect()->route('sms_templates.sms_template.index')
                ->with('success_message', 'Sms Template was successfully added.');

    }

    /**
     * Display the specified sms template.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $smsTemplate = SmsTemplate::findOrFail($id);

        return view('sms_templates.show', compact('smsTemplate'));
    }

    /**
     * Show the form for editing the specified sms template.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $smsTemplate = SmsTemplate::findOrFail($id);
        

        return view('sms_templates.edit', compact('smsTemplate'));
    }

    /**
     * Update the specified sms template in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $smsTemplate = SmsTemplate::findOrFail($id);
            $smsTemplate->update($data);

            return redirect()->route('sms_templates.sms_template.index')
                ->with('success_message', 'Sms Template was successfully updated.');

    }

    /**
     * Remove the specified sms template from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $smsTemplate = SmsTemplate::findOrFail($id);
            $smsTemplate->delete();

            return redirect()->route('sms_templates.sms_template.index')
                ->with('success_message', 'Sms Template was successfully deleted.');
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
                'title' => 'required|nullable|string|min:1|max:255',
            'body' => 'required|nullable|string|min:1', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
