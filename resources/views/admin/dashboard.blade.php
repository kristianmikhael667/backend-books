<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Dashboard E-Library </title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ '/css/main.min.css' }}">
    <link rel="stylesheet" href="{{ '/css/style.css' }}">
    <link rel="stylesheet" href="{{ '/css/color.css' }}">
    <link rel="stylesheet" href="{{ '/css/responsive.css' }}">
    <link href="{{ '/plugins/apex/apexcharts.css' }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    {{-- Dropify --}}
    <link rel="stylesheet" href="{{ '/plugins/dropify/dist/css/dropify.css' }}">

</head>


<body>
    {{-- @include('loader') --}}
    <div class="theme-layout">
        @include('partials_admin.responsiveheader')
        @include('partials_admin.header')
        @include('partials_admin.topsubbar')
        @include('partials_admin.sidebar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-content">
                        <h4 class="main-title">K-Means And Based Filtering Colaboration</h4>


                        <div class="row merged20 mb-4">
                            <div class="col-lg-12">
                                <div class="d-widget">
                                    <div class="d-widget-title">
                                        <h5>Viewer Books</h5>
                                    </div>
                                    <div class="d-widget-content">
                                        <table class="table manage-user table-default table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Cover</th>
                                                    <th>Title Article</th>
                                                    <th>Author</th>
                                                    <th>Viewer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($books as $no => $item)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td><img width="100" height="100" src="{{env('APP_URL')}}/api/{{$item->cover_book}}" alt="" srcset=""></td>
                                                        <td>{{ $item->name_book }}
                                                        </td>
                                                        <td>
                                                            <h5>{{ $item->author_book }}</h5>
                                                        </td>
                                                        <td>{{$item->total_views}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- @can('create users', User::class)
                                            <a href="/administrator/comments/export" class="btn btn-success mt-3">Export
                                                Excel</a>
                                        @endcan --}}
                                    </div>
                                </div>

                                <div class="d-widget mt-2">
                                    <div class="d-widget-title">
                                        <h5>Ratings Books</h5>
                                    </div>
                                    <div class="d-widget-content">
                                        <table class="table manage-user table-default table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Cover</th>
                                                    <th>Title Article</th>
                                                    <th>Author</th>
                                                    <th>Ratings</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviewer as $no => $item)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td><img width="100" height="100" src="{{env('APP_URL')}}/api/{{$item->cover_book}}" alt="" srcset=""></td>
                                                        <td>{{ $item->name_book }}
                                                        </td>
                                                        <td>
                                                            <h5>{{ $item->author_book }}</h5>
                                                        </td>
                                                        <td>{{$item->avg}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- @can('create users', User::class)
                                            <a href="/administrator/comments/export" class="btn btn-success mt-3">Export
                                                Excel</a>
                                        @endcan --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- main content -->

        <div class="popup-wraper">
            <div class="popup">
                <span class="popup-closed"><i class="icofont-close"></i></span>
                <div class="popup-meta">
                    <div class="popup-head">
                        <h5><i class="icofont-envelope"></i> Send Message</h5>
                    </div>
                    <div class="send-message">
                        <form method="post" class="c-form">
                            <input type="text" placeholder="Enter Name..">
                            <input type="text" placeholder="Subject">
                            <textarea placeholder="Write Message"></textarea>
                            <div class="uploadimage">
                                <i class="icofont-file-jpg"></i>
                                <label class="fileContainer">
                                    <input type="file">Attach file
                                </label>
                            </div>
                            <button type="submit" class="main-btn">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- send message popup -->

        <div class="side-slide">
            <span class="popup-closed"><i class="icofont-close"></i></span>
            <div class="slide-meta">
                <ul class="nav nav-tabs slide-btns">
                    <li class="nav-item"><a class="active" href="#messages" data-toggle="tab">Messages</a></li>
                    <li class="nav-item"><a class="" href="#notifications" data-toggle="tab">Notifications</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active fade show" id="messages">
                        <h4><i class="icofont-envelope"></i> messages</h4>
                        <a href="#" class="send-mesg" title="New Message" data-toggle="tooltip"><i
                                class="icofont-edit"></i></a>
                        <ul class="new-messages">
                            <li>
                                <figure><img src="images/resources/user1.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Ibrahim Ahmed</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user2.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Fatima J.</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user3.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Fawad Ahmed</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user4.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Saim Turan</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user5.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                        </ul>
                        <a href="#" title="" class="main-btn" data-ripple="">view all</a>
                    </div>
                    <div class="tab-pane fade" id="notifications">
                        <h4><i class="icofont-bell-alt"></i> notifications</h4>
                        <ul class="notificationz">
                            <li>
                                <figure><img src="images/resources/user5.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">recommend your post</a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user4.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">share your post <strong>a good time
                                            today!</strong></a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user2.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">recommend your post</a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user1.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">share your post <strong>a good time
                                            today!</strong></a>
                                </div>
                            </li>
                            <li>
                                <figure><img src="images/resources/user3.jpg" alt=""></figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">recommend your post</a>
                                </div>
                            </li>
                        </ul>
                        <a href="#" title="" class="main-btn" data-ripple="">view all</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- side slide message & popup -->
    </div>
    @include('admin.js-analytic')
</body>

</html>
{{-- https://qadrlabs.com/post/belajar-laravel-8-roles-and-permissions --}}
