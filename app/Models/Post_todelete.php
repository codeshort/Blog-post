<?php

namespace App\Models;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
class Post
{
    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;
     public function __construct($title, $excerpt, $body, $date, $slug)
     {
          $this->title = $title;
          $this->excerpt = $excerpt;
          $this->body = $body;
          $this->date = $date;
          $this->slug = $slug;

     }
    public static function all()
    {
        Cache::forget('posts.all');
        return cache()->remember('posts.all',60,function()
        {
            $files =  File::files(resource_path("posts/"));
            $posts =  collect($files)
            -> map(function($file)
            {
              
                $document =  YamlFrontMatter :: parseFile($file);
                return new Post(
                 $document->title,
                 $document->excerpt,
                 $document->body(),
                 $document->date,
                 $document->slug
               );
            })
            ->sortBy('date');
    
            return $posts;
        });
        
    }
   public static function find($slug)
   {
      $posts = static:: all();
      return $posts->firstWhere('slug',$slug);
   }
}

?>