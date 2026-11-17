<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('full_name')
                ->label('Nama Lengkap')
                ->required(),
            TextInput::make('class_major')
                ->label('Kelas & Jurusan')
                ->placeholder('Contoh: XII Pengembangan Perangkat Lunak & GIM')
                ->required(),
            TextInput::make('headline')
                ->label('Headline / Profesi Singkat')
                ->placeholder('Contoh: UI/UX Designer & Front-end Developer Student'),
            FileUpload::make('avatar')
                ->label('Foto Profil')
                ->image()
                ->disk('public')
                ->directory('profiles'),
            FileUpload::make('cv_file')
                ->label('File CV (PDF)')
                ->acceptedFileTypes(['application/pdf'])
                ->disk('public')
                ->directory('cv'),
            Textarea::make('about_me')
                ->label('Tentang Saya')
                ->rows(4)
                ->columnSpanFull(),
            Textarea::make('education')
                ->label('Riwayat Pendidikan')
                ->rows(3),
            Textarea::make('career_goal')
                ->label('Tujuan Karir')
                ->rows(3),
            TextInput::make('email')
                ->label('Email')
                ->email(),
            TextInput::make('github')
                ->label('Link GitHub')
                ->url(),
            TextInput::make('linkedin')
                ->label('Link LinkedIn')
                ->url(),
            TextInput::make('instagram')
                ->label('Link Instagram')
                ->url(),
        ]);
    }
}