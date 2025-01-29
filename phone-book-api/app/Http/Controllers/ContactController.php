<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class ContactController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $contacts = $user->contacts;

        return response()->json(['data' => $contacts]);
    }

    public function store(): JsonResponse
    {
        $contactDataValidated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $contact = $user->contacts()->create($contactDataValidated);

        return response()->json(['data' => $contact]);
    }

    public function show(int $id): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $contact = $user->contacts()->find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        return response()->json(['data' => $contact]);
    }
}
