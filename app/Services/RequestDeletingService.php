<?php

namespace App\Services;

use App\Models\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class RequestDeletingService
{
    /**
     * @param int $requestId
     * @return string|void
     */
    public function delete(int $requestId)
    {
        DB::beginTransaction();

        try {
            Request::where('id', $requestId)->delete();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }
    }
}