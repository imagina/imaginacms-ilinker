<?php

namespace Modules\Ilinker\Entities;

use Illuminate\Database\Eloquent\Model;

class ExternalObjectTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ilinker__externalobject_translations';
}
