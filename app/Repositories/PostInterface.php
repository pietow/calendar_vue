<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PostInterface {
    public function update(Request $request, $id);
    public function updateChildren(Request $request, $id);
    public function store(Request $request);
    public function storeChild(Request $request, $id);
    public function multiUpload(Request $request, $id);
}
