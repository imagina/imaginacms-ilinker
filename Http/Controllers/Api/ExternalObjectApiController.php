<?php

namespace Modules\Ilinker\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Ilinker\Entities\ExternalObject;
use Modules\Ilinker\Repositories\ExternalObjectRepository;

class ExternalObjectApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(ExternalObject $model, ExternalObjectRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
