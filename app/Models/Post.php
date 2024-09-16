<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    public $timestamps = true;
    protected $primaryKey = "id";
    public $incrementing = true;
    

    protected $fillable = [
        "title",
        "body",
        'category_id'
    ];

    public function category(): BelongsTo{
        return $this->belongsTo(Categories::class, "category_id");
    }

}
