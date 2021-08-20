<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Relations\Pivot;
use Rennokki\QueryCache\Traits\QueryCacheable;

class BasePivot extends Pivot
{
    use QueryCacheable;

    public $cacheFor = 3600;

    protected static $flushCacheOnUpdate = true;

    public $timestamps = false;
}
