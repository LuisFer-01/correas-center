import AppLayout from '@/layouts/AppLayout';
import { router, usePage } from '@inertiajs/react';
import { AlertCircle, CheckCircle2, Clock, Mail, MapPin, MessageCircle, Phone, Send } from 'lucide-react';
import { useEffect, useState } from 'react';

export default function Contact() {
    const { globals, flash } = usePage<any>().props;
    const sucursalPrincipal = globals.sucursales?.find((s: any) => s.es_principal) || globals.sucursales?.[0];

    const [formData, setFormData] = useState({
        nombre: '',
        empresa: '',
        telefono: '',
        email: '',
        mensaje: '',
    });

    const [errors, setErrors] = useState<any>({});
    const [isSubmitting, setIsSubmitting] = useState(false);

    // Limpiar mensajes flash después de 5 segundos
    useEffect(() => {
        if (flash?.success || flash?.error) {
            const timer = setTimeout(() => {
                router.reload({ only: ['flash'] });
            }, 5000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
        // Limpiar error del campo al escribir
        if (errors[e.target.name]) {
            setErrors({ ...errors, [e.target.name]: null });
        }
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        setIsSubmitting(true);
        setErrors({});

        router.post('/contact', formData, {
            onSuccess: () => {
                setFormData({
                    nombre: '',
                    empresa: '',
                    telefono: '',
                    email: '',
                    mensaje: '',
                });
                setIsSubmitting(false);
            },
            onError: (errors) => {
                setErrors(errors);
                setIsSubmitting(false);
            },
            preserveScroll: true,
        });
    };

    return (
        <AppLayout>
            {/* Header de página */}
            <section className="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 md:py-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="inline-flex items-center gap-2 bg-[#EA0A2A]/20 border border-[#EA0A2A]/30 rounded-full px-4 py-2 mb-6">
                        <MessageCircle size={16} className="text-[#EA0A2A]" />
                        <span className="text-sm text-white font-semibold">Contáctanos</span>
                    </div>
                    <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        Hablemos de tu Proyecto
                    </h1>
                    <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                        Nuestro equipo está listo para asesorarte y encontrar la mejor solución
                    </p>
                </div>
            </section>

            {/* Mensajes flash */}
            {(flash?.success || flash?.error) && (
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                    {flash?.success && (
                        <div className="bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
                            <CheckCircle2 size={20} className="text-green-600 flex-shrink-0 mt-0.5" />
                            <div>
                                <p className="text-green-800 font-semibold">¡Mensaje enviado!</p>
                                <p className="text-green-700 text-sm mt-1">{flash.success}</p>
                            </div>
                        </div>
                    )}
                    {flash?.error && (
                        <div className="bg-red-50 border border-red-200 rounded-lg p-4 flex items-start gap-3">
                            <AlertCircle size={20} className="text-red-600 flex-shrink-0 mt-0.5" />
                            <div>
                                <p className="text-red-800 font-semibold">Error</p>
                                <p className="text-red-700 text-sm mt-1">{flash.error}</p>
                            </div>
                        </div>
                    )}
                </div>
            )}

            {/* Contenido principal */}
            <section className="py-12 md:py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                                            <p className="text-xl font-semibold">
                                                {sucursalPrincipal?.telefono || '+591 7 7306-576'}
                                            </p>
                                        </div>
                                    </div>

                                    <div className="flex items-center gap-4">
                                        <div className="bg-white/20 p-3 rounded-lg">
                                            <Mail size={24} />
                                        </div>
                                        <div>
                                            <p className="text-white/80 text-sm">Email</p>
                                            <p className="text-xl font-semibold">
                                                {sucursalPrincipal?.email || 'ventas@correascenter.com'}
                                            </p>
                                        </div>
                                    </div>

                                    <div className="flex items-center gap-4">
                                        <div className="bg-white/20 p-3 rounded-lg">
                                            <MessageCircle size={24} />
                                        </div>
                                        <div>
                                            <p className="text-white/80 text-sm">WhatsApp</p>
                                            <p className="text-xl font-semibold">
                                                {sucursalPrincipal?.telefono || '+591 7 7306-576'}
                                            </p>
                                        </div>
                                    </div>

                                    {sucursalPrincipal && (
                                        <>
                                            <div className="flex items-start gap-4">
                                                <div className="bg-white/20 p-3 rounded-lg">
                                                    <MapPin size={24} />
                                                </div>
                                                <div>
                                                    <p className="text-white/80 text-sm">Dirección</p>
                                                    <p className="text-lg font-semibold">
                                                        {sucursalPrincipal.direccion}
                                                    </p>
                                                </div>
                                            </div>

                                            <div className="flex items-start gap-4">
                                                <div className="bg-white/20 p-3 rounded-lg">
                                                    <Clock size={24} />
                                                </div>
                                                <div>
                                                    <p className="text-white/80 text-sm">Horarios</p>
                                                    <p className="text-lg font-semibold">
                                                        {sucursalPrincipal.horarios}
                                                    </p>
                                                </div>
                                            </div>
                                        </>
                                    )}
                                </div>
                            </div>

                            {/* Botones de acción rápida */}
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a
                                    href={`https://wa.me/59177306576?text=${encodeURIComponent('Hola, necesito información sobre sus productos y servicios')}`}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="bg-[#25D366] hover:bg-[#128C7E] text-white px-6 py-4 rounded-lg font-semibold transition-all flex items-center justify-center gap-2"
                                >
                                    <MessageCircle size={20} />
                                    Escribir por WhatsApp
                                </a>
                                <a
                                    href={`tel:+59177306576`}
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
                                            className={`w-full px-4 py-3 rounded-lg border ${errors.nombre ? 'border-red-500' : 'border-gray-300'} focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all`}
                                            placeholder="Juan Perez"
                                        />
                                        {errors.nombre && (
                                            <p className="text-red-600 text-sm mt-1">{errors.nombre}</p>
                                        )}
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
                                            className={`w-full px-4 py-3 rounded-lg border ${errors.empresa ? 'border-red-500' : 'border-gray-300'} focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all`}
                                            placeholder="Nombre de tu empresa"
                                        />
                                        {errors.empresa && (
                                            <p className="text-red-600 text-sm mt-1">{errors.empresa}</p>
                                        )}
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
                                            className={`w-full px-4 py-3 rounded-lg border ${errors.telefono ? 'border-red-500' : 'border-gray-300'} focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all`}
                                            placeholder="+591 7000-0000"
                                        />
                                        {errors.telefono && (
                                            <p className="text-red-600 text-sm mt-1">{errors.telefono}</p>
                                        )}
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
                                            className={`w-full px-4 py-3 rounded-lg border ${errors.email ? 'border-red-500' : 'border-gray-300'} focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all`}
                                            placeholder="email@empresa.com"
                                        />
                                        {errors.email && (
                                            <p className="text-red-600 text-sm mt-1">{errors.email}</p>
                                        )}
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
                                        rows={4}
                                        className={`w-full px-4 py-3 rounded-lg border ${errors.mensaje ? 'border-red-500' : 'border-gray-300'} focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all resize-none`}
                                        placeholder="Cuéntanos qué necesitas..."
                                    />
                                    {errors.mensaje && (
                                        <p className="text-red-600 text-sm mt-1">{errors.mensaje}</p>
                                    )}
                                </div>

                                <button
                                    type="submit"
                                    disabled={isSubmitting}
                                    className="w-full bg-[#EA0A2A] hover:bg-[#c90825] disabled:bg-gray-400 text-white px-8 py-4 rounded-lg font-semibold transition-all hover:scale-105 disabled:hover:scale-100 flex items-center justify-center gap-2 group"
                                >
                                    {isSubmitting ? (
                                        <>
                                            <div className="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                                            Enviando...
                                        </>
                                    ) : (
                                        <>
                                            Enviar Consulta
                                            <Send size={20} className="group-hover:translate-x-1 transition-transform" />
                                        </>
                                    )}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}
