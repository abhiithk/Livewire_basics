<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book as BookModel;
use Exception;

class Book extends Component
{
  public $name, $isbn, $author;
  public $viewList = false, $showForm = true;
  public $lang = [];
  public $sql = [];
  public $hiddenId;
  public $languages = [
    ['id' => 0, 'name' => 'English'],
    ['id' => 1, 'name' => 'Hindi'],
    ['id' => 2, 'name' => 'Malayalam'],
    ['id' => 3, 'name' => 'Tamil'],
    ['id' => 4, 'name' => 'Telung']
  ];

  public function render()
  {
    try {
      $this->sql = BookModel::all();
      
    } catch (Exception $e) {
      dd($e->getMessage() . $e->getCode());
    }
    return view('livewire.book');
  }

  public function index()
  {

    return view('book');
  }

  public function submit()
  {
    $updatedId = $this->hiddenId;
    $lingo = implode(',', $this->lang);
    if ($updatedId > 0) {
      $updateArray = array(
        'name' => $this->name, 'isbn' => $this->isbn, 'author' => $this->author, 'language' => $lingo
      );

      try {
        BookModel::where('id', $updatedId)->update($updateArray);
      } catch (Exception $e) {
        dd($e->getMessage() . $e->getCode());
      }
      $this->viewList = true;
      $this->showForm = false;
    } else {
      try {
        
        BookModel::create([
          'name' => $this->name, 'isbn' => $this->isbn, 'author' => $this->author, 'language' => $lingo
        ]);
      } catch (Exception $e) {
        dd($e->getMessage() . $e->getCode());
      }
    }
    // dd (implode( ',', $this->lang));
  }

  public function viewList()
  {
    $this->viewList = true;
    $this->showForm = false;
  }

  public function addBook()
  {
    $this->name = '';
    $this->isbn = '';
    $this->author = '';
    $this->lang = '';
    $this->hiddenId = '';
    $this->viewList = false;
    $this->showForm = true;
  }

  public function editBook($id)
  {
    try {
      $singleData = BookModel::find($id);
      $this->name = $singleData->name;
      $this->isbn = $singleData->isbn;
      $this->hiddenId = $singleData->id;
      $this->author = $singleData->author;
      $selectedLang =  explode(',', $singleData->language);
      foreach ($selectedLang as $key => $value) {
        $this->lang[$key] = $value;
      }
    } catch (Exception $e) {
      dd($e->getMessage() . $e->getCode());
    }
    $this->viewList = false;
    $this->showForm = true;
  }

  public function deleteBook($id)
  {
    try {
      $res = BookModel::where('id', $id)->delete();
    } catch (Exception  $e) {

      dd($e->getMessage() . $e->getCode());
    }
  }
}
