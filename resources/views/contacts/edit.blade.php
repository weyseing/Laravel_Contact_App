<!-- ============================ -->
<!-- inheritance template -->
<!-- ============================ -->
@extends('layouts.main')

<!-- ============================ -->
<!-- title -->
<!-- ============================ -->
@section('title', 'Contact App | Add new contact')

<!-- ============================ -->
<!-- content -->
<!-- ============================ -->
@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Edit Contact</strong>
            </div>           
            <div class="card-body">

            <!-- new contact form -->
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- partial HTML file -->
                @include('contacts._form')
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
