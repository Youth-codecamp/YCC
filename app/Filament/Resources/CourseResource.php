<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Course;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\CourseResource\Pages;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Course Details')->schema([
                    TextInput::make('name')
                        ->required()
                        ->unique("courses", "name")
                        ->maxLength(255),
                    TextInput::make('embed_url')
                        ->required()
                ])->columns("2"),
                MarkdownEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make("thumbnail_path")
                    ->label("Upload post cover")
                    ->image()
                    ->required()
                    ->directory("courses")
                    ->columnSpanFull(),
                Section::make('Course Details')->schema([
                    TagsInput::make('tags')
                        ->required()
                        ->separator(',')
                        ->helperText('Separate tags with pressing enter.'),
                    Select::make("provider_id")
                        ->label("Provider")
                        ->relationship("provider", "name")
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->unique("providers", "name")
                                ->maxLength(255),
                            FileUpload::make("profile_picture_path")
                                ->label("Upload provider profile picture")
                                ->image()
                                ->required()
                                ->directory("providers")
                        ])
                ])->columns("2"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail_path')
                    ->searchable(),
                Tables\Columns\TagsColumn::make('tags')
                    ->separator(',')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provider.name')
                    ->numeric()
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
