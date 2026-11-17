<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Schema as DbSchema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        $cols = DbSchema::getColumnListing('articles');
        $contentCol = in_array('content', $cols) ? 'content' : 'excerpt';

        $fields = [
            TextInput::make('title')->label('Judul Artikel')->required()->columnSpanFull(),
        ];

        if (in_array('slug', $cols)) {
            $fields[] = TextInput::make('slug')->label('Slug');
        }
        if (in_array($contentCol, $cols)) {
            $fields[] = Textarea::make($contentCol)->label('Isi Artikel')->rows(6)->required()->columnSpanFull();
        }

        return $schema->components($fields);
    }
}