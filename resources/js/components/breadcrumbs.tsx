import { Link, usePage } from '@inertiajs/react';
import { ChevronRight, Home } from 'lucide-react';
import { useEffect, useState } from 'react';

interface BreadcrumbItem {
    label: string;
    href?: string;
}

const routeLabels: Record<string, string> = {
    'products': 'Productos',
    'services': 'Servicios',
    'applications': 'Aplicaciones',
    'about': 'Acerca de',
    'contact': 'Contacto',
    'privacy': 'Política de Privacidad',
    'terms': 'Términos y Condiciones',
};

export default function Breadcrumbs() {
    const { url, props } = usePage<any>();
    const [breadcrumbs, setBreadcrumbs] = useState<BreadcrumbItem[]>([]);

    useEffect(() => {
        const pathSegments = url.split('/').filter(segment => segment !== '');

        const generatedBreadcrumbs: BreadcrumbItem[] = [
            { label: 'Inicio', href: '/' }
        ];

        let currentPath = '';
        pathSegments.forEach((segment, index) => {
            currentPath += `/${segment}`;
            
            let label = routeLabels[segment];
            
            // Intentar obtener nombres desde los props
            if (!label && props.producto && index === 1) {
                label = props.producto.nombre;
            } else if (!label && props.categoria && index === 2) {
                label = props.categoria.nombre;
            } else if (!label && props.industria && index === 1) {
                label = props.industria.nombre;
            } else if (!label && props.servicio && index === 1) {
                label = props.servicio.nombre;
            }
            
            // Si no se encontró, formatear el slug
            if (!label) {
                label = decodeURIComponent(segment)
                    .replace(/-/g, ' ')
                    .replace(/\b\w/g, c => c.toUpperCase());
            }

            if (index === pathSegments.length - 1) {
                generatedBreadcrumbs.push({ label });
            } else {
                generatedBreadcrumbs.push({ label, href: currentPath });
            }
        });

        setBreadcrumbs(generatedBreadcrumbs);
    }, [url, props.producto, props.categoria, props.industria, props.servicio]);

    if (url === '/') {
        return null;
    }

    return (
        <nav aria-label="Breadcrumb" className="bg-gray-50 border-b border-gray-200">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol className="flex items-center flex-wrap gap-2 py-3 text-sm" itemScope itemType="https://schema.org/BreadcrumbList">
                    {breadcrumbs.map((item, index) => {
                        const isLast = index === breadcrumbs.length - 1;
                        return (
                            <li key={index} className="flex items-center gap-2" itemProp="itemListElement" itemScope>
                                {index === 0 && (
                                    <Home size={14} className="text-[#EA0A2A]" />
                                )}
                                {isLast ? (
                                    <span className="text-gray-500 font-medium truncate max-w-[200px] sm:max-w-none" itemProp="name" aria-current="page">
                                        {item.label}
                                    </span>
                                ) : (
                                    <Link href={item.href || '/'} className="text-gray-600 hover:text-[#EA0A2A] transition-colors font-medium" itemProp="item">
                                        <span itemProp="name">{item.label}</span>
                                    </Link>
                                )}
                                {!isLast && (
                                    <ChevronRight size={14} className="text-gray-400 flex-shrink-0" aria-hidden="true" />
                                )}
                                <meta itemProp="position" content={String(index + 1)} />
                            </li>
                        );
                    })}
                </ol>
            </div>
        </nav>
    );
}