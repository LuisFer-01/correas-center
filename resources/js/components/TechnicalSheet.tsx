import { Document, Page, PDFDownloadLink, StyleSheet, Text, View } from '@react-pdf/renderer';
import { Download } from 'lucide-react';

// Estilos del PDF
const styles = StyleSheet.create({
    page: {
        padding: 30,
        fontFamily: 'Helvetica',
    },
    header: {
        backgroundColor: '#EA0A2A',
        padding: 20,
        marginBottom: 20,
    },
    title: {
        fontSize: 24,
        color: 'white',
        fontWeight: 'bold',
        marginBottom: 5,
    },
    subtitle: {
        fontSize: 14,
        color: 'white',
    },
    section: {
        marginBottom: 20,
    },
    sectionTitle: {
        fontSize: 16,
        fontWeight: 'bold',
        color: '#EA0A2A',
        marginBottom: 10,
        borderBottom: '2px solid #EA0A2A',
        paddingBottom: 5,
    },
    row: {
        flexDirection: 'row',
        marginBottom: 8,
    },
    label: {
        fontSize: 11,
        fontWeight: 'bold',
        width: '30%',
        color: '#333',
    },
    value: {
        fontSize: 11,
        width: '70%',
        color: '#666',
    },
    footer: {
        position: 'absolute',
        bottom: 30,
        left: 30,
        right: 30,
        textAlign: 'center',
        fontSize: 9,
        color: '#999',
        borderTop: '1px solid #ddd',
        paddingTop: 10,
    },
});

interface TechnicalSheetProps {
    producto: any;
    categoria: any;
}

// Componente del documento PDF
function TechnicalSheetDocument({ producto, categoria }: TechnicalSheetProps) {
    return (
        <Document>
            <Page size="A4" style={styles.page}>
                {/* Header */}
                <View style={styles.header}>
                    <Text style={styles.title}>FICHA TÉCNICA</Text>
                    <Text style={styles.subtitle}>{categoria.nombre}</Text>
                </View>

                {/* Información del Producto */}
                <View style={styles.section}>
                    <Text style={styles.sectionTitle}>Información del Producto</Text>
                    <View style={styles.row}>
                        <Text style={styles.label}>Producto:</Text>
                        <Text style={styles.value}>{producto.nombre}</Text>
                    </View>
                    <View style={styles.row}>
                        <Text style={styles.label}>Categoría:</Text>
                        <Text style={styles.value}>{categoria.nombre}</Text>
                    </View>
                    {categoria.descripcion && (
                        <View style={styles.row}>
                            <Text style={styles.label}>Descripción:</Text>
                            <Text style={styles.value}>{categoria.descripcion}</Text>
                        </View>
                    )}
                </View>

                {/* Características Técnicas */}
                {categoria.detalles && categoria.detalles.length > 0 && (
                    <View style={styles.section}>
                        <Text style={styles.sectionTitle}>Características Técnicas</Text>
                        {categoria.detalles.map((detalle: any, index: number) => (
                            <View key={index} style={{ marginBottom: 15 }}>
                                {detalle.marca && (
                                    <View style={styles.row}>
                                        <Text style={styles.label}>Marca:</Text>
                                        <Text style={styles.value}>{detalle.marca.nombre}</Text>
                                    </View>
                                )}
                                {detalle.gama_producto && (
                                    <View style={styles.row}>
                                        <Text style={styles.label}>Gama/Serie:</Text>
                                        <Text style={styles.value}>{detalle.gama_producto.nombre}</Text>
                                    </View>
                                )}
                                {detalle.caracteristica && (
                                    <View style={styles.row}>
                                        <Text style={styles.label}>Característica:</Text>
                                        <Text style={styles.value}>
                                            {detalle.caracteristica.nombre} - {detalle.caracteristica.descripcion}
                                        </Text>
                                    </View>
                                )}
                                {detalle.medida && (
                                    <View style={styles.row}>
                                        <Text style={styles.label}>Medida:</Text>
                                        <Text style={styles.value}>
                                            {detalle.medida.nombre}: {detalle.medida.medida}
                                        </Text>
                                    </View>
                                )}
                                {detalle.composicion && (
                                    <View style={styles.row}>
                                        <Text style={styles.label}>Composición:</Text>
                                        <Text style={styles.value}>
                                            {detalle.composicion.nombre} - {detalle.composicion.descripcion}
                                        </Text>
                                    </View>
                                )}
                            </View>
                        ))}
                    </View>
                )}

                {/* Footer */}
                <View style={styles.footer}>
                    <Text>Correas Center - Solución Confiable</Text>
                    <Text>Tel: +591 7 7306-576 | Email: ventas@correascenter.com</Text>
                    <Text>www.correascenter.com</Text>
                </View>
            </Page>
        </Document>
    );
}

// Componente de descarga
interface DownloadButtonProps {
    producto: any;
    categoria: any;
}

export default function TechnicalSheetDownload({ producto, categoria }: DownloadButtonProps) {
    return (
        <PDFDownloadLink
            document={<TechnicalSheetDocument producto={producto} categoria={categoria} />}
            fileName={`ficha-tecnica-${categoria.slug}.pdf`}
            className="inline-flex items-center gap-2 bg-[#EA0A2A] hover:bg-[#c90825] text-white px-6 py-3 rounded-lg font-semibold transition-all hover:scale-105"
        >
            {({ blob, url, loading, error }) =>
                loading ? (
                    <>
                        <div className="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                        Generando PDF...
                    </>
                ) : (
                    <>
                        <Download size={20} />
                        Descargar Ficha Técnica
                    </>
                )
            }
        </PDFDownloadLink>
    );
}
