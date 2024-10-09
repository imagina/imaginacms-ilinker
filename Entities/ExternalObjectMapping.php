<?php

namespace Modules\Ilinker\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class ExternalObjectMapping extends CrudModel
{
  use Translatable;

  protected $table = 'ilinker__externalobjectmappings';
  public $transformer = 'Modules\Ilinker\Transformers\ExternalObjectMappingTransformer';
  public $repository = 'Modules\Ilinker\Repositories\ExternalObjectMappingRepository';
  public $requestValidation = [
      'create' => 'Modules\Ilinker\Http\Requests\CreateExternalObjectMappingRequest',
      'update' => 'Modules\Ilinker\Http\Requests\UpdateExternalObjectMappingRequest',
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
