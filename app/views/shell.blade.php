
@extends('layouts.default')
@section('content')
<?php
$output = shell_exec('whoami');
echo "<p>$output</p>";
?>

@stop