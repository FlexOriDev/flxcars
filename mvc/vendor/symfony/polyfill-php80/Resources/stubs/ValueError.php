<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace mvc\vendor\symfony\polyfill-php80\Resources\stubs;
if (\PHP_VERSION_ID < 80000) {
    class ValueError extends Error
    {
    }
}
