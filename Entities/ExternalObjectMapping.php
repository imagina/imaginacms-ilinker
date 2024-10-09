<?php

namespace Modules\Ilinker\Entities;

use Modules\Core\Icrud\Entities\CrudModel;

class ExternalObjectMapping extends CrudModel
{
  protected $table = 'ilinker__external_object_mappings';
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
  protected $fillable = ['entity_type', 'entity_id', 'external_object_id'];

  public function externalObject()
  {
    return $this->hasOne(ExternalObject::class, 'external_object_id');
  }
}
