<?php

abstract class View {
    public function render() {
        // include '../html/header.php';
        include '../html/' . get_class($this) . '.php';
        // include '../html/header.php';
    }
}