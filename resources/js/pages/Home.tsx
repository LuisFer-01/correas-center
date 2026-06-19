import Brands from '@/components/landing/Brands';
import Contact from '@/components/landing/Contact';
import Differentials from '@/components/landing/Differentials';
import Hero from '@/components/landing/Hero';
import Industries from '@/components/landing/Industries';
import Locations from '@/components/landing/Locations';
import Products from '@/components/landing/Products';
import Services from '@/components/landing/Services';
import AppLayout from '@/layouts/AppLayout';

export default function Home() {
    return (
        <AppLayout showBreadcrumbs={false}>
            <Hero />
            <Products />
            <Brands />
            <Services />
            <Industries />
            <Differentials />
            <Locations />
            <Contact />
        </AppLayout>
    );
}