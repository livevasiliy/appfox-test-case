<?php


namespace App\Services;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SubscribeAPIService
{
    final public function subscribeOnPosts(array $params): JsonResponse
    {
        $user = User::find($params['user_id']);
        if ($user === null)
        {
            return response()->json([
                'message' => __('user.not_found')
            ],
                Response::HTTP_NOT_FOUND);
        }

        if ($user->has_subscribe_on_new_posts === false)
        {
            $user->update([
                'has_subscribe_on_new_posts' => true
            ]);
        }

        return response()->json([
            'message' => __('user.success_subscription_on_new_posts'),
            'user' => $user
        ],
            Response::HTTP_OK);
    }

    final public function subscribeOnProducts(array $params): JsonResponse
    {
        $user = User::find($params['user_id']);
        if ($user === null)
        {
            return response()->json([
                'message' => __('user.not_found')
            ],Response::HTTP_NOT_FOUND);
        }

        if ($user->has_subscribe_on_new_products === false)
        {
            $user->update([
                'has_subscribe_on_new_products' => true,
            ]);
        }

        return response()->json([
            'message' => __('user.success_subscription_on_new_posts'),
            'user' => $user
        ],
            Response::HTTP_OK);
    }

    final public function unSubscribeOnPosts(array $params): JsonResponse
    {
        $user = User::find($params['user_id']);
        if ($user === null)
        {
            return response()->json([
                'message' => __('user.not_found')
            ],
                Response::HTTP_NOT_FOUND);
        }

        if ($user->has_subscribe_on_new_posts === true)
        {
            $user->update([
                'has_subscribe_on_new_posts' => false
            ]);
        }

        return response()->json([
            'message' => __('user.success_subscription_on_new_posts'),
            'user' => $user
        ],
            Response::HTTP_OK);
    }

    final public function unSubscribeOnProducts(array $params): JsonResponse
    {
        $user = User::find($params['user_id']);
        if ($user === null)
        {
            return response()->json([
                'message' => __('user.not_found')
            ],
                Response::HTTP_NOT_FOUND);
        }

        if ($user->has_subscribe_on_new_products === true)
        {
            $user->update([
                'has_subscribe_on_new_products' => false,
            ]);
        }

        return response()->json([
            'message' => __('user.success_subscription_on_new_posts'),
            'user' => $user
        ],
            Response::HTTP_OK);
    }
}
