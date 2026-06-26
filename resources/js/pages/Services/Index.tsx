import AppLayout from '@/layouts/AppLayout';
import { Link, usePage } from '@inertiajs/react';
// ✅ IMPORTAR TODOS LOS ICONOS NECESARIOS
import {
    ArrowRight,
    Award,
    CheckCircle2,
    Clock,
    Eye,
    HeadphonesIcon,
    Heart,
    MapPin,
    Package,
    Shield,
    Star,
    Target,
    ThumbsUp,
    Truck,
    Users,
    Wrench,
    Zap,
} from 'lucide-react';

// Mapeo de iconos de Lucide
const lucideIconMap: Record<string, any> = {
    'CheckCircle2': CheckCircle2,
    'Award': Award,
    'Users': Users,
    'Clock': Clock,
    'Target': Target,
    'Heart': Heart,
    'Eye': Eye,
    'Star': Star,
    'Shield': Shield,
    'Zap': Zap,
    'ThumbsUp': ThumbsUp,
    'Package': Package,
    'Truck': Truck,
    'HeadphonesIcon': HeadphonesIcon,
    'MapPin': MapPin,
};

export default function ServicesIndex() {
    const { servicios, porque_elegirnos = [] } = usePage<any>().props;

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Wrench size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">Servicios Técnicos</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        Nuestros Servicios
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        Soluciones integrales con soporte técnico experto para mantener tu operación funcionando
                    </p>
                </div>
            </section>

            {/* Grid de servicios - Ordenados por 'orden' desde la BD */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        {servicios.map((servicio: any) => (
                            <Link
                                key={servicio.id}
                                href={`/services/${servicio.slug}`}
                                className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1"
                            >
                                {/* Imagen del servicio */}
                                <div className="relative h-48 bg-gradient-to-br from-[#EA0A2A]/5 to-[#EA0A2A]/15 overflow-hidden">
                                    {servicio.imagen ? (
                                        <img
                                            src={servicio.imagen}
                                            alt={servicio.nombre}
                                            className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        />
                                    ) : (
                                        <div className="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#EA0A2A] to-[#c90825]">
                                            <Wrench size={56} className="text-white" />
                                        </div>
                                    )}
                                    <div className="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>

                                {/* Contenido */}
                                <div className="p-6">
                                    <h3 className="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#EA0A2A] transition-colors">
                                        {servicio.nombre}
                                    </h3>
                                    <p className="text-gray-600 mb-4 line-clamp-3">
                                        {servicio.descripcion}
                                    </p>
                                    <div className="flex items-center text-[#EA0A2A] font-semibold text-sm group-hover:gap-2 transition-all">
                                        <span>Más información</span>
                                        <ArrowRight size={16} className="ml-1 group-hover:translate-x-1 transition-transform" />
                                    </div>
                                </div>
                            </Link>
                        ))}
                    </div>

                    {servicios.length === 0 && (
                        <div className="text-center py-16">
                            <Wrench size={64} className="text-gray-300 mx-auto mb-4" />
                            <h3 className="text-xl font-bold text-gray-900 mb-2">Sin servicios disponibles</h3>
                            <p className="text-gray-500">Próximamente agregaremos más servicios.</p>
                        </div>
                    )}
                </div>
            </section>

            {/* ✅ Características - Ahora cargadas desde la BD (Por qué elegirnos) */}
            <section className="py-12 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            ¿Por qué elegir nuestros servicios?
                        </h2>
                        <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                            Compromiso, calidad y experiencia al servicio de tu industria
                        </p>
                    </div>

                    {porque_elegirnos.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {porque_elegirnos.map((item: any) => {
                                const IconComponent = lucideIconMap[item.icono] || CheckCircle2;
                                return (
                                    <div key={item.id} className="bg-white rounded-xl p-6 shadow-md border border-gray-100 hover:border-[#EA0A2A]/30 transition-all">
                                        <div className="bg-[#EA0A2A]/10 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                                            <IconComponent size={24} className="text-[#EA0A2A]" />
                                        </div>
                                        <h3 className="text-lg font-bold text-gray-900 mb-2">
                                            {item.titulo}
                                        </h3>
                                        <p className="text-sm text-gray-600">
                                            {item.descripcion}
                                        </p>
                                    </div>
                                );
                            })}
                        </div>
                    ) : (
                        // Fallback si no hay datos en la BD
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            {[
                                { title: 'Técnicos Certificados', desc: 'Personal altamente capacitado' },
                                { title: 'Respuesta Rápida', desc: 'Atención inmediata a emergencias' },
                                { title: 'Garantía de Calidad', desc: 'Trabajos con garantía escrita' },
                                { title: 'Cobertura Nacional', desc: 'Servicio en todo Bolivia' },
                            ].map((item, index) => (
                                <div key={index} className="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                                    <div className="bg-[#EA0A2A]/10 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                                        <CheckCircle2 size={24} className="text-[#EA0A2A]" />
                                    </div>
                                    <h3 className="text-lg font-bold text-gray-900 mb-2">{item.title}</h3>
                                    <p className="text-sm text-gray-600">{item.desc}</p>
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            </section>
        </AppLayout>
    );
}
