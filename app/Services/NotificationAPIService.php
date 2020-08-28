<?php


namespace App\Services;


use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use View;

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
        $unReadNotification = auth()->user()->unreadNotifications->where('id', '=', $id)->first();
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    final public function listAllNotifications(int $id)
    {
        $notifications = (new User)::find($id)->unreadNotifications()->get()->toJson();

        return view('notifications', compact('notifications'));
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
