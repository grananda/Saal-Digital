<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ObjectItemRequest;
use App\Services\Contract\ObjectItemServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;

class ObjectItemApiController extends ApiController
{
    /** @var  ObjectItemServiceInterface */
    protected $objectItemService;

    public function __construct(
        ObjectItemServiceInterface $objectItemService
    )
    {
        $this->objectItemService = $objectItemService;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $objectItems = $this->objectItemService->findAll();

        return $this->responseOk($objectItems);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        try {
            $organizations = $this->objectItemService->findOneById($id);

            return $this->responseOk($organizations);
        } catch (Exception $e) {
            return $this->responseInternalError($e->getMessage());
        }

    }

    /**
     * @param ObjectItemRequest $request
     * @return JsonResponse
     */
    public function store(ObjectItemRequest $request)
    {
        try {
            $organization = $this->objectItemService->create($request->all());

            return $this->responseCreated($organization);
        } catch (Exception $e) {
            return $this->responseInternalError($e->getMessage());
        }
    }

    /**
     * @param $id
     * @param ObjectItemRequest $request
     * @return JsonResponse
     */
    public function update($id, ObjectItemRequest $request)
    {
        try {
            $organization = $this->objectItemService->update($id, $request->all());

            return $this->responseUpdated($organization);
        } catch (Exception $e) {
            return $this->responseInternalError($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->objectItemService->delete($id);

            return $this->responseDeleted();
        } catch (Exception $e) {
            return $this->responseInternalError($e->getMessage());
        }
    }

    /**
     * @param $parent
     * @param $child
     * @return JsonResponse
     */
    public function attachObjectItem($parent, $child)
    {
        try {
            $this->objectItemService->attachObjectItem($parent, $child);

            return $this->responseDeleted();
        } catch (Exception $e) {
            return $this->responseInternalError($e->getMessage());
        }
    }

    /**
     * @param $parent
     * @param $child
     * @return JsonResponse
     */
    public function detachObjectItem($parent, $child)
    {
        try {
            $this->objectItemService->detachObjectItem($parent, $child);

            return $this->responseDeleted();
        } catch (Exception $e) {
            return $this->responseInternalError($e->getMessage());
        }
    }
}
