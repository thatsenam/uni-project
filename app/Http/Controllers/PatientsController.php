<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Exception;

class PatientsController extends Controller
{

    /**
     * Display a listing of the patients.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $patients = Patient::paginate(25);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('patients.create');
    }

    /**
     * Store a new patient in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            Patient::create($data);

            return redirect()->route('patients.patient.index')
                ->with('success_message', 'Patient was successfully added.');

    }

    /**
     * Display the specified patient.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified patient.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);


        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified patient in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $patient = Patient::findOrFail($id);
            $patient->update($data);

            return redirect()->route('patients.patient.index')
                ->with('success_message', 'Patient was successfully updated.');

    }

    /**
     * Remove the specified patient from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->delete();

            return redirect()->route('patients.patient.index')
                ->with('success_message', 'Patient was successfully deleted.');
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
                'name' => 'string|min:1|max:255|nullable',
            'age' => 'numeric|nullable',
            'gender' => 'string|min:1|nullable',
            'phone' => 'string|min:1|nullable',
            'address' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }

        return $data;
    }


    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }


        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
