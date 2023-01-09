<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Register;
use App\Http\Livewire\Post;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Exception;

class Forms extends Component
{
  use WithFileUploads;
  use WithPagination;
  //use Exception;
  //public $photo;
  public $head, $msg;
  public $sText = '', $search = false;
  public $showList = true, $showForm = false;
  public $hiddenId;
  public $fname;
  public $email;
  public $lname, $address, $zip;
  //public $allData = [];
  protected $rules = [
    'fname' => 'required|min:3|max:20',
    'email' => 'required|email'
  ];
  
  public function submit()
  { //dd($this->photo);
    //$pic=$this->photo->store('public/photos');
    // dd($pic);
    
    $validateData = $this->validate();

    $updatedId = $this->hiddenId;

    if ($updatedId > 0) {
      $updateArray = array(
        'fname' => $this->fname, 'lname' => $this->lname, 'email' => $this->email, 'address' => $this->address, 'zip' => $this->zip
      );

      try {
        Register::where('id', $updatedId)->update($updateArray);
      } catch (Exception $e) {
        dd($e->getMessage() . $e->getCode());
      }

      $this->showList = true;
      $this->showForm = false;
      session()->flash('update');
      $this->head = 'Updated';
      $this->msg = 'Data Updated Sucessfully';
    } else {

      try {
        Register::create([
          'fname' => $this->fname, 'lname' => $this->lname, 'email' => $this->email, 'address' => $this->address, 'zip' => $this->zip
        ]);
      } catch (Exception $e) {
        dd($e->getMessage() . $e->getCode());
      }

      session()->flash('success');
      $this->head = 'Submitted';
      $this->msg = 'Data added succesfully';
    }

    // $this->validate(['photo' => 'image|<max:1024>,']);
  }

  public function render()
  {
    try {

      $sql = Register::orderBy('id');
      if ($this->search) {
        $sql = $sql->where('fname', 'like',  $this->sText . '%');
      }

      $allData = $sql->paginate(4);
    } catch (Exception $e) {
      dd($e->getMessage() . $e->getCode());
    }
    return view('livewire.forms', ['allData' => $allData]);
  }

  public function index()
  {

    return view('forms');
  }

  public function addList()
  {
    $this->showList = true;
    $this->showForm = false;
  }

  public function addUser()
  {
    $this->hiddenId = '';
    $this->fname = '';
    $this->lname = '';
    $this->email = '';
    $this->address = '';
    $this->zip = '';
    $this->showList = false;
    $this->showForm = true;
  }

  public function editForm($id)
  {
    try {
      $singleData = Register::find($id);
    } catch (Exception $e) {
      dd($e->getMessage() . $e->getCode());
    }
    $this->fname = $singleData->fname;
    $this->lname = $singleData->lname;
    $this->email = $singleData->email;
    $this->address = $singleData->address;
    $this->zip = $singleData->zip;
    $this->hiddenId = $singleData->id;
    $this->showList = false;
    $this->showForm = true;
  }

  public function deleteForm($id)
  {
    try {
      $res = Register::where('id', $id)->delete();
    } catch (Exception  $e) {

      dd($e->getMessage() . $e->getCode());
    }

    session()->flash('delete');
    $this->head = 'Deleted';
    $this->msg = 'Data Deleted Sucessfully';
  }
  public function search()
  {
    $this->search = true;
  }
  public function searchClear()
  {
    $this->search = false;
    $this->sText = '';
  }
}
