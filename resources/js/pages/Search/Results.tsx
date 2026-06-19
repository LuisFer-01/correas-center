import AppLayout from '@/layouts/AppLayout';
import { Link, usePage } from '@inertiajs/react';
import { ArrowRight, Layers, Package, Search } from 'lucide-react';

export default function SearchResults() {
    const { query, productos, categorias, total } = usePage<any>().props;

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Search size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">Resultados de Búsqueda</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        Resultados para "{query}"
                    </h1>
                    <p className="text-lg text-gray-300">
                        {total > 0 ? (
                            <>Se encontraron <span className="font-bold text-[#EA0A2A]">{total}</span> resultados</>
                        ) : (
                            'No se encontraron resultados'
                        )}
                    </p>
                </div>
            </section>

            {/* Productos encontrados */}
            {productos.length > 0 && (
                <section className="py-12 md:py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex items-center gap-3 mb-8">
                            <div className="bg-[#EA0A2A]/10 p-3 rounded-lg">
                                <Package size={28} className="text-[#EA0A2A]" />
                            </div>
                            <div>
                                <h2 className="text-2xl md:text-3xl font-bold text-gray-900">
                                    Productos
                                </h2>
                                <p className="text-gray-600 text-sm">
                                    {productos.length} {productos.length === 1 ? 'producto encontrado' : 'productos encontrados'}
                                </p>
                            </div>
                        </div>

                        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            {productos.map((producto: any) => (
                                <Link
                                    key={producto.id}
                                    href={`/products/${producto.slug}`}
                                    className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1"
                                >
                                    <div className="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                                        {producto.imagen ? (
                                            <img src={producto.imagen} alt={producto.nombre} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                        ) : (
                                            <div className="absolute inset-0 flex items-center justify-center">
                                                <Package size={64} className="text-gray-300" />
                                            </div>
                                        )}
                                    </div>

                                    <div className="p-5">
                                        <h3 className="text-lg font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                                            {producto.nombre}
                                        </h3>
                                        {producto.categorias.length > 0 && (
                                            <div className="flex flex-wrap gap-1 mb-3">
                                                {producto.categorias.slice(0, 2).map((cat: any, idx: number) => (
                                                    <span key={idx} className="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                                                        {cat.nombre}
                                                    </span>
                                                ))}
                                            </div>
                                        )}
                                        <div className="flex items-center text-[#EA0A2A] font-semibold text-sm group-hover:gap-2 transition-all">
                                            <span>Ver detalles</span>
                                            <ArrowRight size={16} className="ml-1 group-hover:translate-x-1 transition-transform" />
                                        </div>
                                    </div>
                                </Link>
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Categorías encontradas */}
            {categorias.length > 0 && (
                <section className="py-12 md:py-16 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex items-center gap-3 mb-8">
                            <div className="bg-[#EA0A2A]/10 p-3 rounded-lg">
                                <Layers size={28} className="text-[#EA0A2A]" />
                            </div>
                            <div>
                                <h2 className="text-2xl md:text-3xl font-bold text-gray-900">
                                    Categorías
                                </h2>
                                <p className="text-gray-600 text-sm">
                                    {categorias.length} {categorias.length === 1 ? 'categoría encontrada' : 'categorías encontradas'}
                                </p>
                            </div>
                        </div>

                        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            {categorias.map((categoria: any) => (
                                <Link
                                    key={categoria.id}
                                    href={`/products/${categoria.producto?.slug}/${categoria.slug}`}
                                    className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1 p-6"
                                >
                                    {categoria.producto && (
                                        <div className="inline-block bg-[#EA0A2A]/10 text-[#EA0A2A] text-xs font-semibold px-2 py-1 rounded-full mb-3">
                                            {categoria.producto.nombre}
                                        </div>
                                    )}
                                    <h3 className="text-lg font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                                        {categoria.nombre}
                                    </h3>
                                    {categoria.descripcion_corta && (
                                        <p className="text-sm text-gray-600 mb-4">
                                            {categoria.descripcion_corta}
                                        </p>
                                    )}
                                    <div className="flex items-center text-[#EA0A2A] font-semibold text-sm group-hover:gap-2 transition-all">
                                        <span>Ver detalles</span>
                                        <ArrowRight size={16} className="ml-1 group-hover:translate-x-1 transition-transform" />
                                    </div>
                                </Link>
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Sin resultados */}
            {total === 0 && (
                <section className="py-16 bg-white">
                    <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                        <Search size={64} className="text-gray-300 mx-auto mb-6" />
                        <h2 className="text-2xl font-bold text-gray-900 mb-4">
                            No encontramos resultados para "{query}"
                        </h2>
                        <p className="text-gray-600 mb-8">
                            Intenta con otros términos o explora nuestro catálogo completo
                        </p>
                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Link href="/products" className="bg-[#EA0A2A] hover:bg-[#c90825] text-white px-8 py-3 rounded-lg font-semibold transition-all hover:scale-105 inline-flex items-center justify-center gap-2">
                                Ver Todos los Productos
                                <ArrowRight size={18} />
                            </Link>
                            <Link href="/contact" className="bg-gray-100 hover:bg-gray-200 text-gray-900 px-8 py-3 rounded-lg font-semibold transition-all">
                                Contactar Ahora
                            </Link>
                        </div>
                    </div>
                </section>
            )}
        </AppLayout>
    );
}
