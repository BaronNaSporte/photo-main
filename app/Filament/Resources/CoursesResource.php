<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoursesResource\Pages;
use App\Filament\Resources\CoursesResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoursesResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $modelLabel = "Запись";

    protected static ?string $pluralModelLabel = "Записи";

    protected static ?string $navigationLabel = 'Записи';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Group::make()->schema([
                Section::make('Запись')->schema([
                    TextInput::make('name')
                        ->label('Название записи')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('description')
                        ->label('Описание записи')
                        ->required(),

                ])->columns(2)->columnSpanFull(),
                Section::make()->schema([
                    FileUpload::make('image')
                        ->image()
                        ->label('Изображение записи')
                        ->directory('images/'),
                ])->columnSpanFull(),
            ])->columnSpan(2),
            Group::make()->schema([
                Section::make()->schema([
                    Select::make('brand_id')
                        ->required()
                        ->preload()
                        ->searchable()
                        ->label('Категория')
                        ->relationship('brand', 'name')
                ]),
                Section::make()->schema([
                    Toggle::make('is_active')
                        ->default(true)
                        ->label('Активная запись'),
                    Toggle::make('is_new')
                        ->default(true)
                        ->label('Новая запись'),
                    Toggle::make('is_popular')
                        ->default(false)
                        ->label('Популярная запись'),
                ]),
            ])->columnSpan(1),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                     ->searchable()
                     ->label('Название записи'),
                ImageColumn::make('image')
                    ->label('Изображение')
                    ->size(50)
                    ->circular()
                    ->square(),
                 ToggleColumn::make('is_active')
                     ->label('Активная запись'),
                 ToggleColumn::make('is_new')
                     ->label('Новая запись'),
                 ToggleColumn::make('is_popular')
                     ->label('Популярная запись'),
            ])
            ->filters([
                Filter::make('is_active')
                    ->label('Актывные записи')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
            ])
            ->actions([
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourses::route('/create'),
            'edit' => Pages\EditCourses::route('/{record}/edit'),
        ];
    }
}
