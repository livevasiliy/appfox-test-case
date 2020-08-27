<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeOnPostsRequest;
use App\Http\Requests\SubscribeOnProductsRequest;
use App\Http\Requests\UnSubscribeOnPostsRequest;
use App\Http\Requests\UnSubscribeOnProductsRequest;
use App\Services\SubscribeAPIService;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    /**
     * @var SubscribeAPIService
     */
    private $service;


    /**
     * SubscriptionController constructor.
     * @param SubscribeAPIService $service
     */
    public function __construct(SubscribeAPIService $service)
    {
        $this->service = $service;
    }

    final public function subscribeOnPosts(SubscribeOnPostsRequest $request): JsonResponse
    {
        return $this->service->subscribeOnPosts($request->all());
    }

    final public function subscribeOnProducts(SubscribeOnProductsRequest $request): JsonResponse
    {
        return $this->service->subscribeOnProducts($request->all());
    }

    final public function unSubscribeOnPosts(UnSubscribeOnPostsRequest $request): JsonResponse
    {
        return $this->service->unSubscribeOnPosts($request->all());
    }

    final public function unSubscribeOnProducts(UnSubscribeOnProductsRequest $request): JsonResponse
    {
        return $this->service->unSubscribeOnProducts($request->all());
    }
}
