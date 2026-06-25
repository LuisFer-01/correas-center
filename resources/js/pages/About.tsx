import AppLayout from '@/layouts/AppLayout';
import { usePage } from '@inertiajs/react';
import { Award, CheckCircle2, Clock, Eye, Heart, Target, Users } from 'lucide-react';

export default function About() {
    const { globals, registros_about = [] } = usePage<any>().props;
    const empresa = globals?.empresa;

    // Mapeo de iconos de Lucide
    const lucideIconMap: Record<string, any> = {
        'Clock': Clock,
        'Users': Users,
        'Award': Award,
        'CheckCircle2': CheckCircle2,
        'Eye': Eye,
        'Target': Target,
        'Heart': Heart,
    };

    // Helper para obtener registro por identificador
    const getRegistro = (identificador: string) => {
        return registros_about.find((r: any) => r.identificador === identificador);
    };

    // Obtener secciones
    const header = getRegistro('header');
    const introduccion = getRegistro('introduccion');
    const estadisticas = getRegistro('estadisticas');
    const filosofia = getRegistro('filosofia');
    const porqueElegirnos = getRegistro('porque_elegirnos');

    const getIcon = (icono: string) => {
        return lucideIconMap[icono] || Award;
    };

    return (
        <AppLayout>
            {/* Header de página - Dinámico desde BD */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Award size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">
                            {header?.nombre || 'Sobre Nosotros'}
                        </span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        {empresa?.nombre || 'Correas Center'}
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        {header?.descripcion || 'Líderes en soluciones industriales, hidráulicas, neumáticas y transmisión de potencia en Bolivia'}
                    </p>
                </div>
            </section>

            {/* Introducción - Dinámica desde BD */}
            {introduccion && (
                <section className="py-12 md:py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="max-w-4xl mx-auto text-center">
                            <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                                {introduccion.nombre}
                            </h2>
                            <p
                                className="text-lg text-gray-600 leading-relaxed mb-8"
                                dangerouslySetInnerHTML={{ __html: introduccion.descripcion }}
                            />
                        </div>
                    </div>
                </section>
            )}

            {/* Estadísticas - Dinámicas desde BD */}
            {estadisticas && estadisticas.detalles && estadisticas.detalles.length > 0 && (
                <section className="py-12 md:py-16 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {estadisticas.detalles.map((detalle: any) => {
                                const IconComponent = getIcon(detalle.icono);
                                return (
                                    <div key={detalle.id} className="bg-white rounded-xl p-6 border border-gray-100 shadow-sm">
                                        <div className="bg-[#EA0A2A]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <IconComponent size={32} className="text-[#EA0A2A]" />
                                        </div>
                                        <h3 className="text-xl font-bold text-gray-900 mb-2 text-center">
                                            {detalle.titulo}
                                        </h3>
                                        <p className="text-gray-600 text-sm text-center">
                                            {detalle.subtitulo}
                                        </p>
                                    </div>
                                );
                            })}
                        </div>
                    </div>
                </section>
            )}

            {/* Filosofía Corporativa - Dinámica desde BD */}
            {filosofia && filosofia.detalles && filosofia.detalles.length > 0 && (
                <section className="py-12 md:py-16 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-12">
                            <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                                {filosofia.nombre}
                            </h2>
                            <p className="text-lg text-gray-600">
                                {filosofia.descripcion}
                            </p>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            {filosofia.detalles.map((detalle: any) => {
                                const Icon = getIcon(detalle.icono);
                                return (
                                    <div
                                        key={detalle.id}
                                        className="bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1"
                                    >
                                        <div className="bg-gradient-to-br from-[#EA0A2A] to-[#c90825] p-8 flex items-center justify-center">
                                            <Icon size={56} className="text-white" />
                                        </div>
                                        <div className="p-6">
                                            <h3 className="text-2xl font-bold text-gray-900 mb-4">
                                                {detalle.titulo}
                                            </h3>
                                            <p className="text-gray-600 leading-relaxed">
                                                {detalle.descripcion}
                                            </p>
                                        </div>
                                    </div>
                                );
                            })}
                        </div>
                    </div>
                </section>
            )}

            {/* Por Qué Elegirnos - Dinámico desde BD */}
            {porqueElegirnos && porqueElegirnos.detalles && porqueElegirnos.detalles.length > 0 && (
                <section className="py-12 md:py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-12">
                            <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                                {porqueElegirnos.nombre}
                            </h2>
                            <p className="text-lg text-gray-600">
                                {porqueElegirnos.descripcion}
                            </p>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {porqueElegirnos.detalles.map((detalle: any) => {
                                const Icon = getIcon(detalle.icono);
                                return (
                                    <div
                                        key={detalle.id}
                                        className="flex items-start gap-4 bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#EA0A2A]/20 transition-colors"
                                    >
                                        <div className="bg-[#EA0A2A]/10 p-2 rounded-lg flex-shrink-0">
                                            <Icon size={24} className="text-[#EA0A2A]" />
                                        </div>
                                        <div>
                                            <h3 className="text-lg font-bold text-gray-900 mb-2">
                                                {detalle.titulo}
                                            </h3>
                                            <p className="text-gray-600">
                                                {detalle.descripcion}
                                            </p>
                                        </div>
                                    </div>
                                );
                            })}
                        </div>
                    </div>
                </section>
            )}
        </AppLayout>
    );
}
