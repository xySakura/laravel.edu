<div class="card" id="app">
    <div class="card-body">
        <div class="header">
            <div class="header-body">
                <div class="row">
                    <div class="col-12">
                        <!-- Nav -->
                        <ul class="nav nav-tabs header-tabs col-12">
                            <li class="nav-item col-6">
                                <a href="#" class="nav-link text-center active" data-toggle="tab"
                                   data-target="#tabPaneOne" role="tab" aria-controls="tabPaneOne" aria-selected="true">
                                    评论
                                </a>
                            </li>
                            <li class="nav-item col-5">
                                <a href="#" class="nav-link text-center" data-toggle="tab" data-target="#tabPaneTwo"
                                   role="tab" aria-controls="tabPaneTwo" aria-selected="false">
                                    点赞
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- Comments -->
        <div class="tab-content">
            {{--评论--}}
            <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                <div class="comment mb-3" v-for="v in comments" :id="'comment'+v.id">
                    <div class="row">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <a class="avatar" :href="'http://laravel.edu/member/user/'+v.user.id">
                                <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle">
                            </a>

                        </div>
                        <div class="col ml--2">

                            <!-- Body -->
                            <div class="comment-body">

                                <div class="row">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="comment-title">
                                            @{{ v.user.name }}
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Time -->
                                        <time class="comment-time">
                                            <a href="" @click.prevent="like(v)" class="text-muted">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                            </a>
                                            @{{v.like_num}} | @{{ v.created_at }}
                                        </time>

                                    </div>
                                </div> <!-- / .row -->

                                <!-- Text -->
                                <p class="comment-text" v-html="v.content">

                                </p>

                            </div>

                        </div>
                    </div> <!-- / .row -->
                </div>


                <!-- Divider -->
                <hr>

                <!-- Form -->
                @auth()
                    <div class="row align-items-start">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                            </div>

                        </div>
                        <div class="col ml--2">

                            <div id="editormd">
                                <textarea style="display:none;"></textarea>
                            </div>
                            <button class="btn btn-primary" @click.prevent="send()">发表评论</button>

                        </div>
                    </div> <!-- / .row -->
                @else
                    <p class="text-muted text-center">请 <a href="{{route('login',['from'=>url()->full()])}}">登录</a> 后评论
                    </p>
                @endauth
            </div>
            {{--点赞--}}
            <div class="tab-pane fade" id="tabPaneTwo" role="tabpanel">
                @if(!$article->like->count()==0)
                    @foreach($article->like as $like)
                    <div class="avatar avatar-xl m-1">
                        <a href="{{route('member.user.show',$like->user)}}">
                            <img src="{{$like->user->icon}}" alt="..." class="avatar-img rounded-circle">
                        </a>
                    </div>
                    @endforeach
                @else
                    <p class="text-muted text-center p-5">暂无点赞</p>
                @endif

            </div>
        </div>

    </div>
</div>
@push('js')

    <script>
        require(['hdjs', 'vue', 'axios', 'MarkdownIt', 'marked', 'highlight'], function (hdjs, Vue, axios, MarkdownIt, marked) {
            var vm = new Vue({
                el: '#app',
                data: {
                    comment: {content: ''},//当前评论
                    comments: [],//全部评论
                },
                updated(){
                    $(document).ready(function () {
                        $('pre code').each(function (i, block) {
                            hljs.highlightBlock(block);
                        });
                    });
                    //滚动页面
                    // alert(location.hash);//#comment19
                    //http://demos.flesler.com/jquery/scrollTo/
                    hdjs.scrollTo('body',location.hash,1000, {queue:true});
                },
                methods: {
                    send() {
                        //评论不能为空
                        if (this.comment.content.trim() == '') {
                            hdjs.swal({
                                text: "请输入评论内容",
                                button: false,
                                icon: 'warning'
                            });
                            return false;
                        }
                        axios.post('{{route('home.comment.store')}}', {
                            content: this.comment.content,
                            article_id: '{{$article['id']}}'
                        }).then((response) => {
                            //console.log(response.data.comment);
                            this.comments.push(response.data.comment);
                            //将 markdown 转为 html
                            let md = new MarkdownIt();
                            response.data.comment.content = md.render(response.data.comment.content)
                            //清空 vue 数据
                            this.comment.content = '';
                            //清空编辑器内容
                            //选中所有内容
                            editormd.setSelection({line: 0, ch: 0}, {line: 9999999, ch: 9999999});
                            //将选中文本替换成空字符串
                            editormd.replaceSelection("");
                        })
                    },
                    like(v){
                        let url = '/home/like/make?type=comment&id='+v.id;
                        axios.get(url).then((response)=>{
                            v.like_num = response.data.num;
                        })

                    }
                },
                mounted() {
                    @auth()
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        toolbarIcons: function () {
                            return [
                                "undo", "redo", "|",
                                "bold", "del", "italic", "quote", "|",
                                "list-ul", "list-ol", "hr", "|",
                                "link", "hdimage", "code-block", "|",
                                "watch", "preview", "fullscreen"
                            ]
                        },
                        //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                        server: '',
                        //editor.md库位置
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                        //监听编辑器
                        onchange: function () {
                            //给 vu 对象中 comment 属性中 content 设置值
                            vm.$set(vm.comment, 'content', this.getValue());
                        }
                    });
                    @endauth
                    //请求当前文章所有评论数据
                    axios.get('{{route("home.comment.index",['article_id'=>$article['id']])}}')
                        .then((response) => {
                            //console.log(response.data.comments)
                            this.comments = response.data.comments;
                            let md = new MarkdownIt();
                            //console.log(this.comments);
                            this.comments.forEach((v, k) => {
                                v.content = md.render(v.content)
                                v.like_num = v.like.length;
                            })
                            $(document).ready(function () {
                                $('pre code').each(function (i, block) {
                                    hljs.highlightBlock(block);
                                });
                            });
                        });
                }
            });
        })
    </script>

@endpush