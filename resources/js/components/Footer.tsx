import { faFacebookF, faInstagram, faTiktok, faYoutube } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { Link, usePage } from '@inertiajs/react';
import { Clock, MapPin, Phone } from 'lucide-react';

export default function Footer() {
    const { globals } = usePage<any>().props;
    const { empresa, productos, industrias, servicios, sucursales } = globals;

    const currentYear = new Date().getFullYear();

    return (
        <footer className="bg-gray-900 text-white">
            {/* Sección principal */}
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
                    {/* COLUMNA 1: Logo y descripción */}
                    <div className="lg:col-span-1">
                        <Link href="/" className="flex items-center gap-3 cursor-pointer mb-4">
                            <h3 className="text-2xl font-bold tracking-tight">CORREAS CENTER</h3>
                        </Link>
                        <p className="text-gray-400 mb-6 text-sm leading-relaxed">
                            Líderes en soluciones industriales, hidráulicas, neumáticas y transmisión de potencia en Bolivia.
                            Más de 25 años brindando calidad y servicio técnico especializado.
                        </p>

                        {/* Redes sociales */}
                        <div className="flex gap-3 mb-6">
                            <a
                                href="https://www.facebook.com/CorreasCenterLtda"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-[#1877F2] transition-colors"
                                aria-label="Facebook"
                            >
                                <FontAwesomeIcon icon={faFacebookF} size="lg" />
                            </a>
                            <a
                                href="https://www.instagram.com/correascenterltda"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-500 transition-all"
                                aria-label="Instagram"
                            >
                                <FontAwesomeIcon icon={faInstagram} size="lg" />
                            </a>
                            <a
                                href="#"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-black transition-colors"
                                aria-label="TikTok"
                            >
                                <FontAwesomeIcon icon={faTiktok} size="lg" />
                            </a>
                            <a
                                href="#"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-[#FF0000] transition-colors"
                                aria-label="YouTube"
                            >
                                <FontAwesomeIcon icon={faYoutube} size="lg" />
                            </a>
                        </div>

                        {/* Badge de licencia */}
                        <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-lg px-3 py-2">
                            <div className="w-2 h-2 bg-[#EA0A2A] rounded-full animate-pulse"></div>
                            <span className="text-xs text-white font-semibold">Fabricante Autorizado SKF Bolivia</span>
                        </div>
                    </div>

                    {/* COLUMNA 2: Productos */}
                    <div className="lg:col-span-1">
                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            Productos
                        </h4>
                        <ul className="space-y-2 text-sm">
                            {productos.slice(0, 7).map((producto: any, index: number) => (
                                <li key={index}>
                                    <Link
                                        href={`/products/${producto.slug}`}
                                        className="text-gray-400 hover:text-[#EA0A2A] transition-colors hover:translate-x-1 inline-block"
                                    >
                                        {producto.nombre}
                                    </Link>
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

                    {/* COLUMNA 3: Aplicaciones y Servicios */}
                    <div>
                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            Aplicaciones
                        </h4>
                        <ul className="space-y-2 text-sm mb-6">
                            {industrias.slice(0, 5).map((industria: any, index: number) => (
                                <li key={index}>
                                    <Link
                                        href={`/applications/${industria.slug}`}
                                        className="text-gray-400 hover:text-[#EA0A2A] transition-colors hover:translate-x-1 inline-block"
                                    >
                                        {industria.nombre}
                                    </Link>
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
                            {servicios.slice(0, 4).map((servicio: any, index: number) => (
                                <li key={index}>
                                    <Link
                                        href={`/services/${servicio.nombre.toLowerCase().replace(/\s+/g, '-')}`}
                                        className="text-gray-400 hover:text-[#EA0A2A] transition-colors hover:translate-x-1 inline-block"
                                    >
                                        {servicio.nombre}
                                    </Link>
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
