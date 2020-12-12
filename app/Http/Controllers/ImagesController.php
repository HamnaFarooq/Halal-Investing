<?php

namespace App\Http\Controllers;

use App\images;
use Auth;
use File;
use Illuminate\Http\Request;
use Validator;

class imagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // if user is not admin go to home
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'research_id' => 'required',
                    'name' => 'unique:images|string|max:40',
                    'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1014',
                ]);

                $fileName = $validated['name'] . '.' . request()->image->extension();
                request()->image->move(public_path('uploads'), $fileName);

                $file = images::create([
                    'research_id' => $request->research_id,
                    'name' => $fileName,
                    'image' => "/uploads/" . $fileName,
                ]);
                return redirect()->back();
            }
            dd("Image is invalid");
        }
        dd("Image not recieved");
        return redirect()->back();
        // abort(500, 'Could not upload image :(');
        // $extension = $request->image->extension();
        // $url = "storage/".$validated['name'].".".$extension;
        // $request->image->storeAs('public/', $validated['name'].".".$extension);
        // return response()->json(['success'=>'You have successfully upload file.']);
    }

    public function destroy($id)
    {
        $img = Images::where('id', $id)->first();
        File::delete(public_path() . $img->image);
        $img->delete();
        return redirect()->back();
    }
}
