<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Exception;

class StudentsController extends Controller
{

    /**
     * Display a listing of the students.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $students = Student::paginate(25);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('students.create');
    }

    /**
     * Store a new student in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            Student::create($data);

            return redirect()->route('students.student.index')
                ->with('success_message', 'Student was successfully added.');

    }

    /**
     * Display the specified student.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);


        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $student = Student::findOrFail($id);
            $student->update($data);

            return redirect()->route('students.student.index')
                ->with('success_message', 'Student was successfully updated.');

    }

    /**
     * Remove the specified student from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            return redirect()->route('students.student.index')
                ->with('success_message', 'Student was successfully deleted.');
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
            'phone' => 'string|min:1|nullable',
            'address' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
            'roll_number' => 'numeric|nullable',
            'is_active' => 'boolean|nullable',
            'gender' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }
        $data['is_active'] = $request->has('is_active');

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
