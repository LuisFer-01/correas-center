import Breadcrumbs from '@/components/breadcrumbs';
import Footer from '@/components/Footer';
import Navigation from '@/components/Navigation';
import WhatsAppFloat from '@/components/WhatsAppFloat';
import { usePage } from '@inertiajs/react';
import { useEffect } from 'react';

interface AppLayoutProps {
    children: React.ReactNode;
    showBreadcrumbs?: boolean;
}

export default function AppLayout({ children, showBreadcrumbs = true }: AppLayoutProps) {
    const { url } = usePage();

    // Rutas donde NO queremos mostrar breadcrumbs
    const hideBreadcrumbsRoutes = ['/'];
    const shouldShowBreadcrumbs = showBreadcrumbs && !hideBreadcrumbsRoutes.includes(url);

    // ✅ Google Analytics 4 - Tracking de páginas SPA (Inertia.js)
    // El script base ya está cargado en app.blade.php, solo necesitamos trackear cambios de URL
    useEffect(() => {
        const GA_ID = import.meta.env.VITE_GOOGLE_ANALYTICS_ID;

        // Solo ejecutar si hay un ID configurado y gtag está disponible
        if (!GA_ID || GA_ID === 'G-XXXXXXXXXX') {
            return;
        }

        if (typeof window !== 'undefined' && (window as any).gtag) {
            // Enviar pageview cada vez que cambia la URL
            (window as any).gtag('config', GA_ID, {
                page_path: url,
                page_location: window.location.href,
                page_title: document.title,
            });
        }
    }, [url]); // Se ejecuta cada vez que cambia la URL

    return (
        <div className="min-h-screen bg-white flex flex-col">
            <Navigation />
            <main className="flex-1 pt-16 sm:pt-18 md:pt-20">
                {shouldShowBreadcrumbs && <Breadcrumbs />}
                {children}
            </main>
            <Footer />
            <WhatsAppFloat />
        </div>
    );
}
