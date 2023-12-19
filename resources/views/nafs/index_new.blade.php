  @extends('layouts.hc')
  @include('components.nav.navbar2')

    <!-- Hero Start -->
    @php
    $url ='../img/'. \App\Models\HomeSettings::where('key','img2')->first()->value
    @endphp
    
    <div class="container-fluid bg-white py-5 mb-5"
    style="height: 150px;
  min-height: 150px;
  background: url({{$url}});
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: 10% 38%;"
    >
    <div class="container py-5">
    <div class="row justify-content-start">
          <div class="col-lg-8 text-center text-lg-start">
          
          </div>
    </div>

    </div>
    </div>
    
    <!-- Hero End -->

    <!-- About Start -->
    <!-- <div class="text-center mx-auto mb-2" style="max-width: 500px">
          <h5
            class="d-inline-block text-primary text-uppercase border-bottom border-5"
          >
          会社概要
          </h5>
        </div> -->
    
    <div class="container-fluid py-1">
      <div class="container">
        <!--for desktop-->
        <div class="row form-group ">
          <div class="col-sm-5 hide-for-mobile" style="max-height: 500px;">
          <div class="mt-5"></div>
          <div class="position-relative h-100">
              <img
                class="w-100 h-100 rounded"
                src="img/{{\App\Models\HomeSettings::where('key','img')->first()->value}}"
                style="object-fit: 100% 100%"
              />
              
            </div>
          </div>
          
          <div class="col-sm-7">
          <div class="mb-2 mobile-center">
              <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">
              会社概要 
              </h5>
            </div>
            @foreach($summaries as $summary)
            <p>{{$summary->value}}</p>
            @endforeach
            
                <div class="mb-2 mobile-center">
              <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">
              会社理念
              </h5>
            </div>
            <p>{!!html_entity_decode(\App\Models\HomeSettings::where('key','mission')->first()->value)!!}
                {{--\App\Models\HomeSettings::where('key','mission')->first()->value--}}</p>
          </div>

          <!--mobile-->
          
          
          
        </div>
       
      </div>
    </div>
    <!-- About End -->

    <!-- Appointment Start -->
<div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light row gx-5">                
                    <div class=" rounded p-5" style="max-height: 500px; overflow-y: scroll;">
                        <h1 class="mb-4 text-center">お知らせ</h1>
                        <hr>
                        @if(!empty($news) & count($news)>0 )
                        <div class="card">
                          @foreach($news as $new)
                          <h3 class="text-center card-header hide-for-mobile">{{$new->date}}　{{$new->title}}</h3>
          <h3 class="text-center card-header hide-for-desktop">{{$new->date}}</h3>
          <h3 class="text-center card-header hide-for-desktop">{{$new->title}}</h3>
          <div class="form-group row mt-2">
        <div class="col-sm-3">
            <div class="input-group mb-1">
            {{--<span>時間:<span>{{$new->time}}</span></span>--}}
              <div class="input-group-prepend">
                <label class="input-group-text" for="time">時間</label>
              </div>
              <div class="form-control" style="background-color:#fff;">{{$new->time}}</div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="input-group mb-1">
              {{--<span>場所:<span>{{$new->place}}</span></span>--}}
              
              <div class="input-group-prepend">
                <label class="input-group-text" for="place">場所</label>
              </div>
              <div class="form-control" style="background-color:#fff;">{{$new->place}}</div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="input-group mb-1">
              {{--<span>参加人数:<span>{{$new->participants}}人</span></span>--}}
              <div class="input-group-prepend">
                <label class="input-group-text" for="participants">参加人数</label>
              </div>
              <div class="form-control" style="background-color:#fff;">{{$new->participants}}人</div>
              
            </div>
          </div>

        </div>
        <div class="form-group row">
       
       
       <div class="col-sm-12" >
          @foreach(\App\Models\NewsContents::where('news_id',$new->id)->get() as $content)
         
             <p class>{{$content->contents}}</p>
             
         @endforeach
       </div>

     </div>
                          {{--<div class="card-body" style="overflow-x: scroll;">
                          <h3 class="card-header">{{$new->date}}　{{$new->title}}</h3>
                          <p>                         
                            {{$new->content}}
                          </p>
                          </div>--}}
                          <hr>
                          @endforeach
                        </div>
                        @else
                          <h3>お知らせなし</h3>
                        @endif

                    </div>
            </div>
        </div>
</div>

    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px">
          <h5
            class="d-inline-block text-primary text-uppercase border-bottom border-5"
          >
          サービス項目
          </h5>
          <a
                href="/appointment"
                class="btn btn-primary " style="margin-left: 10%;"
                >予約フォーム</a>
          <!-- <h1 class="display-4">Awesome Medical Programs</h1> -->
        </div>
        <div
          class="owl-carousel price-carousel position-relative"
          style="padding: 0 45px 45px 45px"
        >
        @foreach($services as $service)
          <div class="bg-light rounded">
            <div class="position-relative">
              <img class="img-fluid rounded-top" src="/img/services/{{$service->img}}" alt="/img/price-1.jpg" style="max-height: 150px;"/>
              <div
                class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                style="background: rgba(29, 42, 77, 0.8)"
              >
                <h3 class="text-white">{{$service->short_name}}</h3>
                <h1 class="display-4 text-white mb-0">
                  <small
                    class="align-top fw-normal"
                    style="font-size: 22px; line-height: 45px"
                    >&yen;</small
                  >{{$service->price}}<small
                    class="align-bottom fw-normal"
                    style="font-size: 16px; line-height: 40px"
                    >/ {{$service->time}}分</small
                  >
                </h1>
              </div>
            </div>
            <div class="py-5">
              
              <span>{{$service->summary}}</span>
              
              
              <div class="text-center mx-auto mb-1" style="max-width: 500px">
              <a href="/services/details/{{$service->id}}" class="btn btn-primary rounded-pill py-2 px-5 my-2"
                >詳細</a
              >
              </div>
              
              <div class="text-center mx-auto mb-2" style="max-width: 500px">
              <a
                href="/appointment"
                class="btn btn-primary rounded-pill py-2 px-5 my-2 "
                >予約フォーム</a>
              </div>
              
            </div>
          </div>
          @endforeach
          {{--<div class="bg-light rounded text-center">
            <div class="position-relative">
              <img class="img-fluid rounded-top" src="img/price-2.jpg" alt="" />
              <div
                class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                style="background: rgba(29, 42, 77, 0.8)"
              >
                <h3 class="text-white">全身疲れをとるリラックス<br />コース</h3>
                <h1 class="display-4 text-white mb-0">
                  <small
                    class="align-top fw-normal"
                    style="font-size: 22px; line-height: 45px"
                    >&yen;</small
                  >8,800<small
                    class="align-bottom fw-normal"
                    style="font-size: 16px; line-height: 40px"
                    >/ 90分</small
                  >
                </h1>
              </div>
            </div>
            <div class="text-center py-5">
            <p>自律神経調整・背中弛み改善（首、背中）</p>
              <p>十二の経絡を開き、陰陽のバランスを整え、筋肉を弛緩させ、リラックス、減圧をさせる。</p>
              <p>内臓の解毒と循環機能を促進し、体の5〜7cmの<br>冷気と湿気を効果的に排出します、
                酸素と...<br></p>
                <p>
              <a href="/services" class="btn btn-primary rounded-pill py-2 px-5 my-2"
                >詳細</a
              >
              </p>
              <p>
              <a
                href="/appointment"
                class="btn btn-primary rounded-pill py-2 px-5 my-2 "
                >予約フォーム</a>
              </p>
            </div>
          </div>--}}
          {{--<div class="bg-light rounded text-center">
            <div class="position-relative">
              <img class="img-fluid rounded-top" src="img/price-3.jpg" alt="" />
              <div
                class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                style="background: rgba(29, 42, 77, 0.8)"
              >
                <h3 class="text-white">
                アンチエイジング美容鍼 <br />
                <span style="font-size: 20px;"> （弛み、小じわ、小顔、肌のツヤ）</span>
                </h3>
                <h1 class="display-4 text-white mb-0">
                  <small
                    class="align-top fw-normal"
                    style="font-size: 22px; line-height: 45px"
                    >$</small
                  >10,800<small
                    class="align-bottom fw-normal"
                    style="font-size: 16px; line-height: 40px"
                    >/ 90分</small
                  >
                </h1>
              </div>
            </div>
            <div class="text-center py-5">
            
              <p>電気を流す美容鍼</p>
                <p>（特別なりズムで微弱電流を流す美容鍼で
                <br>  
                お肌のターンオーバーを促進！)</p>
                <p> 鍼でお顔のツボ＆筋肉を刺激して凝り＆ゆるみを解消</p>
                <p>
              <a href="/services" class="btn btn-primary rounded-pill py-2 px-5 my-2"
                >詳細</a
              >
              </p>
              <p>
              <a
                href="/appointment"
                class="btn btn-primary rounded-pill py-2 px-5 my-2 "
                >予約フォーム</a>
              </p>
            </div>
          </div>--}}
          
        </div>
      </div>
    </div>
    <!-- Pricing Plan End -->

    <!-- Team Start -->
    @if(!empty($staffs) & count($staffs)>0 )
    <div class="container-fluid py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px">
          <h5
            class="d-inline-block text-primary text-uppercase border-bottom border-5"
          >
            社員
          </h5>
          <!-- <h1 class="display-4">Qualified Healthcare Professionals</h1> -->
        </div>
        <div @if(count($staffs)>1) class="owl-carousel team-carousel position-relative" @endif>
        @foreach($staffs as $staff)
          <div class="team-item">
            <div class="row g-0 bg-light rounded overflow-hidden">
              <div class="col-12 col-sm-5 h-100">
                <img
                  class="img-fluid h-100"
                  src="img/staff/{{$staff->img}}"
                  style="object-fit: auto"
                />
              </div>
              <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                <div class="mt-auto p-4">
                  <h3>{{$staff->name}}</h3>
                  <h6 class="fw-normal fst-italic text-primary mb-4">
                  {{$staff->job_title}}
                  </h6>
                  <p class="m-0">
                  {{$staff->hitokoto}}
                  </p>
                </div>
                <div class="d-flex border-top p-4">     
                <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>{{$staff->tel}}</p>
                </div>

                <div class="d-flex p-4"> 
                  <p class="mb-0"><i class="fa fa-envelope text-primary me-3"></i>{{$staff->email}}</p>     
                </div>
              </div>
            </div>
          </div>
          @endforeach          
        </div>
      </div>
    </div>
    @endif
    <!-- Team End -->

    

   

    

   
  

  

