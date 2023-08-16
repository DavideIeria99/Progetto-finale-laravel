<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisorMail;
use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    //rotta per portare l'utente alla pagina revisore 
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        $image = Image::all();
        return view('revisor.index', compact('article_to_check', 'image'));
    }
    // pusanti di accettazione articolo
    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('messageRev', __('alert.articolo accettato'));
    }
    // pusanti di rifiuto articolo
    public function rifuteArticle(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('messageRev', __('alert.articolo non accettato'));
    }
    //pulsante di articolo annullato-dentro
    public function old(Article $article)
    {
        $article = Article::orderBy('id', 'desc')->where('is_accepted', true)->orWhere('is_accepted', false)->first();
        $article->setAccepted(null);
        return redirect()->back()->with('message',__('alert.articolo annullato'));
    }

    //pulante di ultimo articolo-fuori
    public function old_article()
    {
        $article_to_check = Article::orderBy('id', 'desc')->first();
        $article_to_check->setAccepted(null);
        return redirect()->back()->with('message', __('alert.articolo annullato') );
    }

    //Richiesta per diventare Revisor

    public function becomeRevisor(Request $request)
    {
        $description = $request->description;
        Mail::to('colicaStore@noReply.com')->send(new BecomeRevisorMail(Auth::user(),$description));
        return redirect('/')->with('message', __('alert.Richiesta revisore'));
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect('/')->with('message', __('alert.Revisore'));
    }
}
