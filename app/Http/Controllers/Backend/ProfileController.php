<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    //visualizar perfil
    public function index()
    {
        return view('admin/profile/index');
    }

    //Atualziar perfil
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048'],
        ]);

        $user = Auth::user();
        if($request->hasFile('image'))
        {
            if(File::exists(public_path($user->image)))
            {
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand() . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "/uploads/" . $imageName;
            $user->image = $path;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Dados atualizados com sucesso!');
        //return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        return redirect()->back();

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Senha atualizada com sucesso!');
        //return redirect()->back()->with('successSenha', 'Senha atualizada com sucesso!');
        return redirect()->back();
    }
}
