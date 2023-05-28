<?php
namespace App\Repositories;

interface MessagesInterfaces{
    public function getPaginated();
    public function store($request);
    public function FindById($id);
    public function update($request,$id);
    public function destroy($id);
}