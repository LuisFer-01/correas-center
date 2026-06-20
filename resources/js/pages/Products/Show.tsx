import AppLayout from '@/layouts/AppLayout';
import { Link, usePage } from '@inertiajs/react';
import { ArrowRight, Package } from 'lucide-react';

export default function ProductShow() {
    const { producto } = usePage<any>().props;

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20 overflow-hidden">
                {producto.imagen && (
                    <div className="absolute inset-0">
                        <img
                            src={producto.imagen}
                            alt={producto.nombre}
                            className="w-full h-full object-cover opacity-20"
                        />
                        <div className="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800/90 to-gray-900"></div>
                    </div>
                )}

                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <Package size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">{producto.nombre}</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        {producto.nombre}
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        Explora todas las categorías y subcategorías disponibles de {producto.nombre.toLowerCase()}
                    </p>
                </div>
            </section>

            {/* Grid de categorías */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {/* Botón volver */}
                    <div className="mb-8">
                        <Link href="/products" className="inline-flex items-center gap-2 text-gray-600 hover:text-[#EA0A2A] transition-colors font-medium">
                            ← Volver a todos los productos
                        </Link>
                    </div>

                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        {producto.categorias.map((categoria: any) => (
                            <Link
                                key={categoria.id}
                                href={`/products/${producto.slug}/${categoria.slug}`}
                                className="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#EA0A2A]/30 transform hover:-translate-y-1"
                            >
                                {/* Imagen de la categoría */}
                                <div className="relative h-48 bg-gradient-to-br from-[#EA0A2A]/5 to-[#EA0A2A]/15 overflow-hidden">
                                    {categoria.imagen ? (
                                        <img src={categoria.imagen} alt={categoria.nombre} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                    ) : (
                                        <div className="absolute inset-0 flex items-center justify-center">
                                            <div className="text-center">
                                                <div className="w-16 h-16 bg-[#EA0A2A]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                                    <Package size={32} className="text-[#EA0A2A]" />
                                                </div>
                                            </div>
                                        </div>
                                    )}
                                    <div className="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>

                                {/* Contenido */}
                                <div className="p-6">
                                    <h3 className="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#EA0A2A] transition-colors">
                                        {categoria.nombre}
                                    </h3>

                                    {/* Uso como badge */}
                                    {categoria.uso && (
                                        <div className="inline-block bg-[#EA0A2A]/10 text-[#EA0A2A] text-xs font-semibold px-2 py-1 rounded-full mb-2">
                                            {categoria.uso}
                                        </div>
                                    )}

                                    {categoria.descripcion_corta && (
                                        <p className="text-sm text-gray-500 mb-4 line-clamp-2">
                                            {categoria.descripcion_corta}
                                        </p>
                                    )}

                                    {/* NUEVO: Logos de marcas de esta categoría */}
                                    {categoria.marcas && categoria.marcas.length > 0 && (
                                        <div className="mb-4 pt-3 border-t border-gray-100">
                                            <p className="text-xs text-gray-400 font-semibold mb-2 uppercase tracking-wide">Marcas disponibles</p>
                                            <div className="flex items-center gap-2 flex-wrap">
                                                {categoria.marcas.slice(0, 6).map((marca: any) => (
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
                                                {categoria.marcas.length > 6 && (
                                                    <div className="w-14 h-10 flex items-center justify-center bg-[#EA0A2A] text-white rounded-md text-xs font-bold">
                                                        +{categoria.marcas.length - 6}
                                                    </div>
                                                )}
                                            </div>
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

                    {producto.categorias.length === 0 && (
                        <div className="text-center py-16">
                            <Package size={64} className="text-gray-300 mx-auto mb-4" />
                            <h3 className="text-xl font-bold text-gray-900 mb-2">Sin categorías disponibles</h3>
                            <p className="text-gray-500">Próximamente agregaremos más categorías para este producto.</p>
                        </div>
                    )}
                </div>
            </section>
        </AppLayout>
    );
}
