<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductSectionResource\Pages;
use App\Models\ProductSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ProductSectionResource extends Resource
{
    protected static ?string $model = ProductSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Products Section')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),

                    Repeater::make('products')
                        ->label('Products')
                        ->schema([
                            FileUpload::make('image')
                            ->image()
                            ->directory('products')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->downloadable(),
                            TextInput::make('text')->label('Product Name'),
                            TextInput::make('subtext')->label('Product Subtitle'),
                            TextInput::make('price')->label('Price'),
                            TextInput::make('button.text')->label('Button Text'),
                            TextInput::make('button.link')->label('Button Link')->url(),
                        ])
                        ->addActionLabel('Add Product')
                        ->columnSpanFull()
                        ->reorderable(),

                    TextInput::make('readmore_title')->label('Read More Title'),
                    TextInput::make('readmore_link')->label('Read More Link')->url(),
                    Toggle::make('specific_program')->label('Specific Program'),
                ])
                ->columns(1)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('readmore_title'),
                TextColumn::make('created_at')->dateTime()->since(),
                TextColumn::make('image'),

            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductSections::route('/'),
            'create' => Pages\CreateProductSection::route('/create'),
            'edit' => Pages\EditProductSection::route('/{record}/edit'),
        ];
    }
}
