<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request): array
    {
        $perPage = $request->get('perPage', 5);
        $searchTerm = $request->input('search');
        $users = User::query()->search($searchTerm)->paginate($perPage);

        return $this->paginated(UserResource::collection($users), 'Users retrieved successfully.');
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        return $this->success(new UserResource($user), 'User created successfully.', 201);
    }

    public function show(Request $request, User $user): JsonResponse
    {
        return $this->success(new UserResource($user), 'User retrieved successfully.');
    }

    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return $this->success(new UserResource($user), 'User updated successfully.');
    }

    public function destroy(Request $request, User $user): JsonResponse
    {
        $user->delete();

        return $this->success(null, 'User deleted successfully.', 204);
    }
}
