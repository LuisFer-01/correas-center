import { usePage } from '@inertiajs/react';
import { ChevronDown, Clock, MapPin, MessageCircle, Phone } from 'lucide-react';
import { useState } from 'react';

export default function Locations() {
    const { globals } = usePage<any>().props;
    const sucursales = globals.sucursales || [];
    const [expandedLocation, setExpandedLocation] = useState<number | null>(null);

    const openWhatsApp = (wphone: string, locationName: string) => {
        const message = `Hola, estoy interesado en información sobre ${locationName}`;
        const url = `https://wa.me/${wphone}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
    };

    if (sucursales.length === 0) {
        return null;
    }

    return (
        <section className="py-20 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-16">
                    <div className="inline-block bg-[#EA0A2A]/10 rounded-full px-4 py-2 mb-4">
                        <p className="text-[#EA0A2A] font-semibold text-sm">UBICACIONES</p>
                    </div>
                    <h2 className="text-4xl font-bold text-gray-900 mb-4">
                        Nuestras Sucursales
                    </h2>
                    <p className="text-xl text-gray-600 max-w-3xl mx-auto">
                        Cobertura estratégica para atenderte mejor
                    </p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {sucursales.map((sucursal: any, index: number) => (
                        <div
                            key={sucursal.id}
                            className="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden hover:border-[#EA0A2A] transition-all duration-300"
                        >
                            <div className="p-6">
                                <h3 className="text-2xl font-bold text-gray-900 mb-4">
                                    {sucursal.nombre}
                                    {sucursal.es_principal && (
                                        <span className="ml-2 text-sm font-normal text-[#EA0A2A]">
                                            (Principal)
                                        </span>
                                    )}
                                </h3>

                                <div className="space-y-3 mb-6">
                                    <div className="flex items-start gap-3">
                                        <MapPin className="text-[#EA0A2A] flex-shrink-0 mt-1" size={20} />
                                        <p className="text-gray-700 text-sm">{sucursal.direccion}</p>
                                    </div>

                                    <div className="flex items-center gap-3">
                                        <Phone className="text-[#EA0A2A] flex-shrink-0" size={20} />
                                        <a
                                            href={`tel:${sucursal.telefono.replace(/\s/g, '')}`}
                                            className="text-gray-700 text-sm hover:text-[#EA0A2A] transition-colors"
                                        >
                                            {sucursal.telefono}
                                        </a>
                                    </div>

                                    <div className="flex items-center gap-3">
                                        <Phone className="text-[#EA0A2A] flex-shrink-0" size={20} />
                                        <a
                                            href={`mailto:${sucursal.email}`}
                                            className="text-gray-700 text-sm hover:text-[#EA0A2A] transition-colors"
                                        >
                                            {sucursal.email}
                                        </a>
                                    </div>

                                    <div className="flex items-start gap-3">
                                        <Clock className="text-[#EA0A2A] flex-shrink-0 mt-1" size={20} />
                                        <p className="text-gray-700 text-sm">{sucursal.horarios}</p>
                                    </div>
                                </div>

                                <div className="flex gap-3">
                                    <button
                                        onClick={() => setExpandedLocation(expandedLocation === index ? null : index)}
                                        className="flex-1 inline-flex items-center justify-center gap-2 bg-[#EA0A2A] text-white px-4 py-3 rounded-md hover:bg-[#C10923] transition-all font-semibold text-sm"
                                    >
                                        {expandedLocation === index ? 'Ocultar Mapa' : 'Ver Ubicación'}
                                        <ChevronDown
                                            size={16}
                                            className={`transition-transform ${expandedLocation === index ? 'rotate-180' : ''}`}
                                        />
                                    </button>

                                    <button
                                        onClick={() => openWhatsApp(sucursal.whatsapp, sucursal.nombre)}
                                        className="flex-1 inline-flex items-center justify-center gap-2 bg-green-600 text-white px-4 py-3 rounded-md hover:bg-green-700 transition-all font-semibold text-sm"
                                    >
                                        Contactar
                                        <MessageCircle size={16} />
                                    </button>
                                </div>
                            </div>

                            {/* Mapa expandido */}
                            {expandedLocation === index && sucursal.mapa_incrustado && (
                                <div className="border-t border-gray-200">
                                    <div className="h-64 w-full">
                                        <iframe
                                            src={sucursal.mapa_incrustado}
                                            width="100%"
                                            height="100%"
                                            style={{ border: 0 }}
                                            allowFullScreen
                                            loading="lazy"
                                            referrerPolicy="no-referrer-when-downgrade"
                                            title={`Mapa de ${sucursal.nombre}`}
                                        ></iframe>
                                    </div>
                                </div>
                            )}
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}
