<?php

namespace App\Http\Livewire;
use App\Models\Leaderboard;
use App\Models\Article;
use App\Models\Score;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class GetVote extends Component
{   
    public $article;
    public $score;
    public $article_id;
    public $vote;
    private $user_id; 
    public $record;
    public $voters;
    public $average;
    public $sum;

    use WithFileUploads;
    protected $rules = [
        'vote' => 'required'
    ];
    // protected $messages = [
    //     '*.required' => 'Il campo è obbligatorio.'
    // ];
    public function store()
    {

        $this->validate();
        $score = Score::create(
            [
                'vote' => $this->vote,
                'article_id' => $this->article_id,
                'user_id' => Auth::id()
            ]
        );
        $score->user()->associate(Auth::user());
        $this->score = $score;
        $this->score->save();

        $leader = Leaderboard::all();
        $article=Article::where('id',$this->article_id);
        if(count($leader->where('article_id', $this->article_id))==0) {
           $this->record = Leaderboard::create(
            [
                'article_id'=>$this->article_id,
                'voters'=>1,
                'average'=>$this->vote
            ]
            );
            $this->record->save();
        }else {
            $this->record=Leaderboard::where('article_id', $this->article_id)->first();
            $sumArray= Score::where('article_id', $this->article_id)->get();
            
            $this->sum = 0;
            foreach ($sumArray as $element) {
            $this->sum += $element->vote;
            
            }
            
            $this->voters=($this->record->voters)+1;
            $this->average=round($this->sum/$this->voters,1);
            
            $this->record->update([
                'article_id'=>$this->article_id,
                'voters'=>$this->voters,
                'average'=>$this->average
            ]);
            $this->record->save();
        }

        $this->article= Article::where('id',$this->article_id)->first();
        $article = $this->article;
        
        redirect(route('show',compact('article')));
    }

    public function render()
    {
        return view('livewire.get-vote');
    }
}
