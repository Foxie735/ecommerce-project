@extends('layouts.template')
@section('content')

<style>
    .contact-header {
      text-align: center;
    }
    .contact-info {
      margin: 50px 0;
    }
    iframe {
      width: 100%;
      height: 300px;
      border: 0;
    }
</style>

<!-- Header Section -->
<header class="contact-header">
    <h1>Contact Us</h1>
    <p>Get in touch with us for any inquiries or support.</p>
  </header>

  <div class="container">
    <!-- Contact Information -->
    <hr>
    <div class="text-center">
      <h2 class="mb-4">Our Contact Information</h2>
      <p><strong>Address:</strong> 123 E-Commerce Street, Online City, OC 45678</p>
      <p><strong>Phone:</strong> +62 813-8172-1708</p>
      <p><strong>Email:</strong> support@fuushop.com</p>
    </div>

    <!-- Map Section -->
    <hr>
    <div class="map">
      <h2 class="text-center mb-4">Find Us Here</h2>
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.920414939447!2d-122.08424968469491!3d37.42199977982544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba4d1bcd62a7%3A0xa4e7f7e7f77de14c!2sGoogleplex!5e0!3m2!1sen!2sus!4v1633515267128!5m2!1sen!2sus" 
        allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>

@endsection