<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    public $guarded = [];

    public function searchableAs()
    {
        return 'items_index';
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name
        ];
    }

    public function toElasticsearchDocumentArray(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
