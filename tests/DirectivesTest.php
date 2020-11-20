<?php

namespace SwitchoverLaravel;

class DirectivesTest extends Testcase {

    public function testHasFeature() {

        $blade = "@hasFeature('my-feature')";

        $actual = $this->blade->compileString($blade);

        $expected = "<?php if (app('switchover')->toggleValue('my-feature', false)) : ?>";
        $this->assertEquals($expected, $actual);
    }

    public function testHasConditionalFeature() {

        $blade = "@hasConditionalFeature('my-feature', [ 'userId' => Auth::user()->email, 'foo' => 'bar'])";
        $actual = $this->blade->compileString($blade);

        $expected = "<?php if (app('switchover')->toggleValue('my-feature', false, new \Switchover\Context([ 'userId' => Auth::user()->email, 'foo' => 'bar']))) : ?>";

        $this->assertEquals($expected, $actual);
    }

    public function testEndHasFeature() {
        $blade = "@endHasFeature";

        $actual = $this->blade->compileString($blade);

        $expected = "<?php endif; ?>";
        $this->assertEquals($expected, $actual);

    }
}