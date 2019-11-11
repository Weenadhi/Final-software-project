@extends('layouts.welcome')

@section('headers')

    <li class="">
        <a href="{{route('myhome')}}" class="">Home</a>
    </li>
    <li class="">
        <a href="{{route('login')}}" class="">Login</a>
    </li>
    <li class="">
        <a href="{{route('aboutus')}}" class="active">About Us</a>
    </li>
    <li class="">
        <a href="{{route('contactus')}}" class="">Contact</a>
    </li>


@endsection



@section('body_part')

<section class="banner_part">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-12 col-xl-12">
              <div class="banner_text">
                  <div class="banner_text_iner">
                      <h1>OUR <span>Services</span></h1>
                      <ul>
                        <li>Full-cycle Developer of Custom Enterprise Solutions with Extensive UX/UI</li>
                        <li> Enterprise resource planning apps</li>
                        <li>Blockchain solutions</li>
                        <li>Data visualization software</li>
                        <li>Video Chats</li>
                        <li>Social media apps</li>
                         <li>QA and software testing</li>
                         <li>IT staff augmentation</li>
                         <li>Application modernization</li>
                         <li>UI/UX development and design</li>
                      </ul>
                      <h1>OUR <span>Mission</span></h1>
                      <p>Provide best software solutions for both web and mobile applications</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection