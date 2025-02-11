<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\v1\CatalogControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Catalogs\Employee;
use App\Services\EmployeeServices\StoreEmployee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class EmployeeController extends Controller
{
    use ResponseTrait;
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return EmployeeResource::collection(Employee::paginate(self::$paginate));
    }

    /**
     * @param EmployeeStoreRequest $request
     * @return JsonResponse
     */
    public function store(EmployeeStoreRequest $request): JsonResponse
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
     * @return EmployeeResource
     */
    public function show(string $id): EmployeeResource
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }

    /**
     * @param EmployeeUpdateRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(EmployeeUpdateRequest $request, string $id): JsonResponse
    {
        try {
            Employee::findOrFail($id)->update($request->all());
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
            Employee::findOrFail($id)->delete();
            return $this->returnDeletedResponse();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
