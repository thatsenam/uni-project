<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillBy;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;
use Exception;

class BillsController extends Controller
{

    /**
     * Display a listing of the bills.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $bills = Bill::with('room','patient','doctor','billby')->paginate(25);

        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new bill.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $rooms = Room::pluck('name','id')->all();
$patients = Patient::pluck('name','id')->all();
$doctors = Doctor::pluck('name','id')->all();
$billBies = BillBy::pluck('id','id')->all();

        return view('bills.create', compact('rooms','patients','doctors','billBies'));
    }

    /**
     * Store a new bill in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Bill::create($data);

            return redirect()->route('bills.bill.index')
                ->with('success_message', 'Bill was successfully added.');

    }

    /**
     * Display the specified bill.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bill = Bill::with('room','patient','doctor','billby')->findOrFail($id);

        return view('bills.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified bill.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        $rooms = Room::pluck('name','id')->all();
$patients = Patient::pluck('name','id')->all();
$doctors = Doctor::pluck('name','id')->all();
$billBies = BillBy::pluck('id','id')->all();

        return view('bills.edit', compact('bill','rooms','patients','doctors','billBies'));
    }

    /**
     * Update the specified bill in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $bill = Bill::findOrFail($id);
            $bill->update($data);

            return redirect()->route('bills.bill.index')
                ->with('success_message', 'Bill was successfully updated.');

    }

    /**
     * Remove the specified bill from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bill = Bill::findOrFail($id);
            $bill->delete();

            return redirect()->route('bills.bill.index')
                ->with('success_message', 'Bill was successfully deleted.');
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
                'bill_no' => 'string|min:1|nullable',
            'room_id' => 'nullable',
            'patient_id' => 'nullable',
            'doctor_charge' => 'string|min:1|nullable',
            'room_charge' => 'string|min:1|nullable',
            'total_charge' => 'numeric|nullable',
            'doctor_id' => 'nullable',
            'bill_by' => 'nullable',
            'date' => 'string|min:1|nullable',
            'notes' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
