@extends('admin.layouts.master')
@section('content')
    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('wechat.menu.index')}}" class="nav-link">
                                    菜单列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.menu.create')}}" class="nav-link  active">
                                    添加菜单
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid" id="app">
        <div class="row">
            <div class="card col-4" id="leftcard">
                <div class="mobile">
                    <dl v-for="(v,k) in menus.button" @click="editCurrentMenu(v)">
                        <dt>
                            <span @click.stop="delMenu(k)" class="fa fa-minus-circle"></span>
                            @{{ v.name }}
                        </dt>
                        <dd v-for="(x,y) in v.sub_button" @click="editCurrentMenu(x)">
                            <span @click.stop="delSubMenu(v,y)" class="fa fa-minus-circle"></span>
                            @{{ x.name }}
                        </dd>
                        <dd @click.stop="addSubMenu(v)" v-if="v.sub_button.length<5">
                            <span class="fa fa-plus"></span>
                        </dd>
                    </dl>
                    <dl v-if="menus.button.length < 3">
                        <dt @click="addMenu">
                            <span class="fa fa-plus"></span>
                        </dt>
                    </dl>

                </div>
            </div>
            <div class="card col-8" id="rightcard">
                <div class="container-fluid">
                    <!-- Header -->

                    <div class="row ">
                        <div class="col-12 mt-4">

                            <form method="post" action="{{route('wechat.menu.update',$menu)}}">
                                @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">菜单标题</label>
                                            <input type="text" name="title" value="{{$menu['title']}}"  class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">菜单名称</label>
                                            <input type="text" v-model="currentMenu.name" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">属性</label>
                                            <div class="form-check form-check-inline" >
                                                <input class="form-check-input" v-model="currentMenu.type" value="view"  type="radio">
                                                <label class="form-check-label" for="inlineRadio1">链接</label>
                                            </div>
                                            <div class="form-check form-check-inline" >
                                                <input class="form-check-input" type="radio" v-model="currentMenu.type" value="click" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">关键词</label>
                                            </div>
                                        </div>
                                        <div class="form-group" v-if="currentMenu.type == 'view'">
                                            <label for="exampleInputEmail1">链接</label>
                                            <input type="text" v-model="currentMenu.url" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="form-group" v-if="currentMenu.type == 'click'">
                                            <label for="exampleInputEmail1">关键词</label>
                                            <input type="text" v-model="currentMenu.key" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <button type="submit" class="btn btn-primary">保存</button>
                                        <textarea name="data" hidden id="" cols="30" rows="10">@{{ menus }}</textarea>



                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{--@{{  menus }}--}}
    </div>



@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('org/css/menu.css')}}">
@endpush
@push('js')
    <script>
        require(['hdjs','vue'],function (hdjs,Vue) {
            new Vue({
                el:'#app',
                data:{
                    //当前选中的菜单
                    currentMenu:{},
                    //全部菜单
                    menus:{
                        "button":[

                        ]
                    }
                },
                methods:{
                    //添加一级菜单
                    addMenu(){
                        if(this.menus.button.length < 3){
                            var html = {type:'click',name:'一级菜单',key:'',sub_button:[]}
                            this.menus.button.push(html)
                            this.currentMenu = html;
                        }
                    },
                    // 删除一级菜单
                    delMenu(k){
                        this.menus.button.splice(k,1)
                    },
                    // 添加二级菜单
                    addSubMenu(v){
                        if(v.sub_button.length < 5) {
                            var html = {type: 'click', name: '二级菜单', key: ''}
                            v.sub_button.push(html);
                            this.currentMenu = html;
                        }
                    },
                    // 删除二级菜单
                    delSubMenu(v,y){
                        v.sub_button.splice(y,1);
                    },
                    editCurrentMenu(v){
                        this.currentMenu = v;
                    }





                }





            })






        })


    </script>
@endpush