<?php

namespace App\Jobs;
use Spatie\Image\Image as SpatieImage;
use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $article_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
      $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }
        $srcPath = storage_path('app/public/'.$i->path);
        $image= file_get_contents($srcPath);
        putenv('GOOGLE_APPLICATION_CREDENTIALS='. base_path('google_credential.json'));

        $image = SpatieImage::load($srcPath);

        
        $image->watermark(base_path('resources/img/icon.png'))
        ->watermarkPosition(Manipulations::POSITION_CENTER)
        ->watermarkOpacity(40)
        ->watermarkHeight(140, Manipulations::UNIT_PIXELS) 
        ->watermarkWidth(150, Manipulations::UNIT_PIXELS)
        ->watermarkFit(Manipulations::FIT_STRETCH);
        

        $image->save($srcPath);
    }
}
