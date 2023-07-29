<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
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
                'images' => 'required',
                'service_id' => 'required'
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = $image->getClientOriginalName();
                    $material = new Material();
                    $material->image = $image->storeAs('images/materiales', $name, 'upload');
                    $material->service_id = $request->service_id;
                    $material->save();
                }
            }

            return back()->with('success', 'Create Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materials = Material::query()->where('service_id', $id)->get();
        return view('admin.pages.services.material', compact('materials', 'id'));
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
                'image' => 'required',
            ]);

            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $material = Material::query()->findOrFail($id);
            Storage::disk('upload')->delete($material->image);
            $material->image = $image->storeAs('images/materiales', $name, 'upload');
            $material->save();

            return back()->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $material = MAterial::query()->findOrFail($id);
            Storage::disk('upload')->delete($material->image);
            $material->delete();

            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
