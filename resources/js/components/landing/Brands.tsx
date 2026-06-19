import { usePage } from '@inertiajs/react';
import { Award } from 'lucide-react';

export default function Brands() {
    const { globals } = usePage<any>().props;
    const productos = globals.productos || [];

    // Obtener marcas únicas de los productos
    const marcas = productos.flatMap((p: any) => p.marcas || []).filter((m: any, index: number, self: any[]) =>
        index === self.findIndex((t) => t.id === m.id)
    );

    return (
        <section className="py-16 md:py-24 bg-gray-50">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header de la sección */}
                <div className="text-center mb-12 md:mb-16">
                    <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                        Marcas Líderes
                    </p>
                    <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Representamos las Mejores Marcas Internacionales
                    </h2>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Calidad garantizada con productos de fabricantes reconocidos mundialmente
                    </p>
                </div>

                {/* Grid de marcas */}
                <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-6 md:gap-8 mb-12">
                    {marcas.slice(0, 7).map((marca: any) => (
                        <div
                            key={marca.id}
                            className="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center h-32 border border-gray-100 hover:border-[#EA0A2A]/20 group"
                        >
                            <div className="text-center">
                                <div className="text-2xl font-bold text-gray-700 group-hover:text-[#EA0A2A] transition-colors">
                                    {marca.nombre}
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

                {/* Badge de licencia SKF */}
                <div className="bg-gradient-to-r from-[#EA0A2A] to-[#c90825] rounded-2xl p-8 md:p-12 text-white text-center">
                    <div className="flex items-center justify-center gap-3 mb-4">
                        <Award size={40} />
                        <h3 className="text-2xl md:text-3xl font-bold">FABRICANTE AUTORIZADO</h3>
                    </div>
                    <p className="text-lg md:text-xl font-semibold mb-2">
                        Licencia Exclusiva SKF para Bolivia
                    </p>
                    <p className="text-white/90 max-w-2xl mx-auto">
                        Únicos autorizados para fabricar sellos y retenes SKF en el país
                    </p>
                </div>
            </div>
        </section>
    );
}
