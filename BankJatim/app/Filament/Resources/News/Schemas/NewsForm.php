<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Select::make('category_id')
                    ->relationship('category', 'name', fn ($query) => $query->where('type', 'news'))
                    ->nullable()
                    ->searchable()
                    ->preload(),
                FileUpload::make('image_path')
                    ->image()
                    ->directory('news')
                    ->required(),
                DatePicker::make('published_date')
                    ->required()
                    ->default(now()),
                Textarea::make('excerpt')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->label('Is Large Feature (Left Side)')
                    ->default(false),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
