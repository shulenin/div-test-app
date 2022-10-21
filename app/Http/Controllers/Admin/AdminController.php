<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AdminRequestSendingService;
use App\Services\RequestsGettingService;
use App\Services\UserDataGettingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    private UserDataGettingService $userDataGettingService;
    private AdminRequestSendingService $adminRequestSendingService;
    private RequestsGettingService $requestsGettingService;
    /**
     * @param UserDataGettingService $userDataGettingService
     * @param AdminRequestSendingService $adminRequestSendingService
     * @param RequestsGettingService $requestsGettingService
     */
    public function __construct(
        UserDataGettingService $userDataGettingService,
        AdminRequestSendingService $adminRequestSendingService,
        RequestsGettingService $requestsGettingService
    ) {
        $this->userDataGettingService = $userDataGettingService;
        $this->adminRequestSendingService = $adminRequestSendingService;
        $this->requestsGettingService = $requestsGettingService;

        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function getRequests(Request $request)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('user.login');
        }

        $adminEmail = User::query()->where('id', Auth::id())->value('email');

        if ($adminEmail !== env('ADMIN_LOGIN')) {
            return redirect()
                ->route('user.dashboard');
        }

        $status = $request->get('filterByStatus');
        $date = $request->get('filterByDate');

        $requests = $this->requestsGettingService->getRequests($status, $date);

        return view('admin.requests', compact('requests'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function getUserPage(Request $request)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('user.login');
        }

        $requestId = $request->get('request_id');

        $userData = $this->userDataGettingService->getUserData($requestId);

        return view('admin.user_page', compact('userData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function request(Request $request): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()
                ->route('user.login');
        }

        $requestId = $request->request_id;
        $userId = $request->user_id;
        $answer = $request->answer;

        $this->adminRequestSendingService->send($requestId, $userId, $answer);

        $requests = DB::table('requests')->get();

        return redirect()->route('admin.requests', ['requests' => $requests, 'filterByStatus' => 'all', 'filterByDate' => 'asc']);
    }
}
