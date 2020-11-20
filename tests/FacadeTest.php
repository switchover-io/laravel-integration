<?php 

namespace SwitchoverLaravel;

class FacadeTest extends Testcase {

    public function testToggleKeys() {
        $this->assertEquals(0, count(Switchover::getToggleKeys()));
    }

    public function testToggleValue() {
        $this->assertFalse(Switchover::toggleValue('beta-feature', false));
    }
}