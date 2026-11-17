<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as DbSchema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        $cols = DbSchema::getColumnListing('certificates');
        $titleCol = in_array('title', $cols) ? 'title' : 'name';
        $issuerCol = in_array('issuer', $cols) ? 'issuer' : 'organizer';
        $yearCol = in_array('year', $cols) ? 'year' : 'issued_date';
        $fileCol = collect(['file', 'image', 'credential_url'])->first(fn ($c) => in_array($c, $cols)) ?? 'file';

        $fields = [
            TextInput::make($titleCol)->label('Nama Sertifikat')->required(),
        ];

        if (in_array($issuerCol, $cols)) {
            $fields[] = TextInput::make($issuerCol)->label('Penerbit / Penyelenggara');
        }
        if (in_array($yearCol, $cols)) {
            $fields[] = TextInput::make($yearCol)->label('Tahun / Tanggal');
        }
        if (in_array($fileCol, $cols)) {
            $fields[] = FileUpload::make($fileCol)->label('File / Foto Sertifikat')->disk('public')->directory('certificates');
        }

        return $schema->components($fields);
    }
}