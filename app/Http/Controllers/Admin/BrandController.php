<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Auth\Events\Authenticated;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Brand::all();
        return view('admin.pages.brand.index', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'title_ar' => 'required|min:2',
                'title_en' => 'required|min:2',
            ]);

            Brand::query()->create($request->except('_token'));

            return back()->with('success', __('Created Successfully!'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
            ]);

            Brand::query()->where('id', $id)->update($request->except('_token', '_method'));

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
        Brand::destroy($id);
        return back()->with('success', __('Deleted Successfully!'));
    }
}
