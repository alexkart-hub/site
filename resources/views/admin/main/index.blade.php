@extends('layout.admin')

@section('title', "Админка")
@section('description', "Админка")

@section('content')
                <div class="col-lg-9  order-lg-2">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h1>Админка. Главная</h1>
                                </div>
                                <div class="col-md-6">
                                    <div class="serch_cat d-flex justify-content-end">
                                        <select>
                                            <option data-display="Most Recent">Most Recent</option>
                                            <option value="1">Marketer</option>
                                            <option value="2">Wordpress</option>
                                            <option value="4">Designer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/1.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>Software Engineer</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p><i class="fa fa-map-marker"></i> California, USA</p>
                                                </div>
                                                <div class="location">
                                                    <p><i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/2.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>Digital Marketer</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p><i class="fa fa-map-marker"></i> California, USA</p>
                                                </div>
                                                <div class="location">
                                                    <p><i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/3.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>Wordpress Developer</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p><i class="fa fa-map-marker"></i> California, USA</p>
                                                </div>
                                                <div class="location">
                                                    <p><i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/4.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>Visual Designer</h4></a>

                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p><i class="fa fa-map-marker"></i> California, USA</p>
                                                </div>
                                                <div class="location">
                                                    <p><i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/5.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>Software Engineer</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p><i class="fa fa-map-marker"></i> California, USA</p>
                                                </div>
                                                <div class="location">
                                                    <p><i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/1.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>Creative Designer</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p><i class="fa fa-map-marker"></i> California, USA</p>
                                                </div>
                                                <div class="location">
                                                    <p><i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pagination_wrap">
                                    <ul>
                                        <li><a href="#"> <i class="ti-angle-left"></i> </a></li>
                                        <li><a href="#"><span>01</span></a></li>
                                        <li><a href="#"><span>02</span></a></li>
                                        <li><a href="#"> <i class="ti-angle-right"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
