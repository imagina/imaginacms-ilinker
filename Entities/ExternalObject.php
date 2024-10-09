<?php

namespace Modules\Ilinker\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class ExternalObject extends CrudModel
{
  use Translatable;

  protected $table = 'ilinker__externalobjects';
  public $transformer = 'Modules\Ilinker\Transformers\ExternalObjectTransformer';
  public $repository = 'Modules\Ilinker\Repositories\ExternalObjectRepository';
  public $requestValidation = [
      'create' => 'Modules\Ilinker\Http\Requests\CreateExternalObjectRequest',
      'update' => 'Modules\Ilinker\Http\Requests\UpdateExternalObjectRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public $translatedAttributes = [];
  protected $fillable = [];
}
