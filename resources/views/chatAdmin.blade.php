@extends('layout/mainadmin')
@section('title','AdminPage')
@section('container')
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"></i> Chat</h3>
                    <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
                    <li></i>Chat</li>
                    </ol>
                </div>
            </div>
            <!-- start  -->
            <div class="p-4 bg-white">
                
                <div class="row ">
                    <div class="col-lg-3 border p-2 m-4">
                        <div class="list-group" id="list-tab" role="tablist">
                        <p>Chat Pembeli</p>
                        @foreach($pembeli as $key=>$data)
                        <a class="list-group-item list-group-item-action" id="list-{{$data->id}}-list" data-toggle="list" href="#list-{{$data->id}}" role="tab" aria-controls="{{$data->id}}">{{$data->nama}}</a>
                        @endforeach
                        
                        </div>
                    </div>
                    <div class="col-lg-8 border p-2 m-4">
                        <div class="tab-content" id="nav-tabContent">
                        @foreach($pembeli as $key=>$user)
                        <div class="tab-pane fade" id="list-{{$user->id}}" role="tabpanel" aria-labelledby="list-{{$user->id}}-list">
                        <div class="border p-2 mb-3 col-12" style="overflow-y:auto; scroll-snap-align: end; height:300px;">
                        <!-- chat -->
                            <?php 
                            $count=0;
                            $chat=App\chat::where('id_pembeli',$user->id )->get();
                            ?>
                            @if($chat->isEmpty())
                                <p>Chat dengan Simponi</p>
                            @else
                                @foreach($chat as $key=>$data)

                                    @if($data->status==1)
                                        <?php 
                                        $count+=1;
                                        $username=App\pembeli::where('id',$data->id_pembeli)->first();
                                        ?>
                                        @if($count<=1)
                                        <!-- repet  -->
                                        <div class="d-flex m-0">
                                            <div class="d-flex flex-column border rounded  py-3 px-4 border-muted col-8 mb-2" disabled>
                                            <div id="user" class="text-primary"><b>{{$username->nama}}</b></div>
                                            <div id="chat" class="text-secondary">{{$data->tulis_pesan}}</div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="d-flex m-0">
                                            <div class="d-flex flex-column border rounded  py-3 px-4 border-muted col-8 mb-2" disabled>              
                                            <div id="chat" class="text-secondary">{{$data->tulis_pesan}}</div>
                                            </div>
                                        </div>
                                        @endif
                                    @else
                                    <?php 
                                    $count=0;
                                    ?>

                                    <!-- 1 -->
                                    <div class="d-flex justify-content-end m-0">
                                        <div class="d-flex flex-column border rounded bg-primary text-white py-2 px-4 border-primary col-8 mb-2" disabled>              
                                        <div id="chat" class="text-white">{{$data->tulis_pesan}}</div>
                                        </div>            
                                    </div>
                                    <!-- 2 -->
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <form action="{{route('tambahChat')}}?id={{$user->id}}" method="post">
                        <div class="d-flex">
                        @csrf
                        <input type="text" class="form-control" name="chat">
                        <button class="btn btn-outline-primary ml-2" type="submit"><i class="fas fa-location-arrow" ></i></button>        
                        </div>
                        </form>
                        <!-- endchat -->
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- asdasd -->
    </section>

    
@endsection
