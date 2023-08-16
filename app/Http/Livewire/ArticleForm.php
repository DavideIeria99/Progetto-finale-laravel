<?php

namespace App\Http\Livewire;

use App\Jobs\AddWatermark;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Article;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArticleForm extends Component
{
    public $article;
    public $name;
    public $price;
    public $description;
    public $genre_id;
    public $images = [];
    public $temporary_images;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'description' => 'required|max:255',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'temporary_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'genre_id' => 'required',

    ];

    // protected $messages = [
    //     '*.required' =>,
    //     'price.min' => 'Il prezzo non può essere negativo',
    //     'images.image' => 'deve  contenere un immagine',
    //     'temporary_images.*.image' => 'il file deve essere un immagine',
    //     'images.max' => 'il file deve essere di massimo 1MB',
    //     'temporary_image.*.max' => 'il file deve essere di massimo 1MB',
    // ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function store()
    {

        $this->validate();
        $article = Article::create(
            [
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description,
                'genre_id' => $this->genre_id,
                'user_id' => Auth::id()
            ]
        );


        $article->user()->associate(Auth::user());
        $this->article = $article;
        $this->article->save();
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                //    $this->article->images()->create(['path'=>$image->store('images','public')]);
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new AddWatermark($newImage->id),
                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage ($newImage->id),  
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->reset();
        redirect(route('create'))->with('message', __('alert.articolo aggiunto'));
    }
    public function render()
    {
        return view('livewire.article-form');
    }
}
