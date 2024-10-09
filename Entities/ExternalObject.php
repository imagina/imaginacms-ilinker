<?php

namespace Modules\Ilinker\Entities;

use Modules\Core\Icrud\Entities\CrudModel;

class ExternalObject extends CrudModel
{
  protected $table = 'ilinker__external_objects';
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

  protected $fillable = ['external_id', 'category', 'label', 'integration', 'options'];

  protected $casts = [
    'options' => 'array'
  ];
}
