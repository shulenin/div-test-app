<?php

namespace App\Services;

use App\DTO\UserDataDTO;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class UserDataGettingService
 * @package App\Http\Services
 */
class UserDataGettingService
{
    /**
     * @param int $requestId
     * @return UserDataDTO|string
     */
    public function getUserData(int $requestId)
    {
        DB::beginTransaction();

        try {
            $requestsData = DB::table('requests')->where('id', '=', $requestId)->first();
            $userData = DB::table('users')->where('id', $requestsData->user_id)->first();

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        $userDataDTO = new UserDataDTO(
            $requestsData->id,
            $userData->id,
            $userData->name,
            $userData->email,
            $requestsData->created_at,
            $requestsData->updated_at,
            $requestsData->title,
            $requestsData->description,
            $requestsData->status,
        );

        $userDataDTO->answer = $requestsData->answer;

        return $userDataDTO;
    }
}
