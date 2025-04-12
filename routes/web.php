<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

Route::get('/', function () {
    $process = Process::fromShellCommandline('ls', base_path());
    $process->run();

    return nl2br($process->getOutput());
});
