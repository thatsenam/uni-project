<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialize;
use Exception;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

    /**
     * Display a listing of the doctors.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $doctors = Doctor::with('specialize')->paginate(25);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $specializes = Specialize::pluck('name', 'id')->all();

        return view('doctors.create', compact('specializes'));
    }

    /**
     * Store a new doctor in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $data = $this->getData($request);

        Doctor::create($data);

        return redirect()->route('doctors.doctor.index')
            ->with('success_message', 'Doctor was successfully added.');

    }

    /**
     * Display the specified doctor.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $doctor = Doctor::with('specialize')->findOrFail($id);

        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified doctor.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $specializes = Specialize::pluck('name', 'id')->all();

        return view('doctors.edit', compact('doctor', 'specializes'));
    }

    /**
     * Update the specified doctor in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($data);

        return redirect()->route('doctors.doctor.index')
            ->with('success_message', 'Doctor was successfully updated.');

    }

    /**
     * Remove the specified doctor from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();

            return redirect()->route('doctors.doctor.index')
                ->with('success_message', 'Doctor was successfully deleted.');
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
            'age' => 'numeric|nullable',
            'gender' => 'nullable|string|min:0',
            'phone' => 'nullable|string|min:0',
            'email' => 'nullable',
            'password' => 'nullable',
            'fee' => 'nullable|string|min:0',
            'specialize_id' => 'nullable',
            'address' => 'nullable|string|min:0',
            'file' => ['file', 'nullable'],
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_file')) {
            $data['file'] = null;
        }
        if ($request->hasFile('file')) {
            $data['file'] = $this->moveFile($request->file('file'));
        }

        return $data;
    }

    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
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
