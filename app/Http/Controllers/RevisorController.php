<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        // whereNot("user_id", Auth::user()->id)->    //! da mettere a riga 17 dopo Article::
        $article_to_check = Article::where('is_accepted', null)->first();
        $latest_article = Article::where('is_accepted', "!=", null)->latest()->first();
        return view('revisor.index', compact('article_to_check', 'latest_article'));

    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
        ->back()
        ->with('message',"Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
        ->back()
        ->with('message',"Hai rifiutato l'articolo $article->title");
    }

    public function formRevisor(){
        return view("revisor.form");
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Complimenti, Hai richiesto di diventare revisor');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function rollback(Article $article)
    {
        $article->setAccepted(null);
        return redirect()
        ->back()
        ->with('message',"Hai annullato l'articolo $article->title");
    }
}