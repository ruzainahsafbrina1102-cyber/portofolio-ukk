<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')->label('Foto')->disk('public')->circular(),
                TextColumn::make('name')->label('Nama Lengkap')->searchable(),
                TextColumn::make('major')->label('Jurusan / Kelas'),
                TextColumn::make('email')->label('Email'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}