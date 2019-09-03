@extends('layouts.front')
     <!-- breedcrumb-->
@section('content')
      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول </li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
        <div class="col-md-12">
            <div class="article-content shadow">
                <p class="content">
                    <img  class="log-logo" src="{{asset('imgs/logo.png')}}">
                    <form>
                            <div class="form-group">
                            
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال">
                           
                            </div>
                            <div class="form-group">
                         
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                            </div>
                            <div class="form-check ">
                              <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">تذكرني</label>
                              </div>

             
                            </div>
                            <div class="did-u-forget clearfix">
                              <a class="forget-pass" href="#"><p class="forget ">هل نسيت كلمة المرور</p></a>
                              <img class="complian forget"src="imgs/complain.png">

                             </div>
                            <div class="form-btns">
                            <button type="submit" class="btn btn-login">دخول </button>
                            <button type="submit" class="btn btn-new">انشاء حساب جديد </button>
                        </div>
                          </form>
                
            </div>

        </div>

          </div>
      </div>
</section>
    <!--  FOOTER -->
@endsection