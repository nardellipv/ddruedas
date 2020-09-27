<?php

namespace App\Http\Controllers\User;

use App\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with(['item'])
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('web.user.listFavorite', compact('favorites'));
    }

    public function addFavorite($id)
    {
        $userId = Auth::user()->id;

        $favorite = Favorite::where('item_id', $id)
            ->where('user_id', $userId)
            ->get();

        if (count($favorite) == 0) {
            Favorite::create([
                'item_id' => $id,
                'user_id' => $userId,
            ]);
        } else {
            notify()->success('El item ya lo tienes en tus favoritos, lo podrás ver en tu cuenta.', 'Publicación se encuentra agregada');
            return back();
        }

        notify()->success('El item se agrego a tus favoritos, lo podrás ver en tu cuenta.', 'Publicación Agregada a Favoritos');
        return back();
    }

    public function deleteFavorite($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();

        notify()->success('El item se eliminó del listado de favoritos.', 'Favorito eliminado');
        return back();
    }
}
