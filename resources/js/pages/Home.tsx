import AppLayout from '@/layouts/AppLayout';
import { usePage } from '@inertiajs/react';

export default function Home() {
    const { globals } = usePage<any>().props;

    // Debug: Verificar que los datos lleguen correctamente
    console.log('Globals recibidos:', globals);
    console.log('Productos:', globals?.productos);
    console.log('Sucursales:', globals?.sucursales);

    return (
        <AppLayout>
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h1 className="text-4xl font-bold text-gray-900 mb-4">
                    ¡Bienvenido a Correas Center!
                </h1>

                {/* Panel de debug */}
                <div className="mt-8 p-6 bg-blue-50 border border-blue-200 rounded-lg">
                    <h2 className="text-xl font-semibold mb-4 text-blue-900">
                        🔍 Debug - Datos Globales
                    </h2>

                    {globals ? (
                        <div className="space-y-4">
                            <div>
                                <strong className="text-blue-800">Empresa:</strong>
                                <pre className="bg-white p-3 rounded mt-1 text-sm overflow-auto">
                                    {JSON.stringify(globals.empresa, null, 2)}
                                </pre>
                            </div>

                            <div>
                                <strong className="text-blue-800">Productos ({globals.productos?.length || 0}):</strong>
                                <ul className="bg-white p-3 rounded mt-1 text-sm">
                                    {globals.productos?.map((p: any) => (
                                        <li key={p.id}>• {p.nombre} ({p.categorias?.length || 0} categorías)</li>
                                    ))}
                                </ul>
                            </div>

                            <div>
                                <strong className="text-blue-800">Sucursales ({globals.sucursales?.length || 0}):</strong>
                                <ul className="bg-white p-3 rounded mt-1 text-sm">
                                    {globals.sucursales?.map((s: any) => (
                                        <li key={s.id}>• {s.nombre} - {s.direccion}</li>
                                    ))}
                                </ul>
                            </div>

                            <div>
                                <strong className="text-blue-800">Industrias ({globals.industrias?.length || 0}):</strong>
                                <ul className="bg-white p-3 rounded mt-1 text-sm">
                                    {globals.industrias?.map((i: any) => (
                                        <li key={i.id}>• {i.nombre}</li>
                                    ))}
                                </ul>
                            </div>

                            <div>
                                <strong className="text-blue-800">Servicios ({globals.servicios?.length || 0}):</strong>
                                <ul className="bg-white p-3 rounded mt-1 text-sm">
                                    {globals.servicios?.map((s: any) => (
                                        <li key={s.id}>• {s.nombre}</li>
                                    ))}
                                </ul>
                            </div>

                            <div>
                                <strong className="text-blue-800">WhatsApp:</strong>
                                <pre className="bg-white p-3 rounded mt-1 text-sm">
                                    {JSON.stringify(globals.whatsapp, null, 2)}
                                </pre>
                            </div>
                        </div>
                    ) : (
                        <p className="text-red-600 font-bold">❌ globals es undefined</p>
                    )}
                </div>

                <div className="mt-8 p-6 bg-gray-50 rounded-lg">
                    <h2 className="text-2xl font-semibold mb-4">Próximo Paso</h2>
                    <p className="text-gray-700">
                        Una vez confirmados los datos, implementaremos las secciones del Landing.
                    </p>
                </div>
            </div>
        </AppLayout>
    );
}
