<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;

uses(DuskTestCase::class)->in('Browser');
uses(RefreshDatabase::class)->in('Feature', 'Unit', 'Browser');
uses(Tests\TestCase::class)->in('Feature');
