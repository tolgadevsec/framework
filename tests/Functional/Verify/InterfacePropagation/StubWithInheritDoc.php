<?php

declare(strict_types=1);

/**
 * PHP Deal framework
 *
 * @copyright Copyright 2019, Lisachenko Alexander <lisachenko.it@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpDeal\Functional\Verify\InterfacePropagation;

use PhpDeal\Annotation as Contract;

class StubWithInheritDoc implements StubInterfaceA, StubInterfaceB
{
    /**
     * @param int $variable
     * @Contract\Verify("$variable !== 1")
     * {@inheritdoc}
     */
    public function add(int $variable): void
    {
    }
}
