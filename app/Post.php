<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    protected $fillable = [
        'title', 'content', 'iframe', 'image', 'user_id', 'category_id', 'status'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getGetExcerptAttribute(){
        return substr($this->content, 0, 150);
    }

    public function getGetImageAttribute(){
        if($this->imagen){
            return url("storage/$this->imagen");
        }
    }
}
