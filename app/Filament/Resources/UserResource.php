<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Pages\EditUser;
use App\Models\User;
use Filament\Tables;
use Pages\ListUsers;
use Pages\CreateUser;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Details')->schema([
                    TextInput::make('name')
                        ->required()
                        ->unique("courses", "name")
                        ->maxLength(255),
                    TextInput::make('email')
                        ->required()
                        ->email()
                ])->columns("2"),
                Section::make()->schema([
                    TextInput::make('password')
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (string $context): bool => $context === 'create')
                        // ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord))
                        ->password()
                        ->maxLength(255),
                    Toggle::make('is_verified')
                        ->required()
                        ->default(0)
                        ->helperText("will mark user as verified"),
                ])->columns("2"),
                FileUpload::make("profile_photo_path")
                    ->label("Upload user profile picture")
                    ->image()
                    ->required()
                    ->directory("users")
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('profile_photo_path')->label("Profile picture")
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('is_verified')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('')->button(),
                Tables\Actions\DeleteAction::make()->label('')->button(),
                Tables\Actions\ViewAction::make()->label('')->button(),
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
