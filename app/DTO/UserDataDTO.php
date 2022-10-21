<?php

namespace App\DTO;

/**
 * Class UserDataDTO
 * @package App\Http\DTO
 *
 * @property int $request_id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property string $title
 * @property string $description
 * @property string $status
 */
class UserDataDTO
{
    public int $request_id;
    public int $user_id;
    public string $name;
    public string $email;
    public string $created_at;
    public string $updated_at;
    public string $title;
    public string $description;
    public ?string $answer = null;
    public string $status;

    /**
     * @param int $request_id
     * @param int $user_id
     * @param string $name
     * @param string $email
     * @param string $created_at
     * @param $
     * @param string $updated_at
     * @param string $title
     * @param string $description
     * @param string $status
     */
    public function __construct(
        int $request_id,
        int $user_id,
        string $name,
        string $email,
        string $created_at,
        string $updated_at,
        string $title,
        string $description,
        string $status
    ) {
        $this->request_id = $request_id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }

}