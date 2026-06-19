import { Award, Clock, HeadphonesIcon, MapPin, Package, Users } from 'lucide-react';

export default function Differentials() {
    const features = [
        {
            icon: Clock,
            title: '+25 Años',
            subtitle: 'Experiencia Comprobada',
            description: 'Más de dos décadas liderando el mercado industrial boliviano',
        },
        {
            icon: Award,
            title: 'SKF',
            subtitle: 'Licencia Exclusiva',
            description: 'Únicos autorizados para fabricar sellos SKF en Bolivia',
        },
        {
            icon: Package,
            title: '10,000+',
            subtitle: 'Productos en Stock',
            description: 'Amplio inventario para entregas inmediatas',
        },
        {
            icon: HeadphonesIcon,
            title: '24/7',
            subtitle: 'Soporte Técnico',
            description: 'Asesoría especializada cuando la necesites',
        },
        {
            icon: MapPin,
            title: '4',
            subtitle: 'Sucursales',
            description: 'Cobertura nacional para estar cerca de ti',
        },
        {
            icon: Users,
            title: '100%',
            subtitle: 'Atención Personalizada',
            description: 'Soluciones a medida para cada cliente',
        },
    ];

    return (
        <section className="py-16 md:py-24 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header de la sección */}
                <div className="text-center mb-12 md:mb-16">
                    <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                        ¿Por Qué Elegirnos?
                    </p>
                    <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Tu Socio Estratégico en Soluciones Industriales
                    </h2>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Compromiso, calidad y experiencia al servicio de tu industria
                    </p>
                </div>

                {/* Grid de características */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    {features.map((feature, index) => {
                        const Icon = feature.icon;
                        return (
                            <div
                                key={index}
                                className="bg-gradient-to-br from-gray-50 to-white rounded-xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-[#EA0A2A]/20 group"
                            >
                                <div className="flex items-center gap-4 mb-4">
                                    <div className="bg-[#EA0A2A]/10 p-3 rounded-lg group-hover:bg-[#EA0A2A] transition-colors">
                                        <Icon size={32} className="text-[#EA0A2A] group-hover:text-white transition-colors" />
                                    </div>
                                    <div>
                                        <h3 className="text-3xl font-bold text-gray-900">
                                            {feature.title}
                                        </h3>
                                        <p className="text-sm text-[#EA0A2A] font-semibold">
                                            {feature.subtitle}
                                        </p>
                                    </div>
                                </div>
                                <p className="text-gray-600">
                                    {feature.description}
                                </p>
                            </div>
                        );
                    })}
                </div>
            </div>
        </section>
    );
}