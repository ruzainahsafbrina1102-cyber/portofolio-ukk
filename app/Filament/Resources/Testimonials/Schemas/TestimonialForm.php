<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as DbSchema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        $cols = DbSchema::getColumnListing('testimonials');
        $nameCol = in_array('name', $cols) ? 'name' : 'client_name';
        $roleCol = in_array('role', $cols) ? 'role' : 'position';
        $contentCol = collect(['content', 'message', 'feedback'])->first(fn ($c) => in_array($c, $cols)) ?? 'content';

        $fields = [
            TextInput::make($nameCol)->label('Nama')->required(),
        ];

        if (in_array($roleCol, $cols)) {
            $fields[] = TextInput::make($roleCol)->label('Jabatan / Status');
        }
        if (in_array($contentCol, $cols)) {
            $fields[] = Textarea::make($contentCol)->label('Isi Testimoni')->rows(4)->required()->columnSpanFull();
        }

        return $schema->components($fields);
    }
}