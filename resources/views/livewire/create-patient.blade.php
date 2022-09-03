<div class="bg-white p-4">
    <div class="d-flex align-items-center gap-2 mb-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <label for="firstname" class="col-form-label">First name</label>
            <input type="text" class="form-control" wire:model.lazy="firstname" id="firstname">
          </div>
          <div class="col-4">
            <label for="lastname" class="col-form-label">Last name</label>
            <input type="text" class="form-control" wire:model.lazy="lastname" id="lastname">
        </div>
        <div class="col-4">
              <label for="visit_type" class="col-form-label">Visit type</label>
            <select class="form-control" wire:model.lazy="visit_type" id="visit_type">
                <option value=""  selected></option>
                <option value="first time">First time</option>
                <option value="follow up">Follow up</option>
                <option value="opd">OPD</option>
                <option value="emergency">Emergency</option>
            </select>
          </div>
        </div>
        <div class="row">
            <div class="col-4 mt-2">
              <label for="dob">Date of birth</label>
              <input type="date" class="form-control" wire:model.lazy="dob">
            </div>          
          
            <div class="col-4 mt-2">
              <label for="breastfed">Exclusively breastfed</label>
              <select class="form-control" wire:model.lazy="breastfed">
                <option value=""  selected></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>          
          
            <div class="col-4 mt-2">
              <label for="mother_name">Mother's Name</label>
              <input type="text" class="form-control" wire:model.lazy="mother_name">
            </div>
            <div class="col-4 mt-2">
              <label for="father_name">Father's Name</label>
              <input type="text" class="form-control" wire:model.lazy="father_name">
            </div>
            <div class="col-4 mt-2">
              <label for="contact">Contact No.</label>
              <input type="text" class="form-control" wire:model.lazy="contact">
            </div>
            <div class="col-4 mt-2">
                <label for="contact">NIC No.</label>
                <input type="text" class="form-control" wire:model.lazy="nic">
            </div>
            <div class="col-4 mt-2">
              <label for="occupation">Occupation</label>
              <input type="text" class="form-control" wire:model.lazy="occupation">
            </div>
            <div class="col-4 mt-2">
              <label for="education">Education</label>
              <select class="form-control" wire:model.lazy="education">
                <option value="" selected></option>
                <option value="illiterate">Illiterate</option>
                <option value="literate">Literate</option>
                <option value="school grad.">School grad.</option>
                <option value="college/university grad.">College/University grad.</option>
              </select>
            </div>
            <div class="col-4 mt-2">
                <label for="cities">City</label>
                <input type="text" list="cities" class="form-control" wire:model.lazy="city">
                <datalist id="cities">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}-{{ $city->name }}">({{ $city->state }})</option>
                    @endforeach
                </datalist>
            </div>
            <div class="col-12 mt-4">
            {{-- <label for="role" class="col-form-label"></label> --}}
            {{-- <br> --}}
            <button type="button" wire:loading.attr='disabled' class="btn btn-primary mt-2 float-right" wire:click="store" data-bs-dismiss="modal">Create</button>
          </div>
        </div>
      </div>
        
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
