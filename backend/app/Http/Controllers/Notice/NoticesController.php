<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostNotice\PostNotices;
use App\Models\Notices;
use App\Traits\HttpResponseHelper;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function createNotices(PostNotices $request)
    {
        try {
            $noticeData = $request->all();
            Notices::create($noticeData);

            return HttpResponseHelper::make()
            ->successfulResponse('La noticia se creo exitosamente.')
            ->send();

        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }

    public function showLastNotices() {
        try {
            $lastNotice = Notices::latest('created_at')->
            first(['title', 'paragraph', 'fechaPublicacion', 'horaPublicacion']);

            return HttpResponseHelper::make()
            ->successfulResponse(
                $lastNotice ? 'Noticia obtenida correctamente.' : 'No se encontraron noticias.',
                $lastNotice ? $lastNotice->toArray() : []
            )
            ->send();

        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }

    public function showNotices()
    {
        try {
            $noticeList = Notices::select("title","fechaPublicacion")->paginate(4);

            return HttpResponseHelper::make()
            ->successfulResponse(
                $noticeList->isEmpty() ? 'No se encontraron noticias.' : 
                'Noticas obtenidas correctamente.', $noticeList->toArray()
            )
            ->send();

        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }

    public function updateNotices(PostNotices $request, Notices $notices)
    {
         try {
            $notices->update($request->all());

            return HttpResponseHelper::make()
            ->successfulResponse($notices->wasChanged() ? 
            'Los datos se actualizaron correctamente.' : 'NO se realizaron cambios.')
            ->send();

         } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
         }
    }

    public function destroyNotices(Notices $notices)
    {
        try {
            $notices->delete();

            return HttpResponseHelper::make()
            ->successfulResponse('La noticia se elimino correctamente.')
            ->send();
        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }

    public function countNotices() {
        try {
            $notices = Notices::count();

            return HttpResponseHelper::make()
            ->successfulResponse("Se contaron las noticias: ", ['count' => $notices])
            ->send();

        } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }
}
