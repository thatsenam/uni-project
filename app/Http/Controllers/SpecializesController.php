<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Specialize;
use Illuminate\Http\Request;
use Exception;

class SpecializesController extends Controller
{

    /**
     * Display a listing of the specializes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $specializes = Specialize::paginate(25);

        return view('specializes.index', compact('specializes'));
    }

    /**
     * Show the form for creating a new specialize.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('specializes.create');
    }

    /**
     * Store a new specialize in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Specialize::create($data);

            return redirect()->route('specializes.specialize.index')
                ->with('success_message', 'Specialize was successfully added.');

    }

    /**
     * Display the specified specialize.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $specialize = Specialize::findOrFail($id);

        return view('specializes.show', compact('specialize'));
    }

    /**
     * Show the form for editing the specified specialize.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $specialize = Specialize::findOrFail($id);
        

        return view('specializes.edit', compact('specialize'));
    }

    /**
     * Update the specified specialize in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $specialize = Specialize::findOrFail($id);
            $specialize->update($data);

            return redirect()->route('specializes.specialize.index')
                ->with('success_message', 'Specialize was successfully updated.');

    }

    /**
     * Remove the specified specialize from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $specialize = Specialize::findOrFail($id);
            $specialize->delete();

            return redirect()->route('specializes.specialize.index')
                ->with('success_message', 'Specialize was successfully deleted.');
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
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
