<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    //CRUD for artikler
    //Kan autogeneres med "php artisan make:controller NavnpåController -r -m
    //Med ovenstående får du samtidig linket eller oprettet den tilhørende model

    public function index(){

        //Viser alle objekter - i dette tilfælde artikler

        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }


    public function show(Article $article)
    {
        //Viser et specifikt objekt - i dette tilfælde en artikel valgt med id

        return view('articles.show', ['article' => $article]);
    }

    public function create(){
        //Opret et nyt objekt - en artikel

        return view('articles.create', [
//            'tags' => Tag::all()
        ]);
    }

    public function store(){
        //validation
        Article::create($this->validateArticle());

        return redirect(route('articles.index'));
    }

    public function edit(Article $article){
        //Viser et eksisterende objekt og giver mulighed for at redigere denne.
        return view('articles.edit', compact('article')); //['article' => $article]) alternativ til compact
    }

    public function update(Article $article){
        //validation og gemmer i DB
        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));
//        return redirect($article->path()); //cleaner
    }

    public function destroy()
    {
        //Sletter det valgte objekt fra DB

    }

    protected function validateArticle(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }


}
