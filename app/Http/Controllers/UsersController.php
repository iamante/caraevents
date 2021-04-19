<?php

namespace App\Http\Controllers;
use Image;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.user-profile')->with('user', auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => ['sometimes', 'nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $user = auth()->user();

        if ($request->hasFile('avatar'))
        {
            $date = new DateTime();
            $dates = Carbon::parse($date);
            $todayDate = $dates->isoFormat('MMMMYYYY');
            $userFilePath = 'users\\'.$todayDate.'\\';
            $avatar = $request->file('avatar');
            $filename = $userFilePath . time() . '.' . $avatar->getClientOriginalExtension();
            // dd($filename);
            Image::make($avatar)->resize(300,300)->save( public_path('storage/'. $filename));
            
            $user->avatar = $filename;
            $user->save();

            return back();
        }

        $input = $request->except('password', 'password_confirmation');
        

        if (!$request->filled('password'))
        {
            $user->fill($input)->save();

            return back()->with('success_message', 'Profile Updated Successfully!');
        }

            $user->password = bcrypt($request->password);
            $user->fill($input)->save();
            
            return back()->with('success_message', 'Profile and Password Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
