<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class PagingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Builder::macro('paging', function ($perPage, $pageNumber) {
            $paged = $this->paginate($perPage, ['*'], 'page', $pageNumber);
            $data = [
                'pagination' => [
                    'total' => $paged->total(),
                    'per_page' => $paged->perPage(),
                    'current_page' => $paged->currentPage(),
                    'last_page' => $paged->lastPage(),
                    'from' => $paged->firstItem(),
                    'to' => $paged->lastItem(),
                ],
                'data' => $paged->items(),
            ];

            return $data;
        });
    }
}
