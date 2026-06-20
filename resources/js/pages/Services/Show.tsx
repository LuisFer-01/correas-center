import AppLayout from '@/layouts/AppLayout';
import { Link, usePage } from '@inertiajs/react';
import { ArrowRight, Building2, CheckCircle2, MessageCircle, Phone, Wrench } from 'lucide-react';

export default function ServiceShow() {
    const { servicio } = usePage<any>().props;

    return (
        <AppLayout>
            {/* Header con imagen de fondo */}
            <section className="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20 overflow-hidden">
                {/* Imagen de fondo del servicio */}
                {servicio.imagen && (
                    <div className="absolute inset-0">
                        <img
                            src={servicio.imagen}
                            alt={servicio.nombre}
                            className="w-full h-full object-cover opacity-20"
                        />
                        <div className="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800/90 to-gray-900"></div>
                    </div>
                )}

                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex items-center gap-2 text-gray-400 text-sm mb-6">
                        <Link href="/services" className="hover:text-white transition-colors">Servicios</Link>
                        <span>/</span>
                        <span className="text-white">{servicio.nombre}</span>
                    </div>

                    <div className="flex items-start gap-4">
                        <div className="bg-[#EA0A2A] p-4 rounded-xl">
                            <Wrench size={40} className="text-white" />
                        </div>
                        <div>
                            <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                                {servicio.nombre}
                            </h1>
                            <p className="text-lg text-gray-300 max-w-3xl">
                                {servicio.descripcion}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Contenido principal */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {/* Contenido */}
                        <div className="lg:col-span-2 space-y-8">
                            {/* Imagen destacada del servicio */}
                            {servicio.imagen && (
                                <div className="rounded-xl overflow-hidden shadow-lg">
                                    <img
                                        src={servicio.imagen}
                                        alt={servicio.nombre}
                                        className="w-full h-64 md:h-96 object-cover"
                                    />
                                </div>
                            )}

                            {/* Descripción detallada */}
                            <div>
                                <h2 className="text-2xl font-bold text-gray-900 mb-4">
                                    Sobre este servicio
                                </h2>
                                <div className="prose prose-gray max-w-none">
                                    <p className="text-gray-700 leading-relaxed text-lg">
                                        {servicio.descripcion}
                                    </p>
                                </div>
                            </div>

                            {/* Características del servicio */}
                            <div className="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                <h3 className="text-xl font-bold text-gray-900 mb-4">
                                    Beneficios de nuestro servicio
                                </h3>
                                <ul className="space-y-3">
                                    {[
                                        'Técnicos especializados con años de experiencia',
                                        'Equipos de última generación',
                                        'Atención personalizada',
                                        'Garantía en todos nuestros trabajos',
                                        'Respuesta rápida a emergencias',
                                        'Asesoría técnica sin costo',
                                    ].map((benefit, index) => (
                                        <li key={index} className="flex items-start gap-3">
                                            <CheckCircle2 size={20} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                            <span className="text-gray-700">{benefit}</span>
                                        </li>
                                    ))}
                                </ul>
                            </div>

                            {/* Industrias donde aplicamos */}
                            {servicio.industrias.length > 0 && (
                                <div>
                                    <h2 className="text-2xl font-bold text-gray-900 mb-6">
                                        Industrias donde aplicamos este servicio
                                    </h2>
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        {servicio.industrias.map((industria: any) => (
                                            <Link
                                                key={industria.id}
                                                href={`/applications/${industria.slug}`}
                                                className="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 p-4 flex items-center gap-3"
                                            >
                                                {industria.imagen ? (
                                                    <img
                                                        src={industria.imagen}
                                                        alt={industria.nombre}
                                                        className="w-16 h-16 object-cover rounded-lg flex-shrink-0"
                                                    />
                                                ) : (
                                                    <div className="bg-[#EA0A2A]/10 p-2 rounded-lg group-hover:bg-[#EA0A2A] transition-colors flex-shrink-0">
                                                        <Building2 size={20} className="text-[#EA0A2A] group-hover:text-white transition-colors" />
                                                    </div>
                                                )}
                                                <span className="font-semibold text-gray-900 group-hover:text-[#EA0A2A] transition-colors flex-1">
                                                    {industria.nombre}
                                                </span>
                                                <ArrowRight size={16} className="text-gray-400 group-hover:text-[#EA0A2A] group-hover:translate-x-1 transition-all" />
                                            </Link>
                                        ))}
                                    </div>
                                </div>
                            )}
                        </div>

                        {/* Sidebar */}
                        <div className="space-y-6">
                            <div className="bg-gradient-to-br from-[#EA0A2A] to-[#c90825] rounded-xl p-6 text-white sticky top-24">
                                <h3 className="text-xl font-bold mb-3">
                                    ¿Necesitas este servicio?
                                </h3>
                                <p className="text-white/90 text-sm mb-6">
                                    Contáctanos ahora y recibe asesoría personalizada sin costo
                                </p>

                                <div className="space-y-3">
                                    <a
                                        href={`https://wa.me/59177306576?text=${encodeURIComponent(`Hola, necesito el servicio: ${servicio.nombre}`)}`}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        className="block w-full bg-white text-[#EA0A2A] px-4 py-3 rounded-lg font-semibold text-center hover:bg-gray-100 transition-colors"
                                    >
                                        <div className="flex items-center justify-center gap-2">
                                            <MessageCircle size={18} />
                                            WhatsApp
                                        </div>
                                    </a>
                                    <a
                                        href="tel:+59177306576"
                                        className="block w-full bg-white/10 hover:bg-white/20 text-white px-4 py-3 rounded-lg font-semibold text-center transition-colors border border-white/20"
                                    >
                                        <div className="flex items-center justify-center gap-2">
                                            <Phone size={18} />
                                            Llamar Ahora
                                        </div>
                                    </a>
                                    <Link
                                        href="/contact"
                                        className="block w-full bg-white/10 hover:bg-white/20 text-white px-4 py-3 rounded-lg font-semibold text-center transition-colors border border-white/20"
                                    >
                                        Enviar Consulta
                                    </Link>
                                </div>

                                <div className="mt-6 pt-6 border-t border-white/20">
                                    <p className="text-xs text-white/80 mb-2">Horario de atención:</p>
                                    <p className="text-sm font-semibold">Lun-Vie: 8:00-18:00</p>
                                    <p className="text-sm font-semibold">Sáb: 8:00-13:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}
