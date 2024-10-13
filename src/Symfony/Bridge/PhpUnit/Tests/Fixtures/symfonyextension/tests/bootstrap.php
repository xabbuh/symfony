<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__.'/../src/FinalClass.php';
require __DIR__.'/../src/ClassExtendingFinalClass.php';

require __DIR__.'/../../../../SymfonyExtension.php';
require __DIR__.'/../../../../Extension/DisableClockMockSubscriber.php';
require __DIR__.'/../../../../Extension/DisableDnsMockSubscriber.php';
require __DIR__.'/../../../../Extension/EnableClockMockSubscriber.php';
require __DIR__.'/../../../../Extension/RegisterClockMockSubscriber.php';
require __DIR__.'/../../../../Extension/RegisterDnsMockSubscriber.php';

if (file_exists(__DIR__.'/../../../../vendor/autoload.php')) {
    require __DIR__.'/../../../../vendor/autoload.php';
} elseif (file_exists(__DIR__.'/../../../..//../../../../vendor/autoload.php')) {
    require __DIR__.'/../../../../../../../../vendor/autoload.php';
}
