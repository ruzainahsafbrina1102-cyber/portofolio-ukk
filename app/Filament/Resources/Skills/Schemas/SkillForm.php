<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as DbSchema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        $cols = DbSchema::getColumnListing('skills');
        $nameCol = in_array('skill_name', $cols) ? 'skill_name' : 'name';
        $levelCol = in_array('proficiency', $cols) ? 'proficiency' : 'level';

        $fields = [
            TextInput::make($nameCol)->label('Nama Keahlian')->required(),
        ];

        if (in_array($levelCol, $cols)) {
            $fields[] = TextInput::make($levelCol)->label('Tingkat Kemahiran');
        }
        if (in_array('icon', $cols)) {
            $fields[] = TextInput::make('icon')->label('Kode Ikon (Font Awesome)');
        }
        if (in_array('category', $cols)) {
            $fields[] = TextInput::make('category')->label('Kategori');
        }

        return $schema->components($fields);
    }
}