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

namespace PhpDeal\Functional\Verify\ClassPropagation;

use PhpDeal\Exception\ContractViolation;
use PHPUnit\Framework\TestCase;

/**
 * @group propagation
 */
class ContractTest extends TestCase
{
    /**
     * @var Stub
     */
    private $stub;

    public function setUp()
    {
        parent::setUp();
        $this->stub = new Stub();
    }

    public function tearDown()
    {
        unset($this->stub);
        parent::tearDown();
    }

    public function providerVerifyInvalid(): array
    {
        return [
            [
                // Stub can't accept this value
                'parameter' => 1
            ]
        ];
    }

    /**
     * @param int $parameter
     * @dataProvider providerVerifyInvalid
     */
    public function testVerifyInvalid(int $parameter): void
    {
        $this->expectException(ContractViolation::class);
        $this->stub->add($parameter);
    }

    public function providerVerifyValid(): array
    {
        return [
            [
                // StubParent does not accept this parameter, but Stub accepts (and we don't have inheritdoc annotation)
                'parameter' => 2
            ]
        ];
    }

    /**
     * @param int $parameter
     * @dataProvider providerVerifyValid
     */
    public function testVerifyValid(int $parameter): void
    {
        $this->expectNotToPerformAssertions();
        $this->stub->add($parameter);
    }
}
