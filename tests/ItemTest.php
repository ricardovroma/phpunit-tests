<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /**
     * @covers Item
     */
    public function testTokenIsAString()
    {   
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);
    
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
    
        $result = $method->invoke($item);    
    
        $this->assertIsString($result);
    }

    /**
     * @covers Item
     */
    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);        

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);        
    }    
}
