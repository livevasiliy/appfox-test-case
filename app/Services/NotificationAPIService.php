<?php


namespace App\Services;


use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class NotificationAPIService
 *
 * @package App\Services
 */
class NotificationAPIService
{
    /**
     * Make all unread notifications as read.
     *
     * @return JsonResponse
     */
    final public function markAllAsRead(): JsonResponse
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => __('notifications.all_mark_as_readied')
        ],
            Response::HTTP_OK
        );
    }

    /**
     * Make notification by ID as read
     *
     * @param string $id
     *
     * @return JsonResponse
     */
    final public function markAsReadById(string $id): JsonResponse
    {

        $unReadNotification = auth()->user()->unreadNotifications->whereId($id)->first();
        if ($unReadNotification)
        {
            $unReadNotification->markAsRead();
        }
        return response()->json(
            [
                'code' => Response::HTTP_OK,
                'message' => __('notifications.notification_mark_as_readied')
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Retrieve list all unread notifications
     *
     * @return JsonResponse
     */
    final public function listAllUnReadNotifications(): JsonResponse
    {
        return response()->json([
                'code' => Response::HTTP_OK,
                'message' => __('notifications.list_not_read_success_retrieved'),
                'unreadNotifications' => auth()->user()->unreadNotifications()->toArray()
            ]
        );
    }

    /**
     * Retrieve list all read notifications
     *
     * @return JsonResponse
     */
    final public function listAllReadNotifications(): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => __('notifications.list_readied_success_retrieved'),
            'readNotifications' => auth()->user()->readNotifications()->toArray()
        ],
            Response::HTTP_OK
        );
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    final public function listAllNotifications(int $id): JsonResponse
    {
        return response()->json(
            [
                'code' => Response::HTTP_OK,
                'message' => __('notifications.list_all_success_retrieved'),
                'notifications' => $listNotifications = (new User)->find($id)->notifications()->get()->toArray()
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Remove single notification by id notification.
     *
     * @param string $id
     *
     * @return JsonResponse
     */
    final public function removeNotificationById(string $id): JsonResponse
    {
        auth()->user()->notifications()->whereId($id)->delete();
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => __('notifications.notification_success_delete'),
            'notifications' => auth()->user()->notifications()->get()->toArray()
        ],
            Response::HTTP_OK
        );
    }
}
