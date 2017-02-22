<?php

namespace DarrynTen\Pslayers\Tests\Pslayers;

use DarrynTen\Pslayers\PslayersException;
use DarrynTen\Pslayers\Pslayers;
use DarrynTen\Pslayers\Layer;
use PHPUnit_Framework_TestCase;

class PslayersExceptionTest extends PHPUnit_Framework_TestCase
{
    public function testJsonException()
    {
        $this->expectException(PslayersException::class);

        throw new PslayersException(
            json_encode(
                [
                    'errors' => [
                        'code' => 1,
                    ],
                    'status' => 10022,
                    'title' => 'Error',
                    'detail' => 'Error Details',
                ]
            )
        );
    }

    public function testMissingWidthPslayers()
    {
        $this->expectException(PslayersException::class);

        $config = [];
        $instance = new Pslayers($config);
    }

    public function testMissingHeightPslayers()
    {
        $this->expectException(PslayersException::class);

        $config = ['width' => 10];
        $instance = new Pslayers($config);
    }

    public function testMissingLayerId()
    {
        $this->expectException(PslayersException::class);

        $instance = new Layer([]);
    }

    public function testMissingLayerWidth()
    {
        $this->expectException(PslayersException::class);

        $instance = new Layer([
            'id' => 1,
        ]);
    }

    public function testMissingLayerHeight()
    {
        $this->expectException(PslayersException::class);

        $instance = new Layer([
            'id' => 1,
            'width' => 100,
        ]);
    }
}
