<div class="row">
    <div class="col-md-12">

      <div class="form-group row">
        <label for="first_name" class="col-md-3 col-form-label">First Name</label>
        <div class="col-md-9">
          
          <!-- ============================================================== -->
          <!-- add error tag to show form error, must follow input 'name' -->
          <!-- if got error, add 'is-invalid' bootstrap class to input tag -->
          <!-- if got error, display error msg div & display error msg -->
          <!-- must add value="{ { old('first_name') } }" to remain the input box value after submit, must follow input 'name' -->

          <!-- old('first_name', $contact->first_name), show contact data if exist -->
          <!-- ============================================================== -->
          <input type="text" name="first_name" value="{{ old('first_name', $contact->first_name) }}" id="first_name" class="form-control @error('first_name') is-invalid @enderror">    
          @error('first_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
        <div class="col-md-9">
          <input type="text" name="last_name" value="{{ old('last_name', $contact->last_name) }}" id="last_name" class="form-control @error('last_name') is-invalid @enderror">    
          @error('last_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label">Email</label>
        <div class="col-md-9">
          <input type="text" name="email" value="{{ old('email', $contact->email) }}" id="email" class="form-control @error('email') is-invalid @enderror">    
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="phone" class="col-md-3 col-form-label">Phone</label>
        <div class="col-md-9">
          <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" id="phone" class="form-control @error('phone') is-invalid @enderror">    
          @error('phone')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label">Address</label>
        <div class="col-md-9">
          
          <!-- ============================================================== -->
          <!-- { { old('first_name') } } for TEXTAREA tag -->
          <!-- ============================================================== -->
          <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address', $contact->address) }}</textarea>    
          @error('address')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="company_id" class="col-md-3 col-form-label">Company</label>
        <div class="col-md-9">
          <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">

            <!-- ========================================== -->
            <!-- display all companies into dropdown list -->
            <!-- ========================================== -->
            @if ($companies->count())
                @foreach ($companies as $id => $name)
                    <!-- ========================================== -->
                    <!-- compare id with old('company_id') to remain SELECTED data after submit -->
                    <!-- ========================================== -->
                    <option {{ $id == old('company_id', $contact->company_id) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>           <!-- check  company_id in url parameter & select in downdown list -->
                @endforeach
            @endif

          </select>
          @error('company_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <hr>

      <div class="form-group row mb-0">
        <div class="col-md-9 offset-md-3">

            <!-- ------------------------ -->
            <!-- form SUBMIT button, if $contact exist, then show 'Update', else show 'Save' -->
            <!-- ------------------------ -->
            <button type="submit" class="btn btn-primary">{{ $contact->exists ? 'Update' : 'Save' }}</button>
            <a href="{{route('contacts.index')}}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>

    </div>
  </div>