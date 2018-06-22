<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeWithOrder($query, $order){
        if($order == 'rencent'){
            $query->rencent();
        }else{
            $query->rencentReplied();
        }

        return $query->with('user', 'category');
    }

    public function scopeRencent($query){
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeRencentReplied($query){
        return $query->orderBy('updated_at', 'desc');
    }

    public function link($params=[]){
        return route( 'topics.show', array_merge( [$this->id, $this->slug], $params ) );
    }
}
