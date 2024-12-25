@extends('layouts.template')
@section('content')

<style>
    .mission, .team, .values, .why-choose-us {
      margin-bottom: 50px;
    }
    .team img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }
    .values .icon {
      font-size: 40px;
      color: #007bff;
    }
  </style>

    <!-- Header Section -->
    <header class="container text-center">
        <h1>About Us.</h1>
        <p>Welcome to Fuushop, where convenience meets quality in online shopping.</p>
    </header>
    <div class="container my-4">
        <!-- Mission Section -->
        <hr>
        <div class="mission text-center">
        <h2 class="mb-3">Our Mission</h2>
        <p class="lead">
            At <strong>Fuushop</strong>, our mission is to provide a seamless shopping experience, offering a wide variety of products at competitive prices while ensuring customer satisfaction every step of the way.
        </p>
        </div>

        <!-- Core Values Section -->
        <hr>
        <div class="values text-center">
        <h2 class="mb-4">Our Core Values</h2>
        <div class="row">
            <div class="col-md-4">
            <div class="icon mb-3">🛒</div>
            <h5>Customer Focus</h5>
            <p>We prioritize your needs and strive to deliver exceptional service.</p>
            </div>
            <div class="col-md-4">
            <div class="icon mb-3">🚀</div>
            <h5>Innovation</h5>
            <p>We are committed to innovation, constantly improving our platform.</p>
            </div>
            <div class="col-md-4">
            <div class="icon mb-3">🌍</div>
            <h5>Sustainability</h5>
            <p>We aim to make a positive impact on the environment through sustainable practices.</p>
            </div>
        </div>
        </div>

        <!-- Why Choose Us Section -->
        <hr>
        <div class="why-choose-us text-center">
        <h2 class="mb-4">Why Choose Us?</h2>
        <div class="row">
            <div class="col-md-4">
                <h5>Wide Selection of Products</h5>
                <p>From electronics to fashion, we have everything you need in one place.</p>
            </div>
            <div class="col-md-4">
                <h5>Fast and Reliable Shipping</h5>
                <p>Your orders are delivered quickly and safely to your door.</p>
            </div>
            <div class="col-md-4">
                <h5>24/7 Customer Support</h5>
                <p>Our dedicated support team is here to assist you anytime.</p>
            </div>
        </div>
        </div>
    </div>

    <footer class="text-center">
        <p>&copy; 2024 Fuushop. All rights reserved. | <a href="/contact" class="text-dark">Contact Us</a></p>
    </footer>

@endsection