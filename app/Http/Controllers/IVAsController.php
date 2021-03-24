<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IVA;
use Illuminate\Http\Request;
use Exception;

class IVAsController extends Controller
{

    /**
     * Display a listing of the i v as.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $iVAs = IVA::paginate(25);

        return view('i_v_as.index', compact('iVAs'));
    }

    /**
     * Show the form for creating a new i v a.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('i_v_as.create');
    }

    /**
     * Store a new i v a in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            IVA::create($data);

            return redirect()->route('i_v_as.i_v_a.index')
                ->with('success_message', 'I V A was successfully added.');

    }

    /**
     * Display the specified i v a.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $iVA = IVA::findOrFail($id);

        return view('i_v_as.show', compact('iVA'));
    }

    /**
     * Show the form for editing the specified i v a.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $iVA = IVA::findOrFail($id);
        

        return view('i_v_as.edit', compact('iVA'));
    }

    /**
     * Update the specified i v a in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $iVA = IVA::findOrFail($id);
            $iVA->update($data);

            return redirect()->route('i_v_as.i_v_a.index')
                ->with('success_message', 'I V A was successfully updated.');

    }

    /**
     * Remove the specified i v a from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $iVA = IVA::findOrFail($id);
            $iVA->delete();

            return redirect()->route('i_v_as.i_v_a.index')
                ->with('success_message', 'I V A was successfully deleted.');
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
            'vat' => 'string|min:1|nullable',
            'note' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
