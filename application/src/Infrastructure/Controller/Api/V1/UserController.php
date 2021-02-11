<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Api\V1;

use App\Application\User\UserCommand;
use App\Infrastructure\Controller\Api\ApiController;
use App\Infrastructure\Domain\User\DTO\UserDTO;
use App\Infrastructure\Validator\UserRegisterValidator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends ApiController
{
    public function handlerCreate(UserCommand $userCommand, Request $request): JsonResponse
    {
        try{
            $data = $this->getJsonRequest($request);

            $validator = new UserRegisterValidator($data);

            if ($validator->hasErrors()) {
                return $this->responseBadRequest($validator->getErrors());
            }

            $user = $userCommand->createUser($data);
            $userDTO = new UserDTO($user);

            return $this->responseCreated($userDTO->toArray());
        } catch (Throwable $e) {
            return $this->responseInternalServerError([$e->getMessage()]);
        }
    }

    public function handlerUpdate(UserCommand $userCommand, Request $request, int $id): JsonResponse
    {
        try{
            $data = $this->getJsonRequest($request);

            $validator = new UserRegisterValidator($data);

            if ($validator->hasErrors()) {
                return $this->responseBadRequest($validator->getErrors());
            }

            $user = $userCommand->updateUser($id, $data);
            $userDTO = new UserDTO($user);

            return $this->responseCreated($userDTO->toArray());
        } catch (Throwable $e) {
            return $this->responseInternalServerError([$e->getMessage()]);
        }
    }

    public function handlerGet(UserCommand $userCommand, int $id): JsonResponse
    {
        try{
            $user = $userCommand->getUser($id);
            $userDTO = new UserDTO($user);

            return $this->responseOk($userDTO->toArray());
        } catch (Throwable $e) {
            return $this->responseInternalServerError([$e->getMessage()]);
        }
    }

}