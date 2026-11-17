<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as DbSchema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        $cols = DbSchema::getColumnListing('experiences');
        $posCol = collect(['position', 'role', 'title'])->first(fn ($c) => in_array($c, $cols)) ?? 'position';
        $compCol = in_array('company', $cols) ? 'company' : 'organization';

        $fields = [
            TextInput::make($posCol)->label('Posisi / Peran')->required(),
        ];

        if (in_array($compCol, $cols)) {
            $fields[] = TextInput::make($compCol)->label('Perusahaan / Organisasi');
        }
        if (in_array('period', $cols)) {
            $fields[] = TextInput::make('period')->label('Periode');
        }
        if (in_array('start_date', $cols)) {
            $fields[] = TextInput::make('start_date')->label('Tanggal Mulai');
        }
        if (in_array('end_date', $cols)) {
            $fields[] = TextInput::make('end_date')->label('Tanggal Selesai');
        }
        if (in_array('description', $cols)) {
            $fields[] = Textarea::make('description')->label('Deskripsi')->rows(4)->columnSpanFull();
        }

        return $schema->components($fields);
    }
}