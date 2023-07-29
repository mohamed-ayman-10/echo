<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->first();
        return view('admin.pages.setting.index', compact('setting'));
    }

    public function storeAndUpdate(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'email' => 'required|string|email',
                'phone' => 'required',
                'whatsapp' => 'required|string',
            ]);

            $logo = '';
            $favicon = '';


            if ($request->file('logo')) {
                $logo = Storage::disk('public_path')->put('images/settings/logo-', $request->file('logo'));
            }
            if ($request->file('favicon')) {
                $favicon = Storage::disk('public_path')->put('images/settings/favicon-', $request->file('favicon'));
            }


            if (Setting::query()->count() == 0) {

                $setting = new Setting();
                $setting->title = $request->title;
                $setting->email = $request->email;
                $setting->phone = $request->phone;
                $setting->whatsapp = $request->whatsapp;
                if ($request->file('logo')) {
                    $setting->logo = $logo;
                }
                if ($request->file('favicon')) {
                    $setting->favicon = $favicon;
                }
                $setting->save();
                return back()->with('success', 'Created Successfully!');

            } elseif (Setting::query()->count() > 0) {
                $setting = Setting::query()->first();
                $setting->title = $request->title;
                $setting->email = $request->email;
                $setting->phone = $request->phone;
                $setting->whatsapp = $request->whatsapp;
                if ($request->file('logo')) {
                    Storage::disk('public_path')->delete($setting->logo);
                    $setting->logo = $logo;
                }
                if ($request->file('favicon')) {
                    Storage::disk('public_path')->delete($setting->favicon);
                    $setting->favicon = $favicon;
                }
                $setting->save();
                return back()->with('success', __('Updated Successfully!'));
            }

        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
