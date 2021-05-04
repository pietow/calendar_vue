<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PostInterface {
    public function index();
    public function attr();
    public function childAttr();
    public function store(Request $request);
    public function storeChild(Request $request, $id);
    public function find($id);
    public function update(Request $request, $id);
    public function updateChildren(Request $request, $id);
    public function multiUpload(Request $request, $id);
    public function destroy($id);
}
