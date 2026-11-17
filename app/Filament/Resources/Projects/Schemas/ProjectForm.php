<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as DbSchema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        $cols = DbSchema::getColumnListing('projects');
        $titleCol = in_array('title', $cols) ? 'title' : 'name';
        $imgCol = collect(['image', 'thumbnail', 'cover'])->first(fn ($c) => in_array($c, $cols)) ?? 'image';
        $linkCol = collect(['link', 'demo_url', 'url', 'github_url'])->first(fn ($c) => in_array($c, $cols)) ?? 'link';

        $fields = [
            TextInput::make($titleCol)->label('Judul Proyek')->required(),
        ];

        if (in_array('category', $cols)) {
            $fields[] = TextInput::make('category')->label('Kategori');
        }
        if (in_array('tech_stack', $cols)) {
            $fields[] = TextInput::make('tech_stack')->label('Teknologi');
        }
        if (in_array($imgCol, $cols)) {
            $fields[] = FileUpload::make($imgCol)->label('Gambar Proyek')->image()->disk('public')->directory('projects');
        }
        if (in_array($linkCol, $cols)) {
            $fields[] = TextInput::make($linkCol)->label('Link Proyek')->url();
        }
        if (in_array('description', $cols)) {
            $fields[] = Textarea::make('description')->label('Deskripsi')->rows(4)->columnSpanFull();
        }

        return $schema->components($fields);
    }
}