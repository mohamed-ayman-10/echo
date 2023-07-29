<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|min:2|max:150',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:6|max:30',
            ]);

            $data = $request->except('_token', 'password');
            $data['password'] = bcrypt($request->password);

            User::query()->create($data);
            return back()->with('success', __('Created Successfully!'));
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|min:2|max:150',
                'email' => 'required|string|email|unique:users,email,' . $request->id,
            ]);

            $data = $request->except('_token', 'password');
            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            User::query()->where('id', $request->id)->update($data);
            return back()->with('success', __('Updated Successfully!'));
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            return back()->with('success', __('Deleted Successfully!'));
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
