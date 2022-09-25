<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $email, $password, $user_id;
    public $v_name, $v_email, $v_user_id, $delete_id;

    public function tambahData()
    {

        $this->inputValidate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $this->resetInput();
        // $this->user_id = NULL;
        // $this->name = NULL;
        // $this->email = NULL;
        // $this->password = NULL;

        session()->flash('success', 'User Berhasil dibuat');
        // untuk refresh langsung halamn
        // $this->emit('tambahData');

        // tutup modal setelah tambah
        $this->dispatchBrowserEvent('close-modal');
    }

    public function inputValidate()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
    }

    public function resetInput()
    {
        $this->user_id = NULL;
        $this->name = NULL;
        $this->email = NULL;
        $this->v_name = NULL;
        $this->v_email = NULL;
        $this->password = NULL;
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        $this->v_user_id = $users->id;
        $this->v_name = $users->name;
        $this->v_email = $users->email;

        $this->dispatchBrowserEvent('show-edit');
    }

    public function submitEdit()
    {

        // $this->inputValidate();
        User::where('id', $this->v_user_id)->update([
            'name' => $this->v_name,
            'email' => $this->v_email,
        ]);

        $this->resetInput();

        session()->flash('success', 'User Berhasil diedit');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteId($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete');
    }

    public function delete()
    {
        User::where('id', $this->delete_id)->delete();
        session()->flash('success', 'User Berhasil dihapus');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3)
        ]);
    }
}
