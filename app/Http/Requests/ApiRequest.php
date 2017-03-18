<?php

namespace App\Http\Requests;

use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Support\Facades\Response;

trait ApiRequest
{
    public function response(array $errors)
    {
        if (in_array('api', $this->route()->getAction()['middleware'])) {
            return Response::json([
                'message'     => trans(ApiController::HTTP_UNPROCESSABLE_ENTITY_MESSAGE),
                'status_code' => HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
                'errors'      => $errors,
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);

        } else {
            parent::response($errors);
        }
    }
}
