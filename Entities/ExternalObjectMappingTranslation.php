<?php

namespace Modules\Ilinker\Entities;

use Illuminate\Database\Eloquent\Model;

class ExternalObjectMappingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ilinker__externalobjectmapping_translations';
}
