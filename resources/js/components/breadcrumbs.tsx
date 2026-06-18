import { Link, usePage } from '@inertiajs/react';
import { ChevronRight, Home } from 'lucide-react';
import { useEffect, useState } from 'react';

interface BreadcrumbItem {
    label: string;
    href?: string;
}

// Mapeo de rutas a nombres amigables
const routeLabels: Record<string, string> = {
    'products': 'Productos',
    'services': 'Servicios',
    'applications': 'Aplicaciones',
    'about': 'Acerca de',
    'contact': 'Contacto',
    'privacy': 'Política de Privacidad',
    'terms': 'Términos y Condiciones',
    'sitemap': 'Mapa del Sitio',
    // Categorías de productos
    'correas': 'Correas',
    'mangueras': 'Mangueras',
    'rodamientos': 'Rodamientos',
    'retenes-sellos-orings': 'Retenes, Sellos y O-rings',
    'bandas-transportadoras': 'Bandas Transportadoras',
    'cadenas': 'Cadenas',
    'poleas': 'Poleas',
    'pinones': 'Piñones',
    'niples-conexiones': 'Niples y Conexiones',
    'cilindros': 'Cilindros',
    'cangilones': 'Cangilones',
    'cardanes': 'Cardanes',
    'cajas-comandos': 'Cajas de Comandos',
    'abrazaderas': 'Abrazaderas',
    // Aplicaciones
    'industria-alimenticia': 'Industria Alimenticia',
    'agroindustrial': 'Agroindustrial',
    'industria-minera': 'Industria Minera',
    'industria-metalurgica': 'Industria Metalúrgica',
    'petroleo-gas': 'Petróleo y Gas',
    'manufactura': 'Manufactura',
    'construccion': 'Construcción',
    'transporte': 'Transporte',
    'logistica': 'Logística',
};

export default function Breadcrumbs() {
    const { url } = usePage();
    const [breadcrumbs, setBreadcrumbs] = useState<BreadcrumbItem[]>([]);

    useEffect(() => {
        // Generar breadcrumbs automáticamente desde la URL
        const pathSegments = url.split('/').filter(segment => segment !== '');

        const generatedBreadcrumbs: BreadcrumbItem[] = [
            { label: 'Inicio', href: '/' }
        ];

        let currentPath = '';
        pathSegments.forEach((segment, index) => {
            currentPath += `/${segment}`;
            const label = routeLabels[segment] || decodeURIComponent(segment).replace(/-/g, ' ');

            // Si es el último segmento, no tiene href (es la página actual)
            if (index === pathSegments.length - 1) {
                generatedBreadcrumbs.push({ label });
            } else {
                generatedBreadcrumbs.push({ label, href: currentPath });
            }
        });

        setBreadcrumbs(generatedBreadcrumbs);
    }, [url]);

    // No mostrar breadcrumbs en la página de inicio
    if (url === '/') {
        return null;
    }

    return (
        <nav
            aria-label="Breadcrumb"
            className="bg-gray-50 border-b border-gray-200"
        >
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol
                    className="flex items-center flex-wrap gap-2 py-3 text-sm"
                    itemScope
                    itemType="https://schema.org/BreadcrumbList"
                >
                    {breadcrumbs.map((item, index) => {
                        const isLast = index === breadcrumbs.length - 1;
                        return (
                            <li
                                key={index}
                                className="flex items-center gap-2"
                                itemProp="itemListElement"
                                itemScope
                            >
                                {/* Icono Home para el primer elemento */}
                                {index === 0 && (
                                    <Home size={14} className="text-[#EA0A2A]" />
                                )}

                                {/* Enlace o texto actual */}
                                {isLast ? (
                                    <span
                                        className="text-gray-500 font-medium truncate max-w-[200px] sm:max-w-none"
                                        itemProp="name"
                                        aria-current="page"
                                    >
                                        {item.label}
                                    </span>
                                ) : (
                                    <Link
                                        href={item.href || '/'}
                                        className="text-gray-600 hover:text-[#EA0A2A] transition-colors font-medium"
                                        itemProp="item"
                                    >
                                        <span itemProp="name">{item.label}</span>
                                    </Link>
                                )}

                                {/* Separador (no mostrar en el último) */}
                                {!isLast && (
                                    <ChevronRight
                                        size={14}
                                        className="text-gray-400 flex-shrink-0"
                                        aria-hidden="true"
                                    />
                                )}

                                {/* Schema.org metadata */}
                                <meta
                                    itemProp="position"
                                    content={String(index + 1)}
                                />
                            </li>
                        );
                    })}
                </ol>
            </div>
        </nav>
    );
}
