<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Exception;

class MedicinesController extends Controller
{

    /**
     * Display a listing of the medicines.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $medicines = Medicine::paginate(25);

        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new medicine.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('medicines.create');
    }

    /**
     * Store a new medicine in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Medicine::create($data);

            return redirect()->route('medicines.medicine.index')
                ->with('success_message', 'Medicine was successfully added.');

    }

    /**
     * Display the specified medicine.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);

        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified medicine.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        

        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified medicine in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $medicine = Medicine::findOrFail($id);
            $medicine->update($data);

            return redirect()->route('medicines.medicine.index')
                ->with('success_message', 'Medicine was successfully updated.');

    }

    /**
     * Remove the specified medicine from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $medicine = Medicine::findOrFail($id);
            $medicine->delete();

            return redirect()->route('medicines.medicine.index')
                ->with('success_message', 'Medicine was successfully deleted.');
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
            'price' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
