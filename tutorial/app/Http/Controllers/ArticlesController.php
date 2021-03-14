<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    //CRUD for artikler
    //Kan autogeneres med "php artisan make:controller NavnpåController -r -m
    //Med ovenstående får du samtidig linket eller oprettet den tilhørende model
    public function index() {
        //Viser alle objekter - i dette tilfælde artikler

        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id) {
        //Viser et specifikt objekt - i dette tilfælde en artikel valgt med id
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create(){
        //Opret et nyt objekt - en artikel
        Return view('articles.create');
    }

    public function store(){
        //validation

        //Gemmer den nye artikel i DB
        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id){
        $article = Article::find($id);

        //Viser et eksisterende objekt og giver mulighed for at redigere denne.
        return view('articles.edit', compact('article')); // ['article' => $article]) alternativ til compact
    }

    public function update($id){
        //Gemmer det opdaterede objekt i DB
        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    public function destroy(){
        //Sletter det valgte objekt fra DB

    }




}
