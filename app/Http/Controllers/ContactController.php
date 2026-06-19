<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contacto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Vista de contacto
     * Ruta: /contact
     */
    public function index(): Response
    {
        return Inertia::render('Contact');
    }

    /**
     * Procesar formulario de contacto
     * Ruta: POST /contact
     */
    public function store(ContactFormRequest $request)
    {
        try {
            // Guardar en base de datos
            $contacto = Contacto::create([
                'nombre' => $request->nombre,
                'empresa' => $request->empresa,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'mensaje' => $request->mensaje,
                'estado' => 'nuevo',
            ]);

            // Aquí puedes agregar envío de email (opcional)
            //Mail::to(('ventas@correascenter.com'))->send(new Contacto($contacto));

            return redirect()->back()->with('success', 'Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Hubo un error al enviar el mensaje. Por favor intenta nuevamente.');
        }
    }
}
