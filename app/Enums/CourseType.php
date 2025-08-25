<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Information()
 * @method static static Check()
 * @method static static Approval()
 */
final class CourseType extends Enum
{
    const Mandatory = 'information';

    const Elective = 'check';
    
}
