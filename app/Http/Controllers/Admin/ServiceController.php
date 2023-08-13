<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;
use App\Models\Material;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.pages.services.index');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'title_ar' => 'required|string|min:2',
                'title_en' => 'required|string|min:2',
                'price' => 'required|string',
                'car_size_id' => 'required',
                'duration' => 'required',
                'week' => 'required',
                'count' => 'required'
            ]);

            $data = $request->except('_token', 'images');
            $service = Service::query()->create($data);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $material = new Material();
                    $material->image = UploadImage::uploadImage('images/materials', $image);
                    $material->service_id = $service->id;
                    $material->save();
                }
            }
            DB::commit();
            return back()->with('success', __('Created Successfully!'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'title_ar' => 'required|string|min:2',
                'title_en' => 'required|string|min:2',
                'price' => 'required|string',
                'car_size_id' => 'required',
                'id' => 'required',
            ]);

            $data = $request->except('_token', 'id');

            Service::query()->where('id', $request->id)->update($data);

            return back()->with('success', __('Updated Successfully!'));
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return back()->with('success', __('Deleted Successfully!'));
    }
}
