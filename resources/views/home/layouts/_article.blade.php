<div class="row align-items-center">

            <div class="col ml--2">

                <!-- Title -->
                <div class="card-title mb-1 text-muted small" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                        用户
                    <a href="{{route('member.user.show',$active->causer)}}">
                        <strong class="text-body">{{$active->causer->name}}</strong>
                    </a>
                    @if($active['description'] =='created')
                        发布了文章
                    @elseif($active['description'] =='updated')
                        修改了文章
                    @endif
                    <a href="{{route('home.article.show',$active['properties']['attributes']['id'])}}" >
                        <strong class="text-body" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{$active['properties']['attributes']['title']}}</strong>
                    </a>
                    <p class="card-text small text-muted">
                        {{$active->created_at->diffForHumans()}}
                    </p>
                </div>
            </div>
        </div> <!-- / .row -->
        <hr>


