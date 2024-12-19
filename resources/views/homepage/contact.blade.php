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
    <div>
      <h2 class=" text-center mb-4">Our Contact Information</h2>
        <table >
        <tr>
          <th scope="row">Address</th>
          <td>:</td>
          <td></td>
          <td>Jl. R.Mangun Muka Raya No.11, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</td>
        </tr>
        <tr>
          <th scope="row">Phone</th>
          <td>:</td>
          <td></td>
          <td>+62 813-8172-1708</td>
        </tr>
        <tr>
          <th scope="row">Email</th>
          <td>:</td>
          <td></td>
          <td>axelsavero@gmail.com</td>
        </tr>
      </table>
    </div>

    <!-- Map Section -->
    <hr>
    <div class="map">
      <h2 class="text-center mb-4">Find Us Here</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.524925130941!2d106.87646897402476!3d-6.194253660682942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4ed14403213%3A0x2412a91a0f6a01c8!2sJakarta%20State%20University!5e0!3m2!1sen!2sid!4v1734610449093!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

@endsection