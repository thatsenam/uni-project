<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Exception;

class AppointmentsController extends Controller
{

    /**
     * Display a listing of the appointments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $appointments = Appointment::with('doctor','patient')->paginate(25);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $doctors = Doctor::pluck('name','id')->all();
$patients = Patient::pluck('name','id')->all();

        return view('appointments.create', compact('doctors','patients'));
    }

    /**
     * Store a new appointment in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Appointment::create($data);

            return redirect()->route('appointments.appointment.index')
                ->with('success_message', 'Appointment was successfully added.');

    }

    /**
     * Display the specified appointment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $appointment = Appointment::with('doctor','patient')->findOrFail($id);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::pluck('name','id')->all();
$patients = Patient::pluck('name','id')->all();

        return view('appointments.edit', compact('appointment','doctors','patients'));
    }

    /**
     * Update the specified appointment in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $appointment = Appointment::findOrFail($id);
            $appointment->update($data);

            return redirect()->route('appointments.appointment.index')
                ->with('success_message', 'Appointment was successfully updated.');

    }

    /**
     * Remove the specified appointment from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->delete();

            return redirect()->route('appointments.appointment.index')
                ->with('success_message', 'Appointment was successfully deleted.');
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
                'doctor_id' => 'nullable',
            'patient_id' => 'nullable',
            'phone' => 'string|min:1|nullable',
            'appointment_date' => 'date_format:j/n/Y|nullable',
            'charge' => 'string|min:1|nullable',
            'note' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
