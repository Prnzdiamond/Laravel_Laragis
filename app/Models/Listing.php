<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['list_title','logo','tags','company','description','location','email','website'];

    public function scopeTagfilter($query, $arr){
        if(!empty($arr['tag'])){
       return $query->where('tags', 'like','%'.$arr['tag'].'%');
    }
    if(!empty($arr['search'])){
        $s_q = $arr['search'];
        return $query->where('list_title','like','%'.$s_q.'%')
        ->orwhere('description', 'like', '%'. $s_q.'%')
        ->orwhere('tags','like','%'. $s_q.'%');
    }
}}
