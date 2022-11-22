<div class="top-sub-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="menu-btn">
                    <i class="">
                        <svg id="menu-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></i>
                </div>
                <div class="page-title">
                    <h4>Library <b>{{ Auth::user()->username }}</b></h4>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="#" title="">Home</a></li>
                    <li><a href="#" title="">Dashboard</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
<!-- top sub bar -->