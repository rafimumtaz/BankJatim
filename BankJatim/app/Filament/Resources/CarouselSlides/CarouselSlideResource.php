<?php

namespace App\Filament\Resources\CarouselSlides;

use App\Filament\Resources\CarouselSlides\Pages;
use App\Models\CarouselSlide;
use Filament\Forms\Components as FormComponents;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions; // Using Filament\Actions directly
use BackedEnum;

class CarouselSlideResource extends Resource
{
    protected static ?string $model = CarouselSlide::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Carousel Slides';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FormComponents\Section::make()
                    ->schema([
                        FormComponents\FileUpload::make('image_path')
                            ->label('Slide Image')
                            ->image()
                            ->imageEditor()
                            ->required()
                            ->disk('public')
                            ->directory('carousel-slides')
                            ->visibility('public')
                            ->columnSpanFull(),

                        FormComponents\TextInput::make('title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('Enter slide title'),

                        FormComponents\TextInput::make('link_url')
                            ->label('Link URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com'),

                        FormComponents\Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->columnSpanFull(),

                        FormComponents\Grid::make(2)
                            ->schema([
                                FormComponents\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true)
                                    ->required(),

                                FormComponents\TextInput::make('sort_order')
                                    ->label('Sort Order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),

                Tables\Columns\TextInputColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarouselSlides::route('/'),
            'create' => Pages\CreateCarouselSlide::route('/create'),
            'edit' => Pages\EditCarouselSlide::route('/{record}/edit'),
        ];
    }
}
