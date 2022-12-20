@extends('layouts.main')
@section('container')
    <div class="theme-layout">
        @include('partials_admin.responsiveheader')
        @include('partials_admin.header')
        @include('partials_admin.topsubbar')
        @include('partials_admin.sidebar')

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-content">
                        {{-- <h4 class="main-title">Users Management</h4> --}}

                        <div class="row merged20 mb-4">
                            <div class="col-lg-12">
                                <div class="d-widget">
                                    <div class="d-widget-title">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4>List Borrow Book</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-widget-title">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <form action="/administrator/post" method="get" role="search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="Search Borrow Book ..."
                                                            value="{{ request('title') }}">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-outline-secondary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-search">
                                                                    <circle cx="11" cy="11" r="8">
                                                                    </circle>
                                                                    <line x1="21" y1="21" x2="16.65"
                                                                        y2="16.65"></line>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Table start -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Code Book</th>
                                                <th>Fullname</th>
                                                <th>Phone</th>
                                                <th>Name Book</th>
                                                <th>Total Borrow</th>
                                                <th>Catalog</th>
                                                <th>Status</th>
                                                <th>Date Borrow</th>
                                                <th>Created</th>
                                                <th class="disableFilterBy">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($borrows as $num => $borrow)
                                                <tr>
                                                    <td>{{ $num + 1 }}</td>
                                                    <td><b>{{ $borrow->code_book }}</b></td>
                                                    <td>{{ $borrow->users->fullname }}</td>
                                                    <td>{{ $borrow->users->phone }}</td>
                                                    <td>{{ $borrow->books->name_book }}</td>
                                                    <td>{{ $borrow->qty }} Item</td>
                                                    <td>{{ $borrow->books->catalog->name_catalog }}</td>
                                                    <td>
                                                        @if ($borrow->status_book == 'none')
                                                            <span
                                                                class="text-warning">{{ $borrow->status_book == 'none' ? 'Pending' : '' }}</span>
                                                        @else
                                                            <span
                                                                class="text-success">{{ $borrow->status_book == 'borrow' ? 'Pinjam' : '' }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('Y-m-d H:i:s', strtotime($borrow->date_borrow)) }}</td>
                                                    {{-- <td>{{ $borrow->date_borrow }}</td> --}}

                                                    <td>{{ \Carbon\Carbon::parse($borrow->created_at)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        @if ($borrow->status_book == 'none')
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a class="btn-sm btn-success"
                                                                    href="/administrator/databook/borrowbook/1{{ $borrow->uid }}"
                                                                    class="badge btn-light">
                                                                    Accept
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a class="btn-sm btn-danger"
                                                                    href="/administrator/databook/borrowbook/0{{ $borrow->uid }}"
                                                                    class="badge btn-light">Reject</a>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <span>Verified</span>
                                                        @endif
                                                    </td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="11" class="prova">
                                                        Data Table Empty
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

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
                    <li class="nav-item"><a class="" href="#notifications" data-toggle="tab">Notifications</a></li>
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
@endsection
