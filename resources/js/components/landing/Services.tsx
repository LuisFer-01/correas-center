import { Link, usePage } from '@inertiajs/react';
import { ArrowRight, Wrench } from 'lucide-react';

export default function Services() {
    const { globals } = usePage<any>().props;
    const servicios = globals.servicios || [];

    return (
        <section className="py-16 md:py-24 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header de la sección */}
                <div className="text-center mb-12 md:mb-16">
                    <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                        Nuestros Servicios
                    </p>
                    <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Servicios Técnicos Especializados
                    </h2>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Soluciones integrales con soporte técnico experto para mantener tu operación funcionando
                    </p>
                </div>

                {/* Grid de servicios */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    {servicios.map((servicio: any) => (
                        <Link
                            key={servicio.id}
                            href={`/services/${servicio.nombre.toLowerCase().replace(/\s+/g, '-')}`}
                            className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/20"
                        >
                            {/* Icono */}
                            <div className="bg-gradient-to-br from-[#EA0A2A] to-[#c90825] p-6 flex items-center justify-center">
                                <Wrench size={48} className="text-white" />
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
            </div>
        </section>
    );
}
