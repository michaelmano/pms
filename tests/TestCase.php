<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\Handler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->disableExceptionHandling();
    }

    /**
     * Disables exception handling so we can test results are as expected without failing.
     */
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }
    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }

}
