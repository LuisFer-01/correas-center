import { Link, usePage } from '@inertiajs/react';
import { ArrowRight } from 'lucide-react';

export default function Products() {
    const { globals } = usePage<any>().props;
    const productos = globals.productos || [];

    return (
        <section className="py-16 md:py-24 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header de la sección */}
                <div className="text-center mb-12 md:mb-16">
                    <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                        Nuestros Productos
                    </p>
                    <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Soluciones Completas para tu Industria
                    </h2>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Amplio catálogo de productos industriales de las mejores marcas internacionales
                    </p>
                </div>

                {/* Grid de productos */}
                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    {productos.slice(0, 8).map((producto: any) => (
                        <Link
                            key={producto.id}
                            href={`/products/${producto.slug}`}
                            className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/20"
                        >
                            {/* Imagen del producto */}
                            <div className="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                                <div className="absolute inset-0 flex items-center justify-center text-gray-400">
                                    <div className="text-6xl">📦</div>
                                </div>
                                <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>

                            {/* Contenido */}
                            <div className="p-6">
                                <h3 className="text-lg font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                                    {producto.nombre}
                                </h3>
                                <p className="text-sm text-gray-600 mb-4 line-clamp-2">
                                    {producto.categorias?.[0]?.descripcion_corta || 'Productos de alta calidad para tu industria'}
                                </p>
                                <div className="flex items-center text-[#EA0A2A] font-semibold text-sm group-hover:gap-2 transition-all">
                                    <span>Ver subcategorías</span>
                                    <ArrowRight size={16} className="ml-1 group-hover:translate-x-1 transition-transform" />
                                </div>
                            </div>
                        </Link>
                    ))}
                </div>

                {/* Botón ver todos */}
                <div className="text-center mt-12">
                    <Link
                        href="/products"
                        className="inline-flex items-center gap-2 bg-[#EA0A2A] hover:bg-[#c90825] text-white px-8 py-4 rounded-lg font-semibold transition-all hover:scale-105 group"
                    >
                        Ver Todos los Productos
                        <ArrowRight size={20} className="group-hover:translate-x-1 transition-transform" />
                    </Link>
                </div>
            </div>
        </section>
    );
}
