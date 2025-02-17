<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\EmployeeServices\StoreEmployee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class UserController extends Controller
{
    use ResponseTrait;
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::paginate(self::$paginate));
    }

    /**
     * @param UserStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserStoreRequest $request): JsonResponse
    {
        try {
            $pwd = (new StoreEmployee())->handle($request->all());
            return $this->returnCreatedResponse(['password' => $pwd, 'message' => self::CREATED_MESSAGE]);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * @param string $id
     * @return UserResource
     */
    public function show(string $id): UserResource
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * @param UserUpdateRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, string $id): JsonResponse
    {
        try {
            User::findOrFail($id)->update($request->all());
            return $this->returnUpdatedResponse();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            User::findOrFail($id)->delete();
            return $this->returnDeletedResponse();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
