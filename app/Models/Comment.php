<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vedio;
use App\Models\Reply;
use App\Models\Like;




class Comment extends Model
{
    use HasFactory;


    protected $fillable = ["content", "vedio_id"];

    //Get the vedio that owns the comment.
    public function vedio()
    {
        $this->belongsTo(Vedio::class);
    }

    //Get the replies that owns the comment.

    public function replies()
    {
        $this->hasMany(Reply::class);
    }
    //Get the likes that owns the comment.
    public function likes()
    {
        $this->hasMany(Like::class);
    }
}
