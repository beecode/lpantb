<?php

namespace App\Controllers\Interfaces;

/**
 *
 * @author nunenuh
 */
interface FeatureInterface {

    public function view();

    public function addView();

    public function add();

    public function updateView($id);

    public function update();

    public function delete($id);

    public function search();
}
