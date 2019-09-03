@extends('layouts.front')
@section('content')
     <!-- breedcrumb-->

      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active " aria-current="page">تواصل معنا  </li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row some-breathing-room">
     
            <div class="col-md-6">
                <div class="call-us-div shadow">
                    <div class="div-bg"><p>اتصل بنا </p></div>
                    <img class="logo-in-call" src="imgs/logo.png">
                    <hr class="line">
                    <ul class="list-call">
                        <li>الجوال:01546655456</li>
                        <li>فاكس :+24556646</li>
                        <li>البريد الاكتروني :mazenfostir@gmail.com</li>
                    </ul>
                    <p class="call-us-head2">تواصل معنا</p>
                    <div class="social-icons">
                            <i class="fab fa-facebook-square hvr-forward"></i>
                            <i class="fab fa-twitter-square hvr-forward"></i>
                            <i class="fab fa-youtube-square hvr-forward"></i>
                            <i class="fab fa-google-plus-square hvr-forward"></i>
                            <i class="fab fa-whatsapp-square hvr-forward"></i>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                    <div class="call-us-div shadow">
                            <div class="div-bg"><p>اتصل بنا </p></div>
                            <form>
                                    <div class="form-group some-space">
                         
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الاسم">
                                
                                          </div>
                                    <div class="form-group">
                         
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الاكتروني">
                                  
                                    </div>
                                    <div class="form-group">
                         
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال">
                                
                                          </div>
                                          <div class="form-group">
                         
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="عنوان الرساله">
                                    
                                              </div>
                                              <div class="form-group">
                                          
                                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="نص الرساله" rows="3"></textarea>
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                    <button type="submit" class="btn btn-send-call hvr-float">ارسال</button>
                                  </form>

                           
                        </div>

            </div>


          </div>
      </div>
</section>
    <!--  FOOTER -->
@endsection