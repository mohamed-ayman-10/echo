<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralApi;
use App\Models\Offer;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return view('admin.pages.discount.index', compact('offers'));
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
                'discount' => 'required',
                'service_id' => 'required',
            ]);

            Offer::query()->create($request->except('_token'));

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
        //
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
                'discount' => 'required',
                'service_id' => 'required',
            ]);

            Offer::query()->where('id', $id)->update($request->except('_token', '_method'));

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
        try {

            Offer::destroy($id);

            return back()->with('success', __('Deleted Successfully!'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function offers()
    {
        $offers = Offer::query()->with('service.material', 'service.images', 'service.includes')->get();
        if (count($offers) == 0) {
            return GeneralApi::returnNoContent();
        } else {
            return GeneralApi::returnData(200, 'success', $offers);
        }
    }
}
