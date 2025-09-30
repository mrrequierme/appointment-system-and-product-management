<form action="{{route('admin.services.store')}}" method="post" class="p-3 services_form">
    @csrf
    <h5 class="text-center text-primary">Add new services.</h5>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('services') is-invalid @enderror" name="services" id="services"
            value="{{ old('services') }}" placeholder="Enter services here">
        <label for="services">Services</label>
        @error('services')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary btn-sm w-100" type="submit">Submit</button>
</form>
