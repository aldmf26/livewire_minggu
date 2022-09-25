<div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</button>
    @include('alert.alert')

    <input type="text" class="form-control mb-2 mt-2" wire:model="search" placeholder="cari user" autofocus>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $u)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <button wire:click="edit({{ $u->id }})" class="btn btn-sm btn-warning">Edit</button>
                        <button wire:click="deleteId({{ $u->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- tambah --}}
    <form wire:submit.prevent="tambahData">
        <div wire:ignore.self class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    wire:model="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    wire:model="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- edit --}}
    <form wire:submit.prevent="submitEdit">
        <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="v_name">Name</label>
                                <input type="text" class="form-control @error('v_name') is-invalid @enderror"
                                    wire:model="v_name">
                                @error('v_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="v_email">Email</label>
                                <input type="email" class="form-control @error('v_email') is-invalid @enderror"
                                    wire:model="v_email">
                                @error('v_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- delete --}}
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Apakah ingin dihapus?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="delete" class="btn btn-danger">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{ $users->links() }}

</div>
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#tambah').modal('hide')
            $('#edit').modal('hide')
            $('#delete').modal('hide')
        })

        window.addEventListener('show-edit', event => {
            $('#edit').modal('show')
        })
        window.addEventListener('show-delete', event => {
            $('#delete').modal('show')
        })
    </script>
@endsection
