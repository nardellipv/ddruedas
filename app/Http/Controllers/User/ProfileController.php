<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ProfileUpdateRequest;
use App\Province;
use App\Region;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $profile = User::where('id', Auth::user()->id)
            ->first();

        $provinces = Province::all();

        $regions = Region::where('province_id', $profile->province_id)
            ->get();

        return view('web.user.profile', compact('profile', 'provinces', 'regions'));
    }

    public function updateProvince()
    {
        $provinces = Province::all();

        $provinceId = request()->input(['provincia']);
        $userId = request()->input(['usuario']);

        $profile = User::find($userId);

        if ($provinceId) {
            $regions = Region::where('province_id', $provinceId)
                ->get();

            $provinceName = Province::where('id', $provinceId)
                ->first();
        }

        return view('web.user.profile', compact('provinces', 'regions', 'provinceName', 'profile'));
    }

    public function updateProfile(ProfileUpdateRequest $request, $id)
    {
        if ($request->phoneWsp) {
            $phoneWsp = 1;
        } else {
            $phoneWsp = 0;
        }

        $profile = User::find($id);
        $profile->name = $request['name'];
        $profile->lastname = $request['lastname'];
        $profile->email = $request['email'];
        $profile->phone = $request['phone'];
        $profile->phoneWsp = $phoneWsp;
        $profile->province_id = $request['province'];
        $profile->region_id = $request['region'];

        $profile->save();


        if ($request->current_password) {
            if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
                notify()->error('La actual contraseña no coicide con la que introdujo.', 'Error al cambiar contraseña');
                return back();
            }

            if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {

                notify()->error('La nueva contraseña es igual a la introducida, por favor introduzca otra contraseña.', 'Error al cambiar contraseña');
                return back();
            }

            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|string|min:8',
            ], [
                'current_password.required' => 'El campo contraseña es requerido',
                'new_password.min' => 'La contraseña debe tener un mínimo de 8 caracteres',
                'new_password.required' => 'La nueva contraseña es requerida',
            ]);

            if ((Hash::check($request->get('current_password'), Auth::user()->password))) {

                $user = Auth::user();
                $user->password = bcrypt($request->get('new_password'));
                $user->save();
            }


            notify()->success('Se modificó la contraseña correctamente.', 'Cambio de contraseña');
            return back();
        }

        notify()->success('Se modificó correctamente su perfil.', 'Actualización de perfil');
        return back();

    }
}
