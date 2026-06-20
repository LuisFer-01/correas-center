import AppLayout from '@/layouts/AppLayout';
import { Link, usePage } from '@inertiajs/react';
import { ArrowRight, Layers, Package } from 'lucide-react';

export default function ProductsIndex() {
    const { productos } = usePage<any>().props;

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Package size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">Catálogo Completo</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        Nuestros Productos
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        Explora nuestro amplio catálogo de productos industriales de las mejores marcas internacionales
                    </p>
                </div>
            </section>

            {/* Grid de productos */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                        {productos.map((producto: any) => (
                            <Link
                                key={producto.id}
                                href={`/products/${producto.slug}`}
                                className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1"
                            >
                                {/* Imagen del producto */}
                                <div className="relative h-52 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                                    {producto.imagen ? (
                                        <img src={producto.imagen} alt={producto.nombre} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                    ) : (
                                        <div className="absolute inset-0 flex items-center justify-center">
                                            <Package size={64} className="text-gray-300" />
                                        </div>
                                    )}
                                    <div className="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                    {/* Badge de categorías */}
                                    <div className="absolute top-3 right-3 bg-[#EA0A2A] text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                                        <Layers size={12} />
                                        {producto.categorias_count}
                                    </div>
                                </div>

                                {/* Contenido */}
                                <div className="p-5">
                                    <h3 className="text-lg font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                                        {producto.nombre}
                                    </h3>

                                    {/* NUEVO: Uso (badge) */}
                                    {producto.uso && (
                                        <div className="inline-block bg-[#EA0A2A]/10 text-[#EA0A2A] text-xs font-semibold px-2 py-1 rounded-full mb-2">
                                            {producto.uso}
                                        </div>
                                    )}

                                    {/* NUEVO: descripcion_corta */}
                                    <p className="text-sm text-gray-500 mb-4 line-clamp-2">
                                        {producto.descripcion_corta}
                                    </p>

                                    {/* NUEVO: Logos de marcas más grandes */}
                                    {producto.marcas && producto.marcas.length > 0 && (
                                        <div className="mb-3">
                                            <p className="text-xs text-gray-400 font-semibold mb-2 uppercase tracking-wide">Marcas disponibles</p>
                                            <div className="flex items-center gap-2 flex-wrap">
                                                {producto.marcas.slice(0, 8).map((marca: any) => (
                                                    <div
                                                        key={marca.id}
                                                        className="w-14 h-10 flex items-center justify-center bg-white rounded-md border border-gray-200 overflow-hidden hover:border-[#EA0A2A] hover:shadow-md transition-all"
                                                        title={marca.nombre}
                                                    >
                                                        {marca.logo ? (
                                                            <img
                                                                src={marca.logo}
                                                                alt={marca.nombre}
                                                                className="w-full h-full object-contain p-1"
                                                            />
                                                        ) : (
                                                            <span className="text-[10px] font-bold text-gray-600 text-center leading-tight px-1">
                                                                {marca.nombre.substring(0, 4)}
                                                            </span>
                                                        )}
                                                    </div>
                                                ))}
                                                {producto.marcas.length > 8 && (
                                                    <div className="w-14 h-10 flex items-center justify-center bg-[#EA0A2A] text-white rounded-md text-xs font-bold">
                                                        +{producto.marcas.length - 8}
                                                    </div>
                                                )}
                                            </div>
                                        </div>
                                    )}

                                    <div className="flex items-center justify-between pt-2 border-t border-gray-100">
                                        <span className="text-xs text-gray-400 font-medium">
                                            {producto.categorias_count} {producto.categorias_count === 1 ? 'categoría' : 'categorías'}
                                        </span>
                                        <ArrowRight size={18} className="text-[#EA0A2A] group-hover:translate-x-1 transition-transform" />
                                    </div>
                                </div>
                            </Link>
                        ))}
                    </div>
                </div>
            </section>

            {/* CTA */}
            <section className="py-12 bg-gray-50">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                        ¿No encuentras lo que buscas?
                    </h2>
                    <p className="text-gray-600 mb-6">
                        Contáctanos y nuestro equipo técnico te ayudará a encontrar la solución perfecta
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link href="/contact" className="bg-[#EA0A2A] hover:bg-[#c90825] text-white px-8 py-3 rounded-lg font-semibold transition-all hover:scale-105 inline-flex items-center justify-center gap-2">
                            Contactar Ahora
                            <ArrowRight size={18} />
                        </Link>
                        <a href="https://wa.me/59177306576?text=Hola%2C%20necesito%20ayuda%20para%20encontrar%20un%20producto" target="_blank" rel="noopener noreferrer" className="bg-[#25D366] hover:bg-[#128C7E] text-white px-8 py-3 rounded-lg font-semibold transition-all hover:scale-105 inline-flex items-center justify-center gap-2">
                            Escribir por WhatsApp
                        </a>
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}
