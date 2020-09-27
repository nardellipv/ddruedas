<?php

namespace App\Http\Controllers\User;

use App\Accessory;
use App\Brand;
use App\Category;
use App\Http\Requests\AccessoryNewRequest;
use App\Http\Requests\AccessoryUpdateRequest;
use App\Pattern;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Helper;

class ActionAccessoriesController extends Controller
{
    public function selectPattern()
    {
        $patternsFilter = request()->input(['marca']);

        $brandName = Brand::where('id', $patternsFilter)
            ->first();

        $patterns = Pattern::where('brand_id', $patternsFilter)
            ->get();

        $categories = Category::all();

        return view('web.dealer.publicNewAccessory', compact('categories', 'brandName', 'patterns'));
    }

    public function publicNewAccessory(AccessoryNewRequest $request)
    {
        //dd($request->all());
        $userId = Auth::user()->id;

        //creamos carpeta
        $path = 'users/' . $userId;

        makeFolder();


        $accessory = Accessory::create([
            'brand_id' => $request['brand'],
            'pattern_id' => $request['pattern'],
            'condition' => $request['condition'],
            'category_id' => $request['category'],
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['comment'],
            'user_id' => Auth::user()->id,
        ]);

        if (count($request->files) > 0) {
            $image = $request->file('files');
            $input['photo700'] = '700x700-' . $userId . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(700, 700)->save($path . '/images/accessory/' . $input['photo700'], 50);

            $accessory->picture = Str::after($input['photo700'], '-');
        }

        $accessory->save();


        $listAccesories = Accessory::with(['category'])
            ->where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        notify()->success('Un administrador validará la publicación.', 'Publicación Correcta');
        return redirect()->route('dashboard.listAccesories', compact('listAccesories'));
    }

    public function show($id)
    {
        $accessory = Accessory::find($id);

        $brands = Brand::all();

        $categories = Category::all();

        return view('web.dealer.editAccessory', compact('accessory', 'categories', 'brands'));
    }

    public function selectPatternEdit()
    {
        $patternsFilter = request()->input(['marca']);
        $accessoryFilter = request()->input(['accesorio']);

        $accessory = Accessory::where('id', $accessoryFilter)
            ->first();

        $brandName = Brand::where('id', $patternsFilter)
            ->first();

        $patterns = Pattern::where('brand_id', $patternsFilter)
            ->get();

        $brands = Brand::all();

        $categories = Category::all();

        return view('web.dealer.editAccessory', compact('categories', 'brandName', 'patterns', 'accessory', 'brands'));
    }

    public function update(AccessoryUpdateRequest $request, $id)
    {
        $accessory = Accessory::find($id);

        $accessory->brand_id = $request['brand'];
        $accessory->pattern_id = $request['pattern'];
        $accessory->condition = $request['condition'];
        $accessory->category_id = $request['category'];
        $accessory->name = $request['name'];
        $accessory->price = $request['price'];
        $accessory->description = $request['comment'];
        $accessory->save();

        $path = 'users/' . $accessory->user_id;

        if (count($request->files) > 0) {
            $image = $request->file('files');
            $input['photo700'] = '700x700-' . $accessory->user_id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(700, 700)->save($path . '/images/accessory/' . $input['photo700'], 50);

            $accessory->picture = Str::after($input['photo700'], '-');
        }

        $accessory->save();


        $listAccesories = Accessory::with(['category'])
            ->where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        notify()->success('El accesorio se actualizó correctamente.', 'Actualización Correcta');
        return redirect()->route('dashboard.listAccesories', compact('listAccesories'));
    }

    public function deleteAccessory($id)
    {
        $accessory = Accessory::find($id);
        File::delete('users/' . $accessory->user_id . '/images/accessory/700x700-' . $accessory->picture);
        $accessory->delete();

        $listAccesories = Accessory::with(['category'])
            ->where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();


        notify()->success('La publicación fue eliminada con éxito.', 'Publicación Eliminada');
        return redirect()->route('dashboard.listAccesories', compact('listAccesories'));
    }

    public function deleteFile($id)
    {
        $accessory = Accessory::find($id);

        File::delete('users/' . $accessory->user_id . '/images/accessory/700x700-' . $accessory->picture);

        $accessory->picture = NULL;
        $accessory->save();

        notify()->success('Imágen eliminada. Recomendamos incluir imágenes en sus publicaciones.', 'Actualización Correcta');
        return back();
    }
}
