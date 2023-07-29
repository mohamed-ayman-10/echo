<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title_ar' => 'required|min:2',
                'title_en' => 'required|min:2',
                'brand_id' => 'required'
            ]);


            CarModel::query()->create($request->except('_token'));

            return back()->with('success', __('Created Successfully!'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $models = CarModel::all();
        return view('admin.pages.model.index', compact('models', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $request->validate([
                'title_ar' => 'required|min:2',
                'title_en' => 'required|min:2',
                'brand_id' => 'required'
            ]);

            CarModel::query()->where('id', $id)->update($request->except('_token', '_method'));

            return back()->with('success', __('Updated Successfully!'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CarModel::destroy($id);
        return back()->with('success', __('Deleted Successfully!'));
    }
}
