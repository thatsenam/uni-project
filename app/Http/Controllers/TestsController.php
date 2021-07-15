<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Test;
use Illuminate\Http\Request;
use Exception;

class TestsController extends Controller
{

    /**
     * Display a listing of the tests.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $tests = Test::with('patient','doctor','bill')->paginate(25);

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new test.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $patients = Patient::pluck('name','id')->all();
$doctors = Doctor::pluck('name','id')->all();
$bills = Bill::pluck('created_at','id')->all();

        return view('tests.create', compact('patients','doctors','bills'));
    }

    /**
     * Store a new test in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Test::create($data);

            return redirect()->route('tests.test.index')
                ->with('success_message', 'Test was successfully added.');

    }

    /**
     * Display the specified test.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $test = Test::with('patient','doctor','bill')->findOrFail($id);

        return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified test.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        $patients = Patient::pluck('name','id')->all();
$doctors = Doctor::pluck('name','id')->all();
$bills = Bill::pluck('created_at','id')->all();

        return view('tests.edit', compact('test','patients','doctors','bills'));
    }

    /**
     * Update the specified test in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $test = Test::findOrFail($id);
            $test->update($data);

            return redirect()->route('tests.test.index')
                ->with('success_message', 'Test was successfully updated.');

    }

    /**
     * Remove the specified test from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $test = Test::findOrFail($id);
            $test->delete();

            return redirect()->route('tests.test.index')
                ->with('success_message', 'Test was successfully deleted.');
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
                'test_name' => 'string|min:1|nullable',
            'patient_id' => 'nullable',
            'doctor_id' => 'nullable',
            'bill_id' => 'nullable',
            'test_date' => 'date_format:j/n/Y|nullable',
            'test_result' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
