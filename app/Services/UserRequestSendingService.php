<?php

namespace App\Services;

use App\Models\Request;
use Exception;

class UserRequestSendingService
{
    /**
     * @param int $userId
     * @param string $title
     * @param string $description
     * @return void
     * @throws Exception
     */
    public function send(int $userId, string $title, string $description): void
    {
        $requestsModel = new Request();

        $requestsModel->setUserId($userId);
        $requestsModel->setTitle($title);
        $requestsModel->setDescription($description);
        $requestsModel->setStatus($requestsModel::STATUS_PENDING);

        $requestsModel->save();
    }
}