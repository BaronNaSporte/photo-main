<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

     // Явно указываем имя модели
     protected static ?string $modelLabel = 'Отзыв';

     // Для правильного отображения в навигации
     protected static ?string $navigationLabel = 'Отзывы';

     protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

     // Гарантируем, что ресурс будет показан в навигации
     protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user')
                    ->label('Автор')
                    ->disabled(),

                Forms\Components\Textarea::make('content')
                    ->label('Текст отзыва')
                    ->required()
                    ->maxLength(1000),

                Forms\Components\FileUpload::make('photo')
                    ->label('Фотография')
                    ->image()
                    ->directory('reviews'),

                Forms\Components\Toggle::make('is_verified')
                    ->label('Одобрено')
                    ->default(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->label('Автор')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('content')
                    ->label('Отзыв')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\ImageColumn::make('photo')
                    ->label('Фото')
                    ->circular(),

                Tables\Columns\IconColumn::make('is_verified')
                    ->label('Статус')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_verified')
                    ->label('Статус модерации')
                    ->options([
                        '1' => 'Одобренные',
                        '0' => 'На модерации',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_verified', false)->count();
    }
}
