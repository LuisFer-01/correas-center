import Breadcrumbs from '@/components/breadcrumbs';
import Footer from '@/components/Footer';
import Navigation from '@/components/Navigation';
import WhatsAppFloat from '@/components/WhatsAppFloat';
import { usePage } from '@inertiajs/react';

interface AppLayoutProps {
    children: React.ReactNode;
    showBreadcrumbs?: boolean;
}

export default function AppLayout({ children, showBreadcrumbs = true }: AppLayoutProps) {
    const { url } = usePage();

    // Rutas donde NO queremos mostrar breadcrumbs
    const hideBreadcrumbsRoutes = ['/'];
    const shouldShowBreadcrumbs = showBreadcrumbs && !hideBreadcrumbsRoutes.includes(url);

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