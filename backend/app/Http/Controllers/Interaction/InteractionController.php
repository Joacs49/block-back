<?php

namespace App\Http\Controllers\Interaction;

use App\Http\Controllers\Controller;
use App\Models\Interaction;
use App\Traits\HttpResponseHelper;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function insertView()
    {
        try {
            $viewCount = Interaction::first();

            $viewCount ? $viewCount->increment('views') : $viewCount = Interaction::create(['views' => 1, 'likes' => 0]);
            
            return HttpResponseHelper::make()
            ->successfulResponse("Se devolvio con exito las vistas: ", ['views' => $viewCount->views])
            ->send();
        
        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse("Ocurrio un problema: " . $e->getMessage())
            ->send();
        }
    }

    public function getView() {
        try {
            $viewCount = Interaction::first();

            return HttpResponseHelper::make()
            ->successfulResponse("Se devolvio con exito las vistas: ", ['views' => $viewCount ? $viewCount->views : 0])
            ->send();
        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse("Ocurrio un problema: " . $e->getMessage())
            ->send();
        }
    }
}
