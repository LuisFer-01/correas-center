<?php

namespace App\Filament\Resources\PasoWizards\Schemas;

use App\Models\PasoWizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PasoWizardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Configuración del Paso')
                    ->description('Define el paso del Product Selector interactivo')
                    ->schema([
                        TextInput::make('identificador')
                            ->label('Identificador')
                            ->required()
                            ->maxLength(100)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej: industria, producto, categoria')
                            ->helperText('Identificador único del paso (se usa en el código del frontend)')
                            ->hint('Valores comunes: industria, producto, categoria')
                            ->hintIcon('heroicon-o-code-bracket'),

                        TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: ¿En qué industria trabajas?')
                            ->helperText('Pregunta o título que se mostrará en este paso'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(2)
                            ->maxLength(500)
                            ->placeholder('Ej: Selecciona tu sector para recomendarte los mejores productos')
                            ->helperText('Descripción breve que acompaña al título'),

                        Select::make('fuente_datos')
                            ->label('Fuente de Datos')
                            ->required()
                            ->options([
                                'industrias' => 'Industrias / Aplicaciones',
                                'productos' => 'Productos',
                                'categorias' => 'Categorías',
                            ])
                            ->helperText('De dónde se obtendrán las opciones para este paso')
                            ->hint('Define qué tipo de datos mostrar en este paso')
                            ->hintIcon('heroicon-o-circle-stack'),

                        Select::make('campo_filtro')
                            ->label('Campo de Filtro')
                            ->options([
                                '' => 'Sin filtro',
                                'producto_id' => 'producto_id (filtrar categorías por producto)',
                                'industria_id' => 'industria_id (filtrar por industria)',
                            ])
                            ->default('')
                            ->helperText('Campo para filtrar los datos (opcional)')
                            ->hint('Útil para pasos dependientes, ej: filtrar categorías por producto seleccionado')
                            ->hintIcon('heroicon-o-funnel'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Configuración')
                    ->description('Configuración de visualización y estado')
                    ->schema([
                        TextInput::make('orden')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(fn () => (PasoWizard::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((PasoWizard::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los pasos activos se mostrarán en el Product Selector'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
