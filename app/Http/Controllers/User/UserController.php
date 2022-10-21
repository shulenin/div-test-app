<?php

namespace App\Http\Controllers\User;

use App\Forms\RequestForm;
use App\Http\Controllers\Controller;
use App\Services\RequestDeletingService;
use App\Services\UserRequestSendingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    private RequestDeletingService $requestDeletingService;
    private UserRequestSendingService $userRequestSendingService;

    public function __construct(
        RequestDeletingService $requestDeletingService,
        UserRequestSendingService $userRequestSendingService
    ) {
        $this->requestDeletingService = $requestDeletingService;
        $this->userRequestSendingService = $userRequestSendingService;

        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @return string
     */
    public function dashboard(): string
    {
        if (!Auth::check()) {
            return redirect()
                ->route('user.login');
        }

        DB::beginTransaction();

        try {
            $userData = DB::table('users')->select(['id', 'name'])->where('id', Auth::id())->first();
            $requests = DB::table(('requests'))->where('user_id', $userData->id)->get();

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return view('user.dashboard', compact('userData', 'requests'));
    }

    /**
     * @param RequestForm $request
     * @return RedirectResponse|string
     */
    public function request(RequestForm $request)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('user.login');
        }

        $title = $request->post('title');
        $description = $request->post('description');
        $userId = $request->post('user_id');

        DB::beginTransaction();

        try {
            $this->userRequestSendingService->send($userId, $title, $description);

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return redirect()->route('user.dashboard');
    }

    public function deleteRequest(Request $request)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('user.login');
        }

        $requestId = $request->post('request_id');

        $this->requestDeletingService->delete($requestId);

        return redirect()->route('user.dashboard');
    }
}
