<?php

namespace App\Services;

use App\Mail\OrderShipped;
use App\Models\Request as RequestModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

/**
 * Class AdminRequestSendingService
 * @package App\Http\Services
 */
class AdminRequestSendingService
{
    /**
     * @param int $requestId
     * @param int $userId
     * @param string $answer
     * @return string|void
     */
    public function send(int $requestId, int $userId, string $answer)
    {
        DB::beginTransaction();

        try {
            RequestModel::query()->where('id', '=', $requestId)->update([
                'user_id' => $userId,
                'status' => RequestModel::STATUS_ANSWER,
                'answer' => $answer,
            ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        $request = DB::table('requests')->where('id', $requestId)->first();
        $userEmail = DB::table('users')->select('email')->where('id', $userId)->first();

        Mail::to($userEmail)->send(new OrderShipped($request));
    }
}
