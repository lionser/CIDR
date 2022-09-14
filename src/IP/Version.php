<?php

declare(strict_types=1);

namespace Lionser\IP;

enum Version: int
{
    case IP_V4 = 4;
    case IP_V6 = 6;
}
