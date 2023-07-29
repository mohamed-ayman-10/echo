<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceInclude;
use Illuminate\Http\Request;

class IncludeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'title_ar' => 'required',
                'title_en' => 'required',
                'service_id' => 'required',
            ]);

            ServiceInclude::query()->create($request->except("_token"));

            return redirect()->back()->with('success', 'Create Successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $includes = ServiceInclude::query()->where('service_id', $id)->get();
        return view('admin.pages.services.include', compact('includes', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $request->validate([
                'title_ar' => 'required',
                'title_en' => 'required',
            ]);

            ServiceInclude::query()->findOrFail($id)->update($request->except("_token"));

            return redirect()->back()->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ServiceInclude::destroy($id);
        return redirect()->back()->with('success', 'Delete Successfully');
    }
}
