import TechnicalSheetDownload from '@/components/TechnicalSheet';
import AppLayout from '@/layouts/AppLayout';
import { Link, usePage } from '@inertiajs/react';
import { AlertTriangle, ArrowRight, CheckCircle2, FlaskConical, Layers, Ruler, Tag, Wrench } from 'lucide-react';
import { useState } from 'react';

export default function CategoryDetail() {
    const { producto, categoria } = usePage<any>().props;
    const [activeTab, setActiveTab] = useState<'gamas' | 'caracteristicas' | 'composiciones' | 'medidas'>('gamas');

    // Extraer datos únicos de los detalles
    const gamas = categoria.detalles
        .filter((d: any) => d.gama_producto)
        .map((d: any) => d.gama_producto)
        .filter((g: any, i: number, arr: any[]) => arr.findIndex((t: any) => t.id === g.id) === i);

    const caracteristicas = categoria.detalles
        .filter((d: any) => d.caracteristica)
        .map((d: any) => d.caracteristica)
        .filter((c: any, i: number, arr: any[]) => arr.findIndex((t: any) => t.id === c.id) === i);

    const composiciones = categoria.detalles
        .filter((d: any) => d.composicion)
        .map((d: any) => d.composicion)
        .filter((c: any, i: number, arr: any[]) => arr.findIndex((t: any) => t.id === c.id) === i);

    // ✅ NUEVO: Extraer aplicaciones únicas
    const aplicaciones = categoria.detalles
        .filter((d: any) => d.aplicacion)
        .map((d: any) => d.aplicacion)
        .filter((a: any, i: number, arr: any[]) => arr.findIndex((t: any) => t.id === a.id) === i);

    // ✅ NUEVO: Agrupar medidas por GamaProducto
    const medidasAgrupadas: Record<string, any[]> = {};
    categoria.detalles.forEach((detalle: any) => {
        if (detalle.medida) {
            const gamaNombre = detalle.gama_producto?.nombre || 'Sin Gama';
            if (!medidasAgrupadas[gamaNombre]) {
                medidasAgrupadas[gamaNombre] = [];
            }
            // Evitar duplicados dentro de la misma gama
            const existe = medidasAgrupadas[gamaNombre].some(
                (m: any) => m.id === detalle.medida.id
            );
            if (!existe) {
                medidasAgrupadas[gamaNombre].push({
                    ...detalle.medida,
                    gama_producto: detalle.gama_producto,
                });
            }
        }
    });

    const tabs = [
        { id: 'gamas' as const, label: 'Gamas / Series', icon: Layers, count: gamas.length },
        { id: 'caracteristicas' as const, label: 'Características', icon: Wrench, count: caracteristicas.length },
        { id: 'composiciones' as const, label: 'Composición', icon: FlaskConical, count: composiciones.length },
        { id: 'medidas' as const, label: 'Medidas', icon: Ruler, count: Object.keys(medidasAgrupadas).length > 0 ? Object.values(medidasAgrupadas).flat().length : 0 },
    ];

    return (
        <AppLayout>
            {/* Header con imagen destacada */}
            <section className="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20 overflow-hidden">
                {categoria.imagen && (
                    <div className="absolute inset-0">
                        <img
                            src={categoria.imagen}
                            alt={categoria.nombre}
                            className="w-full h-full object-cover opacity-20"
                        />
                        <div className="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800/90 to-gray-900"></div>
                    </div>
                )}

                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {/* Breadcrumb inline */}
                    <div className="flex items-center gap-2 text-gray-400 text-sm mb-6">
                        <Link href="/products" className="hover:text-white transition-colors">Productos</Link>
                        <span>/</span>
                        <Link href={`/products/${producto.slug}`} className="hover:text-white transition-colors">{producto.nombre}</Link>
                        <span>/</span>
                        <span className="text-white">{categoria.nombre}</span>
                    </div>

                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        {categoria.nombre}
                    </h1>

                    {categoria.descripcion_corta && (
                        <p className="text-lg text-gray-300 max-w-3xl">
                            {categoria.descripcion_corta}
                        </p>
                    )}
                </div>
            </section>

            {/* Contenido principal */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {/* Botón volver */}
                    <div className="mb-8">
                        <Link href={`/products/${producto.slug}`} className="inline-flex items-center gap-2 text-gray-600 hover:text-[#EA0A2A] transition-colors font-medium">
                            ← Volver a {producto.nombre}
                        </Link>
                    </div>

                    {/* Imagen destacada de la categoría */}
                    {categoria.imagen && (
                        <div className="mb-8 rounded-xl overflow-hidden shadow-lg">
                            <img
                                src={categoria.imagen}
                                alt={categoria.nombre}
                                className="w-full h-64 md:h-96 object-cover"
                            />
                        </div>
                    )}

                    {/* Descripción */}
                    {categoria.descripcion && (
                        <div className="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-100">
                            <h2 className="text-xl font-bold text-gray-900 mb-3">Descripción General</h2>
                            <p className="text-gray-700 leading-relaxed">
                                {categoria.descripcion}
                            </p>
                        </div>
                    )}

                    {/* Tabs */}
                    <div className="border-b border-gray-200 mb-8">
                        <div className="flex flex-wrap gap-0 overflow-x-auto">
                            {tabs.filter(tab => tab.count > 0).map((tab) => {
                                const Icon = tab.icon;
                                return (
                                    <button
                                        key={tab.id}
                                        onClick={() => setActiveTab(tab.id)}
                                        className={`flex items-center gap-2 px-6 py-3 text-sm font-semibold border-b-2 transition-colors whitespace-nowrap ${
                                            activeTab === tab.id
                                                ? 'border-[#EA0A2A] text-[#EA0A2A]'
                                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                        }`}
                                    >
                                        <Icon size={16} />
                                        {tab.label}
                                        <span className={`text-xs px-2 py-0.5 rounded-full ${
                                            activeTab === tab.id
                                                ? 'bg-[#EA0A2A]/10 text-[#EA0A2A]'
                                                : 'bg-gray-100 text-gray-500'
                                        }`}>
                                            {tab.count}
                                        </span>
                                    </button>
                                );
                            })}
                        </div>
                    </div>

                    {/* Contenido de tabs */}
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {/* Contenido principal */}
                        <div className="lg:col-span-2">
                            {/* Gamas */}
                            {activeTab === 'gamas' && (
                                <div className="space-y-4">
                                    {gamas.length > 0 ? gamas.map((gama: any) => (
                                        <div key={gama.id} className="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#EA0A2A]/20 transition-colors">
                                            <div className="flex items-center gap-3">
                                                <div className="bg-[#EA0A2A]/10 p-2 rounded-lg">
                                                    <Layers size={20} className="text-[#EA0A2A]" />
                                                </div>
                                                <h3 className="text-lg font-bold text-gray-900">{gama.nombre}</h3>
                                            </div>
                                        </div>
                                    )) : (
                                        <p className="text-gray-500 text-center py-8">No hay gamas registradas para esta categoría.</p>
                                    )}
                                </div>
                            )}

                            {/* Características */}
                            {activeTab === 'caracteristicas' && (
                                <div className="space-y-4">
                                    {caracteristicas.length > 0 ? caracteristicas.map((car: any) => (
                                        <div key={car.id} className="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#EA0A2A]/20 transition-colors">
                                            <div className="flex items-start gap-3">
                                                <div className="bg-[#EA0A2A]/10 p-2 rounded-lg flex-shrink-0">
                                                    <CheckCircle2 size={20} className="text-[#EA0A2A]" />
                                                </div>
                                                <div>
                                                    <h3 className="text-lg font-bold text-gray-900 mb-1">{car.nombre}</h3>
                                                    {car.descripcion && (
                                                        <p className="text-sm text-gray-600">{car.descripcion}</p>
                                                    )}
                                                </div>
                                            </div>
                                        </div>
                                    )) : (
                                        <p className="text-gray-500 text-center py-8">No hay características registradas.</p>
                                    )}
                                </div>
                            )}

                            {/* Composiciones */}
                            {activeTab === 'composiciones' && (
                                <div className="space-y-4">
                                    {composiciones.length > 0 ? composiciones.map((comp: any) => (
                                        <div key={comp.id} className="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#EA0A2A]/20 transition-colors">
                                            <div className="flex items-start gap-3">
                                                <div className="bg-[#EA0A2A]/10 p-2 rounded-lg flex-shrink-0">
                                                    <FlaskConical size={20} className="text-[#EA0A2A]" />
                                                </div>
                                                <div>
                                                    <h3 className="text-lg font-bold text-gray-900 mb-1">{comp.nombre}</h3>
                                                    {comp.descripcion && (
                                                        <p className="text-sm text-gray-600">{comp.descripcion}</p>
                                                    )}
                                                </div>
                                            </div>
                                        </div>
                                    )) : (
                                        <p className="text-gray-500 text-center py-8">No hay composiciones registradas.</p>
                                    )}
                                </div>
                            )}

                            {/* ✅ Medidas agrupadas por Gama */}
                            {activeTab === 'medidas' && (
                                <div className="space-y-6">
                                    {Object.keys(medidasAgrupadas).length > 0 ? (
                                        Object.entries(medidasAgrupadas).map(([gamaNombre, medidas]: [string, any[]]) => (
                                            <div key={gamaNombre} className="space-y-3">
                                                {/* Título separador de Gama */}
                                                <div className="flex items-center gap-2 pb-2 border-b border-gray-200">
                                                    <Layers size={16} className="text-[#EA0A2A]" />
                                                    <h3 className="text-md font-bold text-gray-900">{gamaNombre}</h3>
                                                </div>

                                                {/* Lista de medidas de esta gama */}
                                                <div className="space-y-3 pl-2">
                                                    {medidas.map((med: any) => (
                                                        <div key={med.id} className="bg-gray-50 rounded-xl p-4 border border-gray-100 hover:border-[#EA0A2A]/20 transition-colors">
                                                            <div className="flex items-center justify-between">
                                                                <div className="flex items-center gap-3">
                                                                    <div className="bg-[#EA0A2A]/10 p-2 rounded-lg">
                                                                        <Ruler size={18} className="text-[#EA0A2A]" />
                                                                    </div>
                                                                    <div>
                                                                        <h4 className="text-base font-semibold text-gray-900">{med.nombre}</h4>
                                                                        {/* ✅ MOSTRAR MEDIDA COMPLETA AQUÍ */}
                                                                        {med.medida_completa && (
                                                                            <span className="text-sm text-[#EA0A2A] font-medium block mt-1">
                                                                                {med.medida_completa}
                                                                            </span>
                                                                        )}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ))}
                                                </div>
                                            </div>
                                        ))
                                    ) : (
                                        <p className="text-gray-500 text-center py-8">No hay medidas registradas.</p>
                                    )}
                                </div>
                            )}

                            {/* ✅ Aplicaciones - Debajo de los tabs, antes de la advertencia */}
                            {aplicaciones.length > 0 && (
                                <div className="mt-8 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-5 shadow-sm">
                                    <div className="flex items-start gap-3">
                                        <div className="bg-blue-500 p-2 rounded-lg flex-shrink-0">
                                            <Tag size={20} className="text-white" />
                                        </div>
                                        <div className="flex-1">
                                            <h4 className="text-base font-bold text-blue-900 mb-2">
                                                Aplicaciones
                                            </h4>
                                            <div className="flex flex-wrap gap-2">
                                                {aplicaciones.map((app: any) => (
                                                    <span
                                                        key={app.id}
                                                        className="inline-block bg-white text-blue-700 text-sm font-medium px-3 py-1 rounded-full border border-blue-200"
                                                    >
                                                        {app.nombre}
                                                    </span>
                                                ))}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            )}

                            {/* Advertencia fija debajo del tab */}
                            <div className="mt-8 bg-red-50 border-l-4 border-red-500 rounded-lg p-5 shadow-sm">
                                <div className="flex items-start gap-3">
                                    <div className="bg-red-500 p-2 rounded-lg flex-shrink-0">
                                        <AlertTriangle size={20} className="text-white" />
                                    </div>
                                    <div>
                                        <h4 className="text-base font-bold text-red-800 mb-1">
                                            Información Importante
                                        </h4>
                                        <p className="text-sm text-red-700 leading-relaxed">
                                            Los datos mostrados arriba son <strong>características generales</strong> de esta categoría.
                                            Pueden existir variaciones en las especificaciones técnicas según la marca del producto.
                                            Para obtener información detallada por marca, por favor contáctanos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Sidebar */}
                        <div className="space-y-6">
                            {/* CTA Contacto */}
                            <div className="bg-gradient-to-br from-[#EA0A2A] to-[#c90825] rounded-xl p-6 text-white">
                                <h3 className="text-xl font-bold mb-3">¿Necesitas cotización?</h3>
                                <p className="text-white/90 text-sm mb-4">
                                    Solicita información detallada sobre {categoria.nombre}
                                </p>
                                <a
                                    href={`https://wa.me/59177306576?text=${encodeURIComponent(`Hola, necesito información sobre ${categoria.nombre}`)}`}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="block w-full bg-white text-[#EA0A2A] px-4 py-3 rounded-lg font-semibold text-center hover:bg-gray-100 transition-colors"
                                >
                                    Solicitar por WhatsApp
                                </a>
                            </div>

                            {/* Botón de descarga */}
                            <div className="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                <h3 className="text-lg font-bold text-gray-900 mb-4">Descargar Información</h3>
                                <TechnicalSheetDownload producto={producto} categoria={categoria} />
                            </div>

                            {/* Productos relacionados */}
                            <div className="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                <h3 className="text-lg font-bold text-gray-900 mb-4">Otros Productos</h3>
                                <ul className="space-y-2">
                                    <li>
                                        <Link href="/products" className="text-sm text-gray-600 hover:text-[#EA0A2A] transition-colors flex items-center gap-2">
                                            <ArrowRight size={14} /> Ver todos los productos
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}
