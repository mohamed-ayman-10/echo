<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarSize;
use Illuminate\Http\Request;

class CarSizeController extends Controller
{
    public function index() {
        return view('admin.pages.car-size.index');
    }

    public function store(Request $request) {
        try {

            $request->validate([
                'title_ar' => 'required|string|min:2',
                'title_en' => 'required|string|min:2',
            ]);

            $data = $request->except('_token');

            CarSize::query()->create($data);
            return back()->with('success' , __('Created Successfully!'));

        }catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update(Request $request) {
        try {

            $request->validate([
                'title_ar' => 'required|string|min:2',
                'title_en' => 'required|string|min:2',
                'id' => 'required|string',
            ]);

            $data = $request->except('_token', 'id');

            CarSize::query()->where('id', $request->id)->update($data);
            return back()->with('success' , __('Update Successfully!'));

        }catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($id) {
        CarSize::destroy($id);
        return back()->with('success' , __('Delete Successfully!'));
    }
}
