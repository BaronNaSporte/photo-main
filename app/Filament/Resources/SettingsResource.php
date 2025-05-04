<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Filament\Resources\SettingsResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\text;

class SettingsResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = "Настройка";

    protected static ?string $pluralModelLabel = "Настройки";

    protected static ?string $navigationLabel = 'Настройки';


    public static function canCreate(): bool
    {
        if(Setting::count() >= 1) {
            return false;
        }
        return true;
    }


    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Section::make()->schema([
                    Tabs::make('Табы')->schema([
                        Tab::make('Информация')->schema([
                            TextInput::make('name')
                            ->label('Название сайта')
                            ->placeholder('Что либо обучающее')
                            ->required(),
                            Textarea::make('description')
                                ->label('Описание сайта')
                                ->maxLength(500),
                        ]),
                        Tab::make('Медиа')->schema([
                            FileUpload::make('logo')
                                ->label('Логотип')
                                ->directory('settings')
                                ->image(),
                        ]),
                        Tab::make('Мета')->schema([
                            TextInput::make('meta_title')
                                ->label('Мета заголовок')
                                ->required(),
                            TextInput::make('meta_keywords')
                                ->label('Мета слова')
                                ->required(),
                            Textarea::make('meta_description')
                                ->label('Мета описание')
                                ->maxLength(1500)
                                ->required(),
                        ]),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}
