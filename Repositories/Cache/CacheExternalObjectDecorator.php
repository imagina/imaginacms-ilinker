<?php

namespace Modules\Ilinker\Repositories\Cache;

use Modules\Ilinker\Repositories\ExternalObjectRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheExternalObjectDecorator extends BaseCacheCrudDecorator implements ExternalObjectRepository
{
    public function __construct(ExternalObjectRepository $externalobject)
    {
        parent::__construct();
        $this->entityName = 'ilinker.externalobjects';
        $this->repository = $externalobject;
    }
}
