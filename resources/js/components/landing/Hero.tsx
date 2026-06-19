import { Link } from '@inertiajs/react';
import { ArrowRight, ChevronLeft, ChevronRight } from 'lucide-react';
import { useEffect, useState } from 'react';

export default function Hero() {
    const [currentSlide, setCurrentSlide] = useState(0);
    
    const slides = [
        {
            imagen: '/images/hero/hero-1.jpg',
            titulo: 'Líder en Soluciones Industriales',
            subtitulo: 'Cobertura Nacional Inmediata',
            badge_text: 'Solución Confiable',
            cta_primary: { text: 'Solicitar Asesoría', href: '/contact' },
            cta_secondary: { text: 'Ver Productos', href: '/products' },
        },
        {
            imagen: '/images/hero/hero-2.jpg',
            titulo: 'Calidad SKF Garantizada',
            subtitulo: 'Fabricación autorizada SKF con los más altos estándares de calidad',
            badge_text: 'Fabricante Autorizado',
            cta_primary: { text: 'Conocer Más', href: '/services/fabricacion-de-sellos-skf' },
            cta_secondary: { text: 'Ver Productos', href: '/products' },
        },
        {
            imagen: '/images/hero/hero-3.jpg',
            titulo: 'Entregas Rápidas a Todo Bolivia',
            subtitulo: 'Con el respaldo de nuestro equipo técnico especializado',
            badge_text: 'Cobertura Nacional',
            cta_primary: { text: 'Contactar Ahora', href: '/contact' },
            cta_secondary: { text: 'Ver Sucursales', href: '/#ubicaciones' },
        },
    ];

    useEffect(() => {
        const timer = setInterval(() => {
            setCurrentSlide((prev) => (prev + 1) % slides.length);
        }, 5000);
        return () => clearInterval(timer);
    }, [slides.length]);

    const nextSlide = () => setCurrentSlide((prev) => (prev + 1) % slides.length);
    const prevSlide = () => setCurrentSlide((prev) => (prev - 1 + slides.length) % slides.length);

    return (
        <section className="relative h-[600px] md:h-[700px] overflow-hidden">
            {slides.map((slide, index) => (
                <div
                    key={index}
                    className={`absolute inset-0 transition-opacity duration-1000 ${
                        index === currentSlide ? 'opacity-100' : 'opacity-0'
                    }`}
                >
                    <div className="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900">
                        <div className="absolute inset-0 bg-black/50"></div>
                    </div>

                    <div className="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
                        <div className="max-w-2xl">
                            <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6 animate-fade-in">
                                <div className="w-2 h-2 bg-[#EA0A2A] rounded-full animate-pulse"></div>
                                <span className="text-sm text-white font-semibold">{slide.badge_text}</span>
                            </div>

                            <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight animate-slide-up">
                                {slide.titulo}
                            </h1>

                            <p className="text-lg md:text-xl text-gray-300 mb-8 animate-slide-up-delay">
                                {slide.subtitulo}
                            </p>

                            <div className="flex flex-col sm:flex-row gap-4 animate-slide-up-delay-2">
                                <Link href={slide.cta_primary.href} className="bg-[#EA0A2A] hover:bg-[#c90825] text-white px-8 py-4 rounded-lg font-semibold transition-all hover:scale-105 flex items-center justify-center gap-2 group">
                                    {slide.cta_primary.text}
                                    <ArrowRight size={20} className="group-hover:translate-x-1 transition-transform" />
                                </Link>
                                <Link href={slide.cta_secondary.href} className="bg-white/10 hover:bg-white/20 text-white px-8 py-4 rounded-lg font-semibold transition-all border border-white/20">
                                    {slide.cta_secondary.text}
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            ))}

            <button onClick={prevSlide} className="absolute left-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full backdrop-blur-sm transition-all z-10" aria-label="Anterior">
                <ChevronLeft size={24} />
            </button>
            <button onClick={nextSlide} className="absolute right-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full backdrop-blur-sm transition-all z-10" aria-label="Siguiente">
                <ChevronRight size={24} />
            </button>

            <div className="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                {slides.map((_, index) => (
                    <button
                        key={index}
                        onClick={() => setCurrentSlide(index)}
                        className={`h-2 rounded-full transition-all ${
                            index === currentSlide ? 'w-12 bg-[#EA0A2A]' : 'w-2 bg-white/50 hover:bg-white/75'
                        }`}
                        aria-label={`Ir a slide ${index + 1}`}
                    />
                ))}
            </div>

            <style>{`
                @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
                @keyframes slide-up { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
                .animate-fade-in { animation: fade-in 0.6s ease-out; }
                .animate-slide-up { animation: slide-up 0.8s ease-out; }
                .animate-slide-up-delay { animation: slide-up 0.8s ease-out 0.2s both; }
                .animate-slide-up-delay-2 { animation: slide-up 0.8s ease-out 0.4s both; }
            `}</style>
        </section>
    );
}