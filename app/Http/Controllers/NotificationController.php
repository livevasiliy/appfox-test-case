<?php

namespace App\Http\Controllers;


use App\Services\NotificationAPIService;
use Illuminate\Http\JsonResponse;


/**
 * Class NotificationController
 *
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    /**
     * @var NotificationAPIService
     */
    private $service;

    /**
     * NotificationController constructor.
     *
     * @param  NotificationAPIService  $service
     */
    public function __construct(NotificationAPIService $service)
    {
        $this->service = $service;
        $this->middleware(['web']);
    }

    /**
     * Make all unread notifications as read.
     *
     * @return JsonResponse
     */
    public function markAllAsRead(): JsonResponse
    {
        return $this->service->markAllAsRead();
    }

    /**
     * Make notification by ID as read
     *
     * @param  string  $id
     *
     * @return JsonResponse
     */
    public function markAsReadById(string $id): JsonResponse
    {
        return $this->service->markAsReadById($id);
    }

    /**
     * Retrieve list all unread notifications
     *
     * @return JsonResponse
     */
    public function listAllUnReadNotifications(): JsonResponse
    {
        return $this->service->listAllUnReadNotifications();
    }

    /**
     * Retrieve list all read notifications
     *
     * @return JsonResponse
     */
    public function listAllReadNotifications(): JsonResponse
    {
        return $this->service->listAllReadNotifications();
    }

    /**
     * Retrieve list all notifications.
     *
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function listAllNotifications(int $id): JsonResponse
    {
        return $this->service->listAllNotifications($id);
    }

    /**
     * Remove single notification by id notification.
     *
     * @param  string  $id
     *
     * @return JsonResponse
     */
    public function removeNotificationById(string $id): JsonResponse
    {
        return $this->service->removeNotificationById($id);
    }
}
