<?php

namespace Modules\Ilinker\Repositories\Cache;

use Modules\Ilinker\Repositories\ExternalObjectMappingRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheExternalObjectMappingDecorator extends BaseCacheCrudDecorator implements ExternalObjectMappingRepository
{
    public function __construct(ExternalObjectMappingRepository $externalobjectmapping)
    {
        parent::__construct();
        $this->entityName = 'ilinker.externalobjectmappings';
        $this->repository = $externalobjectmapping;
    }
}
