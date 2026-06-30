<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactoRecibido;
use App\Models\Contacto;
use App\Models\Suscriptor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
                'empresa_id' => 1,
                'nombre' => $request->nombre,
                'empresa' => $request->empresa,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'mensaje' => $request->mensaje,
                'estado' => 'nuevo',
            ]);

            // Enviar email a los administradores
            $emails = [
                'luis.gallegos@correascenter.com',
                'ventas@correascenter.com',
            ];

            foreach ($emails as $email) {
                try {
                    Mail::to($email)->send(new ContactoRecibido($contacto));
                } catch (Exception $e) {
                    // Log el error pero no detiene el proceso
                    Log::error("Error enviando email a {$email}: " . $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.');
        } catch (Exception $e) {
            Log::error('Error al procesar formulario de contacto: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al enviar el mensaje. Por favor intenta nuevamente.');
        }
    }

     /**
     * ✅ NUEVO: Procesar suscripción al newsletter
     * Ruta: POST /newsletter/subscribe
     */
    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'nombre' => 'nullable|string|max:255',
        ]);

        try {
            // Verificar si ya está suscrito
            $suscriptor = Suscriptor::where('email', $request->email)->first();

            if ($suscriptor) {
                if ($suscriptor->estado === 'desuscrito') {
                    // Reactivar suscripción
                    $suscriptor->update(['estado' => 'activo']);
                    return redirect()->back()->with('success', '¡Tu suscripción ha sido reactivada!');
                }
                return redirect()->back()->with('info', 'Ya estás suscrito a nuestro newsletter.');
            }

            // Crear nuevo suscriptor
            Suscriptor::create([
                'email' => $request->email,
                'nombre' => $request->nombre,
                'estado' => 'activo',
            ]);

            return redirect()->back()->with('success', '¡Gracias por suscribirte! Recibirás nuestras novedades pronto.');
        } catch (Exception $e) {
            Log::error('Error al procesar suscripción: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al procesar tu suscripción. Por favor intenta nuevamente.');
        }
    }
}
