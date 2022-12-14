{{-- <div>
    <button type="button" class="btn btn-primary rounded-circle fixed-bottom m-5 d-none" style="height: 50px; width: 50px;" data-bs-toggle="modal" data-bs-target="#userEdit" id="userEditModalButton">+</button>

<div class="modal fade" id="userEdit" tabindex="-1" aria-labelledby="userEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userEditLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-1">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" wire:model.defer="name" id="name">
        </div>
        <div class="mb-1">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email" wire:model.defer="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
          </div>
        <div class="mb-3">
            <label for="role" class="col-form-label">Role:</label>
            <select id="role" class="form-control" wire:model.defer="role">
                <option value=""></option>
                <option value="user">User</option>
                <option value="viewer">Viewer</option>
                <option value="admin">Admin</option>
            </select>
          </div>
          <div class="mb-1">
              <label for="cities">City</label>
            <input type="text" list="cities" class="form-control" wire:model.defer="city">
            <datalist id="cities">
                @foreach($cities as $city)
                <option value="{{ $city->id }}-{{ $city->name }}">({{ $city->state }})</option>
                @endforeach
            </datalist>
          </div>
          <div class="mb-1">
            <label for="location">Location:</label>
            <input type="text" id="location" class="form-control" wire:model.defer="location" list="locations">
            <datalist id="locations">
                @foreach($locations as $location)
                <option value="{{ $location }}"></option>
                @endforeach
            </datalist>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="update({{ $user }})" data-bs-dismiss="modal">Update</button>
      </div>
    </div>
  </div>
</div>
</div> --}}
{{-- @section('custom-scripts')
window.addEventListener('openUserEditModal', event => {
    document.getElementById('userEditModalButton').dispatchEvent(new Event('click'))
})

@endsection --}}

<div class="bg-white col-md-6 offset-md-1 position-sticky p-4" style="max-height: 300px; top: 100px; height: auto;">
    <div class="d-flex align-items-center gap-2 mb-4">
      @if($user == null)
          {{ __('Please select a user above to edit') }}
      @else
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <label for="name" class="col-form-label">Name: {{ $name }}</label>
            <input type="text" class="form-control" wire:model.defer="name" id="name">
          </div>
          <div class="col-4 mt-2">
            <label for="cities">City</label>
            <input type="text" list="cities" class="form-control" wire:model.defer="city">
            <datalist id="cities">
                @foreach($cities as $city)
                <option value="{{ $city->id }}-{{ $city->name }}">({{ $city->state }})</option>
                @endforeach
            </datalist>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email" wire:model.defer="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-4">
            <label for="email" class="col-form-label">Password: </label>
            <br><label for="">{{ $unhashed }}</label>
            {{-- <input type="text" class="form-control" id="email" wire:model.defer="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror --}}
          </div>
          
        </div>
        <div class="row">
          <div class="col-4">
            <label for="role" class="col-form-label">Role:</label>
            <select id="role" class="form-control" wire:model.defer="role">
                <option value=""></option>
                <option value="user">User</option>
                <option value="viewer">Viewer</option>
                <option value="admin">Admin</option>
            </select>
          </div>
          <div class="col-4 mt-2">
            <label for="location">Location:</label>
            <input type="text" id="location" class="form-control" wire:model.defer="location" list="locations">
            <datalist id="locations">
                @foreach($locations as $location)
                <option value="{{ $location }}"></option>
                @endforeach
            </datalist>
          </div>
          <div class="col-4">
            {{-- <label for="role" class="col-form-label"></label> --}}
            {{-- <br> --}}
            <button type="button" wire:loading.attr='disabled' class="btn btn-primary mt-2 float-right" wire:click="update({{ $user }})" data-bs-dismiss="modal">Update</button>
          </div>
        </div>
      </div>
      @endif
    </div>
    <ul class="list-group">
        {{-- @forelse($users as $user)
        <li class="list-group-item d-flex p-2 justify-content-between list-group-item-action" wire:dirty.class="active"  wire:click="edit({{ $user }})">
            <span>
                <i class="{{ $user->role == 'admin' ? 'bi-person-fill' : ($user->role == 'viewer' ? 'bi-eye-fill' : '') }} text-info"></i> {{ $user->name }}
            </span>
            <span class="text-muted">
                <span>
                    {{ $user->city()->first()->name ?? 'City'}} -
                </span>
                <span>
                    {{ $user->location ?? 'Location' }}
                </span>
            </span>
        </li>        
        @empty
        <li class="list-group-item text-center p-2 m-0 text-muted">
            No user/s has been created with this account yet.
        </li>
        @endforelse --}}
    </ul>
</div>
