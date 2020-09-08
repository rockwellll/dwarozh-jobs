<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DuskTestCase::class)->in('Browser');
uses(DatabaseMigrations::class)->in('Browser');
uses(RefreshDatabase::class)->in('Feature', 'Unit');
uses(Tests\TestCase::class)->in('Feature');
