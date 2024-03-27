<?php
namespace App\Models\News;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBulletin extends Model
{
    use HasFactory;

    protected $fillable = [
        'url'
    ];
}

?>
