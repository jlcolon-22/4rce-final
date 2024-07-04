<?php

namespace App\Enums;


enum ProjectStatusEnum: string
{
    case ONGOING = 'ONGOING';
    case FINISHED = 'FINISHED';
    case CANCELED = 'CANCELED';
}
