<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">

    <!-- ========================================== -->
    <!-- search form, without POST so parameter in URL -->
    <!-- ========================================== -->
    <form>
      <div class="row">
        <div class="col">
          <select id="filter_company_id" name="company_id" class="custom-select">

            <!-- ========================================== -->
            <!-- display all companies into dropdown list -->
            <!-- ========================================== -->
            @if ($companies->count())
              @foreach ($companies as $id => $name)
                <option {{ $id == request('company_id') ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>           <!-- check  company_id in url parameter & select in downdown list -->
              @endforeach
            @endif

          </select>
        </div>
        <div class="col">
          <div class="input-group mb-3">

            <!-- ========================================== -->
            <!-- search input box -->
            <!-- ========================================== -->
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">

            <div class="input-group-append">
                <!-- ========================================== -->
                <!-- clear btn -->
                <!-- ========================================== -->
                <button class="btn btn-outline-secondary" id="btn-clear" type="button">
                  <i class="fa fa-refresh"></i>
                </button>
                
              <!-- ========================================== -->
              <!-- search btn -->
              <!-- ========================================== -->
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>