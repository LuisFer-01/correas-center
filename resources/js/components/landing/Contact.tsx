import { Mail, MessageCircle, Phone, Send } from 'lucide-react';
import { useState } from 'react';

export default function Contact() {
    const [formData, setFormData] = useState({
        nombre: '',
        empresa: '',
        telefono: '',
        email: '',
        mensaje: '',
    });

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        // Aquí irá la lógica para enviar el formulario
        console.log('Formulario enviado:', formData);
    };

    return (
        <section className="py-16 md:py-24 bg-white">
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
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all"
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
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all"
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
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all"
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
                                        className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all"
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
                                    rows={4}
                                    className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#EA0A2A] focus:ring-2 focus:ring-[#EA0A2A]/20 transition-all resize-none"
                                    placeholder="Cuéntanos qué necesitas..."
                                />
                            </div>

                            <button
                                type="submit"
                                className="w-full bg-[#EA0A2A] hover:bg-[#c90825] text-white px-8 py-4 rounded-lg font-semibold transition-all hover:scale-105 flex items-center justify-center gap-2 group"
                            >
                                Enviar Consulta
                                <Send size={20} className="group-hover:translate-x-1 transition-transform" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    );
}