<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $date;
    public $slug;
    public $excerpt;
    public $body;
    public $image;

    public function __construct($title, $slug, $excerpt, $date, $image, $body)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->excerpt=$excerpt;
        $this->date=$date;
        $this->image=$image;
        $this->body=$body;

    }


    public static function all(){


        return cache()->rememberForever('posts-all',function (){
            $files= File::files(resource_path("posts"));
            return collect($files)
                ->map(function ($file){

                    $document = YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->slug,
                        $document->excerpt,
                        $document->date,
                        $document->image,
                        $document->body()
                    );
                })->sortBy('date');
        });




//    $posts = array_map(function ($file){
//        $document = YamlFrontMatter::parseFile($file);
//         return new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->image,
//            $document->body()
//        );
//    },$files);

//    $document=[];
//    foreach ($files as $file){
//        $document=YamlFrontMatter::parseFile($file);
//        $posts[]= new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->image,
//            $document->body()
//        );
//    }
//       $files= File::files(resource_path("/posts"));
//       return array_map(function ($file){
//           return $file->getContents();
//       },$files);
    }



    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);

    }
    public static function findOrFail($slug)
    {
        $posts = static::find($slug);
        if(! $posts){
            throw new ModelNotFoundException();
        }
        else{
            return $posts;
        }
    }
////        base_path();
////        app_path();
////        resource_path();
//
////        $path = __DIR__ . "/../../resources/posts/$slug.html";
//        $path =resource_path("posts/$slug.html");;
////        if (!file_exists($path)) {
//////            abort(404);
//////            return redirect("/");
////            throw new ModelNotFoundException();
////        }
//
//
////        return  cache()->remember("posts.{$slug}", '1200', function () use ($path) {
//////        var_dump("file_get_contant is used");
////            return file_get_contents($path);
////        });
//        return $post= cache()->remember("posts.{$slug}", '10',fn()=>file_get_contents($path));


}
