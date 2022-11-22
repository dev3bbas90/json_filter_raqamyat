<?php
namespace App\Interfaces;
use Illuminate\Support\Collection as Collection2;

use Illuminate\Database\Eloquent\Collection;

interface ProviderInterface
{
    /**
     * List all transactions from all providers (W, X, Y)
     * @param array $request
     * @return Collection
    */
    public function transactions(array $request=[]);

    /**
     * Filter with request collection and return filtered data
     * @param Collection2 $collection
     * @param array $request
     * @return Collection
    */
    public function applyFilter(Collection2 $collection , array $request=[]);


}
