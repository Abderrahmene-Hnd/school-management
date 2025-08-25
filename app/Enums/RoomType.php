<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Information()
 * @method static static Check()
 * @method static static Approval()
 */
final class RoomType extends Enum
{
    const lecture = 'lecture';

    const lab = 'lab';

    const seminar = 'seminar';

    const other = 'other';
}
