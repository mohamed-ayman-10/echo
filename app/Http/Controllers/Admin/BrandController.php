<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Auth\Events\Authenticated;

class BrandController extends Controller
{

    public function index()
    {
        $models = Brand::all();
        return view('admin.pages.brand.index', compact('models'));
    }

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

    public function destroy(string $id)
    {
        Brand::destroy($id);
        return back()->with('success', __('Deleted Successfully!'));
    }
}
