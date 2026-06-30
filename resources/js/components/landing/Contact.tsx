import { router, usePage } from '@inertiajs/react';
import { AlertCircle, CheckCircle, ChevronDown, Clock, Mail, MapPin, MessageCircle, Phone, Send } from 'lucide-react';
import { useEffect, useState } from 'react';

// ✅ Datos de FAQ
const faqData = [
    {
        pregunta: '¿Cuál es el horario de atención?',
        respuesta: 'Atendemos de lunes a viernes de 8:00 a 18:00 y sábados de 8:00 a 13:00. Nuestras 4 sucursales están disponibles para atenderte.',
    },
    {
        pregunta: '¿Realizan entregas a todo Bolivia?',
        respuesta: 'Sí, contamos con cobertura nacional. Realizamos envíos a todos los departamentos de Bolivia. Para pedidos urgentes, consulta disponibilidad de entrega express.',
    },
    {
        pregunta: '¿Cuánto tiempo tarda una cotización?',
        respuesta: 'Las cotizaciones se responden en un máximo de 24 horas hábiles. Para consultas urgentes, te recomendamos contactarnos directamente por WhatsApp o teléfono.',
    },
    {
        pregunta: '¿Fabrican productos a medida?',
        respuesta: 'Sí, somos fabricantes autorizados SKF y podemos producir sellos, retenes y otros componentes según tus especificaciones técnicas. Contáctanos con los detalles de tu requerimiento.',
    },
    {
        pregunta: '¿Tienen garantía en sus productos?',
        respuesta: 'Todos nuestros productos cuentan con garantía de calidad. Los productos SKF tienen garantía del fabricante. Consulta los términos específicos según el producto.',
    },
];

export default function Contact() {
    const { flash, globals } = usePage<any>().props;
    const sucursales = globals?.sucursales || [];

    const [formData, setFormData] = useState({
        nombre: '',
        empresa: '',
        telefono: '',
        email: '',
        mensaje: '',
    });

    const [errors, setErrors] = useState<Record<string, string>>({});
    const [touched, setTouched] = useState<Record<string, boolean>>({});
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [showSuccess, setShowSuccess] = useState(false);
    const [showError, setShowError] = useState(false);
    const [openFaq, setOpenFaq] = useState<number | null>(null);
    const [activeSucursal, setActiveSucursal] = useState<number>(0);

    // ✅ NUEVO: Cargar Tawk.to Script solo una vez
    useEffect(() => {
        // Verificar si el script ya está cargado para evitar duplicados
        if (document.getElementById('tawk-script')) {
            return;
        }

        // Crear el script dinámicamente
        const script = document.createElement('script');
        script.id = 'tawk-script';
        script.type = 'text/javascript';
        script.async = true;
        script.charset = 'UTF-8';
        script.setAttribute('crossorigin', '*');
        script.innerHTML = `
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6a443b02f81fcf1d458442b0/1jsd8d0at';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        `;

        // Agregar el script al body
        document.body.appendChild(script);

        // Cleanup: remover el script cuando el componente se desmonte (opcional)
        return () => {
            const existingScript = document.getElementById('tawk-script');
            if (existingScript) {
                existingScript.remove();
            }
        };
    }, []);

    // Mostrar mensajes flash de Inertia
    useEffect(() => {
        if (flash?.success) {
            setShowSuccess(true);
            setShowError(false);
            setFormData({ nombre: '', empresa: '', telefono: '', email: '', mensaje: '' });
            setTouched({});
            setErrors({});
            setTimeout(() => setShowSuccess(false), 5000);
        }

        if (flash?.error) {
            setShowError(true);
            setShowSuccess(false);
            setTimeout(() => setShowError(false), 5000);
        }
    }, [flash]);

    // Validación en tiempo real
    const validateField = (name: string, value: string): string => {
        switch (name) {
            case 'email':
                if (!value) return 'El email es obligatorio';
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) return 'Ingresa un email válido';
                return '';
            case 'telefono':
                if (!value) return 'El teléfono es obligatorio';
                if (!/^[\d\s\+\-()]{7,}$/.test(value)) return 'Ingresa un teléfono válido';
                return '';
            case 'nombre':
                if (!value) return 'El nombre es obligatorio';
                if (value.length < 2) return 'El nombre debe tener al menos 2 caracteres';
                return '';
            case 'mensaje':
                if (!value) return 'El mensaje es obligatorio';
                if (value.length < 10) return 'El mensaje debe tener al menos 10 caracteres';
                return '';
            default:
                return '';
        }
    };

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });

        if (touched[name]) {
            const error = validateField(name, value);
            setErrors({ ...errors, [name]: error });
        }
    };

    const handleBlur = (e: React.FocusEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        const { name, value } = e.target;
        setTouched({ ...touched, [name]: true });
        const error = validateField(name, value);
        setErrors({ ...errors, [name]: error });
    };

    const isFormValid = () => {
        const newErrors: Record<string, string> = {};
        Object.keys(formData).forEach((key) => {
            const error = validateField(key, formData[key as keyof typeof formData]);
            if (error) newErrors[key] = error;
        });
        setErrors(newErrors);
        return Object.keys(newErrors).length === 0;
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

        const allTouched: Record<string, boolean> = {};
        Object.keys(formData).forEach((key) => { allTouched[key] = true; });
        setTouched(allTouched);

        if (!isFormValid()) return;

        setIsSubmitting(true);
        setShowSuccess(false);
        setShowError(false);

        router.post('/contact', formData, {
            preserveScroll: true,
            onSuccess: () => {
                setIsSubmitting(false);
            },
            onError: () => {
                setIsSubmitting(false);
                setShowError(true);
                setTimeout(() => setShowError(false), 5000);
            },
        });
    };

    const toggleFaq = (index: number) => {
        setOpenFaq(openFaq === index ? null : index);
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
                    <div className="mb-8 bg-green-50 border border-green-200 rounded-xl p-4 flex items-start gap-3 animate-fadeIn">
                        <CheckCircle size={24} className="text-green-600 flex-shrink-0 mt-0.5" />
                        <div>
                            <h4 className="font-semibold text-green-900">¡Mensaje enviado correctamente!</h4>
                            <p className="text-green-700 text-sm">Nos pondremos en contacto contigo pronto.</p>
                        </div>
                    </div>
                )}

                {showError && (
                    <div className="mb-8 bg-red-50 border border-red-200 rounded-xl p-4 flex items-start gap-3 animate-fadeIn">
                        <AlertCircle size={24} className="text-red-600 flex-shrink-0 mt-0.5" />
                        <div>
                            <h4 className="font-semibold text-red-900">Error al enviar el mensaje</h4>
                            <p className="text-red-700 text-sm">Hubo un problema al enviar tu mensaje. Por favor intenta nuevamente.</p>
                        </div>
                    </div>
                )}

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 mb-16">
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
                                className="bg-[#25D366] hover:bg-[#128C7E] text-white px-6 py-4 rounded-lg font-semibold transition-all flex items-center justify-center gap-2 hover:scale-105"
                            >
                                <MessageCircle size={20} />
                                Escribir por WhatsApp
                            </a>
                            <a
                                href="tel:+59177306576"
                                className="bg-gray-900 hover:bg-gray-800 text-white px-6 py-4 rounded-lg font-semibold transition-all flex items-center justify-center gap-2 hover:scale-105"
                            >
                                <Phone size={20} />
                                Llamar Ahora
                            </a>
                        </div>
                    </div>

                    {/* Formulario de contacto */}
                    <div className="bg-gray-50 rounded-2xl p-8">
                        <h3 className="text-2xl font-bold text-gray-900 mb-6">Cuéntanos qué necesitas</h3>

                        <form onSubmit={handleSubmit} className="space-y-4" noValidate>
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
                                        onBlur={handleBlur}
                                        required
                                        disabled={isSubmitting}
                                        className={`w-full px-4 py-3 rounded-lg border transition-all disabled:bg-gray-100 disabled:cursor-not-allowed ${
                                            errors.nombre && touched.nombre
                                                ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/20'
                                                : 'border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20'
                                        }`}
                                        placeholder="Juan Perez"
                                    />
                                    {errors.nombre && touched.nombre && (
                                        <p className="mt-1 text-xs text-red-600 flex items-center gap-1">
                                            <AlertCircle size={12} />
                                            {errors.nombre}
                                        </p>
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
                                        onBlur={handleBlur}
                                        required
                                        disabled={isSubmitting}
                                        className={`w-full px-4 py-3 rounded-lg border transition-all disabled:bg-gray-100 disabled:cursor-not-allowed ${
                                            errors.telefono && touched.telefono
                                                ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/20'
                                                : 'border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20'
                                        }`}
                                        placeholder="+591 7000-0000"
                                    />
                                    {errors.telefono && touched.telefono && (
                                        <p className="mt-1 text-xs text-red-600 flex items-center gap-1">
                                            <AlertCircle size={12} />
                                            {errors.telefono}
                                        </p>
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
                                        onBlur={handleBlur}
                                        required
                                        disabled={isSubmitting}
                                        className={`w-full px-4 py-3 rounded-lg border transition-all disabled:bg-gray-100 disabled:cursor-not-allowed ${
                                            errors.email && touched.email
                                                ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/20'
                                                : 'border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20'
                                        }`}
                                        placeholder="email@empresa.com"
                                    />
                                    {errors.email && touched.email && (
                                        <p className="mt-1 text-xs text-red-600 flex items-center gap-1">
                                            <AlertCircle size={12} />
                                            {errors.email}
                                        </p>
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
                                    onBlur={handleBlur}
                                    required
                                    disabled={isSubmitting}
                                    rows={4}
                                    className={`w-full px-4 py-3 rounded-lg border transition-all resize-none disabled:bg-gray-100 disabled:cursor-not-allowed ${
                                        errors.mensaje && touched.mensaje
                                            ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/20'
                                            : 'border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20'
                                    }`}
                                    placeholder="Cuéntanos qué necesitas..."
                                />
                                {errors.mensaje && touched.mensaje && (
                                    <p className="mt-1 text-xs text-red-600 flex items-center gap-1">
                                        <AlertCircle size={12} />
                                        {errors.mensaje}
                                    </p>
                                )}
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

                {/* Mapa de Sucursales Interactivo */}
                {sucursales.length > 0 && (
                    <div className="mb-16">
                        <div className="text-center mb-10">
                            <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                                Visítanos
                            </p>
                            <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                Nuestras Sucursales
                            </h2>
                            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                                Contamos con 4 sucursales estratégicamente ubicadas para atenderte mejor
                            </p>
                        </div>

                        <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            {/* Lista de sucursales */}
                            <div className="lg:col-span-1 space-y-3">
                                {sucursales.map((sucursal: any, index: number) => (
                                    <button
                                        key={sucursal.id}
                                        onClick={() => setActiveSucursal(index)}
                                        className={`w-full text-left p-4 rounded-xl border-2 transition-all ${
                                            activeSucursal === index
                                                ? 'border-[#EA0A2A] bg-[#EA0A2A]/5 shadow-md'
                                                : 'border-gray-200 hover:border-[#EA0A2A]/30 bg-white'
                                        }`}
                                    >
                                        <div className="flex items-start gap-3">
                                            <div className={`p-2 rounded-lg flex-shrink-0 ${
                                                activeSucursal === index ? 'bg-[#EA0A2A] text-white' : 'bg-[#EA0A2A]/10 text-[#EA0A2A]'
                                            }`}>
                                                <MapPin size={18} />
                                            </div>
                                            <div className="flex-1 min-w-0">
                                                <h4 className="font-bold text-gray-900 mb-1">{sucursal.nombre}</h4>
                                                <p className="text-xs text-gray-600 line-clamp-2 mb-2">{sucursal.direccion}</p>
                                                <div className="flex flex-wrap gap-2 text-xs">
                                                    <span className="inline-flex items-center gap-1 text-gray-500">
                                                        <Phone size={10} />
                                                        {sucursal.telefono}
                                                    </span>
                                                </div>
                                                {sucursal.horarios && (
                                                    <div className="flex items-center gap-1 text-xs text-gray-500 mt-1">
                                                        <Clock size={10} />
                                                        <span className="truncate">{sucursal.horarios}</span>
                                                    </div>
                                                )}
                                            </div>
                                        </div>
                                    </button>
                                ))}
                            </div>

                            {/* Mapa embebido */}
                            <div className="lg:col-span-2">
                                <div className="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm h-full min-h-[400px]">
                                    {sucursales[activeSucursal]?.mapa_incrustado ? (
                                        <iframe
                                            src={sucursales[activeSucursal].mapa_incrustado}
                                            width="100%"
                                            height="100%"
                                            style={{ border: 0, minHeight: '400px' }}
                                            allowFullScreen
                                            loading="lazy"
                                            referrerPolicy="no-referrer-when-downgrade"
                                            title={`Mapa de ${sucursales[activeSucursal].nombre}`}
                                            className="w-full h-full"
                                        ></iframe>
                                    ) : (
                                        <div className="flex items-center justify-center h-full bg-gray-100">
                                            <div className="text-center p-8">
                                                <MapPin size={48} className="text-gray-400 mx-auto mb-4" />
                                                <p className="text-gray-500">Mapa no disponible para esta sucursal</p>
                                            </div>
                                        </div>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                )}

                {/* FAQ Accordion */}
                <div className="max-w-4xl mx-auto">
                    <div className="text-center mb-10">
                        <p className="text-[#EA0A2A] font-semibold text-sm uppercase tracking-wider mb-2">
                            Preguntas Frecuentes
                        </p>
                        <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            ¿Tienes Dudas?
                        </h2>
                        <p className="text-lg text-gray-600">
                            Encuentra respuestas a las preguntas más comunes
                        </p>
                    </div>

                    <div className="space-y-3">
                        {faqData.map((faq, index) => (
                            <div
                                key={index}
                                className="bg-white rounded-xl border border-gray-200 overflow-hidden transition-all hover:border-[#EA0A2A]/30"
                            >
                                <button
                                    onClick={() => toggleFaq(index)}
                                    className="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition-colors"
                                >
                                    <span className="font-semibold text-gray-900 pr-4">{faq.pregunta}</span>
                                    <ChevronDown
                                        size={20}
                                        className={`text-[#EA0A2A] flex-shrink-0 transition-transform duration-300 ${
                                            openFaq === index ? 'rotate-180' : ''
                                        }`}
                                    />
                                </button>
                                <div
                                    className={`overflow-hidden transition-all duration-300 ${
                                        openFaq === index ? 'max-h-96' : 'max-h-0'
                                    }`}
                                >
                                    <div className="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                        {faq.respuesta}
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>

                {/* ✅ NUEVO: Banner de Chat en Vivo */}
                <div className="mt-16 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-8 text-center">
                    <div className="flex flex-col md:flex-row items-center justify-center gap-6">
                        <div className="bg-blue-500 p-4 rounded-full">
                            <MessageCircle size={32} className="text-white" />
                        </div>
                        <div className="flex-1 text-center md:text-left">
                            <h3 className="text-xl font-bold text-gray-900 mb-2">
                                ¿Prefieres hablar con un agente ahora?
                            </h3>
                            <p className="text-gray-600">
                                Nuestro equipo está disponible en línea para resolver tus dudas en tiempo real
                            </p>
                        </div>
                        <button
                            onClick={() => {
                                // Abrir el chat de Tawk.to
                                if (typeof window !== 'undefined' && (window as any).Tawk_API) {
                                    (window as any).Tawk_API.maximize();
                                }
                            }}
                            className="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all hover:scale-105 flex items-center gap-2 whitespace-nowrap"
                        >
                            <MessageCircle size={18} />
                            Iniciar Chat
                        </button>
                    </div>
                </div>
            </div>
        </section>
    );
}
