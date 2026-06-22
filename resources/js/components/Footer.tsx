import { faFacebookF, faInstagram, faTiktok, faYoutube } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { Link, usePage } from '@inertiajs/react';
import { Clock, MapPin, Phone } from 'lucide-react';

export default function Footer() {
    const { globals } = usePage<any>().props;
    const {
        empresa,
        sucursales,
        footer_productos,
        footer_industrias,
        footer_servicios,
        footer_redes_sociales,
        footer_porque_elegirnos,
        footer_estadisticas
    } = globals;

    const currentYear = new Date().getFullYear();

    // Mapeo de iconos de Font Awesome
    const iconMap: Record<string, any> = {
        'faFacebookF': faFacebookF,
        'faInstagram': faInstagram,
        'faTiktok': faTiktok,
        'faYoutube': faYoutube,
    };

    // Mapeo de iconos de Lucide
    const lucideIconMap: Record<string, any> = {
        'CheckCircle2': () => <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>,
        'Clock': () => <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>,
        'Users': () => <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>,
        'Award': () => <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>,
    };

    return (
        <footer className="bg-gray-900 text-white">
            {/* Sección principal */}
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
                    {/* COLUMNA 1: Logo y descripción */}
                    <div className="lg:col-span-1">
                        <Link href="/" className="flex items-center gap-3 cursor-pointer mb-4">
                            <h3 className="text-2xl font-bold tracking-tight">{empresa?.nombre || 'CORREAS CENTER'}</h3>
                        </Link>
                        <p className="text-gray-400 mb-6 text-sm leading-relaxed">
                            Líderes en soluciones industriales, hidráulicas, neumáticas y transmisión de potencia en Bolivia.
                            Más de 25 años brindando calidad y servicio técnico especializado.
                        </p>

                        {/* Redes sociales - Desde BD */}
                        <div className="flex gap-3 mb-6">
                            {footer_redes_sociales.map((red: any) => (
                                <a
                                    key={red.id}
                                    href={red.url}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-[#1877F2] transition-colors"
                                    aria-label={red.titulo}
                                >
                                    {iconMap[red.icono] && <FontAwesomeIcon icon={iconMap[red.icono]} size="lg" />}
                                </a>
                            ))}
                        </div>

                        {/* Badge de licencia */}
                        <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-lg px-3 py-2">
                            <div className="w-2 h-2 bg-[#EA0A2A] rounded-full animate-pulse"></div>
                            <span className="text-xs text-white font-semibold">Fabricante Autorizado SKF Bolivia</span>
                        </div>
                    </div>

                    {/* COLUMNA 2: Productos - Desde BD */}
                    <div className="lg:col-span-1">
                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            Productos
                        </h4>
                        <ul className="space-y-2 text-sm">
                            {footer_productos.map((item: any) => (
                                <li key={item.id}>
                                    {item.producto && (
                                        <Link
                                            href={`/products/${item.producto.slug}`}
                                            className="text-gray-400 hover:text-[#EA0A2A] transition-colors hover:translate-x-1 inline-block"
                                        >
                                            {item.producto.nombre}
                                        </Link>
                                    )}
                                </li>
                            ))}
                            <li>
                                <Link
                                    href="/products"
                                    className="text-[#EA0A2A] font-semibold hover:text-white transition-colors inline-flex items-center gap-1"
                                >
                                    Ver todos →
                                </Link>
                            </li>
                        </ul>
                    </div>

                    {/* COLUMNA 3: Aplicaciones y Servicios - Desde BD */}
                    <div>
                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            Aplicaciones
                        </h4>
                        <ul className="space-y-2 text-sm mb-6">
                            {footer_industrias.map((item: any) => (
                                <li key={item.id}>
                                    {item.industria && (
                                        <Link
                                            href={`/applications/${item.industria.slug}`}
                                            className="text-gray-400 hover:text-[#EA0A2A] transition-colors hover:translate-x-1 inline-block"
                                        >
                                            {item.industria.nombre}
                                        </Link>
                                    )}
                                </li>
                            ))}
                            <li>
                                <Link
                                    href="/applications"
                                    className="text-[#EA0A2A] font-semibold hover:text-white transition-colors inline-flex items-center gap-1"
                                >
                                    Ver todas →
                                </Link>
                            </li>
                        </ul>

                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            Servicios
                        </h4>
                        <ul className="space-y-2 text-sm">
                            {footer_servicios.map((item: any) => (
                                <li key={item.id}>
                                    {item.servicio && (
                                        <Link
                                            href={`/services/${item.servicio.nombre.toLowerCase().replace(/\s+/g, '-')}`}
                                            className="text-gray-400 hover:text-[#EA0A2A] transition-colors hover:translate-x-1 inline-block"
                                        >
                                            {item.servicio.nombre}
                                        </Link>
                                    )}
                                </li>
                            ))}
                            <li>
                                <Link
                                    href="/services"
                                    className="text-[#EA0A2A] font-semibold hover:text-white transition-colors inline-flex items-center gap-1"
                                >
                                    Ver todos →
                                </Link>
                            </li>
                        </ul>
                    </div>

                    {/* COLUMNA 4: Sucursales */}
                    <div>
                        <h4 className="text-base font-bold mb-3 text-white flex items-center gap-2">
                            <span className="w-8 h-0.5 bg-[#EA0A2A]"></span>
                            Nuestras Sucursales
                        </h4>
                        <div className="space-y-4">
                            {sucursales.map((sucursal: any, index: number) => (
                                <div key={index} className="border-l-2 border-[#EA0A2A]/30 pl-3 hover:border-[#EA0A2A] transition-colors">
                                    <p className="text-white text-sm font-semibold mb-1">{sucursal.nombre}</p>
                                    <div className="space-y-1 text-xs text-gray-400">
                                        <div className="flex items-start gap-2">
                                            <MapPin size={12} className="flex-shrink-0 mt-0.5 text-[#EA0A2A]" />
                                            <span>{sucursal.direccion}</span>
                                        </div>
                                        <div className="flex items-center gap-2">
                                            <Phone size={12} className="flex-shrink-0 text-[#EA0A2A]" />
                                            <a href={`tel:${sucursal.telefono.replace(/\s/g, '')}`} className="hover:text-white transition-colors">
                                                {sucursal.telefono}
                                            </a>
                                        </div>
                                        <div className="flex items-start gap-2">
                                            <Clock size={12} className="flex-shrink-0 mt-0.5 text-[#EA0A2A]" />
                                            <span>{sucursal.horarios}</span>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>

            {/* Sección inferior */}
            <div className="border-t border-white/10">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div className="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p className="text-gray-400 text-sm text-center md:text-left">
                            © {currentYear} <span className="font-semibold text-white">CORREAS CENTER LTDA.</span> Todos los derechos reservados.
                        </p>
                        <div className="flex flex-wrap justify-center gap-4 md:gap-6 text-sm text-gray-400">
                            <Link href="/privacy" className="hover:text-[#EA0A2A] transition-colors">Política de Privacidad</Link>
                            <Link href="/terms" className="hover:text-[#EA0A2A] transition-colors">Términos y Condiciones</Link>
                            <Link href="/branches" className="hover:text-[#EA0A2A] transition-colors">Mapa del Sitio</Link>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    );
}
