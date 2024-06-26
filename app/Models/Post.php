<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }

  /**
   * 0 => {#1554 ▼
    +"id": SHQORvv1xO"
    +"type": "paragraph"
    +"data": {#1566 ▼
      +"text": "xd"
    }
  }
  1 => {1565 ▼
    +"id": "E1mlrMlV_G"
    +"type": "header"
    +"data": {#1564 ▼
      +"text": "fdsaasd"
      +"level": 2
    }
  }
  2 => {1544 ▼
    +"id": "Sr86xVBeYD"
    +"type": "list"
    +"data": {1543 ▼
      +"style": "ordered"
      +"items": array:2 [▶]
    }
  }
   * 
   */

  public function descriptionText(): Attribute
  {
    $jsonDescription = json_decode($this->description);
    if (!is_object($jsonDescription)) {
      return new Attribute(
        get: fn () => $this->description,
      );
    }
    $blocks = $jsonDescription->blocks ?? [];
    $resultArr = [];
    foreach ($blocks as $block) {
      if ($block->type === 'paragraph' || $block->type === 'header' || $block->type === "quote") {
        $resultArr[] = $block->data->text;
      }
      if ($block->type === 'image') {
        $resultArr[] = $block->data->caption;
      }
      if ($block->type === 'list') {
        $resultArr[] = implode(" ", $block->data->items);
      }
    }
    $resultStr = implode(" ", $resultArr);
    return new Attribute(
      get: fn () => $resultStr,
    );
  }
}