import AppLayout from '@/layouts/AppLayout';
import { usePage } from '@inertiajs/react';
import { Building2, Clock, ExternalLink, Mail, MapPin, Phone } from 'lucide-react';

export default function Branches() {
    const { sucursales } = usePage<any>().props;

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Building2 size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">Nuestras Ubicaciones</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        Sucursales
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        Cobertura estratégica para atenderte mejor en todo Bolivia
                    </p>
                </div>
            </section>

            {/* Grid de sucursales */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        {sucursales.map((sucursal: any) => (
                            <div
                                key={sucursal.id}
                                className="bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/20"
                            >
                                {/* Header de la sucursal */}
                                <div className="bg-gradient-to-r from-[#EA0A2A] to-[#c90825] p-6 text-white">
                                    <div className="flex items-center justify-between">
                                        <h3 className="text-2xl font-bold">{sucursal.nombre}</h3>
                                        {sucursal.es_principal && (
                                            <span className="inline-block bg-white/20 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                                Principal
                                            </span>
                                        )}
                                    </div>
                                </div>

                                {/* Contenido */}
                                <div className="p-6 space-y-4">
                                    {/* Dirección */}
                                    <div className="flex items-start gap-3">
                                        <MapPin size={20} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                        <div>
                                            <p className="text-gray-900 font-semibold">Dirección</p>
                                            <p className="text-gray-600 text-sm">{sucursal.direccion}</p>
                                        </div>
                                    </div>

                                    {/* Teléfono */}
                                    <div className="flex items-start gap-3">
                                        <Phone size={20} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                        <div>
                                            <p className="text-gray-900 font-semibold">Teléfono</p>
                                            <a 
                                                href={`tel:${sucursal.telefono.replace(/\s/g, '')}`}
                                                className="text-gray-600 text-sm hover:text-[#EA0A2A] transition-colors"
                                            >
                                                {sucursal.telefono}
                                            </a>
                                        </div>
                                    </div>

                                    {/* Email */}
                                    {sucursal.email && (
                                        <div className="flex items-start gap-3">
                                            <Mail size={20} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                            <div>
                                                <p className="text-gray-900 font-semibold">Email</p>
                                                <a 
                                                    href={`mailto:${sucursal.email}`}
                                                    className="text-gray-600 text-sm hover:text-[#EA0A2A] transition-colors"
                                                >
                                                    {sucursal.email}
                                                </a>
                                            </div>
                                        </div>
                                    )}

                                    {/* Horarios */}
                                    <div className="flex items-start gap-3">
                                        <Clock size={20} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                        <div>
                                            <p className="text-gray-900 font-semibold">Horarios</p>
                                            <p className="text-gray-600 text-sm">{sucursal.horarios}</p>
                                        </div>
                                    </div>

                                    {/* Mapa */}
                                    {sucursal.mapa_incrustado && (
                                        <div className="mt-4 rounded-lg overflow-hidden border border-gray-200">
                                            <iframe
                                                src={sucursal.mapa_incrustado}
                                                width="100%"
                                                height="200"
                                                style={{ border: 0 }}
                                                allowFullScreen
                                                loading="lazy"
                                                referrerPolicy="no-referrer-when-downgrade"
                                                title={`Mapa de ${sucursal.nombre}`}
                                            ></iframe>
                                        </div>
                                    )}

                                    {/* Botones de acción */}
                                    <div className="flex gap-3 pt-4 border-t border-gray-100">
                                        {sucursal.mapa_incrustado && (
                                            <a
                                                href={sucursal.mapa_incrustado}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="flex-1 bg-[#EA0A2A] hover:bg-[#c90825] text-white px-4 py-2 rounded-lg font-semibold transition-all text-center flex items-center justify-center gap-2"
                                            >
                                                <ExternalLink size={16} />
                                                Ver Ubicación
                                            </a>
                                        )}
                                        <a
                                            href={`tel:${sucursal.telefono.replace(/\s/g, '')}`}
                                            className="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-900 px-4 py-2 rounded-lg font-semibold transition-all text-center"
                                        >
                                            Contactar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>

                    {sucursales.length === 0 && (
                        <div className="text-center py-16">
                            <Building2 size={64} className="text-gray-300 mx-auto mb-4" />
                            <h3 className="text-xl font-bold text-gray-900 mb-2">Sin sucursales disponibles</h3>
                            <p className="text-gray-500">Próximamente agregaremos más ubicaciones.</p>
                        </div>
                    )}
                </div>
            </section>
        </AppLayout>
    );
}