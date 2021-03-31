<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Task extends Model
{
    use Sluggable;
    protected $table =  "tasks";

    protected $fillable = [
        'title', 'body', 'iframe', 'image', 'user_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class); //una tarea pertenece a un solo usuario
    }

    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0, 140);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }
}
