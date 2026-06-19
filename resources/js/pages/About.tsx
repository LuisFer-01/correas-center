import AppLayout from '@/layouts/AppLayout';
import { usePage } from '@inertiajs/react';
import { Award, CheckCircle2, Clock, Eye, Heart, Target, Users } from 'lucide-react';

export default function About() {
    const { empresa, registros } = usePage<any>().props;

    // Iconos para cada tipo de registro
    const getIcon = (nombre: string) => {
        const lowerName = nombre.toLowerCase();
        if (lowerName.includes('visión')) return Eye;
        if (lowerName.includes('misión')) return Target;
        if (lowerName.includes('valor')) return Heart;
        return Award;
    };

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Award size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">Sobre Nosotros</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        {empresa?.nombre || 'Correas Center'}
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        Líderes en soluciones industriales, hidráulicas, neumáticas y transmisión de potencia en Bolivia
                    </p>
                </div>
            </section>

            {/* Introducción */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="max-w-4xl mx-auto text-center">
                        <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                            Más de 25 Años de Experiencia
                        </h2>
                        <p className="text-lg text-gray-600 leading-relaxed mb-8">
                            En <span className="font-semibold text-[#EA0A2A]">Correas Center</span>, nos dedicamos a proveer soluciones integrales 
                            de transmisión de potencia, sistemas hidráulicos y neumáticos con los más altos estándares de calidad. 
                            Contamos con asesoría técnica especializada y servicio personalizado para nuestros clientes en todo Bolivia.
                        </p>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                            <div className="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                <div className="bg-[#EA0A2A]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <Clock size={32} className="text-[#EA0A2A]" />
                                </div>
                                <h3 className="text-xl font-bold text-gray-900 mb-2">+25 Años</h3>
                                <p className="text-gray-600 text-sm">De experiencia en el mercado boliviano</p>
                            </div>
                            <div className="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                <div className="bg-[#EA0A2A]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <Users size={32} className="text-[#EA0A2A]" />
                                </div>
                                <h3 className="text-xl font-bold text-gray-900 mb-2">1000+</h3>
                                <p className="text-gray-600 text-sm">Clientes satisfechos en todo el país</p>
                            </div>
                            <div className="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                <div className="bg-[#EA0A2A]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <Award size={32} className="text-[#EA0A2A]" />
                                </div>
                                <h3 className="text-xl font-bold text-gray-900 mb-2">SKF</h3>
                                <p className="text-gray-600 text-sm">Fabricante autorizado exclusivo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Visión, Misión y Valores */}
            <section className="py-12 md:py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            Nuestra Filosofía Corporativa
                        </h2>
                        <p className="text-lg text-gray-600">
                            Los principios que guían nuestro trabajo diario
                        </p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {registros.map((registro: any, index: number) => {
                            if (!registro.registro) return null;
                            
                            const Icon = getIcon(registro.registro.nombre);
                            
                            return (
                                <div
                                    key={registro.id}
                                    className="bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1"
                                >
                                    {/* Header con icono */}
                                    <div className="bg-gradient-to-br from-[#EA0A2A] to-[#c90825] p-8 flex items-center justify-center">
                                        <Icon size={56} className="text-white" />
                                    </div>

                                    {/* Contenido */}
                                    <div className="p-6">
                                        <h3 className="text-2xl font-bold text-gray-900 mb-4">
                                            {registro.registro.nombre}
                                        </h3>
                                        <p className="text-gray-600 leading-relaxed">
                                            {registro.registro.descripcion}
                                        </p>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </section>

            {/* Por qué elegirnos */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            ¿Por Qué Elegirnos?
                        </h2>
                        <p className="text-lg text-gray-600">
                            Compromiso, calidad y experiencia al servicio de tu industria
                        </p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {[
                            {
                                title: 'Calidad Garantizada',
                                description: 'Productos de las mejores marcas internacionales con garantía de calidad',
                            },
                            {
                                title: 'Asesoría Técnica Especializada',
                                description: 'Equipo técnico capacitado para brindarte la mejor solución',
                            },
                            {
                                title: 'Cobertura Nacional',
                                description: '4 sucursales estratégicamente ubicadas para atenderte mejor',
                            },
                            {
                                title: 'Entregas Rápidas',
                                description: 'Amplio inventario para entregas inmediatas en todo Bolivia',
                            },
                            {
                                title: 'Fabricante Autorizado SKF',
                                description: 'Únicos autorizados para fabricar sellos SKF en Bolivia',
                            },
                            {
                                title: 'Servicio Personalizado',
                                description: 'Soluciones a medida para cada cliente y cada industria',
                            },
                        ].map((item, index) => (
                            <div
                                key={index}
                                className="flex items-start gap-4 bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#EA0A2A]/20 transition-colors"
                            >
                                <div className="bg-[#EA0A2A]/10 p-2 rounded-lg flex-shrink-0">
                                    <CheckCircle2 size={24} className="text-[#EA0A2A]" />
                                </div>
                                <div>
                                    <h3 className="text-lg font-bold text-gray-900 mb-2">
                                        {item.title}
                                    </h3>
                                    <p className="text-gray-600">
                                        {item.description}
                                    </p>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}