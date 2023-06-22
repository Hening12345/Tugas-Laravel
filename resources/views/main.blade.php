@extends('layouts.main')
@section('container')

<body>
<!-- header section -->
@include('partials.navbar')
<!-- header section --> 

<!-- intro section -->
@include('partials.about')
<!-- intro section --> 

<!-- services section -->
@include('partials.services')
<!-- services section -->  

<!-- gallery section -->
@include('partials.gallery')
<!-- gallery section --> 

<!-- our team section --> 
@include('partials.team')
<!-- our team section --> 

<!-- Quotes section -->
@include('partials.quote')
<!-- Quotes section -->  
 </body>

@endsection