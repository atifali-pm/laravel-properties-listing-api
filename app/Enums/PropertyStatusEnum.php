<?php
namespace App\Enums;

enum PropertyStatusEnum: string {
    case SALE = 'Sale';
    case SOLD = 'Sold';
    case HOLD = 'Hold';
}
