<?php

namespace App\Services;

use App\Models\Request;
use Illuminate\Support\Collection;

class RequestsGettingService
{
    /**
     * @param string|null $status
     * @param string|null $date
     * @return Collection
     */
    public function getRequests(string $status = null, string $date = null): Collection
    {
        //$date ??= 'desc';

        if ($status === 'all') {
            $requests = Request::orderBy('created_at', $date)->get();
        } else {
            $requests = Request::query()->where('status', $status)->orderBy('created_at', $date)->get();
        }

        return $requests;
    }
}
