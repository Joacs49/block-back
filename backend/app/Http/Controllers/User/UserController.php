<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\PostUser\PostUserUpdate;
use App\Traits\HttpResponseHelper;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser()
    {
        try {
            $userList = User::select('name','email')->get();

            return HttpResponseHelper::make()
            ->successfulResponse(
            $userList->isEmpty() ? 
            'No se encontraron usuarios.' : 'Usuarios obtenidos correctamente.', $userList)
            ->send();
            
        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.'. $e->getMessage())
            ->send();
        }
    }

    public function updateUser(PostUserUpdate $request, User $user)
    {
        try {
            $user->update($request->all());

            return HttpResponseHelper::make()
            ->successfulResponse($user->wasChanged() ? 
            'Los datos se actualizaron correctamente.': 'No se realizaron cambios.')
            ->send();

        } catch (\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }
}
