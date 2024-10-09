<?php

namespace Modules\Ilinker\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Ilinker\Entities\ExternalObjectMapping;
use Modules\Ilinker\Repositories\ExternalObjectMappingRepository;

class ExternalObjectMappingApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(ExternalObjectMapping $model, ExternalObjectMappingRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
