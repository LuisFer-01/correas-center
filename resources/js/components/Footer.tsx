import { faFacebookF, faInstagram, faTiktok, faYoutube } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { Link, router, usePage } from '@inertiajs/react';
import { ArrowUp, Clock, Mail, MapPin, Phone, Send } from 'lucide-react';
import { useEffect, useState } from 'react';

export default function Footer() {
    const { globals, flash } = usePage<any>().props;
    const {
        empresa,
        sucursales,
        footer_productos,
        footer_industrias,
        footer_servicios,
        footer_redes_sociales,
    } = globals;

    const currentYear = new Date().getFullYear();
    const [email, setEmail] = useState('');
    const [nombre, setNombre] = useState('');
    const [showScrollTop, setShowScrollTop] = useState(false);
    const [isSubmitting, setIsSubmitting] = useState(false);

    // Mostrar botón "volver arriba" después de hacer scroll (umbral más bajo)
    useEffect(() => {
        const handleScroll = () => {
            setShowScrollTop(window.scrollY > 300);
        };

        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    const handleNewsletterSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        setIsSubmitting(true);

        router.post('/newsletter/subscribe', {
            email,
            nombre,
        }, {
            preserveScroll: true,
            onSuccess: () => {
                setEmail('');
                setNombre('');
            },
            onFinish: () => {
                setIsSubmitting(false);
            },
        });
    };

    const scrollToTop = () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    // Mapeo de iconos de Font Awesome
    const iconMap: Record<string, any> = {
        'faFacebookF': faFacebookF,
        'faInstagram': faInstagram,
        'faTiktok': faTiktok,
        'faYoutube': faYoutube,
    };

    // Color de hover para cada red social
    const socialColors: Record<string, string> = {
        'faFacebookF': 'hover:bg-[#1877F2]',
        'faInstagram': 'hover:bg-gradient-to-br hover:from-[#833AB4] hover:via-[#FD1D1D] hover:to-[#F77737]',
        'faTiktok': 'hover:bg-black',
        'faYoutube': 'hover:bg-[#FF0000]',
    };

    return (
        <footer className="bg-gray-900 text-white relative">
            {/* ✅ Botón Volver Arriba - Posición mejorada */}
            {showScrollTop && (
                <button
                    onClick={scrollToTop}
                    className="fixed bottom-24 right-6 z-50 bg-[#EA0A2A] hover:bg-[#c90825] text-white w-12 h-12 rounded-full shadow-xl flex items-center justify-center transition-all hover:scale-110 border-2 border-white/20"
                    aria-label="Volver arriba"
                    title="Volver arriba"
                >
                    <ArrowUp size={20} />
                </button>
            )}

            {/* ✅ Mensajes Flash */}
            {flash?.success && (
                <div className="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-2 animate-slide-in">
                    <span>{flash.success}</span>
                </div>
            )}
            {flash?.error && (
                <div className="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-2 animate-slide-in">
                    <span>{flash.error}</span>
                </div>
            )}
            {flash?.info && (
                <div className="fixed top-4 right-4 z-50 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-2 animate-slide-in">
                    <span>{flash.info}</span>
                </div>
            )}

            {/* Sección de Newsletter - Mejorada */}
            <div className="bg-gradient-to-r from-[#EA0A2A] to-[#c90825] py-12">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <h3 className="text-2xl md:text-3xl font-bold mb-2">
                                Mantente Informado
                            </h3>
                            <p className="text-white/90 text-sm md:text-base">
                                Suscríbete a nuestro newsletter y recibe novedades, promociones y contenido exclusivo
                            </p>
                        </div>
                        <form onSubmit={handleNewsletterSubmit} className="flex flex-col sm:flex-row gap-3">
                            <div className="relative flex-1">
                                <Mail size={18} className="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" />
                                <input
                                    type="email"
                                    value={email}
                                    onChange={(e) => setEmail(e.target.value)}
                                    placeholder="Tu correo electrónico"
                                    required
                                    disabled={isSubmitting}
                                    className="w-full pl-11 pr-4 py-3 rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white/50 disabled:opacity-50"
                                />
                            </div>
                            <input
                                type="text"
                                value={nombre}
                                onChange={(e) => setNombre(e.target.value)}
                                placeholder="Tu nombre (opcional)"
                                disabled={isSubmitting}
                                className="hidden sm:block px-4 py-3 rounded-lg bg-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50 disabled:opacity-50"
                            />
                            <button
                                type="submit"
                                disabled={isSubmitting}
                                className="bg-gray-900 hover:bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold transition-all hover:scale-105 flex items-center justify-center gap-2 whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                {isSubmitting ? (
                                    <>
                                        <div className="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                                        Enviando...
                                    </>
                                ) : (
                                    <>
                                        <Send size={18} />
                                        Suscribirse
                                    </>
                                )}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {/* Sección principal del Footer */}
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

                        {/* Redes sociales */}
                        <div className="flex gap-3 mb-6">
                            {footer_redes_sociales && footer_redes_sociales.map((red: any) => (
                                <a
                                    key={red.id}
                                    href={red.url}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className={`w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center transition-all ${socialColors[red.icono] || 'hover:bg-[#EA0A2A]'}`}
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

                    {/* COLUMNA 2: Productos */}
                    <div className="lg:col-span-1">
                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            <span className="w-8 h-0.5 bg-[#EA0A2A]"></span>
                            Productos
                        </h4>
                        <ul className="space-y-2 text-sm">
                            {footer_productos && footer_productos.slice(0, 8).map((item: any) => (
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

                    {/* COLUMNA 3: Aplicaciones y Servicios */}
                    <div>
                        <h4 className="text-base font-bold mb-4 text-white flex items-center gap-2">
                            <span className="w-8 h-0.5 bg-[#EA0A2A]"></span>
                            Aplicaciones
                        </h4>
                        <ul className="space-y-2 text-sm mb-6">
                            {footer_industrias && footer_industrias.slice(0, 6).map((item: any) => (
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
                            <span className="w-8 h-0.5 bg-[#EA0A2A]"></span>
                            Servicios
                        </h4>
                        <ul className="space-y-2 text-sm">
                            {footer_servicios && footer_servicios.slice(0, 4).map((item: any) => (
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
                            {sucursales && sucursales.slice(0, 3).map((sucursal: any, index: number) => (
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
