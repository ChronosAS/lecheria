<?php

namespace App\Models;

use App\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Citizen extends Model
{
    use HasFactory;
    use HasUuid;

    protected $guarded = ['id','uuid'];

    public function age(): Attribute
    {
        return new Attribute (
            get: fn() => Carbon::parse($this->birthdate)->age
        );
    }

}
