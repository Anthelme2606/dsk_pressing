<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $articles  = Article::where('status', '=', 1)->orderBy('name')->get();
        return view('articles.index', compact('articles'));
    }

    public function uploadUsers(Request $request)
    {
        // An error occured
        Excel::import(new UsersImport, $request->file);
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }


    public function create(){
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request){

        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'classic_price' => 'required',
            'repass_price' => 'required',
            'express_price' => 'required',
        ]);


        if ($request->hasfile('image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('image')->storeAs('public/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }
        Article::create([
            'name' => $request->name,
            'image' => $fileNameToStore,
            'description' => $request->description,
            'classic_price' => $request->classic_price,
            'repass_price' => $request->repass_price,
            'express_price' => $request->express_price,
            'status' => true
        ]);

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès');
    }

    public function edit(int $id){
        $article = Article::findOrFail($id); //Find article of id = $id
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, int $id)
    {
        $article = Article::findOrFail($id);

        $article->name = $request->name;
        $article->description = $request->description;
        $article->classic_price = $request->classic_price;
        $article->repass_price = $request->repass_price;
        $article->express_price = $request->express_price;

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article édité avec succès');
    }

    public function show($id)
    {
        return redirect()->route("articles.index");
    }

    public function destroy(int $id){
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }

}
