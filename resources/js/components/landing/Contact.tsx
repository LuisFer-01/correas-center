import { router, usePage } from '@inertiajs/react';
import { AlertCircle, CheckCircle, Mail, MessageCircle, Phone, Send } from 'lucide-react';
import { useEffect, useState } from 'react';

export default function Contact() {
    const { flash } = usePage<any>().props;

    const [formData, setFormData] = useState({
        nombre: '',
        empresa: '',
        telefono: '',
        email: '',
        mensaje: '',
    });

    const [isSubmitting, setIsSubmitting] = useState(false);
    const [showSuccess, setShowSuccess] = useState(false);
    const [showError, setShowError] = useState(false);

    // Mostrar mensajes flash de Inertia
    useEffect(() => {
        if (flash?.success) {
            setShowSuccess(true);
            setShowError(false);
            // Resetear formulario
            setFormData({
                nombre: '',
                empresa: '',
                telefono: '',
                email: '',
                mensaje: '',
            });
            // Ocultar mensaje después de 5 segundos
            setTimeout(() => setShowSuccess(false), 5000);
        }

        if (flash?.error) {
            setShowError(true);
            setShowSuccess(false);
            setTimeout(() => setShowError(false), 5000);
        }
    }, [flash]);

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        setIsSubmitting(true);
        setShowSuccess(false);
        setShowError(false);

        // ✅ Enviar datos al backend usando Inertia
        router.post('/contact', formData, {
            preserveScroll: true,
            onSuccess: () => {
                setIsSubmitting(false);
                // El mensaje de éxito se maneja en el useEffect
            },
            onError: () => {
                setIsSubmitting(false);
                setShowError(true);
                setTimeout(() => setShowError(false), 5000);
            },
        });
    };

    return (
        <section id="contacto" className="py-16 md:py-24 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header de la sección */}
                <div className="text-center mb-12 md:mb-16">
                    <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                        Contáctanos
                    </p>
                    <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Hablemos de tu Proyecto
                    </h2>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Nuestro equipo está listo para asesorarte y encontrar la mejor solución
                    </p>
                </div>

                {/* Mensajes de éxito/error */}
                {showSuccess && (
                    <div className="mb-8 bg-green-50 border border-green-200 rounded-xl p-4 flex items-start gap-3">
                        <CheckCircle size={24} className="text-green-600 flex-shrink-0 mt-0.5" />
                        <div>
                            <h4 className="font-semibold text-green-900">¡Mensaje enviado correctamente!</h4>
                            <p className="text-green-700 text-sm">
                                Nos pondremos en contacto contigo pronto.
                            </p>
                        </div>
                    </div>
                )}

                {showError && (
                    <div className="mb-8 bg-red-50 border border-red-200 rounded-xl p-4 flex items-start gap-3">
                        <AlertCircle size={24} className="text-red-600 flex-shrink-0 mt-0.5" />
                        <div>
                            <h4 className="font-semibold text-red-900">Error al enviar el mensaje</h4>
                            <p className="text-red-700 text-sm">
                                Hubo un problema al enviar tu mensaje. Por favor intenta nuevamente.
                            </p>
                        </div>
                    </div>
                )}

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
                    {/* Información de contacto */}
                    <div className="space-y-6">
                        <div className="bg-gradient-to-br from-[#EA0A2A] to-[#c90825] rounded-2xl p-8 text-white">
                            <h3 className="text-2xl font-bold mb-6">Información de Contacto</h3>

                            <div className="space-y-4">
                                <div className="flex items-center gap-4">
                                    <div className="bg-white/20 p-3 rounded-lg">
                                        <Phone size={24} />
                                    </div>
                                    <div>
                                        <p className="text-white/80 text-sm">Teléfono</p>
                                        <p className="text-xl font-semibold">+591 7 7306-576</p>
                                    </div>
                                </div>

                                <div className="flex items-center gap-4">
                                    <div className="bg-white/20 p-3 rounded-lg">
                                        <Mail size={24} />
                                    </div>
                                    <div>
                                        <p className="text-white/80 text-sm">Email</p>
                                        <p className="text-xl font-semibold">ventas@correascenter.com</p>
                                    </div>
                                </div>

                                <div className="flex items-center gap-4">
                                    <div className="bg-white/20 p-3 rounded-lg">
                                        <MessageCircle size={24} />
                                    </div>
                                    <div>
                                        <p className="text-white/80 text-sm">WhatsApp</p>
                                        <p className="text-xl font-semibold">+591 7 7306-576</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Botones de acción rápida */}
                        <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a
                                href="https://wa.me/59177306576?text=Hola%2C%20necesito%20información%20sobre%20sus%20productos%20y%20servicios"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="bg-[#25D366] hover:bg-[#128C7E] text-white px-6 py-4 rounded-lg font-semibold transition-all flex items-center justify-center gap-2"
                            >
                                <MessageCircle size={20} />
                                Escribir por WhatsApp
                            </a>
                            <a
                                href="tel:+59177306576"
                                className="bg-gray-900 hover:bg-gray-800 text-white px-6 py-4 rounded-lg font-semibold transition-all flex items-center justify-center gap-2"
                            >
                                <Phone size={20} />
                                Llamar Ahora
                            </a>
                        </div>
                    </div>

                    {/* Formulario de contacto */}
                    <div className="bg-gray-50 rounded-2xl p-8">
                        <h3 className="text-2xl font-bold text-gray-900 mb-6">Cuéntanos qué necesitas</h3>

                        <form onSubmit={handleSubmit} className="space-y-4">
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="nombre" className="block text-sm font-semibold text-gray-700 mb-2">
                                        Nombre*
                                    </label>
                                    <input
                                        type="text"
                                        id="nombre"
                                        name="nombre"
                                        value={formData.nombre}
                                        onChange={handleChange}
                                        required
                                        disabled={isSubmitting}
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all disabled:bg-gray-100 disabled:cursor-not-allowed"
                                        placeholder="Juan Perez"
                                    />
                                </div>
                                <div>
                                    <label htmlFor="empresa" className="block text-sm font-semibold text-gray-700 mb-2">
                                        Empresa
                                    </label>
                                    <input
                                        type="text"
                                        id="empresa"
                                        name="empresa"
                                        value={formData.empresa}
                                        onChange={handleChange}
                                        disabled={isSubmitting}
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all disabled:bg-gray-100 disabled:cursor-not-allowed"
                                        placeholder="Nombre de tu empresa"
                                    />
                                </div>
                            </div>

                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="telefono" className="block text-sm font-semibold text-gray-700 mb-2">
                                        Teléfono*
                                    </label>
                                    <input
                                        type="tel"
                                        id="telefono"
                                        name="telefono"
                                        value={formData.telefono}
                                        onChange={handleChange}
                                        required
                                        disabled={isSubmitting}
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all disabled:bg-gray-100 disabled:cursor-not-allowed"
                                        placeholder="+591 7000-0000"
                                    />
                                </div>
                                <div>
                                    <label htmlFor="email" className="block text-sm font-semibold text-gray-700 mb-2">
                                        Email*
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value={formData.email}
                                        onChange={handleChange}
                                        required
                                        disabled={isSubmitting}
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all disabled:bg-gray-100 disabled:cursor-not-allowed"
                                        placeholder="email@empresa.com"
                                    />
                                </div>
                            </div>

                            <div>
                                <label htmlFor="mensaje" className="block text-sm font-semibold text-gray-700 mb-2">
                                    Consulta*
                                </label>
                                <textarea
                                    id="mensaje"
                                    name="mensaje"
                                    value={formData.mensaje}
                                    onChange={handleChange}
                                    required
                                    disabled={isSubmitting}
                                    rows={4}
                                    className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all resize-none disabled:bg-gray-100 disabled:cursor-not-allowed"
                                    placeholder="Cuéntanos qué necesitas..."
                                />
                            </div>

                            <button
                                type="submit"
                                disabled={isSubmitting}
                                className="w-full bg-[#EA0A2A] hover:bg-[#c90825] text-white px-8 py-4 rounded-lg font-semibold transition-all hover:scale-105 flex items-center justify-center gap-2 group disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                            >
                                {isSubmitting ? (
                                    <>
                                        <svg className="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                                            <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span>Enviando...</span>
                                    </>
                                ) : (
                                    <>
                                        <span>Enviar Consulta</span>
                                        <Send size={20} className="group-hover:translate-x-1 transition-transform" />
                                    </>
                                )}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    );
}
