<?php

namespace App\Models\News;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'slug'
    ];

    public function postedAt() : Attribute
    {
        return new Attribute(
            get: fn()=> ucwords(Carbon::parse($this->created_at)->isoFormat('dddd, d')).' de '.ucwords(Carbon::parse($this->created_at)->isoFormat('MMMM YYYY'))
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post-images')
            ->useFallbackUrl('https://www.flaticon.com/free-icons/no-photo');
    }

    public function scopeSearch($query, $term) : void
    {
        if($term) {
            $query->where('id', 'like', '%' . $term . '%')
                  ->orWhere('title', 'like', '%' . $term . '%')
                  ->orWhere('subtitle', 'like', '%' . $term . '%');
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
