<?php

namespace Guagualai\QueryBuilderHelper;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;

/**
 * Class SQL Helper
 */
class SqlHelper
{
    /**
     * Get SQL with bindings.
     *
     * @param Builder|EloquentBuilder $queryBuilder
     * @return string
     */
    public static function getWithBindings($queryBuilder): string
    {
        $sql = $queryBuilder->toSql();
        $bindings = $queryBuilder->getBindings();

        return preg_replace_callback('/\?/', function () use ($sql, &$bindings) {
            return json_encode(array_shift($bindings));
        }, $sql);
    }
}