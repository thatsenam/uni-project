<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SMSModel;
use App\Models\SmsContact;
use App\Models\SmsTemplate;
use Illuminate\Http\Request;
use Exception;

class SMSModelsController extends Controller
{

    /**
     * Display a listing of the s m s models.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sMSModels = SMSModel::with('smstemplate','smscontact')->paginate(25);

        return view('s_m_s_models.index', compact('sMSModels'));
    }

    /**
     * Show the form for creating a new s m s model.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $smsTemplates = SmsTemplate::pluck('title','id')->all();
$smsContacts = SmsContact::pluck('name','id')->all();

        return view('s_m_s_models.create', compact('smsTemplates','smsContacts'));
    }

    /**
     * Store a new s m s model in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            SMSModel::create($data);

            return redirect()->route('s_m_s_models.s_m_s_model.index')
                ->with('success_message', 'S M S Model was successfully added.');

    }

    /**
     * Display the specified s m s model.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $sMSModel = SMSModel::with('smstemplate','smscontact')->findOrFail($id);

        return view('s_m_s_models.show', compact('sMSModel'));
    }

    /**
     * Show the form for editing the specified s m s model.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sMSModel = SMSModel::findOrFail($id);
        $smsTemplates = SmsTemplate::pluck('title','id')->all();
$smsContacts = SmsContact::pluck('name','id')->all();

        return view('s_m_s_models.edit', compact('sMSModel','smsTemplates','smsContacts'));
    }

    /**
     * Update the specified s m s model in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $sMSModel = SMSModel::findOrFail($id);
            $sMSModel->update($data);

            return redirect()->route('s_m_s_models.s_m_s_model.index')
                ->with('success_message', 'S M S Model was successfully updated.');

    }

    /**
     * Remove the specified s m s model from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $sMSModel = SMSModel::findOrFail($id);
            $sMSModel->delete();

            return redirect()->route('s_m_s_models.s_m_s_model.index')
                ->with('success_message', 'S M S Model was successfully deleted.');
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
                'sms_template_id' => 'nullable',
            'sms_contact_id' => 'nullable',
            'is_all_supplier' => 'boolean|nullable',
            'is_all_customer' => 'boolean|nullable',
            'note' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_all_supplier'] = $request->has('is_all_supplier');
        $data['is_all_customer'] = $request->has('is_all_customer');
        $data['is_sent'] = $request->has('is_sent');

        return $data;
    }

}
