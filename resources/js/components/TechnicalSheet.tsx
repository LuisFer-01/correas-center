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
    warningBox: {
        backgroundColor: '#FEF2F2',
        borderLeftWidth: 4,
        borderLeftColor: '#DC2626',
        padding: 15,
        marginTop: 20,
        marginBottom: 20,
    },
    warningTitle: {
        fontSize: 12,
        fontWeight: 'bold',
        color: '#991B1B',
        marginBottom: 5,
    },
    warningText: {
        fontSize: 10,
        color: '#B91C1C',
        lineHeight: 1.5,
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
    // ✅ Nuevos estilos para aplicaciones y medidas agrupadas
    appSection: {
        marginBottom: 15,
        backgroundColor: '#F0F9FF',
        padding: 10,
        borderRadius: 4,
    },
    appTitle: {
        fontSize: 12,
        fontWeight: 'bold',
        color: '#0369A1',
        marginBottom: 5,
    },
    appList: {
        flexDirection: 'row',
        flexWrap: 'wrap',
        gap: 5,
    },
    appItem: {
        fontSize: 10,
        color: '#0C4A6E',
        backgroundColor: '#FFFFFF',
        paddingHorizontal: 8,
        paddingVertical: 3,
        borderRadius: 10,
        borderWidth: 1,
        borderColor: '#BAE6FD',
    },
    gamaSeparator: {
        fontSize: 13,
        fontWeight: 'bold',
        color: '#EA0A2A',
        marginTop: 10,
        marginBottom: 5,
        borderBottom: '1px solid #EA0A2A',
        paddingBottom: 2,
    },
});

interface TechnicalSheetProps {
    producto: any;
    categoria: any;
}

// Componente del documento PDF
function TechnicalSheetDocument({ producto, categoria }: TechnicalSheetProps) {
    // ✅ Extraer aplicaciones únicas
    const aplicaciones = categoria.detalles
        ?.filter((d: any) => d.aplicacion)
        .map((d: any) => d.aplicacion)
        .filter((a: any, i: number, arr: any[]) => arr.findIndex((t: any) => t.id === a.id) === i) || [];

    // ✅ Agrupar medidas por GamaProducto
    const medidasAgrupadas: Record<string, any[]> = {};
    categoria.detalles?.forEach((detalle: any) => {
        if (detalle.medida) {
            const gamaNombre = detalle.gama_producto?.nombre || 'Sin Gama';
            if (!medidasAgrupadas[gamaNombre]) {
                medidasAgrupadas[gamaNombre] = [];
            }
            const existe = medidasAgrupadas[gamaNombre].some(
                (m: any) => m.id === detalle.medida.id
            );
            if (!existe) {
                medidasAgrupadas[gamaNombre].push(detalle.medida);
            }
        }
    });

    return (
        <Document>
            <Page size="A4" style={styles.page}>
                {/* Header */}
                <View style={styles.header}>
                    <Text style={styles.title}>CARACTERÍSTICAS GENERALES</Text>
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
                    {categoria.descripcion_corta && (
                        <View style={styles.row}>
                            <Text style={styles.label}>Descripción:</Text>
                            <Text style={styles.value}>{categoria.descripcion_corta}</Text>
                        </View>
                    )}
                </View>

                {/* ✅ Aplicaciones */}
                {aplicaciones.length > 0 && (
                    <View style={styles.appSection}>
                        <Text style={styles.appTitle}>Aplicaciones</Text>
                        <View style={styles.appList}>
                            {aplicaciones.map((app: any, index: number) => (
                                <Text key={index} style={styles.appItem}>
                                    {app.nombre}
                                </Text>
                            ))}
                        </View>
                    </View>
                )}

                {/* Características Técnicas */}
                {categoria.detalles && categoria.detalles.length > 0 && (
                    <View style={styles.section}>
                        <Text style={styles.sectionTitle}>Características Técnicas</Text>

                        {/* Gamas */}
                        {(() => {
                            const gamas = categoria.detalles
                                .filter((d: any) => d.gama_producto)
                                .map((d: any) => d.gama_producto)
                                .filter((g: any, i: number, arr: any[]) => arr.findIndex((t: any) => t.id === g.id) === i);

                            return gamas.length > 0 && (
                                <View style={{ marginBottom: 10 }}>
                                    <Text style={{ fontSize: 12, fontWeight: 'bold', color: '#333', marginBottom: 5 }}>Gamas Disponibles:</Text>
                                    {gamas.map((gama: any, idx: number) => (
                                        <Text key={idx} style={{ fontSize: 10, color: '#666', marginLeft: 10 }}>• {gama.nombre}</Text>
                                    ))}
                                </View>
                            );
                        })()}

                        {/* ✅ Medidas agrupadas por Gama */}
                        {Object.keys(medidasAgrupadas).length > 0 && (
                            <View style={{ marginTop: 10 }}>
                                <Text style={{ fontSize: 12, fontWeight: 'bold', color: '#333', marginBottom: 5 }}>Medidas por Gama:</Text>
                                {Object.entries(medidasAgrupadas).map(([gamaNombre, medidas]: [string, any[]]) => (
                                    <View key={gamaNombre} style={{ marginBottom: 8 }}>
                                        <Text style={styles.gamaSeparator}>{gamaNombre}</Text>
                                        {medidas.map((med: any, idx: number) => (
                                            <View key={idx} style={{ ...styles.row, marginLeft: 5 }}>
                                                <Text style={{ ...styles.label, width: '40%' }}>{med.nombre}:</Text>
                                                <Text style={{ ...styles.value, width: '60%' }}>
                                                    {med.medida} {med.tipo_medida?.representacion || ''}
                                                </Text>
                                            </View>
                                        ))}
                                    </View>
                                ))}
                            </View>
                        )}

                        {/* Características individuales */}
                        {categoria.detalles.map((detalle: any, index: number) => (
                            <View key={index} style={{ marginBottom: 10 }}>
                                {detalle.caracteristica && (
                                    <View style={styles.row}>
                                        <Text style={styles.label}>Característica:</Text>
                                        <Text style={styles.value}>
                                            {detalle.caracteristica.nombre} - {detalle.caracteristica.descripcion}
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

                {/* Advertencia */}
                <View style={styles.warningBox}>
                    <Text style={styles.warningTitle}>⚠ Información Importante</Text>
                    <Text style={styles.warningText}>
                        Los datos mostrados en este documento son características generales de esta categoría.
                        Pueden existir variaciones en las especificaciones técnicas según la marca del producto.
                        Para obtener información detallada por marca, por favor contáctanos.
                    </Text>
                </View>

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
            fileName={`caracteristicas-generales-${categoria.slug}.pdf`}
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
                        Descargar Características Generales
                    </>
                )
            }
        </PDFDownloadLink>
    );
}
