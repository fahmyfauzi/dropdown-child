<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Profile</span>
                    <span><a href="{{route('user.profile')}}" class="badge bg-warning text-dark">Back</a></span>
                </div>
                <div class="card-body">
                    @if($alert)
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>Terimakasih</strong> sudah melengkapi profile anda!
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input wire:model="email" type="email" class="form-control  @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Province</label>
                        <select wire:model="myProvince" type="text" class="form-select">
                            <option value="" selected hidden>Pilih Province</option>
                            @foreach($provinces as $province)
                            <option value="{{$province->code}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">

                        <label for="">City</label>
                        @if($city)
                        <select wire:model="myCity" type="text" class="form-select">
                            <option value="" selected hidden>Pilih City</option>
                            @foreach($city->cities as $item)
                            <option value="{{$item->code}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <select wire:model="myCity" type="text" class="form-select" disabled>
                            <option value="" selected hidden>Pilih City</option>
                        </select>
                        @endif
                    </div>
                    <div class="mb-3">

                        <label for="">District</label>
                        @if($districts)
                        <select wire:model="myDistrict" type="text" class="form-select">
                            <option value="" selected hidden>Pilih City</option>
                            @foreach($districts->district as $item)
                            <option value="{{$item->code}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <select wire:model="myDistrict" type="text" class="form-select" disabled>
                            <option value="" selected hidden>Pilih City</option>
                        </select>
                        @endif
                    </div>

                    <button class="btn btn-primary" wire:click="submit">update</button>
                </div>
            </div>
        </div>
    </div>
</div>