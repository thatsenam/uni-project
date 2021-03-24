<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BuySms;
use Illuminate\Http\Request;
use Exception;

class BuySmsController extends Controller
{

    /**
     * Display a listing of the buy sms.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $buySmsObjects = BuySms::paginate(25);

        return view('buy_sms.index', compact('buySmsObjects'));
    }

    /**
     * Show the form for creating a new buy sms.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('buy_sms.create');
    }

    /**
     * Store a new buy sms in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            BuySms::create($data);

            return redirect()->route('buy_sms.buy_sms.index')
                ->with('success_message', 'Buy Sms was successfully added.');

    }

    /**
     * Display the specified buy sms.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $buySms = BuySms::findOrFail($id);

        return view('buy_sms.show', compact('buySms'));
    }

    /**
     * Show the form for editing the specified buy sms.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $buySms = BuySms::findOrFail($id);
        

        return view('buy_sms.edit', compact('buySms'));
    }

    /**
     * Update the specified buy sms in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $buySms = BuySms::findOrFail($id);
            $buySms->update($data);

            return redirect()->route('buy_sms.buy_sms.index')
                ->with('success_message', 'Buy Sms was successfully updated.');

    }

    /**
     * Remove the specified buy sms from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $buySms = BuySms::findOrFail($id);
            $buySms->delete();

            return redirect()->route('buy_sms.buy_sms.index')
                ->with('success_message', 'Buy Sms was successfully deleted.');
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
                'amount_of_sms' => 'required|nullable|numeric',
            'phone' => 'nullable|string|min:0', 
        ];
        
        $data = $request->validate($rules);

        $data['is_granted'] = $request->has('is_granted');

        return $data;
    }

}
