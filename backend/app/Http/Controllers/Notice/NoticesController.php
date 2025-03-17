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
            $noticeList = Notices::select("id_notice", "title","fechaPublicacion")->paginate(4);

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

    public function showNoticesAll()
    {
        try {
            $noticeList = Notices::select("title","paragraph","img","url")->get();

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

    public function updateNotices(Request $request, $id)
    {
         try {
            $notice = Notices::findOrFail($id);

            $notice->update([
                'title' => $request->input('title'),
                'fechaPublicacion' => now(), 
            ]);

            return HttpResponseHelper::make()
            ->successfulResponse($notice->wasChanged() ? 
            'Los datos se actualizaron correctamente.' : 'NO se realizaron cambios.')
            ->send();

         } catch(\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
         }
    }

    public function destroyNotices($id)
    {
        try {
            $notice = Notices::findOrFail($id);
            $notice->delete();

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
