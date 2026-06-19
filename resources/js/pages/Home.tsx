import Brands from '@/components/landing/Brands';
import Contact from '@/components/landing/Contact';
import Differentials from '@/components/landing/Differentials';
import Hero from '@/components/landing/Hero';
import Industries from '@/components/landing/Industries';
import Infrastructure from '@/components/landing/Infrastructure';
import Locations from '@/components/landing/Locations';
import Products from '@/components/landing/Products';
import Services from '@/components/landing/Services';
import ProductSelector from '@/components/ProductSelector';
import AppLayout from '@/layouts/AppLayout';

export default function Home() {
    return (
        <AppLayout showBreadcrumbs={false}>
            <Hero />
            <ProductSelector />
            <Products />
            <Brands />
            <Services />
            <Industries />
            <Infrastructure />
            <Differentials />
            <Locations />
            <Contact />
        </AppLayout>
    );
}
