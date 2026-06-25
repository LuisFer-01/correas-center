<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #EA0A2A 0%, #c90825 100%);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin: -30px -30px 30px -30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .info-box {
            background-color: #f9f9f9;
            border-left: 4px solid #EA0A2A;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-box strong {
            color: #EA0A2A;
            display: block;
            margin-bottom: 5px;
        }
        .mensaje {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 4px;
            margin: 20px 0;
            border: 1px solid #e0e0e0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .btn {
            display: inline-block;
            background-color: #EA0A2A;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 5px;
        }
        .btn:hover {
            background-color: #c90825;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📩 Nuevo Mensaje de Contacto</h1>
        </div>

        <p>Has recibido un nuevo mensaje desde el formulario de contacto del sitio web.</p>

        <div class="info-box">
            <strong>👤 Nombre:</strong>
            {{ $contacto->nombre }}
        </div>

        @if($contacto->empresa)
        <div class="info-box">
            <strong>🏢 Empresa:</strong>
            {{ $contacto->empresa }}
        </div>
        @endif

        <div class="info-box">
            <strong>📧 Email:</strong>
            <a href="mailto:{{ $contacto->email }}" style="color: #EA0A2A;">{{ $contacto->email }}</a>
        </div>

        <div class="info-box">
            <strong>📞 Teléfono:</strong>
            <a href="tel:{{ $contacto->telefono }}" style="color: #EA0A2A;">{{ $contacto->telefono }}</a>
        </div>

        <div class="mensaje">
            <strong style="color: #EA0A2A; display: block; margin-bottom: 10px;">💬 Mensaje:</strong>
            {{ $contacto->mensaje }}
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="mailto:{{ $contacto->email }}?subject=Re: Consulta desde Correas Center" class="btn">
                📧 Responder por Email
            </a>
            <a href="tel:{{ $contacto->telefono }}" class="btn">
                📞 Llamar Ahora
            </a>
        </div>

        <div class="footer">
            <p>Este mensaje fue enviado automáticamente desde el formulario de contacto de <strong>Correas Center</strong>.</p>
            <p>Fecha de recepción: {{ $contacto->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
